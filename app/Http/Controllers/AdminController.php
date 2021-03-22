<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Category;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $articles = Articles::all();
        $users = User::all();
        $orders = Order::all();
        $data = Order::where('status','==',0)->paginate(4);
        return view('admin.admin', [
            'products' => $products,
            'articles' => $articles,
            'users' => $users,
            'orders' => $orders,
            'list'=>$data,
        ]);
    }

    public function login()
    {
        return view('admin.login');
    }

    public function show_dashboard(Request $request)
    {
        $mail = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email'=>$mail,'password'=>$password])){
            return redirect()->route('quan-tri.admin');
        }
        else{
            return redirect()->route('admin.login')->with('thongbao','Đăng nhập không thành công');

        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
