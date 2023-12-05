<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $texto=trim($request->get('texto'));
        $user=DB::table('users')
                        ->select('id','name','last_name','phone','email','type_user')
                        ->where('last_name','LIKE','%'.$texto.'%')
                        ->orWhere('phone','LIKE','%'.$texto.'%')
                        ->orderBy('last_name','asc')
                        ->paginate(10);
        return  view('User.index',compact('user','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('User.create');
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
        $user =new User;
        $user->name=$request->input('name');
        $user->second_name=$request->input('second_name');
        $user->last_name=$request->input('last_name');
        $user->user_name=$request->input('user_name');
        $user->phone=$request->input('phone');
        $user->type_user=$request->input('type_user');
        $user->email=$request->input('email');
        $user->password=$request->input('password');
        $user->save();

        return redirect()->route('user.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user=User::findOrFail($id);
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $user=User::findOrFail($id);
        $user->name=$request->input('name');
        $user->second_name=$request->input('second_name');
        $user->last_name=$request->input('last_name');
        $user->user_name=$request->input('user_name');
        $user->phone=$request->input('phone');
        $user->type_user=$request->input('type_user');
        $user->email=$request->input('email');
        $user->password=$request->input('password');
        $user->save();
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
