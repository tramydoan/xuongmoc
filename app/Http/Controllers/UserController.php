<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $user = null;
        if (auth()->user()->role == 0) {
            $user = User::where('role', 2)->latest()->paginate(5);
        } else {
            $user = User::latest()->paginate(5);
        }

        return view('admin.user.index', [
            'use' => $user,
        ]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1',
            'email' => 'required',
            'password' => 'required|min:6|max:32',
            'passwordAgain' => 'required|same:password',
            'phone' => 'required|max:11',
            'address' => 'required|max:255',
        ], [
            'name.required' => 'Tên không được để trống',
            'name.min' => 'Tên của bạn quá ngắn',
            'email.required' => 'Bạn chưa nhập Email',
            'password.required' => 'Mât khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
            'password.max' => 'Mật khẩu chỉ được tối đa 32 kí tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu không khớp',
            'phone.required' => 'Số điện thoại không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->slug = Str::slug($request->input('name'));
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->date = $request->input('date');

        if ($request->hasFile('image')) {
            //GET file
            $file = $request->file('image');
            //GET ten
            $filename = time() . '_' . $file->getClientOriginalName();
            //Đường dẫn upload
            $path_upload = 'uploads/user/';
            //Upload file
            $request->file('image')->move($path_upload, $filename);
            //Lưu vào db
            $user->image = $path_upload . $filename;
        }

        $role = 0;
        if ($request->has('role')) {
            //kiem tra role co ton tai khong
            $role = $request->input('role');
        }
        $user->role = $role;

        $user->save();

        //Chuyen huong trang ve trang danh sach
        return redirect()->route('quan-tri.user.index');
    }


    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show', [
            'show' => $user,
        ]);
    }

    public function show_profile($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show-profile', [
            'show' => $user,
        ]);
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', [
            'user' => $user,
        ]);
    }

    public function edit_password($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit-password', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:1',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
        ], [
            'name.required' => 'Tên không được để trống',
            'name.min' => 'Tên của bạn quá ngắn',
            'phone.required' => 'Số điện thoại không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->date = $request->input('date');
        $user->slug = Str::slug($request->input('name'));
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->password = bcrypt($request->input('password'));

        if ($request->hasFile('new_image')) {
            @unlink(public_path($user->image));
            //GET file
            $file = $request->file('new_image');
            //GET ten
            $filename = time() . '_' . $file->getClientOriginalName();
            //Đường dẫn upload
            $path_upload = 'uploads/user/';
            //Upload file
            $request->file('new_image')->move($path_upload, $filename);
            //Lưu vào db
            $user->image = $path_upload . $filename;
        }

        $role = 0;
        if ($request->has('role')) {
            $role = $request->input('role');
        }
        $user->role = $role;

        $user->save();

        //Chuyen huong trang ve trang danh sach
        return redirect()->route('quan-tri.user.show_profile', ['id' => $user->id]);
    }

    public function update_password(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:6|max:32',
            'passwordAgain' => 'required|same:password',
        ], [
            'password.required' => 'Mât khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
            'password.max' => 'Mật khẩu chỉ được tối đa 32 kí tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu không khớp',
        ]);

        $user = User::find($id);

        $user->password = bcrypt($request->input('password'));

        $user->save();
        //Chuyen huong trang ve trang danh sach
        return redirect()->route('quan-tri.user.show_profile', ['id' => $user->id]);
    }

    public function search(Request $request)
    {
        //lấy từ khóa tìm kiếm
        $keyword = $request->input('tu-khoa');
        $slug = Str::slug($keyword);

        $user = User::where([
            ['slug', 'like', '%' . $slug . '%']
        ])->paginate(6);
        $totalResult = $user->total(); //số lượng kết quả tìm kiếm

        return view('admin.user.search', [
            'user' => $user,
            'totalResult' => $totalResult,
            'keyword' => $keyword ? $keyword : ''
        ]);
    }

    public function destroy($id)
    {
        $del = User::find($id);
        $del->delete();
        return redirect()->route('quan-tri.user.index');
    }
}
