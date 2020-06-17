<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.view')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('category.create');
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
            'categoryname' => 'required',
            // 'postauthor'=>'required'
        ]);

        $saveCategory = Category::create(
            [
                'categoryname' => $request->categoryname,
                'categorydesc' => $request->categorydesc,
                'categoryslug' => str_slug($request->categoryname)
            ]
        );
        
        // dd($saveCategory);
        $saveCategory->save();

        Alert::success('Done!', 'Category Created Successfully');

        return redirect()->route('category.view');
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
    public function edit($slug)
    {
        $editCategory = Category::where('categoryslug', $slug)->first();
        // dd($editcategory);
        return view('category.edit')->with('editcategory', $editCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'categoryname' => 'required'
        ]);

        $updatecategory = Category::where('categoryslug', $slug)->first();
        $updatecategory->categoryname = $request->categoryname;
        $updatecategory->categorydesc = $request->categorydesc;
        $updatecategory->categoryslug = str_slug($request->categoryname);

        // dd($updatecategory);
        $updatecategory->save();
        Alert::success('Updated!', 'Category '.$updatecategory->categoryname. ' Updated Successfully');
        return redirect()->route('category.view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $deleteCategory = Category::where('categoryslug',$slug);

    //    dd($deleteCategory);
        $deleteCategory->delete();
        Alert::success('Deleted', 'Category Deleted Successfully');
        return redirect()->route('category.view');
    }
}
