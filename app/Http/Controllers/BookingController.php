<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BookingController extends Controller
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
        $booking=DB::table('bookings')
                        ->select('id_booking','id_room','dni','data_end','data_start','days','status')
                        ->where('dni','LIKE','%'.$texto.'%')
                        ->orderBy('dni','asc')
                        ->paginate(10);
        return view('Booking.index',compact('booking','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Booking.create');
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
        $booking =new Booking;
        $booking->dni=$request->input('dni');
        $booking->id_room=$request->input('id_room');
        $booking->date_start=$request->input('date_start');
        $booking->date_end=$request->input('date_end');
        $booking->days=$request->input('days');
        $booking->save();

        return redirect()->route('booking.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit($id_booking)
    {
        //
        $booking=Booking::findOrFail($id_booking);
        return view('booking.edit'.compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_booking)
    {
        //
        $booking =Booking::findOrFail($id_booking);
        $booking->dni=$request->input('dni');
        $booking->id_room=$request->input('id_room');
        $booking->date_start=$request->input('date_start');
        $booking->date_end=$request->input('date_end');
        $booking->days=$request->input('days');
        $booking->save();

        return redirect()->route('booking.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_booking)
    {
        //
        $booking=Booking::findOnFail($id_booking);
        $booking->delete();
        return redirect()->route('booking.index');
    }
}
