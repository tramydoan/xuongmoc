<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Material;
use App\Product_material;
use App\ProductImage;
use App\Vendors;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::latest()->paginate(5); //lấy dữ liệu từ model
        return view('admin.product.index', [
            'list' => $data,
        ]);
    }

    public function create()
    {
        $data = Product::all();
        $category = Category::all();
        $material = Material::all();
        return view('admin.product.create', [
            'them' => $data, //truyền data sang view
            'categories' => $category,
            'material' => $material,
        ]);
    }

    public function store(Request $request)
    {
        //Validate
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:10000',
            'price' => 'required'
        ], [
            'name.required' => 'Tên không được để trống',
            'price.required' => 'Giá không được để trống',
            'image.required' => 'Ảnh không được để trống',
            'image.image' => 'Ảnh không đúng định dạng'
        ]);

        $product = new Product(); // khởi tạo model
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->input('name'));


        // Upload file
        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time() . '_' . $file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/product/';
            // Thực hiện upload file
            $request->file('image')->move($path_upload, $filename); // upload lên thư mục public/uploads/product

            $product->image = $path_upload . $filename;
        }


        $product->stock = $request->input('stock'); // số lượng
        $product->cost = $request->input('cost');
        $product->price = $request->input('price');

        $product->sale = $request->input('sale');

        $product->categories_id = $request->input('categories_id');
        $product->position = $request->input('position');

        $is_active = 0;
        if ($request->has('is_active')) {//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $product->is_active = $is_active;

        // Sản phẩm Hot
        $is_hot = 0;
        if ($request->has('is_hot')) {
            $is_hot = $request->input('is_hot');
        }
        $product->is_hot = $is_hot;

        $product->description = $request->input('description');
        $product->featured = $request->input('featured');
        $product->specifications = $request->input('specifications');
        $product->preservation = $request->input('preservation');
        $product->guarantee = $request->input('guarantee');
        $product->commitment = $request->input('commitment');
        $product->save();
        foreach ($request->material as $mate) {
            $productMaterial = new Product_material();
            $productMaterial->material_id = $mate;
            $productMaterial->product_id = $product->id;
            $productMaterial->save();
        }
        if ($request->hasFile('images')) { // dòng này Kiểm tra xem có image có được chọn
            foreach ($request->images as $singleImage) {
                $productImages = new ProductImage();
                $productImages->position = 1;
                $productImages->is_active = 1;
                // get file
                $file = $singleImage;
                // đặt tên cho file image
                $filename = time() . '_' . $file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
                // Định nghĩa đường dẫn sẽ upload lên
                $path_upload = 'uploads/productImages/';
                // Thực hiện upload file
                $file->move($path_upload, $filename); // upload lên thư mục public/uploads/product

                $productImages->image = $path_upload . $filename;
                $productImages->product_id = $product->id;
                $productImages->save();
            }
        }

        // chuyển hướng đến trang
        return redirect()->route('quan-tri.product.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::all();
        $product = Product::findorFail($id);
        $category = Category::all();
        $material = Material::all();
        $productMaterial = Product_material::all();
        return view('admin.product.edit', [
            'data' => $data,
            'product' => $product,
            'categories' => $category,
            'material' => $material,
            'productMaterial' => $productMaterial,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Lưu vào CSDL
        $product = Product::findorFail($id);
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->input('name'));

        $is_active = 0;
        if ($request->is_active == 'on') {
            $is_active = 1;
        }
        $product->is_active = $is_active;

        if ($request->hasFile('new_image')) {
            //XÓA FILE CŨ
            @unlink(public_path($product->image));
            //GET file mới
            $file = $request->file('new_image');
            //GET ten
            $filename = time() . '_' . $file->getClientOriginalName();
            //Đường dẫn upload
            $path_upload = 'uploads/product/';
            //Upload file
            $request->file('new_image')->move($path_upload, $filename);
            //Lưu vào db
            $product->image = $path_upload . $filename;
        }
        $product->stock = $request->input('stock');
        $product->cost = $request->input('cost');
        $product->price = $request->input('price');
        $product->sale = $request->input('sale');
        $product->categories_id = $request->input('categories_id');

        // Sản phẩm Hot
        $is_hot = 0;
        if ($request->is_hot == 'on') {
            $is_hot = 1;
        }
        $product->is_hot = $is_hot;

        $product->description = $request->input('description');
        $product->featured = $request->input('featured');
        $product->specifications = $request->input('specifications');
        $product->preservation = $request->input('preservation');
        $product->guarantee = $request->input('guarantee');
        $product->commitment = $request->input('commitment');
        $product->position = $request->input('position');

        $product->save();

        Product_material::where('product_id', $id)->delete();
        foreach ($request->material as $mate) {
            $productMaterial = new Product_material();
            $productMaterial->material_id = $mate;
            $productMaterial->product_id = $product->id;
            $productMaterial->save();
        }

        ProductImage::where('product_id', $id)->delete();
        if ($request->hasFile('images')) { // dòng này Kiểm tra xem có image có được chọn
            foreach ($request->images as $singleImage) {
                $productImages = new ProductImage();
                $productImages->position = 1;
                $productImages->is_active = 1;
                // get file
                $file = $singleImage;
                // đặt tên cho file image
                $filename = time() . '_' . $file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
                // Định nghĩa đường dẫn sẽ upload lên
                $path_upload = 'uploads/productImages/';
                // Thực hiện upload file
                $file->move($path_upload, $filename); // upload lên thư mục public/uploads/product

                $productImages->image = $path_upload . $filename;
                $productImages->product_id = $product->id;
                $productImages->save();
            }
        }

        //Chuyen huong trang ve trang danh sach
        return redirect()->route('quan-tri.product.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::findorFail($id);
        return view('admin.product.show', [
            'show' => $data,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Product::find($id);
        $del->delete();
        return redirect('/quan-tri/product');
    }

    public function search(Request $request)
    {
        //lấy từ khóa tìm kiếm
        $keyword = $request->input('tu-khoa');
        $slug = Str::slug($keyword);

        $products = Product::where([
            ['slug', 'like', '%' . $slug . '%'],
            ['is_active', '=', 1]
        ])->paginate(6);
        $totalResult = $products->total(); //số lượng kết quả tìm kiếm

        return view('admin.product.search', [
            'products' => $products,
            'totalResult' => $totalResult,
            'keyword' => $keyword ? $keyword : ''
        ]);
    }
}
