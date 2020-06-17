<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Measurement;
use App\Inventory;
use App\Supplier;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventoryDatas = Inventory::orderBy('created_at', 'desc')->get();
        return view('inventory.view')->with('inventoryDatas', $inventoryDatas);
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
                'bulksellingprice' => $request->bulksellingprice,
                'bulkbuyingprice' => $request->bulkbuyingprice,
                'productcategory' => $request->productcategory,
                'bulkprofit' => $request->bulkprofit,
                'unitprofit' => $request->unitprofit,
                'productuom' => $request->productuom,
                'enteredby' => $request->enteredby,
                'productbulkqty' => $request->productbulkqty,
                'productunitqty' => $request->productunitqty,
                'productsupplier' => $request->productsupplier,
                'productdescription' => $request->productdescription,
                'unitsellingprice' => $request->unitsellingprice,
                'unitbuyingprice' => $request->unitbuyingprice,
                'productslug' => str_slug($request->productname)
            ] 
        );
        
        // dd($request->all());
        $saveProduct->save();

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
        $updateProduct->bulksellingprice = $request->bulksellingprice;
        $updateProduct->bulkbuyingprice = $request->bulkbuyingprice;
        $updateProduct->productcategory = $request->productcategory;
        $updateProduct->bulkprofit = $request->bulkprofit;
        $updateProduct->unitprofit = $request->unitprofit;
        $updateProduct->productuom = $request->productuom;
        $updateProduct->enteredby = $request->enteredby;
        $updateProduct->productbulkqty = $request->productbulkqty;
        $updateProduct->productunitqty = $request->productunitqty;
        $updateProduct->productsupplier = $request->productsupplier;
        $updateProduct->productdescription = $request->productdescription;
        $updateProduct->unitsellingprice = $request->unitsellingprice;
        $updateProduct->unitbuyingprice = $request->unitbuyingprice;
        $updateProduct->productslug = str_slug($request->productname);
    
        $updateProduct->save();

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
}
