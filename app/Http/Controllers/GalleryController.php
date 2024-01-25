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
        $Galleries = gallery::get();
        return view('Gallery.index', compact('Galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*try {
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
        
        }catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Galleries.create')->with('error', 'Posts unable to save');
        }

        //$input->save();
            return redirect()->route('Galleries.index')
                ->with('success','Post Saved Successfully.')
                ->with('postPictures', $input);*/
                $input=$request->all();
                $picture=array();
                if($files=$request->file('picture')){
                    foreach($files as $file){
                        $name=$file->getClientOriginalName();
                        $file->move('picture',$name);
                        $picture[]=$name;
                    }
                }
                /*Insert your data*/
            
                gallery::insert( [
                    'picture'=>  implode("|",$picture),
                    'description' =>$input['description'],
                    //you can put other insertion here
                ]);
            
            
                return redirect()->route('Galleries.index')
                ->with('success','Post Saved Successfully.')
                ->with('postPictures', $input);      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Gallery)
    {
        try {
            $editGalleries = gallery::findOrFail($Gallery);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Galleries.index')->with('error', 'Posts not found');
        }

        return view('Gallery.show',compact('Gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Gallery)
    {
        try {
            $editGalleries = gallery::findOrFail($Gallery);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Galleries.index')->with('error', 'Posts not found');
        }
        return view('Gallery.edit',compact('Gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Gallery)
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
            return redirect()->route('Galleries.edit', $Gallery)->with('error', 'Posts unable to update');
        }
        $Gallery->update($input);
        return redirect()->route('Galleries.index')->with('success','Posts Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Gallery) 
    {
        try {
            $Gallery = gallery::findOrFail($Gallery);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Galleries.index')->with('error', 'Posts not found');
        }

        $Gallery->delete();
  
        return redirect()->route('Galleries.index')->with('success','Posts Deleted Successfully');
    }
}
