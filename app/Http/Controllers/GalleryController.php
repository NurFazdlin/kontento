<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = gallery::get();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
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
            'picture' => 'required|picture|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ]);

        $input = $request->all();
  
        if ($picture = $request->file('picture')) {
            $destinationPath = 'pictures/';
            $postPicture = date('YmdHis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $postPicture);
            $input['picture'] = "$postPicture";
        }
  
        gallery::create($input);
   
        return redirect()->route('posts.index')->with('success','Post Saved Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post)
    {
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post)
    {
        $request->validate([
            'picture' => 'required|picture|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ]);

        $input = $request->all();
  
        if ($picture = $request->file('picture')) {
            $destinationPath = 'pictures/';
            $postPicture = date('YmdHis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $postPicture);
            $input['picture'] = "$postPicture";
        } else{
            unset($input['picture']);
        }
  
            $post->update($input);
  
            return redirect()->route('posts.index')->with('success','Post Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post) 
    {
        $post->delete();
  
        return redirect()->route('posts.index')->with('success','Post Deleted Successfully');
    }
}
