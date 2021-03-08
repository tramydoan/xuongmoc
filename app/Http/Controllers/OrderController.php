<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::latest()->paginate(5);

        return view('admin.order.index', [
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
        $order = Order::find($id);
        $orderDetails = array();
        $i = 0;
        foreach ($order->orderDetails as $item)
        {
            $product = Product::find($item->product_id);
            $orderDetails[$i]['name'] = $product->name;
            $orderDetails[$i]['qty'] = $item->quantity;
            $orderDetails[$i]['price'] = $product->price;
            $orderDetails[$i]['total'] = $product->price * $item->quantity;
            $i++;
        }
        return view('admin.order.show', [
            'order' => $order,
            'orderDetails' => $orderDetails
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
        $order = Order::find($id);
        $nextStatus = 0;
        switch ($order->status){
            case 0:
                $nextStatus = 1;
                break;
            case 1:
                $nextStatus = 2;
                break;
            case 2:
                $nextStatus = 0;
                break;
        }
        $order->update([
            'status'=> $nextStatus
        ]);

        return response()->json([
            'code'=>200,
            'nextStatus'=>$nextStatus
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
        $order = Order::find($id);
        $order->update([

        ]);
    }


    public function search(Request $request)
    {
        //lấy từ khóa tìm kiếm
        $keyword = $request->input('tu-khoa');

        $order = Order::where([
            ['ship_name', 'like', '%' . $keyword . '%']
        ])->paginate(6);
        $totalResult = $order->total(); //số lượng kết quả tìm kiếm

        return view('admin.order.search', [
            'order' => $order,
            'totalResult' => $totalResult,
            'keyword' => $keyword ? $keyword : ''
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
        $del = Order::find($id);
        $del->delete();
        return redirect('/quan-tri/order');
    }
}
