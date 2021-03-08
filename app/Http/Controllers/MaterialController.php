<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Material::latest()->paginate(5); //lấy dữ liệu từ model
        return view('admin.material.index', [
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
        $data = Material::all();
        return view('admin.material.create', [
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
        $material = new Material();
        $material->name = $request->input('name');
        $material->slug = Str::slug($request->input('name'));

        $material->save();

        //Chuyen huong trang ve trang danh sach
        return redirect()->route('quan-tri.material.index');
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
        $data = Material::all();
        $material = Material::findorFail($id);
        return view('admin.material.edit', [
            'data'=>$data,
            'material' => $material,
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
        $material = Material::findorFail($id);
        $material->name = $request->input('name');
        $material->slug = Str::slug($request->input('name'));

        $material->save();

        //Chuyen huong trang ve trang danh sach
        return redirect()->route('quan-tri.material.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Material::find($id);
        $del->delete();
        return redirect('/quan-tri/material');
    }
}
