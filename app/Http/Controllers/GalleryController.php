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
        try {
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

        }catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('post.create')->with('error', 'Posts unable to save');
        }

        //$input->save();
        gallery::create($input);
        return redirect()->route('posts.index')
            ->with('success','Post Saved Successfully.')
            ->with('postPictures', $input);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        try {
            $editposts = gallery::findOrFail($post);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('posts.index')->with('error', 'Posts not found');
        }

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
        try {
            $editposts = gallery::findOrFail($post);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('posts.index')->with('error', 'Posts not found');
        }
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
        try{
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
    
        }catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('post.edit', $post)->with('error', 'Posts unable to update');
        }
        $post->update($input);
        return redirect()->route('posts.index')->with('success','Posts Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post) 
    {
        try {
            $post = gallery::findOrFail($post);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('posts.index')->with('error', 'Posts not found');
        }

        $post->delete();
  
        return redirect()->route('posts.index')->with('success','Posts Deleted Successfully');
    }
}
