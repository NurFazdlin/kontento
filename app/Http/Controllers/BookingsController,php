<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $Bookings = booking::get();
        return view('Booking.index', compact('Bookings'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        /*$request->validate([
            'name'          => 'required|string|min:3|max:255',

            'gender'        => 'required|in:male,female',
            'phone_number'  => 'required|regex:/^60[0-9]{9,10}$/|unique:room_availabilities,phone_number',
            'matric_number' => 'required|regex:/^D[0-9]{11}$/|unique:room_availabilities,matric_number',
            'address'       => 'nullable|string',
            'age'           => 'required|numeric|between:17,90',
        ]);*/
        
        try {
            $storeBooking = new booking();
            $storeBooking->name = $request->name;
            $storeBooking->typeofhomestay = $request->typeofhomestay;
            $storeBooking->roomnumber = $request->roomnumber;
            $storeBooking->bookingdate = $request->bookingdate;
            $storeBooking->days = $request->days;
            $storeBooking->checkin = $request->checkin;
            $storeBooking->checkout = $request->checkout;
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Booking.create')->with('error', 'Booking unable to save');
        }
        $storeBooking->save();
        return redirect()->route('Booking.index')->with('success', 'Booking saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Booking)
    {
        try {
            $editBooking = booking::findOrFail($Booking);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Bookings.index')->with('error', 'Booking not found');
        }
        return view('Booking.show', compact('editBooking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Booking)
    {
        try {
            $editBooking = booking::findOrFail($Booking);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Bookings.index')->with('error', 'Booking not found');
        }
        return view('Booking.edit', compact('editBooking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Booking)
    {
        /*$request->validate([
            'name'          => 'required|string|min:3|max:255',
            'gender'        => 'required|in:male,female',
            'phone_number'  => 'required|regex:/^60[0-9]{9,10}$/|unique:room_availabilities,phone_number,' . $student,
            'matric_number' => 'required|regex:/^D[0-9]{11}$/|unique:room_availabilities,matric_number,' . $student,
            'address'       => 'nullable|string',
            'age'           => 'required|numeric|between:17,90',
        ]);*/
        
        try {
            $storeBooking = new booking();
            $storeBooking->name = $request->name;
            $storeBooking->typeofhomestay = $request->typeofhomestay;
            $storeBooking->roomnumber = $request->roomnumber;
            $storeBooking->bookingdate = $request->bookingdate;
            $storeBooking->days = $request->days;
            $storeBooking->checkin = $request->checkin;
            $storeBooking->checkout = $request->checkout;
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Bookings.edit', $Booking)->with('error', 'Booking unable to update');
        }
        $storeBooking->save();
        return redirect()->route('Bookings.index')->with('success', 'Booking updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Booking)
    {
        try {
            $deleteBooking = booking::findOrFail($Booking);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Bookings.index')->with('error', 'Booking not found');
        }
        $deleteBooking->delete();
        return redirect()->route('Bookings.index')->with('success', 'Booking deleted successfully');
    }
}