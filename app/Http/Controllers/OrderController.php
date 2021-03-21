<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Transaction;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        $products = Product::all();
        $lastId = Order_Detail::max('order_id'); 
        $orderReceipt = Order_Detail::with(['order.transaction','product'])->where('order_id', $lastId)->get(); 
        $created = Order_Detail::with(['order.transaction','product'])->where('order_id', $lastId)->first();
        return view('orders.index', compact(['orders','products','orderReceipt','created']));
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
        // return $request->all();

        // order
        $ordres = Order::create([
            'name' => $request->customer_name,
            'phone' => $request->customer_phone
        ]);

        // order detail
        for($item = 0; $item < count($request->product_id); $item++){

            $order_details = new Order_Detail;
            $order_details->order_id = $ordres->id;
            $order_details->product_id = $request->product_id[$item];
            $order_details->quantity = $request->quantity[$item];
            $order_details->unitprice = $request->price[$item];
            $order_details->amount = $request->total_amount[$item];
            $order_details->discount = $request->discount[$item];
            $order_details->save();

        }

        // transaction
        $transaction = new Transaction;
        $transaction->order_id = $ordres->id;
        $transaction->paid_amount = $request->paid_amount;
        $transaction->balance = $request->balance;
        $transaction->payment_method = $request->payment_method;
        $transaction->transac_date = date('y-m-d');
        $transaction->user_id = \Auth::user()->id;
        $transaction->transact_amount = $order_details->amount;
        $transaction->save();


        return redirect()->back()->with('status','Transaksi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
