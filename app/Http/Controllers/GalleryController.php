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
                ->with('postPictures', $input);
                $input=$request->all();
                $picture=array();
                if($files=$request->file('picture')){
                    foreach($files as $file){
                        $name=$file->getClientOriginalName();
                        $file->move('picture',$name);
                        $picture[]=$name;
                    }
                }
                /*Insert your data
            
                gallery::insert( [
                    'picture'=>  implode("|",$picture),
                    'description' =>$input['description'],
                    //you can put other insertion here
                ]);
            
            
                return redirect()->route('Galleries.index')
                ->with('success','Post Saved Successfully.')
                ->with('postPictures', $input); 
                $request->validate([
                    'picture.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'description' => 'required|string|max:255',
                ]);
        
                try {
                    $storeGallery = new gallery();
                    
                    $picturesPaths = [];
        
                    foreach ($request->file('picture') as $picture) {
                        $picturesName = time() . '_' . $picture->getClientOriginalName();
                        $picture->move(public_path('picture'), $picturesName);
                        $picturesPaths[] = 'picture/' . $picturesName;
                    }

                    $storeGallery->picture = $picturesPaths;
                    $storeGallery->description = $request->description;
                    
                }catch (\Exception $e) {
                    \Log::error($e->getMessage());
                    return redirect()->route('Galleries.create')->with('error', 'Student unable to save');
                }
                $storeGallery->save();
                return redirect()->route('Galleries.index')->with('success', 'Student saved successfully');*/
        
            try {
                //$input=$request->all();
                $picture = [];
                //if($files=$request->file('picture')){
                if ($request->hasFile('picture')) {
                //    foreach($files as $file){
                    foreach ($request->file('picture') as $file) {
                        //$name=$file->getClientOriginalName();
                        $name = $file->getClientOriginalName();
                        $file->move('picture',$name);
                        $picture[]= $name;
                    }
                }
                /*Insert your data*/
            
                gallery::create( [
                    'picture'=>  implode('<br>',$picture),
                    //'description' =>$input['description'],
                    'description' => $request->input('description'),
                    //you can put other insertion here
                ]);

                return redirect()->route('Galleries.index')->with('success', 'Student saved successfully');
            } catch (\Exception $e) {
                \Log::error($e->getMessage());
                return redirect()->route('Galleries.create')->with('error', 'Student unable to save');
            }
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
            //$editGalleries = gallery::all();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Galleries.index')->with('error', 'Posts not found');
        }

        return view('Gallery.show',compact('editGalleries'));
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
        return view('Gallery.edit',compact('editGalleries'));
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
        $request->validate([
            'picture.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string|max:255',
        ]);

        /*try {
            $storeGallery = gallery::findOrFail($Gallery);
            
            $picturesPaths = $storeGallery->picture ?? [];

            if ($request->hasFile('picture')){
                foreach ($request->file('picture') as $pictures) {
                    $picturesName = time() . '_' . $pictures->getClientOriginalName();
                    $pictures->move(public_path('picture'), $picturesName);
                    $picturesPaths[] = 'picture/' . $picturesName;
                }
            }

            $storeGallery->picture = $request->$picturesPaths;
            $storeGallery->description = $request->description;
            $storeGallery->save();
        }catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Galleries.edit', $Gallery)->with('error', 'Student unable to save');
        }
        
        return redirect()->route('Galleries.index')->with('success', 'Student saved successfully');*/

        /* yg latest dan jadik
        try {
            $input = $request->all();
    
            // Find the existing gallery
            $gallery = Gallery::findOrFail($Gallery);
    
            $picture = [];
    
            // Handle multiple image updates
            if ($files = $request->file('picture')) {
                foreach ($files as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move('picture', $name);
                    $picture[] = 'picture/' . $name;
                }
            }
    
            // Update the gallery data
            $gallery->update([
                'picture' => implode("|", $picture),
                'description' => $input['description'],
                // Add other fields as needed
            ]);
    
            return redirect()->route('Galleries.index')->with('success', 'Student saved successfully');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Galleries.edit', $Gallery)->with('error', 'Student unable to save');
        }*/

        try {
            $gallery = Gallery::findOrFail($Gallery);
    
            // Validate the request data
            /*$request->validate([
                'newImages.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'description' => 'nullable|string',
            ]);*/
    
            // Update the description
            $gallery->description = $request->input('description', $gallery->description);
    
            // Handle multiple image updates
            $existingImages = explode('|', $gallery->picture);
            $newImages = [];
    
            if ($request->hasFile('picture')) {
                foreach ($request->file('picture') as $image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('picture', $imageName);
                    $newImages[] = $imageName;
                }
            }
    
            // Combine existing and new images
            $updatedImages = array_merge($existingImages, $newImages);
    
            // Update the picture field
            $gallery->picture = implode('|', $updatedImages);
    
            // Save the changes
            $gallery->save();
    
            return redirect()->route('Galleries.index')->with('success', 'Gallery updated successfully');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Galleries.edit', $Gallery)->with('error', 'Gallery unable to update');
        }
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
