<?php

namespace App\Http\Controllers;

use App\About;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Contact::latest()->paginate(5); //lấy dữ liệu từ model
        return view('admin.contact.index', [
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Contact::findorFail($id);
        return view('admin.contact.show', [
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Contact::find($id);
        $del->delete();
        return redirect('/quan-tri/contact');
    }

    public function search(Request $request)
    {
//        //lấy từ khóa tìm kiếm
//        $keyword = $request->input('tu-khoa');
//        $name = ($keyword);
//
//        $contact = Contact::where([
//            ['name', 'like', '%' .$name. '%']
//        ])->paginate(6);
//        $totalResult = $contact->total(); //số lượng kết quả tìm kiếm
//        return view('admin.contact.search', [
//            'contact' => $contact,
//            'totalResult' => $totalResult,
//            'keyword' => $keyword ? $keyword : ''
//        ]);
    }
}
