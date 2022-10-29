<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productModel;

    public function __construct( Product $products)
    {
        $this->productModel = $products;
    }
    public function home()
    {
        // $category_count = Category::count();
        $products = $this->productModel
        ->orderBy('sale_off', 'desc')
        ->orderBy('product_name', 'desc')
        ->paginate(config('product.paginate'));
        if ($key = request()->key) {
            $products = $this->productModel->where('product_name','like','%'.$key.'%')
                                                 ->orwhere('sale_off','like','%'.$key.'%')
                                                 ->paginate(config('product.paginate'));
        }

        $categories = Category::where('is_public', config('category.public'))
            ->get();

        return view('viewfashion.shop', [
            // 'seats' => $seats,
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function hotsales()
    {
        $products = $this->productModel
        ->where('sale_off', '>' , 28)
        ->orderBy('sale_off', 'desc')
        ->paginate(config('product.paginate'));


        return view('viewfashion.index-page', [
            'products' => $products,
        ]);
    }

    public function selltop()
    {
        $products = $this->productModel
        ->where('sold_quantity', '>' , 6)
        ->orderBy('sold_quantity', 'desc')
        ->paginate(config('product.paginate'));


        return view('viewfashion.index-page', [
            'products' => $products,
        ]);
    }

    public function new()
    {
        $products = $this->productModel
        ->where('price', '>' , 100000)
        ->orderBy('created_at', 'desc')
        ->paginate(config('product.paginate'));


        return view('viewfashion.index-page', [
            'products' => $products,
        ]);
    }

    public function below100()
    {
        $categories = Category::where('is_public', config('category.public'))
            ->get();
        $products = $this->productModel
        ->where('price', '<' , 100000)
        ->orderBy('price', 'asc')
        ->paginate(config('product.paginate'));


        return view('viewfashion.shop', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function below200()
    {
        $categories = Category::where('is_public', config('category.public'))
            ->get();
        $products = $this->productModel
        ->whereBetween('price', [100000, 200000])
        ->orderBy('price', 'asc')
        ->paginate(config('product.paginate'));


        return view('viewfashion.shop', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function below300()
    {
        $categories = Category::where('is_public', config('category.public'))
            ->get();
        $products = $this->productModel
        ->whereBetween('price', [200000, 300000])
        ->orderBy('price', 'asc')
        ->paginate(config('product.paginate'));


        return view('viewfashion.shop', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function below400()
    {
        $categories = Category::where('is_public', config('category.public'))
            ->get();
        $products = $this->productModel
        ->whereBetween('price', [300000, 400000])
        ->orderBy('price', 'asc')
        ->paginate(config('product.paginate'));


        return view('viewfashion.shop', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function above400()
    {
        $categories = Category::where('is_public', config('category.public'))
            ->get();
        $products = $this->productModel
        ->where('price', '>' , 400000)
        ->orderBy('price', 'asc')
        ->paginate(config('product.paginate'));


        return view('viewfashion.shop', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function ascPrice()
    {
        $categories = Category::where('is_public', config('category.public'))->orWhere('quantity', '>', 0)
            ->get();
        $products = $this->productModel
        ->orderBy('price', 'asc')
        ->paginate(config('product.paginate'));
        return view('viewfashion.shop', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function descPrice()
    {
        $categories = Category::where('is_public', config('category.public'))
            ->get();
        $products = $this->productModel
        ->orderBy('price', 'desc')
        ->paginate(config('product.paginate'));
        return view('viewfashion.shop', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
