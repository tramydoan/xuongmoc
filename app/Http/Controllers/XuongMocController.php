<?php

namespace App\Http\Controllers;

use App\About;
use App\Articles;
use App\Banner;
use App\Category;
use App\Contact;
use App\Http\Requests\PostRegisterRequest;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\Setting;
use App\User;
use App\Vendors;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class XuongMocController extends GeneralController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $cart = Cart::content();
        $total = Cart::priceTotal();

        return view('frontend.auth.login', [
            'currentPage' => 'login',
            'cart' => $cart,
            'total' => $total,
        ]);
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'user-email' => 'required',
            'user-password' => 'required',
        ], [
            'user-email.required' => 'Bạn chưa nhập Email',
            'user-password.required' => 'Mật khẩu không được để trống'
        ]);
        $mail = $request->input('user-email');
        $password = $request->input('user-password');
        if (Auth::attempt(['email' => $mail, 'password' => $password])) {
            if (\auth()->user()->role == 1) {
                return redirect()->route('quan-tri.admin');
            }
            return redirect()->route('xuongmoc');
        } else {
            return redirect()->route('xuongmoc.login')->with('thongbao', 'Đăng nhập không thành công');
        }
    }

    public function logout()
    {
        Auth::logout();
        Cart::destroy();
        return redirect()->route('xuongmoc.login');
    }

    public function register()
    {
        $cart = Cart::content();
        $total = Cart::priceTotal();

        return view('frontend.auth.register', [
            'currentPage' => 'login',
            'cart' => $cart,
            'total' => $total,
        ]);
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'email' => 'unique:users|required',
            'user-name' => 'required|min:1',
            'user-phone' => 'required',
            'user-address' => 'required',
            'user-password' => 'required',
        ], [
            'email.unique' => 'Email đã tồn tại',
            'email.required' => 'Email không được để trống',
            'user-name.required' => 'Tên không được để trống',
            'user-name.min' => 'Tên của bạn quá ngắn',
            'user-phone.required' => 'Số điện thoại không được để trống',
            'user-address.required' => 'Địa chỉ không được để trống',
            'user-password.required' => 'Mật khẩu không được để trống'
        ]);
        $user = new User();
        $user->name = $request->input('user-name');
        $user->slug = Str::slug($request->input('user-name'));
        $user->email = $request->input('email');
        $user->address = $request->input('user-address');
        $user->phone = $request->input('user-phone');
        $user->password = bcrypt($request->input('user-password'));
        $user->role = 2;
        $user->save();
        return redirect()->route('xuongmoc.login');
    }

    public function home()
    {
        $cart = Cart::content();
        $total = Cart::priceTotal();

        $product = Product::where('is_active', 1)->where('is_hot', 1)->limit(8)->orderBy('position', 'ASC')->get();
        $article = Articles::where('is_active', 1)->limit(4)->orderBy('position', 'ASC')->get();
        $vendors = Vendors::where('is_active', 1)->orderBy('position', 'ASC')->get();
        return view('Frontend.home',
            [
                'currentPage' => 'home',
                'product' => $product,
                'article' => $article,
                'vendors' => $vendors,
                'cart' => $cart,
                'total' => $total
            ]);
    }

    public function myProfile()
    {
        $cart = Cart::content();
        $total = Cart::priceTotal();

        if (Auth::check()) {
            $orders = Order::where('user_id', \auth()->user()->id)->get();
            return view('Frontend.auth.user-profile', [
                'currentPage' => 'login',
                'user' => \auth()->user(),
                'orders' => $orders,
                'cart' => $cart,
                'total' => $total
            ]);
        } else {
            return redirect()->route('xuongmoc.login');
        }
    }

    public function myAddress()
    {
        $cart = Cart::content();
        $total = Cart::priceTotal();

        $user = User::find(\auth()->user()->id);
        return view('Frontend.auth.user-address',
            [
                'currentPage' => 'login',
                'user' => $user,
                'cart' => $cart,
                'total' => $total
            ]);
    }

    public function updateInfo(Request $request){
        $cart = Cart::content();
        $total = Cart::priceTotal();

        $user = User::find(\auth()->user()->id);
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'cart' => $cart,
            'total' => $total
        ]);
        return redirect()->route('xuongmoc.myAddress');
    }

    public function about()
    {
        $cart = Cart::content();
        $total = Cart::priceTotal();

        $about = About::where('is_active', 1)->orderBy('position', 'ASC')->get();
        return view('Frontend.about.index',
            [
                'currentPage' => 'abt',
                'about' => $about,
                'cart' => $cart,
                'total' => $total
            ]);
    }

    public function danhmuc($slug)
    {
        $cart = Cart::content();
        $total = Cart::priceTotal();

        $banner = Banner::where('is_active', 1)->where('is_page', 1)->orderBy('position', 'ASC')->get();
        $cate = Category::where(['slug' => $slug])->first();
        //lấy danh sách sản phẩm theo thể loại
        $id = []; //chứa danh sách sản phẩm theo thể loại

        $categories = $this->categories;
        foreach ($categories as $key => $category) {
            if ($category->id == $cate->id) { //check danh mục cha
                $id = [$category->id]; //$ids = array($category->id);
                $product = Product::where('is_active', 1)->whereIn('categories_id', $id)
                    ->orderBy('position', 'ASC')
                    ->get();
            }
        }
        return view('Frontend.category',
            [
                'currentPage' => 'prd',
                'banner' => $banner,
                'cate' => $cate,
                'product' => $product,
                'cart' => $cart,
                'total' => $total
            ]);
    }

    public function chiTietSanPham($slug)
    {
        $cart = Cart::content();
        $total = Cart::priceTotal();

        $product = Product::where(['slug' => $slug])->first();
        $related_product = Product::where('categories_id', $product->categories_id)->limit(5)->get();
        $cate = Category::find($product->categories_id);

        return view('Frontend.product.detail', [
            'currentPage' => 'prd',
            'product' => $product,
            'category' => $cate,
            'related_product' => $related_product,
            'cart' => $cart,
            'total' => $total
        ]);
    }

    public function product()
    {
        $cart = Cart::content();
        $total = Cart::priceTotal();

        //lấy danh sách sản phẩm theo thể loại
        $list = []; //chứa danh sách sản phẩm theo thể loại

        $categories = $this->categories;
        foreach ($categories as $key => $category) {
            if ($category->id != 0) { //check danh mục cha
                $ids = [$category->id]; //$ids = array($category->id);
                $list[$key] ['category'] = $category;
                $list[$key] ['product'] = Product::where('is_active', 1)->whereIn('categories_id', $ids)
                    ->limit(4)
                    ->orderBy('position', 'ASC')
                    ->get();
            }
        }
        return view('Frontend.product.index',
            [
                'currentPage' => 'prd',
                'list' => $list,
                'cart' => $cart,
                'total' => $total
            ]);
    }

    public function chiTietTinTuc($slug)
    {
        $cart = Cart::content();
        $total = Cart::priceTotal();

        $articleKey = 'article_' . $slug;

        // Kiểm tra Session của tin tức có tồn tại hay không.
        // Nếu không tồn tại, sẽ tự động tăng trường view_count lên 1 đồng thời tạo session lưu trữ key tin tức.
        if (!Session::has($articleKey)) {
            Articles::where('slug', $slug)->increment('view_count');
            Session::put($articleKey, 1);
        }
        // Lấy ra tin tức theo slug
        $article = Articles::find($slug);

        $article = Articles::where(['slug' => $slug])->first();
        $new_article = Articles::where('is_active', 1)->limit(5)->orderBy('position', 'DESC')->get();


        return view('Frontend.article.detail', [
            'currentPage' => 'art',
            'article' => $article,
            'new_article' => $new_article,
            'cart' => $cart,
            'total' => $total
        ]);
    }

    public function article()
    {
        $cart = Cart::content();
        $total = Cart::priceTotal();

        $article = Articles::where('is_active', 1)->orderBy('position', 'ASC')->paginate(6);
        return view('Frontend.article.index',
            [
                'currentPage' => 'art',
                'article' => $article,
                'cart' => $cart,
                'total' => $total
            ]);
    }

    public function vendor()
    {
        $cart = Cart::content();
        $total = Cart::priceTotal();

        $vendors = Vendors::where('is_active', 1)->orderBy('position', 'ASC')->get();
        return view('Frontend.vendor.index',
            [
                'currentPage' => 'vd',
                'vendors' => $vendors,
                'cart' => $cart,
                'total' => $total
            ]);
    }

    public function contact()
    {
        $cart = Cart::content();
        $total = Cart::priceTotal();

        return view('Frontend.contact.index',
            [
                'currentPage' => 'ct',
                'cart' => $cart,
                'total' => $total
            ]);
    }

    public function createContact(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->content = $request->input('content');
        $contact->homeContact = $request->input('homeContact');
        $contact->save();
        return redirect('/lien-he')->with(['mess' => 'oke']);
    }

    public function search(Request $request)
    {
        $product = Product::where('name', 'like', '%' . $request->key . '%')->paginate(8);
        return view('Frontend.search',
            [
                'currentPage' => 'search',
                'products' => $product,
                'key' => $request->key
            ]);
    }

    public function searchAuto($key)
    {
        $product = Product::where('name', 'like', '%' . $key . '%')->paginate(5);
        return response()->json([
            'products' => $product
        ]);
    }

    public function cart()
    {
        $cart = Cart::content();
        $total = Cart::priceTotal();
        return view('Frontend.cart',
            [
                'currentPage' => 'cart',
                'cart' => $cart,
                'total' => $total
            ]);
    }

    public function addcart($id)
    {
        $product = Product::find($id);
        $price = $product->sale ?? $product->price;

        Cart::add($product->id, $product->name, 1, $price, 0, [
            'image' => $product->image,
            'slug' => $product->slug
        ]);
        return redirect()->route('xuongmoc.cart')->with(['mess' => 'oke']);
    }

    public function subcart($id)
    {
        $cart = Cart::get($id);
        Cart::update($id, $cart->qty - 1);
    }

    public function delete($id)
    {
        Cart::remove($id);
    }

    public function checkout()
    {
        $cart = Cart::content();
        if (count($cart) <= 0) {
            return redirect()->route('xuongmoc');
        }
        $total = Cart::priceTotal();

        return view('Frontend.checkout',
            [
                'currentPage' => 'cart',
                'cart' => $cart,
                'total' => $total
            ]
        );
    }

    public function postCheckOut(Request $request)
    {
        $order = Order::create([
            'user_id' => \auth()->user()->id ?? null,
            'ship_name' => $request->name,
            'ship_phone' => $request->phone,
            'ship_address' => $request->address,
            'total_price' => Cart::priceTotal(0, '', ''),
            'status' => 0,
            'payment_method' => $request->payment_method
        ]);
        $cart = Cart::content();
        foreach ($cart as $item) {
            $product = Product::find($item->id);
            $product->update([
                'stock' => $product->stock - $item->qty
            ]);
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->qty
            ]);
        }
        Cart::destroy();
        return redirect()->route('xuongmoc')->with('success', 'Đặt hàng thành công! Vui lòng đợi nhân viên gọi điện xác nhận.');
    }
}
