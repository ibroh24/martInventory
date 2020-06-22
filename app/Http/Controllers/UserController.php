<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.view')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->isAdmin){
            return view('users.create');
        }else{
            Alert::info('Access Denied', 'You Dont Have Access to Access This Route');    
        }
        
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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        if($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatarNew = time().$avatar->getClientOriginalName();
            $avatar->move('images', $avatarNew);
        }

        $saveUser = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'isAdmin' => $request->isAdmin,
                'password' => bcrypt($request->password),
                'avatar' => 'images/'.$avatarNew,
                'slug' => str_slug($request->name)
            ] 
        );
        
        // dd($request->all());
        $saveUser->save();

        Alert::success('Done!', 'User Created Successfully');

        return redirect()->route('user.view');
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
        $deleteUser = User::where('slug',$id);
        // $authUser = User::where('isAdmin', '1');
        if(Auth::user()->isAdmin){
            Alert::success('Access Granted', 'User Information Deleted Successfully');
            $deleteUser->delete();
            return redirect()->route('user.view');
        }else {
            Alert::info('Access Denied', 'You Dont Have Access to Delete Inventory Data');    
            return redirect()->route('user.view');
        }
    }
}
