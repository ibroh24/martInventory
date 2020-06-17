<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Category;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();
        return view('supplier.view')->with('supplier', $supplier);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories = Category::all();
        return view('supplier.create')->with('productCategories', $productCategories);
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
            'suppliername' => 'required',
            'phone'=>'required|numeric'
        ]);

        $saveSupplier = Supplier::create(
            [
                'suppliername' => $request->suppliername,
                'address' => $request->address,
                'phone' => $request->phone,
                'suppliedproduct' => $request->suppliedproduct,
                'supplierslug' => str_slug($request->suppliername)
            ]
        );
        
        // dd($request->all());
        $saveSupplier->save();

        Alert::success('Done!', 'Supplier Created Successfully');

        return redirect()->route('supplier.view');
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
        $editSupplier = Supplier::where('supplierslug', $id)->first();
        $productCategories = Category::all();
        return view('supplier.edit')
        ->with('editSupplier', $editSupplier)
        ->with('productCategories', $productCategories);
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
            'suppliername' => 'required',
            'phone'=>'required|numeric'
        ]);

        $updatesupplier = Supplier::where('supplierslug', $id)->first();

        $updatesupplier->suppliername = $request->suppliername;
        $updatesupplier->address = $request->address;
        $updatesupplier->phone = $request->phone;
        $updatesupplier->suppliedproduct = $request->suppliedproduct;
        $updatesupplier->supplierslug = str_slug($request->suppliername);
            
        
        // dd($request->all());
        $updatesupplier->save();

        Alert::success('Done!', 'Supplier Data Updated Successfully');

        return redirect()->route('supplier.view');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteSupplier = Supplier::where('supplierslug',$id);

        $deleteSupplier->delete();
        Alert::success('Deleted', 'Supplier Information Deleted Successfully');
        return redirect()->route('supplier.view');
    }
}
