<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Setting::latest()->paginate(5); //lấy dữ liệu từ model
        return view('admin.setting.index', [
            'list'=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Setting::all();
        return view('admin.setting.create', [
            'them'=>$data, //truyền data sang view
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate
        $request->validate([
            'name' => 'required|max:255',
        ], [
            'name.required' => 'Tên không được để trống',
        ]);

        //Lưu vào CSDL
        $setting = new Setting();
        $setting->name = $request->input('name');
        $setting->slug = Str::slug($request->input('name'));
        $setting->email = $request->input('email');
        $setting->phone = $request->input('phone');
        $setting->address = $request->input('address');

        $setting->save();

        //Chuyen huong trang ve trang danh sach
        return redirect()->route('quan-tri.setting.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Setting::all();
        $setting = Setting::findorFail($id);
        return view('admin.setting.edit', [
            'data' => $data,
            'setting' => $setting,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Lưu vào CSDL
        $setting = Setting::findorFail($id);
        $setting->name = $request->input('name');
        $setting->slug = Str::slug($request->input('name'));
        $setting->email = $request->input('email');
        $setting->phone = $request->input('phone');
        $setting->address = $request->input('address');

        $setting->save();

        //Chuyen huong trang ve trang danh sach
        return redirect()->route('quan-tri.setting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Setting::find($id);
        $del->delete();
        return redirect('/quan-tri/setting');
    }

    public function search(Request $request)
    {
        //lấy từ khóa tìm kiếm
        $keyword = $request->input('tu-khoa');
        $name = ($keyword);

        $setting = Setting::where([
            ['name', 'like', '%' .$name. '%']
        ])->paginate(6);
        $totalResult = $setting->total(); //số lượng kết quả tìm kiếm
        return view('admin.setting.search', [
            'setting' => $setting,
            'totalResult' => $totalResult,
            'keyword' => $keyword ? $keyword : ''
        ]);
    }
}
