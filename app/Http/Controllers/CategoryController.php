<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::latest()->paginate(5); //lấy dữ liệu từ model
        return view('admin.category.index', [
            'list'=>$data,
        ]);
    }

    public function create(){
        $data = Category::all();
        return view('admin.category.create', [
            'them'=>$data, //truyền data sang view
        ]);
    }

    public function store(Request $request){
        //Validate
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ], [
            'name.required' => 'Tên không được để trống',
            'image.image' => 'Ảnh không đúng định dạng'
        ]);

        //Lưu vào CSDL
        $category = new Category;
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
//        $category->parent_id = $request->input('parent_id');

        if($request->hasFile('image')){
            //GET file
            $file = $request->file('image');
            //GET ten
            $filename = time().'_'.$file->getClientOriginalName();
            //Đường dẫn upload
            $path_upload = 'uploads/category/';
            //Upload file
            $request->file('image')->move($path_upload, $filename);
            //Lưu vào db
            $category->image = $path_upload.$filename;
        }

        $is_active = 0;
        if($request->has('is_active')) {
            //kiem tra is_active co ton tai khong
            $is_active = $request->input('is_active');
        }
        $category->is_active = $is_active;

        $category->position = $request->input('position');
        $category->save();

        //Chuyen huong trang ve trang danh sach
        return redirect()->route('quan-tri.category.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::all();
        $category = Category::findorFail($id);
        return view('admin.category.edit', [
            'data'=>$data,
            'category' => $category,
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
            $category = Category::findorFail($id);
            $category->name = $request->input('name');
            $category->slug = Str::slug($request->input('name'));
    //        $category->parent_id = $request->input('parent_id');


            $is_active = 0;
            if ($request->is_active == 'on'){
                $is_active = 1;
            }
            $category->is_active = $is_active;

            if($request->hasFile('new_image')){
                //XÓA FILE CŨ
                @unlink(public_path($category->image));
                //GET file mới
                $file = $request->file('new_image');
                //GET ten
                $filename = time().'_'.$file->getClientOriginalName();
                //Đường dẫn upload
                $path_upload = 'uploads/category/';
                //Upload file
                $request->file('new_image')->move($path_upload, $filename);
                //Lưu vào db
                $category->image = $path_upload.$filename;
            }

            $category->position = $request->input('position');
            $category->save();

            //Chuyen huong trang ve trang danh sach
            return redirect()->route('quan-tri.category.index');
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Category::findorFail($id);
        return view('admin.category.show', [
            'show'=>$data,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = Category::find($id);
        $cate->delete();
        return redirect('/quan-tri/category');
    }

    public function search(Request $request)
    {
        //lấy từ khóa tìm kiếm
        $keyword = $request->input('tu-khoa');
        $slug = Str::slug($keyword);

        $categories = Category::where([
            ['slug', 'like', '%' .$slug. '%'],
            ['is_active', '=', 1]
        ])->paginate(6);
        $totalResult = $categories->total(); //số lượng kết quả tìm kiếm
        return view('admin.category.search', [
            'categories' => $categories,
            'totalResult' => $totalResult,
            'keyword' => $keyword ? $keyword : ''
        ]);
    }
}
