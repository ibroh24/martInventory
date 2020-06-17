<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Measurement;
use Session;
use RealRashid\SweetAlert\Facades\Alert;

class MeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $measure = Measurement::all();
        return view('uom.view')->with('measure', $measure);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('uom.create');
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
            'uomname' => 'required',
            // 'postauthor'=>'required'
        ]);

        $saveUOM = Measurement::create(
            [
                'uomname' => $request->uomname,
                'uomdescription' => $request->uomdescription,
                'uomslug' => str_slug($request->uomname)
            ]
        );
        
        // dd($request->all());
        $saveUOM->save();

        Alert::success('Done!', 'UOM Created Successfully');

        return redirect()->route('measure.view');
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
        $editUOM = Measurement::where('uomslug', $slug)->first();
        // dd($editUOM);
        return view('uom.edit')->with('editUOM', $editUOM);
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
            'uomname' => 'required'
        ]);

        $updateUOM = Measurement::where('uomslug', $slug)->first();
        $updateUOM->uomname = $request->uomname;
        $updateUOM->uomdescription = $request->uomdescription;
        $updateUOM->uomslug = str_slug($request->uomname);
            
        
        // dd($request->all());
        $updateUOM->save();
        Alert::success('Updated!', 'UOM Updated Successfully');
        return redirect()->route('measure.view');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $deleteUOM = Measurement::where('uomslug',$slug);

    //    dd($deleteUOM);
        $deleteUOM->delete();
        Alert::success('Deleted', 'UOM Deleted Successfully');
        return redirect()->route('measure.view');
    }
}
