<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ClientsController extends Controller
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
        $client=DB::table('clients')
                        ->select('dni','type_dni','addres')
                        ->where('dni','LIKE','%'.$texto.'%')
                        ->orderBy('dni','asc')
                        ->paginate(10);
        return  view('Client.index',compact('client','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Client.create');
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

        $client=new Clients;
        $client->dni=$request->input('dni');
        $client->type_dni=$request->input('type_dni');
        $client->id=$request->input('id');
        $client->addres=$request->input('addres');
        $client->save();
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit($dni)
    {
        //
        $client=Clients::findOrFail($dni);
        return view('client.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $dni)
    {
        //
        $client=Clients::findOrFail($dni);
        $client->dni=$request->input('dni');
        $client->type_dni=$request->input('type_dni');
        $client->id=$request->input('id');
        $client->addres=$request->input('addres');
        $client->save();

        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy($dni)
    {
        //
        $client=Clients::findOrFail($dni);
        $client->delete();
        return redirect()->route('client.index');
    }
}
