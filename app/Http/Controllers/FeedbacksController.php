<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\feedback; 

class FeedbacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $Feedbacks = feedback::get();
        return view('Feedback.index', compact('Feedbacks'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Feedback.create');
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
            $storeFeedback = new feedback();
            $storeFeedback->name = $request->name;
            $storeFeedback->roomnumber = $request->roomnumber;
            $storeFeedback->date = $request->date;
            $storeFeedback->staffservice = $request->staffservice;
            $storeFeedback->cleanliness = $request->cleanliness;
            $storeFeedback->housekeeping = $request->housekeeping;
            $storeFeedback->cafefood = $request->cafefood;
            $storeFeedback->amenities = $request->amenities;
            $storeFeedback->overallhomestayrating = $request->overallhomestayrating;
            $storeFeedback->othercomments = $request->othercomments;
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Feedback.create')->with('error', 'Feedback unable to save');
        }
        $storeFeedback->save();
        return redirect()->route('Feedback.index')->with('success', 'Feedback saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Feedback)
    {
        try {
            $editFeedback = feedback::findOrFail($Feedback);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Feedbacks.index')->with('error', 'Feedback not found');
        }
        return view('Feedback.show', compact('editFeedback'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Feedback)
    {
        try {
            $editFeedback = feedback::findOrFail($Feedback);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Feedbacks.index')->with('error', 'Feedback not found');
        }
        return view('Feedback.edit', compact('editFeedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Feedback)
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
            $storeFeedback = new feedback();
            $storeFeedback->name = $request->name;
            $storeFeedback->roomnumber = $request->roomnumber;
            $storeFeedback->date = $request->date;
            $storeFeedback->staffservice = $request->staffservice;
            $storeFeedback->cleanliness = $request->cleanliness;
            $storeFeedback->housekeeping = $request->housekeeping;
            $storeFeedback->cafefood = $request->cafefood;
            $storeFeedback->amenities = $request->amenities;
            $storeFeedback->overallhomestayrating = $request->overallhomestayrating;
            $storeFeedback->othercomments = $request->othercomments;
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Feedbacks.edit', $Feedback)->with('error', 'Feedback unable to update');
        }
        $storeFeedback->save();
        return redirect()->route('Feedbacks.index')->with('success', 'Feedback updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Feedback)
    {
        try {
            $deleteFeedback = feedback::findOrFail($Feedback);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Feedbacks.index')->with('error', 'Feedback not found');
        }
        $deleteFeedback->delete();
        return redirect()->route('Feedbacks.index')->with('success', 'Feedback deleted successfully');
    }
}