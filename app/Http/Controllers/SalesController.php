<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\Category;
use App\Supplier;
use App\Inventory;
use App\SalesBackup;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

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
        $datas = $request->all();
    //    dd($datas);
        $removeToken = array_shift($datas);
       
        $category = count($datas['itemcategory']);
        // dd($category);
        $count = 0;
        $rows = array();

        foreach($datas['itemcategory'] as $get){
            array_push($rows, []);
        }
        foreach ($datas as $key => $values) {
            foreach ($values as $index => $value) {
                // Log::info($index);
                array_push($rows[$index], $value);
            }       
        }
        
        foreach($rows as $column){
            $saveSales = new Sales();
            foreach($column as $index => $row){
                if($index == 0){
                    $saveSales->itemcategory = $row;
                }
                if ($index == 1) {
                    
                    $saveSales->itemname = $row;

                    $saveSales->itemslug = str_slug($saveSales->itemname);
                    // $ab = '';
                    // foreach($tt as $ty => $check){
                    //     dd($check);
                    //     $ab += $check;
                    // }
                    // dd($ab);
                }
                if ($index == 2) {
                    $saveSales->itemprice = $row;
                }
                if ($index == 3) {
                    $saveSales->itemqty = $row;
                }
                if ($index == 4) {
                    $saveSales->totalprice = $row;
                }
                if ($index == 5) {
                    $saveSales->soldby = $row;
                }
            }
            $saveSales->save();  
            if($saveSales){
                $latest = DB::table('sales')
                                // ->groupBy('id','itemname')
                                ->orderBy('created_at', 'desc')
                                ->latest()
                                ->limit($category)
                                ->get();

                for($i = 0; $i < count($latest); $i++){
                    // dd($latest[$i]);
                    $inventoryQty = Inventory::where('productname', $latest[$i]->itemname)->first();
                    $currentQty = $inventoryQty->productremain;
                    $productProfit = $inventoryQty->profit;
                    // dd($productProfit);
                    DB::table('inventories')
                        ->join('sales', 'sales.itemname', '=', 'inventories.productname')
                        ->where([
                            ['sales.itemname', '=', $latest[$i]->itemname],
                            ['sales.id', '=', $latest[$i]->id],
                            ['inventories.productname', '=',  $latest[$i]->itemname]
                        ])
                        ->update([
                            'inventories.productremain' => $currentQty - $latest[$i]->itemqty,
                            'sales.remainitem' => $currentQty - $latest[$i]->itemqty,
                            'sales.totalprofit' => $productProfit * $latest[$i]->itemqty
                            ]);
                    
                    // updating inventory_backups
                    DB::table('inventory_backups')
                    ->join('sales', 'sales.itemname', '=', 'inventory_backups.productname')
                    ->where([
                        ['sales.itemname', '=', $latest[$i]->itemname],
                        ['sales.id', '=', $latest[$i]->id],
                        ['inventory_backups.productname', '=', $latest[$i]->itemname]
                    ])
                    ->update([
                        'inventory_backups.productremain' => $currentQty - $latest[$i]->itemqty,
                        'sales.remainitem' => $currentQty - $latest[$i]->itemqty,
                        'sales.totalprofit' => $productProfit * $latest[$i]->itemqty
                    ]);
                }
            }
        }
        Alert::success('Done!', 'Item Sold Successfully');
        return redirect()->route('sales.view');        
        }
        
    
    /*
    {
        if($insertSalesBackup){
            DB::table('sales_backups')
            ->join('sales', 'sales.itemname', '=', 'sales_backups.itemname')
            ->where([
                ['sales.itemname', '=', $itemSold],
                ['sales.id', '=', $itemID],
                ['sales_backups.itemname', '=', $itemSold]
            ])
            ->update([
                'sales_backups.remainitem' => $currentQty - $itemQty,
                'sales_backups.totalprofit' => $productProfit * $itemQty
                ]);
        }
        Alert::success('Done!', 'Item Sold Successfully');
        return redirect()->route('sales.view');
    }
    */
    
    
    public function getProduct(Request $request)
    {
        $search = $request->get('term'); 
        $products = Inventory::where('productname', 'like', '%'.$search. '%')->get();
        $getResult = [];
        foreach($products as $product){
            array_push($getResult, $product['productname']);
        }
        return json_encode($getResult);
    }
    

    public function getProductPrice($selectedItem)
    {
        $productPrice = DB::table('inventories')
                    ->select('productname','productremain', 'sellingprice', 'productcategory')
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
        $editSales = Sales::where('id', $id)->first();
        // dd($editSales);
        return view('sales.edit')
        ->with('products', $products)
        ->with('suppliers', $suppliers)
        ->with('productCategory', $productCategory)
        ->with('editSales', $editSales);
    }

    public function returnsales($id)
    {
        $suppliers = Supplier::all();
        $products = Inventory::all();
        $productCategory = Category::all();
        $editSales = Sales::where('id', $id)->first();
        // dd($editSales);
        return view('sales.return')
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
        
        $updateSales = Sales::where('salesslug', $id)->first();
        $updateSales->itemname = $request->itemname;
        $updateSales->itemtype = $request->itemtype;
        $updateSales->itemprice = $request->itemprice;
        $updateSales->itemqty = $request->itemqty;
        $updateSales->totalprice = $request->totalprice;
        $updateSales->soldby = $request->soldby;
        $updateSales->itemslug = str_slug($request->itemname);
        
        // dd(strtolower($request->itemtype));
        $itemSold = $request->itemname;
        $itemQty = $request->itemqty;
        $itemType = strtolower($request->itemtype);
        $inventoryQty = Inventory::where('productname', $itemSold)->first();
        $currentBulkQty = $inventoryQty->productbulkqty;
        $currentUnitQty = $inventoryQty->productunitqty;
        $updateSales->save();
        if($updateSales){
            if($itemType == 'unit'){
                DB::table('inventories')
                    ->join('sales', 'sales.itemname', '=', 'inventories.productname')
                    ->where([
                        ['sales.itemname', '=', $itemSold, ],
                        ['inventories.productname', '=', $itemSold, ]
                    ])
                    ->update(['inventories.productremain' => $currentUnitQty - $itemQty]);
            }elseif ($itemType == 'bulk') {
                DB::table('inventories')
                ->join('sales', 'sales.itemname', '=', 'inventories.productname')
                ->where([
                    ['sales.itemname', '=', $itemSold, ],
                    ['inventories.productname', '=', $itemSold, ]
                ])
                ->update([
                    'inventories.productbulkremain' => $currentBulkQty - $itemQty
                    ]);
            }

        }

        Alert::success('Done!', 'Item Sold Successfully');

        return redirect()->route('sales.view');
    }


    public function return(Request $request, $id)
    {

        $this->validate($request, [
            'itemname' => 'required',
            'itemprice' => 'required|numeric',
            'itemqty' => 'required|numeric',
            'totalprice' => 'required|numeric',
            'soldby' => 'required'
        ]);
        
        $returnSales = Sales::where('id', $id)->first();
    /*
        $returnSales->itemname = $request->itemname;
        $returnSales->itemtype = $request->itemtype;
        $returnSales->itemprice = $request->itemprice;
        $returnSales->itemqty = $request->itemqty;
        $returnSales->totalprice = $request->totalprice;
        $returnSales->soldby = $request->soldby;
        $returnSales->itemslug = str_slug($request->itemname);

        $returnSales->save();
    */
        $itemQty = $returnSales['itemqty'];
        $itemID = $returnSales['id'];
        $itemSlug = $returnSales['itemslug'];
        $itemName = $returnSales['itemname'];
        $inventoryData = Inventory::where('productname', $itemName)->first();
        $productRemain = $inventoryData['productremain'];
        // dd($productRemain);

        if(!empty($itemQty)){
            DB::table('inventories')
                    ->join('sales', 'sales.itemname', '=', 'inventories.productname')
                    ->where([
                        ['sales.itemname', '=', $itemName, ],
                        ['sales.id', '=', $itemID, ],
                        ['inventories.productslug', '=', $itemSlug, ],
                        ['sales.itemslug', '=', $itemSlug, ],
                        ['inventories.productname', '=', $itemName, ]
                    ])
                    ->update(['inventories.productremain' => $productRemain + $itemQty]);

            $returnSales->delete();
            Alert::success('Deleted!', 'Sales Return Successfully');

            return redirect()->route('sales.view');
        }else{
            Alert::info('Access Denied!', 'Item Quantity cannot be empty');
            // return redirect()->route('sales.view');
        }

        /*
        $updateSales->itemname = $request->itemname;
        $updateSales->itemtype = $request->itemtype;
        $updateSales->itemprice = $request->itemprice;
        $updateSales->itemqty = $request->itemqty;
        $updateSales->totalprice = $request->totalprice;
        $updateSales->soldby = $request->soldby;
        $updateSales->itemslug = str_slug($request->itemname);
        
        dd(strtolower($request->itemtype));
        $itemSold = $request->itemname;
        $itemQty = $request->itemqty;
        $itemType = strtolower($request->itemtype);
        $inventoryQty = Inventory::where('productname', $itemSold)->first();
        $currentBulkQty = $inventoryQty->productbulkqty;
        $currentUnitQty = $inventoryQty->productunitqty;
        $updateSales->save();
        if($updateSales){
            if($itemType == 'unit'){
                DB::table('inventories')
                    ->join('sales', 'sales.itemname', '=', 'inventories.productname')
                    ->where([
                        ['sales.itemname', '=', $itemSold, ],
                        ['inventories.productname', '=', $itemSold, ]
                    ])
                    ->update(['inventories.productremain' => $currentUnitQty - $itemQty]);
            }elseif ($itemType == 'bulk') {
                DB::table('inventories')
                ->join('sales', 'sales.itemname', '=', 'inventories.productname')
                ->where([
                    ['sales.itemname', '=', $itemSold, ],
                    ['inventories.productname', '=', $itemSold, ]
                ])
                ->update([
                    'inventories.productbulkremain' => $currentBulkQty - $itemQty
                    ]);
            }

        }
            */
        // Alert::success('Done!', 'Item Sold Successfully');

        // return redirect()->route('sales.view');
    }

    // dynamic adding more fields
    public function addMoreField()
    {
        
    }
    
    


    public function destroy($id)
    {
        //
    }
}
