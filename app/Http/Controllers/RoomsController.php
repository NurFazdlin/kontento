<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\room_availability;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $rooms = room_availability::get();
        return view('room.index', compact('rooms'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|min:3|max:255',
            'gender'        => 'required|in:male,female',
            'phone_number'  => 'required|regex:/^60[0-9]{9,10}$/|unique:room_availabilities,phone_number',
            'matric_number' => 'required|regex:/^D[0-9]{11}$/|unique:room_availabilities,matric_number',
            'address'       => 'nullable|string',
            'age'           => 'required|numeric|between:17,90',
        ]);
        
        try {
            $storeRoom = new room_availability();
            $storeRoom->name = $request->name;
            $storeRoom->gender = $request->gender;
            $storeRoom->phone_number = $request->phone_number;
            $storeRoom->matric_number = $request->matric_number;
            $storeRoom->address = $request->address;
            $storeRoom->age = $request->age;
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('rooms.create')->with('error', 'Room unable to save');
        }
        $storeRoom->save();
        return redirect()->route('rooms.index')->with('success', 'Room saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($room)
    {
        try {
            $editroom = room_availability::findOrFail($room);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('rooms.index')->with('error', 'Room not found');
        }
        return view('room.show', compact('editroom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($room)
    {
        try {
            $editroom = room_availability::findOrFail($room);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('rooms.index')->with('error', 'Room not found');
        }
        return view('room.edit', compact('editroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $room)
    {
        $request->validate([
            'name'          => 'required|string|min:3|max:255',
            'gender'        => 'required|in:male,female',
            'phone_number'  => 'required|regex:/^60[0-9]{9,10}$/|unique:room_availabilities,phone_number,' . $student,
            'matric_number' => 'required|regex:/^D[0-9]{11}$/|unique:room_availabilities,matric_number,' . $student,
            'address'       => 'nullable|string',
            'age'           => 'required|numeric|between:17,90',
        ]);
        
        try {
            $storeRoom = new room_availability();
            $storeRoom->name = $request->name;
            $storeRoom->gender = $request->gender;
            $storeRoom->phone_number = $request->phone_number;
            $storeRoom->matric_number = $request->matric_number;
            $storeRoom->address = $request->address;
            $storeRoom->age = $request->age;
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('rooms.edit', $room)->with('error', 'Room unable to update');
        }
        $storeRoom->save();
        return redirect()->route('rooms.index')->with('success', 'Room updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($room)
    {
        try {
            $deleteRoom = room_availability::findOrFail($room);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('rooms.index')->with('error', 'Room not found');
        }
        $deleteRoom->delete();
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully');
    }
}
