<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $inventoryDatas = DB::table('inventories')
                            ->where('productremain', '<', 20)
                            ->get();

        $products = DB::table('inventories')
                        ->select(DB::raw("count(*) as allProduct"))
                        ->get();
        $users = DB::table('users')
                        ->select(DB::raw("count(*) as allUser"))
                        ->get();

        $totalSales = DB::table('sales')
                        ->where('created_at', '>=', \Carbon\Carbon::now()->startOfMonth())
                        ->sum('totalprice');
                        
        $mostSoldItem = DB::table('sales')
                        ->select('itemname',DB::raw("max(itemname) as mostSoldItem"))
                        ->groupBy('itemname')
                        ->orderBy('itemname', 'asc')
                        ->limit(1)
                        ->get();
                    
        $mostItem = $mostSoldItem[0]->mostSoldItem;


        view()->share('inventoryDatas', $inventoryDatas);
        return view('dashboard.dashboard')
        ->with('products', $products)
        ->with('users', $users)
        ->with('totalSales', $totalSales)
        ->with('mostItem', $mostItem)
        // ->with('totalQty', $totalQty)
        ->with('inventoryDatas', $inventoryDatas);
    }
}
