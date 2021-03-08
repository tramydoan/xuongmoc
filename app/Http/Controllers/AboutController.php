<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = About::latest()->paginate(5); //lấy dữ liệu từ model
        return view('admin.about.index', [
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
        $data = About::all();
        return view('admin.about.create', [
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
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ], [
            'title.required' => 'Tiêu đề không được để trống',
            'image.image' => 'Ảnh không đúng định dạng'
        ]);

        //Lưu vào CSDL
        $about = new About();
        $about->title = $request->input('title');
        $about->slug = Str::slug($request->input('title'));

        if($request->hasFile('image')){
            //GET file
            $file = $request->file('image');
            //GET ten
            $filename = time().'_'.$file->getClientOriginalName();
            //Đường dẫn upload
            $path_upload = 'uploads/article/';
            //Upload file
            $request->file('image')->move($path_upload, $filename);
            //Lưu vào db
            $about->image = $path_upload.$filename;
        }

        $is_active = 0;
        if($request->has('is_active')) {
            //kiem tra is_active co ton tai khong
            $is_active = $request->input('is_active');
        }
        $about->is_active = $is_active;

        $about->content = $request->input('content');
        $about->position = $request->input('position');
        $about->save();

        //Chuyen huong trang ve trang danh sach
        return redirect()->route('quan-tri.about.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = About::findorFail($id);
        return view('admin.about.show', [
            'show'=>$data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = About::all();
        $about = About::findorFail($id);
        return view('admin.about.edit', [
            'data'=>$data,
            'about' => $about,
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
        $about = About::findorFail($id);
        $about->title = $request->input('title');
        $about->slug = Str::slug($request->input('title'));

        $is_active = 0;
        if($request->has('is_active')) {
            //kiem tra is_active co ton tai khong
            $is_active = $request->input('is_active');
        }
        $about->is_active= $is_active;

        if($request->hasFile('new_image')){
            //XÓA FILE CŨ
            @unlink(public_path($about->image));
            //GET file mới
            $file = $request->file('new_image');
            //GET ten
            $filename = time().'_'.$file->getClientOriginalName();
            //Đường dẫn upload
            $path_upload = 'uploads/article/';
            //Upload file
            $request->file('new_image')->move($path_upload, $filename);
            //Lưu vào db
            $about->image = $path_upload.$filename;
        }

        $about->content = $request->input('content');
        $about->position = $request->input('position');
        $about->save();

        //Chuyen huong trang ve trang danh sach
        return redirect()->route('quan-tri.about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = About::find($id);
        $del->delete();
        return redirect('/quan-tri/about');
    }
}
