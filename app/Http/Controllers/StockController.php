<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productInfo = Inventory::orderBy('created_at', 'desc')->get();
        // dd($productInfo);
        return view('stock.view')->with('productInfo', $productInfo);
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

        $productDetail = DB::table('inventories')
                            ->select('*')
                            ->where('productslug', '=', $id)
                            ->get();

        $salesDetail = DB::table('inventories')
                            ->join('sales', 'sales.itemname', '=', 'inventories.productname')
                            ->select('*')
                            ->where([
                                ['sales.itemslug', '=', $id],
                                ['inventories.productslug', '=', $id],
                            ])
                            ->orderBy('sales.created_at', 'desc')
                            ->get();
        // dd($salesDetail);
        return view('stock.show')
        ->with('salesDetail', $salesDetail)
        ->with('productDetail', $productDetail);
    }


    public function print($id)
    {

        $productDetail = DB::table('inventories')
                            ->select('*')
                            ->where('productslug', '=', $id)
                            ->get();

        $salesDetail = DB::table('inventories')
                            ->join('sales', 'sales.itemname', '=', 'inventories.productname')
                            ->select('*')
                            ->where([
                                ['sales.itemslug', '=', $id],
                                ['inventories.productslug', '=', $id],
                            ])
                            ->orderBy('sales.created_at', 'desc')
                            ->get();
        $totalSum = 0;
        $totalQty = 0;
        foreach ($salesDetail as $value) {
            // dd($value->totalprice);
            $totalSum += $value->totalprice;
            $totalQty += $value->itemqty;
        }
        // dd($getTotalSum);
        // dd($salesDetail);
        return view('stock.print')
        ->with('salesDetail', $salesDetail)
        ->with('totalSum', $totalSum)
        ->with('totalQty', $totalQty)
        ->with('productDetail', $productDetail);
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
        //
    }
}
