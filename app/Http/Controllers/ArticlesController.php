<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Articles;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
     public function index()
    {
    	$data = Articles::latest()->paginate(5); //lấy dữ liệu từ model
    	return view('admin.article.index', [
    		'list'=>$data,
    	]);
    }

    public function create(){
        $data = Articles::all();
        return view('admin.article.create', [
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
        $article = new Articles();
        $article->title = $request->input('title');
        $article->slug = Str::slug($request->input('title'));

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
            $article->image = $path_upload.$filename;
        }

        $is_active = 0;
        if($request->has('is_active')) {
            //kiem tra is_active co ton tai khong
            $is_active = $request->input('is_active');
        }
        $article->is_active = $is_active;

        $article->summary = $request->input('summary');
        $article->description = $request->input('description');
        $article->position = $request->input('position');
        $article->save();

        //Chuyen huong trang ve trang danh sach
        return redirect()->route('quan-tri.article.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Articles::all();
        $article = Articles::findorFail($id);
        return view('admin.article.edit', [
            'data'=>$data,
            'article' => $article,
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
        $article = Articles::findorFail($id);
        $article->title = $request->input('title');
        $article->slug = Str::slug($request->input('title'));

        $is_active = 0;
        if($request->has('is_active')) {
            //kiem tra is_active co ton tai khong
            $is_active = $request->input('is_active');
        }
        $article->is_active= $is_active;

        if($request->hasFile('new_image')){
            //XÓA FILE CŨ
            @unlink(public_path($article->image));
            //GET file mới
            $file = $request->file('new_image');
            //GET ten
            $filename = time().'_'.$file->getClientOriginalName();
            //Đường dẫn upload
            $path_upload = 'uploads/article/';
            //Upload file
            $request->file('new_image')->move($path_upload, $filename);
            //Lưu vào db
            $article->image = $path_upload.$filename;
        }

        $article->summary = $request->input('summary');
        $article->description = $request->input('description');
        $article->position = $request->input('position');
        $article->save();

        //Chuyen huong trang ve trang danh sach
        return redirect()->route('quan-tri.article.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Articles::findorFail($id);
        return view('admin.article.show', [
            'show'=>$data,
        ]);
    }


    public function search(Request $request)
    {
        //lấy từ khóa tìm kiếm
        $keyword = $request->input('tu-khoa');
        $slug = Str::slug($keyword);

        $articles = Articles::where([
            ['slug', 'like', '%' .$slug. '%'],
            ['is_active', '=', 1]
        ])->paginate(6);
        $totalResult = $articles->total(); //số lượng kết quả tìm kiếm
        return view('admin.article.search', [
            'articles' => $articles,
            'totalResult' => $totalResult,
            'keyword' => $keyword ? $keyword : ''
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
        $del = Articles::find($id);
        $del->delete();
        return redirect('/quan-tri/article');
    }
}
