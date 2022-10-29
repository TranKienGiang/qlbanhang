<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use Magarrent\LaravelCurrencyFormatter\Facades\Currency;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function show($id)
    {
        $product = DB::table('shop_products')->find($id);
        $categoryid = $product->category_id;
        $getcategories = DB::table('shop_products')->where('category_id','=',$categoryid)->get();

        if (!$product) {
            return redirect('home');
        }
        return view('viewfashion.detail', [
            'product' => $product,
            'getcategories' => $getcategories

        ]);
    }
}
