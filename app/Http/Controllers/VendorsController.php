<?php

namespace App\Http\Controllers;

use App\Articles;
use Illuminate\Http\Request;
use App\Vendors;
use Illuminate\Support\Str;

class VendorsController extends Controller
{
     public function index()
    {
    	$data = Vendors::latest()->paginate(5); //lấy dữ liệu từ model
    	return view('admin.vendors.index', [
    		'list'=>$data,
    	]);
    }

    public function create(){
        $data = Vendors::all();
        return view('admin.vendors.create', [
            'them'=>$data, //truyền data sang view
        ]);
    }

    public function store(Request $request){
        //Validate
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ], [
            'name.required' => 'Tên không được để trống',
            'image.required' => 'Ảnh không được để trống',
            'image.image' => 'Ảnh không đúng định dạng',
            'image.mimes' => 'Ảnh phải đúng các đuôi file jpeg, png, jpg, gif, svg'
        ]);

        //Lưu vào CSDL
        $vendors = new Vendors();
        $vendors->name = $request->input('name');
        $vendors->slug = Str::slug($request->input('name'));

        if($request->hasFile('image')){
            //GET file
            $file = $request->file('image');
            //GET ten
            $filename = time().'_'.$file->getClientOriginalName();
            //Đường dẫn upload
            $path_upload = 'uploads/vendors/';
            //Upload file
            $request->file('image')->move($path_upload, $filename);
            //Lưu vào db
            $vendors->image = $path_upload.$filename;
        }

        $is_active = 0;
        if($request->has('is_active')) {
            //kiem tra is_active co ton tai khong
            $is_active = $request->input('is_active');
        }
        $vendors->is_active = $is_active;

        $vendors->content_title = $request->input('content_title');
        $vendors->content_description = $request->input('content_description');
        $vendors->position = $request->input('position');
        $vendors->save();

        //Chuyen huong trang ve trang danh sach
        return redirect()->route('quan-tri.vendors.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Vendors::all();
        $vendors = Vendors::findorFail($id);
        return view('admin.vendors.edit', [
            'data' => $data,
            'vendors' => $vendors,
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
        $vendors = Vendors::findorFail($id);
        $vendors->name = $request->input('name');
        $vendors->slug = Str::slug($request->input('name'));

        $is_active = 0;
        if ($request->has('is_active')) {
            //kiem tra is_active co ton tai khong
            $is_active = $request->input('is_active');
        }
        $vendors->is_active = $is_active;

        if ($request->hasFile('new_image')) {
            //XÓA FILE CŨ
            @unlink(public_path($vendors->image));
            //GET file mới
            $file = $request->file('new_image');
            //GET ten
            $filename = time() . '_' . $file->getClientOriginalName();
            //Đường dẫn upload
            $path_upload = 'uploads/vendors/';
            //Upload file
            $request->file('new_image')->move($path_upload, $filename);
            //Lưu vào db
            $vendors->image = $path_upload . $filename;
        }

//        $position = 0;
//        if ($request->has('position')) {
//            //kiem tra is_active co ton tai khong
//            $position = $request->input('position');
//        }
//        $vendors->position = $position;

        $vendors->content_title = $request->input('content_title');
        $vendors->content_description = $request->input('content_description');
        $vendors->position = $request->input('position');
        $vendors->save();

        //Chuyen huong trang ve trang danh sach
        return redirect()->route('quan-tri.vendors.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Vendors::findorFail($id);
        return view('admin.vendors.show', [
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
        $del = Vendors::find($id);
        $del->delete();
        return redirect('/quan-tri/vendors');
    }

    public function search(Request $request)
    {
        //lấy từ khóa tìm kiếm
        $keyword = $request->input('tu-khoa');
        $slug = Str::slug($keyword);

        $vendors = Vendors::where([
            ['slug', 'like', '%' .$slug. '%'],
            ['is_active', '=', 1]
        ])->paginate(5);
        $totalResult = $vendors->total(); //số lượng kết quả tìm kiếm

        return view('admin.vendors.search', [
            'vendors' => $vendors,
            'totalResult' => $totalResult,
            'keyword' => $keyword ? $keyword : ''
        ]);
    }
}
