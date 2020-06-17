<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\Category;
use App\Supplier;
use App\Inventory;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allSales = Sales::orderBy('created_at', 'desc')->get();
        return view('sales.view')->with('allSales', $allSales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $products = Inventory::all();
        $productCategory = Category::all();
        return view('sales.create')
        ->with('products', $products)
        ->with('suppliers', $suppliers)
        ->with('productCategory', $productCategory);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'itemname' => 'required',
            'itemtype' => 'required',
            'itemprice' => 'required|numeric',
            'itemqty' => 'required|numeric',
            'totalprice' => 'required|numeric',
            'soldby' => 'required'
        ]);

        $saveSales = Sales::create(
            [
                'itemname' => $request->itemname,
                'itemtype' => $request->itemtype,
                'itemprice' => $request->itemprice,
                'itemqty' => $request->itemqty,
                'totalprice' => $request->totalprice,
                'soldby' => $request->soldby,
                'itemslug' => str_slug($request->itemname)
            ] 
        );
        
        // dd(strtolower($request->itemtype));
        $itemSold = $request->itemname;
        $itemQty = $request->itemqty;
        $itemType = strtolower($request->itemtype);
        $inventoryQty = Inventory::where('productname', $itemSold)->first();
        $currentBulkQty = $inventoryQty->productbulkqty;
        $currentUnitQty = $inventoryQty->productunitqty;
        $saveSales->save();
        if($saveSales){
            if($itemType == 'unit'){
                DB::table('inventories')
                    ->join('sales', 'sales.itemname', '=', 'inventories.productname')
                    ->where([
                        ['sales.itemname', '=', $itemSold, ],
                        ['inventories.productname', '=', $itemSold, ]
                    ])
                    ->update(['inventories.productunitremain' => $currentUnitQty - $itemQty]);
            }elseif ($itemType == 'bulk') {
                DB::table('inventories')
                ->join('sales', 'sales.itemname', '=', 'inventories.productname')
                ->where([
                    ['sales.itemname', '=', $itemSold, ],
                    ['inventories.productname', '=', $itemSold, ]
                ])
                ->update(['inventories.productbulkremain' => $currentBulkQty - $itemQty]);
            }

        }

        Alert::success('Done!', 'Item Sold Successfully');

        return redirect()->route('sales.view');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function getProduct($selectedCats)
    {
        $catInfo = DB::table('inventories')
                    ->join('categories', 'categories.categoryname', '=', 'inventories.productcategory')
                    ->select('productname')
                    ->where('productcategory', '=', $selectedCats)
                    ->get();
        // dd($catInfo);
        return $catInfo;
    }
    */

    public function getProductPrice($selectedItem)
    {
        $productPrice = DB::table('inventories')
                    ->select('productname','productbulkremain', 'productunitremain', 'bulksellingprice', 'unitsellingprice')
                    ->where('productname', '=', $selectedItem)
                    ->get();
        // dd($productPrice);
        return $productPrice;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suppliers = Supplier::all();
        $products = Inventory::all();
        $productCategory = Category::all();
        $editSales = Sales::where('itemslug', $id)->first();
        return view('sales.edit')
        ->with('products', $products)
        ->with('suppliers', $suppliers)
        ->with('productCategory', $productCategory)
        ->with('editSales', $editSales);
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

        $this->validate($request, [
            'itemname' => 'required',
            'itemtype' => 'required',
            'itemprice' => 'required|numeric',
            'itemqty' => 'required|numeric',
            'totalprice' => 'required|numeric',
            'soldby' => 'required'
        ]);
        
        $saveSales = Sales::where('salesslug', $id)->first();
        $saveSales = Sales::create(
            [
                'itemname' => $request->itemname,
                'itemtype' => $request->itemtype,
                'itemprice' => $request->itemprice,
                'itemqty' => $request->itemqty,
                'totalprice' => $request->totalprice,
                'soldby' => $request->soldby,
                'itemslug' => str_slug($request->itemname)
            ] 
        );
        
        // dd(strtolower($request->itemtype));
        $itemSold = $request->itemname;
        $itemQty = $request->itemqty;
        $itemType = strtolower($request->itemtype);
        $inventoryQty = Inventory::where('productname', $itemSold)->first();
        $currentBulkQty = $inventoryQty->productbulkqty;
        $currentUnitQty = $inventoryQty->productunitqty;
        $saveSales->save();
        if($saveSales){
            if($itemType == 'unit'){
                DB::table('inventories')
                    ->join('sales', 'sales.itemname', '=', 'inventories.productname')
                    ->where([
                        ['sales.itemname', '=', $itemSold, ],
                        ['inventories.productname', '=', $itemSold, ]
                    ])
                    ->update(['inventories.productunitremain' => $currentUnitQty - $itemQty]);
            }elseif ($itemType == 'bulk') {
                DB::table('inventories')
                ->join('sales', 'sales.itemname', '=', 'inventories.productname')
                ->where([
                    ['sales.itemname', '=', $itemSold, ],
                    ['inventories.productname', '=', $itemSold, ]
                ])
                ->update(['inventories.productbulkremain' => $currentBulkQty - $itemQty]);
            }

        }

        Alert::success('Done!', 'Item Sold Successfully');

        return redirect()->route('sales.view');
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
