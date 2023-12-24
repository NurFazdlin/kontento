<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking_detail;

class BookingDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $bookingDetails = booking_detail::get();
        return view('bookingDetail.index', compact('bookingDetails'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookingDetail.create');
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
            $storeBookingDetails = new booking_detail();
            $storeBookingDetails->name = $request->name;
            $storeBookingDetails->email = $request->email;
            $storeBookingDetails->icnumber = $request->icnumber;
            $storeBookingDetails->phone_number = $request->phone_number;
            $storeBookingDetails->typeofhomestay = $request->typeofhomestay;
            $storeBookingDetails->roomnumber = $request->roomnumber;
            $storeBookingDetails->checkin = $request->checkin;
            $storeBookingDetails->checkout = $request->checkout;
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('bookingDetail.create')->with('error', 'Booking details unable to save');
        }
        $storeBookingDetails->save();
        return redirect()->route('bookingDetail.index')->with('success', 'Booking details saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($bookingDetail)
    {
        try {
            $editbookingDetail = booking_detail::findOrFail($bookingDetail);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('bookingDetails.index')->with('error', 'Booking details not found');
        }
        return view('bookingDetail.show', compact('editbookingDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($bookingDetail)
    {
        try {
            $editbookingDetail = booking_detail::findOrFail($bookingDetail);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('bookingDetails.index')->with('error', 'Booking detail not found');
        }
        return view('bookingDetail.edit', compact('editbookingDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bookingDetail)
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
            $storeBookingDetails = new booking_detail();
            $storeBookingDetails->name = $request->name;
            $storeBookingDetails->email = $request->email;
            $storeBookingDetails->icnumber = $request->icnumber;
            $storeBookingDetails->phone_number = $request->phone_number;
            $storeBookingDetails->typeofhomestay = $request->typeofhomestay;
            $storeBookingDetails->roomnumber = $request->roomnumber;
            $storeBookingDetails->checkin = $request->checkin;
            $storeBookingDetails->checkout = $request->checkout;
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('bookingDetails.edit', $bookingDetail)->with('error', 'Booking details unable to update');
        }
        $storeBookingDetails->save();
        return redirect()->route('bookingDetails.index')->with('success', 'Booking details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($bookingDetail)
    {
        try {
            $deletebookingDetail = booking_detail::findOrFail($bookingDetail);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('bookingDetails.index')->with('error', 'Booking details not found');
        }
        $deletebookingDetail->delete();
        return redirect()->route('bookingDetails.index')->with('success', 'Booking details deleted successfully');
    }
}
