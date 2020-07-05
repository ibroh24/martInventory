<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Measurement;
use App\Inventory;
use App\Supplier;
use App\User;
use App\InventoryBackup;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::orderBy('created_at', 'desc')->get();
        return view('inventory.view')->with('inventories', $inventories);
    }
    

    public function lowItems()
    {
         $inventoryDatas = Inventory::where('productremain', '=', '10')->get();
        // $inventoryDatas = DB::table('inventories')
        //                         ->select('*')
        //                        ->where('productremain', '<=', 'reorderlevel')
        //                         // ->orwhere('productremain', '<=', '10')
        //                         ->get();
        dd($inventoryDatas);
        // View::share('inventoryDatas', $inventoryDatas);
        return view('inventory.viewupdate')->with('inventoryDatas', $inventoryDatas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $uoms = Measurement::all();
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('inventory.create')
        ->with('uoms', $uoms)
        ->with('suppliers', $suppliers)
        ->with('categories', $categories);
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
            'productname' => 'required',
            // 'sellingprice' => 'required',
            // 'buyingprice' => 'required',
            'productcategory' => 'required'
        ]);

        $saveProduct = Inventory::create(
            [
                'productname' => $request->productname,
                'sellingprice' => $request->sellingprice,
                'buyingprice' => $request->buyingprice,
                'productcategory' => $request->productcategory,
                'profit' => $request->profit,
                // 'unitprofit' => $request->unitprofit,
                'productuom' => $request->productuom,
                'enteredby' => $request->enteredby,
                'productqty' => $request->productqty,
                'reorderlevel' => $request->reorderlevel,

                'productremain' => $request->productqty,
                // 'productunitremain' => $request->productunitqty,

                'productsupplier' => $request->productsupplier,
                'productdescription' => $request->productdescription,
                // 'unitsellingprice' => $request->unitsellingprice,
                // 'unitbuyingprice' => $request->unitbuyingprice,
                'productslug' => str_slug($request->productname)
            ] 
        );
        
        // dd($request->all());
        $saveProduct->save();
        if($saveProduct){
            $backupInsertion = InventoryBackup::create(
                [
                    'productname' => $request->productname,
                    'sellingprice' => $request->sellingprice,
                    'buyingprice' => $request->buyingprice,
                    'productcategory' => $request->productcategory,
                    'profit' => $request->profit,
                    'productuom' => $request->productuom,
                    'enteredby' => $request->enteredby,
                    'productqty' => $request->productqty,
                    'productremain' => $request->productqty,
                    'reorderlevel' => $request->reorderlevel,
                    'productsupplier' => $request->productsupplier,
                    'productdescription' => $request->productdescription,
                    'productslug' => str_slug($request->productname)
                ] 
            );

            $backupInsertion->save();
        }

        Alert::success('Done!', 'Product Created Successfully');

        return redirect()->route('inventory.view');
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
        $uoms = Measurement::all();
        $categories = Category::all();
        $suppliers = Supplier::all();

        $editInventory = Inventory::where('productslug', $id)->first();
        return view('inventory.edit')
        ->with('uoms', $uoms)
        ->with('editInventory', $editInventory)
        ->with('suppliers', $suppliers)
        ->with('categories', $categories);
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
            'productname' => 'required',
            // 'sellingprice' => 'required',
            // 'buyingprice' => 'required',
            'productcategory' => 'required'
        ]);

        $updateProduct = Inventory::where('productslug', $id)->first();
    
        $updateProduct->productname = $request->productname;
        $updateProduct->sellingprice = $request->sellingprice;
        $updateProduct->buyingprice = $request->buyingprice;
        $updateProduct->productcategory = $request->productcategory;
        $updateProduct->profit = $request->profit;
        $updateProduct->productuom = $request->productuom;
        $updateProduct->enteredby = $request->enteredby;        
        $updateProduct->productqty = $request->productqty; 
        $updateProduct->reorderlevel = $request->reorderlevel; 
        $updateProduct->productremain = $request->productqty;
        $updateProduct->productsupplier = $request->productsupplier;
        $updateProduct->productdescription = $request->productdescription;
        $updateProduct->productslug = str_slug($request->productname);
    
        $updateProduct->save();
        if($updateProduct){
            /*
            $updateInventoryBackup = InventoryBackup::where('productslug', $id)->first();
    
            $updateInventoryBackup->productname = $request->productname;
            $updateInventoryBackup->bulksellingprice = $request->bulksellingprice;
            $updateInventoryBackup->bulkbuyingprice = $request->bulkbuyingprice;
            $updateInventoryBackup->productcategory = $request->productcategory;
            $updateInventoryBackup->bulkprofit = $request->bulkprofit;
            $updateInventoryBackup->unitprofit = $request->unitprofit;
            $updateInventoryBackup->productuom = $request->productuom;
            $updateInventoryBackup->enteredby = $request->enteredby;
            $updateInventoryBackup->productbulkqty = $request->productbulkqty;
            $updateInventoryBackup->productunitqty = $request->productunitqty;
            $updateInventoryBackup->productbulkremain = $request->productbulkqty;
            $updateInventoryBackup->productunitremain = $request->productunitqty;
            $updateInventoryBackup->productsupplier = $request->productsupplier;
            $updateInventoryBackup->productdescription = $request->productdescription;
            $updateInventoryBackup->unitsellingprice = $request->unitsellingprice;
            $updateInventoryBackup->unitbuyingprice = $request->unitbuyingprice;
            $updateInventoryBackup->productslug = str_slug($request->productname);
        
            $updateInventoryBackup->save();

            */
            // Re-insert the data with latest quantity
            $backupInsertion = InventoryBackup::create(
                [
                    'productname' => $request->productname,
                    'sellingprice' => $request->sellingprice,
                    'buyingprice' => $request->buyingprice,
                    'productcategory' => $request->productcategory,
                    'profit' => $request->profit,
                    'productuom' => $request->productuom,
                    'enteredby' => $request->enteredby,
                    'productqty' => $request->productqty,
                    'reorderlevel' => $request->reorderlevel,
                    'productremain' => $request->productqty,
                    'productsupplier' => $request->productsupplier,
                    'productdescription' => $request->productdescription,
                    'productslug' => str_slug($request->productname)
                ] 
            );

            $backupInsertion->save();

        }

        Alert::success('Done!', 'Product Updated Successfully');

        return redirect()->route('inventory.view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteInventoryData = Inventory::where('productslug',$id);
        // $authUser = User::where('isAdmin', '1');
        if(Auth::user()->isAdmin){
            Alert::success('Access Granted', 'Inventory Data Will Be Deleted Successfully');
            $deleteInventoryData->delete();
            return redirect()->route('inventory.view');
        }else {
            Alert::info('Access Denied', 'You Dont Have Access to Delete Inventory Data');    
            return redirect()->route('inventory.view');
        }

        // $deleteInventoryData->delete();
        // Alert::success('Deleted', 'Inventory Data Deleted Successfully');
        // return redirect()->route('category.view');
    }


    public function getProductRemain($selectedCats)
    {
        $remainProductValue = DB::table('inventories')
                    ->select('productname', 'productbulkremain', 'productunitremain')
                    ->where('productname', '=', $selectedCats)
                    ->get();
        // dd($remainProductValue);
        return $remainProductValue;
    }
}
