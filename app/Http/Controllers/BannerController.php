<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use Illuminate\Support\Str;

class BannerController extends Controller
{
     public function index()
    {
    	$data = Banner::latest()->paginate(5); //lấy dữ liệu từ model
    	return view('admin.banner.index', [
    		'list'=>$data,
    	]);
    }

    public function create(){
        $data = Banner::all();
        return view('admin.banner.create', [
            'them'=>$data, //truyền data sang view
        ]);
    }

    public function store(Request $request){
        //Validate
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ], [
            'title.required' => 'Tiêu đề không được để trống',
            'image.image' => 'Ảnh không đúng định dạng'
        ]);

        //Lưu vào CSDL
        $banner = new Banner();
        $banner->title = $request->input('title');
        $banner->slug = Str::slug($request->input('title'));
        $banner->position = $request->input('position');

        if($request->hasFile('image')){
            //GET file
            $file = $request->file('image');
            //GET ten
            $filename = time().'_'.$file->getClientOriginalName();
            //Đường dẫn upload
            $path_upload = 'uploads/banner/';
            //Upload file
            $request->file('image')->move($path_upload, $filename);
            //Lưu vào db
            $banner->image = $path_upload.$filename;
        }

        $is_active = 0;
        if($request->has('is_active')) {
            //kiem tra is_active co ton tai khong
            $is_active = $request->input('is_active');
        }
        $banner->is_active = $is_active;

        $is_page = 0;
        if($request->has('is_page')) {
            //kiem tra is_active co ton tai khong
            $is_page = $request->input('is_page');
        }
        $banner->is_page = $is_page;

        $banner->save();

        //Chuyen huong trang ve trang danh sach
        return redirect()->route('quan-tri.banner.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Banner::all();
        $banner = Banner::findorFail($id);
        return view('admin.banner.edit', [
            'data'=>$data,
            'banner' => $banner,
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
        $banner = Banner::findorFail($id);
        $banner->title = $request->input('title');
        $banner->slug = Str::slug($request->input('title'));
        $banner->content = $request->input('content');
        $banner->position = $request->input('position');

        if($request->hasFile('new_image')){
            //XÓA FILE CŨ
            @unlink(public_path($banner->image));
            //GET file mới
            $file = $request->file('new_image');
            //GET ten
            $filename = time().'_'.$file->getClientOriginalName();
            //Đường dẫn upload
            $path_upload = 'uploads/banner/';
            //Upload file
            $request->file('new_image')->move($path_upload, $filename);
            //Lưu vào db
            $banner->image = $path_upload.$filename;
        }

        $is_active = 0;
        if($request->has('is_active')) {
            //kiem tra is_active co ton tai khong
            $is_active = $request->input('is_active');
        }
        $banner->is_active= $is_active;

        $banner->save();

        //Chuyen huong trang ve trang danh sach
        return redirect()->route('quan-tri.banner.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Banner::findorFail($id);
        return view('admin.banner.show', [
            'show'=>$data,
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
        $del = Banner::find($id);
        $del->delete();
        return redirect('/quan-tri/banner');
    }

    public function search(Request $request)
    {
        //lấy từ khóa tìm kiếm
        $keyword = $request->input('tu-khoa');
        $slug = Str::slug($keyword);

        $banner = Banner::where([
            ['slug', 'like', '%' .$slug. '%'],
            ['is_active', '=', 1]
        ])->paginate(6);
        $totalResult = $banner->total(); //số lượng kết quả tìm kiếm
        return view('admin.banner.search', [
            'banner' => $banner,
            'totalResult' => $totalResult,
            'keyword' => $keyword ? $keyword : ''
        ]);
    }
}
