<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\NewFashion;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sold_product = Product::orderByDesc('sold_quantity')->where('sold_quantity', '>', 3)->get();
        $product_count = Product::count();
        $category_count = Category::count();
        $user_count = User::count();
        $order_count = Order::count();
        $newmail = NewFashion::get();
        return view('admin.products.trangchu', [
            'product_count' => $product_count,
            'category_count' => $category_count,
            'user_count' => $user_count,
            'newmail' => $newmail,
            'order_count' => $order_count,
            'sold_product' => $sold_product,
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
        //
    }
}
