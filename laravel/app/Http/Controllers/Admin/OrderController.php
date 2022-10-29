<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use App\Exports\OrderExport;
use App\Exports\OrderProductExport;
use App\HelpersClass\Date;
use App\HelpersClass\Month;
use App\HelpersClass\Year;
use Maatwebsite\Excel\Facades\Excel;

class OrderController
{
    protected $categoryModel;
    protected $productModel;
    protected $orderModel;
    protected $productOrderModel;

    public function __construct(
        Category $category,
        Product $product,
        Order $order,
        OrderProduct $Orderproduct
    ) {
        $this->categoryModel = $category;
        $this->productModel = $product;
        $this->orderModel = $order;
        $this->OrderProductModel = $Orderproduct;
    }

    public function day()
    {
        $listDay = Date::getListDayInMonth();
        $product_count = Product::count();
        $category_count = Category::count();
        $order_count = Order::count();
        $user_count = User::count();
        ///Doanh thu theo ngày
        $revenueTransactionMonth = $this->orderModel->where('status_order', 3)->whereMonth('created_at', date('m'))
        ->select(DB::raw("DATE(created_at) day"),DB::raw("count('day') as order_count"),DB::raw("SUM(total_price) as price_sum"))
        ->groupBy('day')->get()->toArray();
        $arrTransactionMonth = [];
        $arrTransactionMonthOrder = [];
        foreach ($listDay as $day) {
            $total = 0;
            $countOrder = 0;
            foreach ($revenueTransactionMonth as $key => $revenue) {
                if($revenue['day'] == $day){
                    $total = $revenue['price_sum'];
                    $countOrder = $revenue['order_count'];
                    break;
                }

            }

            $arrTransactionMonth[] = $total;
            $arrTransactionMonthOrder[] = $countOrder;
        }
        $listDay = json_encode($listDay);
        $arrTransactionMonth = json_encode($arrTransactionMonth);
        $arrTransactionMonthOrder = json_encode($arrTransactionMonthOrder);
        return view('admin.products.chart', [
            'listDay' => $listDay,
            'arrTransactionMonthOrder' => $arrTransactionMonthOrder,
            'arrTransactionMonth' => $arrTransactionMonth,
            'product_count' => $product_count,
            'category_count' => $category_count,
            'user_count' => $user_count,
            'order_count' => $order_count
        ]);
    }

    public function month()
    {
        $listMonth1 = Month::getListMonthInYear1();
        $listMonth = Month::getListMonthInYear();
        $product_count = Product::count();
        $category_count = Category::count();
        $order_count = Order::count();
        $user_count = User::count();
        ///Doanh thu theo ngày

        $revenueTransactionYear = $this->orderModel->where('status_order', 3)->whereYear('created_at', date('Y'))
        ->select(DB::raw("MONTH(created_at) month"),DB::raw("count('month') as order_count"),DB::raw("SUM(total_price) as price_sum"))
        ->groupBy('month')->get()->toArray();
        $arrTransactionYear = [];
        $arrTransactionYearOrder = [];
        foreach ($listMonth as $month) {
            $total = 0;
            $countOrder = 0;
            foreach ($revenueTransactionYear as $key => $revenue) {
                if($revenue['month'] == $month){

                    $total = $revenue['price_sum'];
                    $countOrder = $revenue['order_count'];
                    break;
                }
            }

            $arrTransactionYear[] = $total;
            $arrTransactionYearOrder[] = $countOrder;
        }
        $listMonth1 = json_encode($listMonth1);
        $arrTransactionYear = json_encode($arrTransactionYear);
        $arrTransactionYearOrder = json_encode($arrTransactionYearOrder);
        return view('admin.products.chartmonth', [
            'listMonth1' => $listMonth1,
            'arrTransactionYearOrder' => $arrTransactionYearOrder,
            'arrTransactionYear' => $arrTransactionYear,
            'product_count' => $product_count,
            'category_count' => $category_count,
            'user_count' => $user_count,
            'order_count' => $order_count,
        ]);
    }

    public function year()
    {
        $listYear = Year::getListYear();
        $product_count = Product::count();
        $category_count = Category::count();
        $order_count = Order::count();
        $user_count = User::count();
        ///Doanh thu theo ngày

        $revenueTransactionYear = $this->orderModel->where('status_order', 3)
        ->select(DB::raw("Year(created_at) year"),DB::raw("count('year') as order_count"),DB::raw("SUM(total_price) as price_sum"))
        ->groupBy('year')->get()->toArray();
        $arrStatisticalYear = [];
        $arrStatisticalYearOrder = [];
        foreach ($listYear as $year) {
            $total = 0;
            $countOrder = 0;
            foreach ($revenueTransactionYear as $key => $revenue) {
                if($revenue['year'] == $year){
                    $total = $revenue['price_sum'];
                    $countOrder = $revenue['order_count'];
                    break;
                }
            }

            $arrStatisticalYear[] = $total;
            $arrStatisticalYearOrder[] = $countOrder;
        }
        $listYear = json_encode($listYear);
        $arrStatisticalYear = json_encode($arrStatisticalYear);
        $arrStatisticalYearOrder = json_encode($arrStatisticalYearOrder);

        return view('admin.products.chartyear', [
            'listYear' => $listYear,
            'arrStatisticalYear' => $arrStatisticalYear,
            'arrStatisticalYearOrder' => $arrStatisticalYearOrder,
            'revenueTransactionYear'=>$revenueTransactionYear,
            'product_count' => $product_count,
            'category_count' => $category_count,
            'user_count' => $user_count,
            'order_count' => $order_count,
        ]);
    }

    public function orderList(){
        if ($key = request()->key) {
            $orders = $this->orderModel->where('name','like','%'.$key.'%')
            ->orwhere('phone','like','%'.$key.'%')->get();
        }
        else{
            $orders = $this->orderModel->get();
        }

        return view('admin.products.order-list',['orders' => $orders]);
    }

    public function orderProductsList(){
        $Orderproducts = $this->OrderProductModel->get();
        $products = Product::get();

        return view('admin.products.order-products-list',[
            'Orderproducts' => $Orderproducts,
            'products' => $products,
        ]);
    }

    public function viewstatistical(){
            return view('admin.products.statistical');
    }

    public function statistical(Request $request){
        $data = $request->only([
            'date_from',
            'date_to',
        ]);
        if ($date_from = request()->date_from && $date_to = request()->date_to) {
            $static = $this->orderModel
                        ->whereBetween('created_at', [$data['date_from'], $data['date_to']])->get();
            $countstatic = $this->orderModel->select(DB::raw("count(id) as order_count"))->whereBetween('created_at', [$data['date_from'], $data['date_to']])->get();
            $countprice = $this->orderModel->select(DB::raw("SUM(total_price) as sumprice"))->whereBetween('created_at', [$data['date_from'], $data['date_to']])->get();
            return view('admin.products.statistical',[
                'static'=>$static,
                'countstatic' => $countstatic,
                'countprice' => $countprice,
        ]);
        }
        else{
            $static = $this->orderModel->get();
            $countstatic = $this->orderModel->select(DB::raw("count(id) as order_count"))->get();
            $countprice = $this->orderModel->select(DB::raw("SUM(total_price) as sumprice"))->get();
            return view('admin.products.statistical',[
                'static'=>$static,
                'countstatic' => $countstatic,
                'countprice' => $countprice,
            ]);
        }

    }

}
