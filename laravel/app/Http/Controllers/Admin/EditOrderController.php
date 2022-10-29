<?php

namespace App\Http\Controllers\Admin;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditOrderController extends Controller
{

    protected $orderModel;
    public function __construct(
            Order $order
        ) {
            $this->orderModel = $order;
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->orderModel->get();
        return view('admin.products.list-order',['orders' => $orders]);
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
        $order = $this->orderModel->findOrFail($id);
        return view('admin.products.edit-order-list',['order' => $order]);
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
        $order = $this->orderModel->findOrFail($id);
        $data = $request->only([
            'name',
            'phone',
            'email',
            'address',
            'total_price',
            'code',
            'status_order',
            'note',
        ]);
        try{
            $order->update($data);
            return redirect()
                ->route('admin.orders.index', ['order' => $order->id])
                ->width('msg',"Update success");
        }
        catch(\Exception $e){
            \Log::error($e);
        }
        return redirect()
            ->route('admin.orders.index')
            ->with('error', "Some thing went wrong");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
