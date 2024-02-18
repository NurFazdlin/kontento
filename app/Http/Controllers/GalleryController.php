<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery;
use App\Models\Pictures;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$Galleries = gallery::get();
        return view('Gallery.index', compact('Galleries'));*/
        $Galleries=gallery::all();
        return view('Gallery.index')->with('Galleries',$Galleries);
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
        }*/

        
        
            /* ni yg dh jadikk try {
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
                /*Insert your data
            
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
            }*/

            //ni drpd youtube try{

                /*$request->validate([
                    'picture' => 'required|picture|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'description' => 'required',
                ]);

                if($request->hasFile("cover")){
                    $file=$request->file("cover");
                    $pictureName=time().'_'.$file->getClientOriginalName();
                    $file->move(\public_path("cover/"),$pictureName);
        
                   $Gallery =new gallery([
                        "typeofhomestay" =>$request->type,
                        "description" =>$request->description,
                        "cover" =>$pictureName,
                    ]);
                    $Gallery->save();
                }
    
                if($request->hasFile("pictures")){
                    $files=$request->file("pictures");
                    foreach($files as $file){
                        $pictureName=time().'_'.$file->getClientOriginalName();
                        $request['Gallery_id']=$Gallery->id;
                        $request['picture']=$pictureName;
                        $file->move(\public_path("/pictures"),$pictureName);
                        Pictures::create($request->all());
    
                    }
                }
                return redirect()->route('Galleries.index')->with('success', 'Student saved successfully');
            /*} catch (\Exception $e) {
                \Log::error($e->getMessage());
                return redirect()->route('Galleries.create')->with('error', 'Student unable to save');
            }*/

            $Gallery = new Gallery([
                "typeofhomestay" => $request->type,
                "description" => $request->description,
            ]);
            
            if ($request->hasFile("cover")) {
                $file = $request->file("cover");
                if ($file->isValid()) {
                    \Log::info('File Information:', [
                        'Original Name' => $file->getClientOriginalName(),
                        'Size' => $file->getSize(),
                        // Add more information as needed
                    ]);
                    $pictureName = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path("cover/"), $pictureName);
                    $Gallery->cover = $pictureName;
                }
            }
            
            $Gallery->save();
            
            // Check if there are pictures to upload
            if ($request->hasFile("pictures")) {
                $files = $request->file("pictures");
                foreach ($files as $file) {
                    $pictureName = time() . '_' . $file->getClientOriginalName();
                    // Create Pictures model instance
                    $picture = new Pictures([
                        "Gallery_id" => $Gallery->id,
                        "picture" => $pictureName,
                    ]);
                    // Move file to the correct directory
                    $file->move(public_path("/pictures"), $pictureName);
                    // Save the picture record
                    $picture->save();
                }
            }
            
            return redirect()->route('Galleries.index')->with('success', 'Gallery saved successfully');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Gallery)
    {
        /*try {
            $editGalleries = gallery::findOrFail($Gallery);
            //$editGalleries = gallery::all();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Galleries.index')->with('error', 'Posts not found');
        }

        return view('Gallery.show',compact('editGalleries'));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(/*$Gallery*/ $id)
    {
        try {
            //$Galleries = gallery::findOrFail($Gallery);
            $Galleries=gallery::findOrFail($id);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Galleries.index')->with('error', 'Posts not found');
        }
        //return view('Gallery.edit',compact('editGalleries'));
        return view('Gallery.edit')->with('Galleries',$Galleries);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, /*$Gallery*/ $id)
    {
        /*$request->validate([
            'picture.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string|max:255',
        ]);*/

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

        /*latest and jadik jugakkkkkkkkk try {
            $gallery = Gallery::findOrFail($Gallery);
    
            // Validate the request data
            /*$request->validate([
                'newImages.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'description' => 'nullable|string',
            ]);
    
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
        }*/

        /* try tryyyyyyyyyyyy ehekehek try{
            $Gallery=gallery::findOrFail($id);
            if($request->hasFile("cover")){
                if (File::exists("cover/".$Gallery->cover)) {
                    File::delete("cover/".$Gallery->cover);
                }
                $file=$request->file("cover");
                $Gallery->cover=time()."_".$file->getClientOriginalName();
                $file->move(\public_path("/cover"),$Gallery->cover);
                $request['cover']=$Gallery->cover;
            }

                $Gallery->update([
                    "typeofhomestay" =>$request->type,
                    "description" =>$request->description,
                    "cover"=>$Gallery->cover,
                ]);

                /*if($request->hasFile("pictures")){
                    $files=$request->file("pictures");
                    foreach($files as $file){
                        $pictureName=time().'_'.$file->getClientOriginalName();
                        $request["Gallery_id"]=$id;
                        $request["picture"]=$pictureName;
                        $file->move(\public_path("pictures"),$pictureName);
                        Pictures::create($request->all());

                    }
                }

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Galleries.edit', $Gallery)->with('error', 'Gallery unable to update');
        }*/

        $Gallery=gallery::findOrFail($id);
        $Gallery->update([
            "typeofhomestay" =>$request->type,
            "description" =>$request->description,
            "cover"=>$Gallery->cover,
        ]);

        if($request->hasFile("cover")){
            if (File::exists("cover/".$Gallery->cover)) {
                File::delete("cover/".$Gallery->cover);
            }
            $file=$request->file("cover");
            $Gallery->cover=time()."_".$file->getClientOriginalName();
            $file->move(\public_path("/cover"),$Gallery->cover);
            $request['cover']=$Gallery->cover;
        }

        if ($request->hasFile("pictures")) {
            $files = $request->file("pictures");
            foreach ($files as $file) {
                $pictureName = time() . '_' . $file->getClientOriginalName();
                // Create Pictures model instance
                $picture = new Pictures([
                    "Gallery_id" => $Gallery->id,
                    "picture" => $pictureName,
                ]);
                // Move file to the correct directory
                $file->move(public_path("/pictures"), $pictureName);
                // Save the picture record
                $picture->save();
            }
        }

        return redirect()->route('Galleries.index')->with('success', 'Gallery saved successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(/*$Gallery*/ $id) 
    {
        /*try {
            $Gallery = gallery::findOrFail($Gallery);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Galleries.index')->with('error', 'Posts not found');
        }

        $Gallery->delete();
  
        return redirect()->route('Galleries.index')->with('success','Posts Deleted Successfully');*/

        try{
            $Galleries=gallery::findOrFail($id);

            if (File::exists("cover/".$Galleries->cover)) {
                File::delete("cover/".$Galleries->cover);
            }
            $pictures=Pictures::where("Gallery_id",$Galleries->id)->get();
            foreach($pictures as $picture){
                if (File::exists("pictures/".$picture->picture)) {
                    File::delete("pictures/".$picture->picture);
                }
            }
        }catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->route('Galleries.index')->with('error', 'Posts not found');
        }

        $Galleries->delete();
  
        return redirect()->route('Galleries.index')->with('success','Posts Deleted Successfully');

    }

    //baru tambahhhh
    public function deleteimage($id){
        $pictures=Pictures::findOrFail($id);
        if (File::exists("pictures/".$pictures->picture)) {
           File::delete("pictures/".$pictures->picture);
        }

       Pictures::find($id)->delete();
       return redirect()->route('Galleries.index')->with('success','Pictures Deleted Successfully');
       //return back();
   }

   public function deletecover($id){
        $cover=gallery::findOrFail($id)->cover;
        if (File::exists("cover/".$cover)) {
            File::delete("cover/".$cover);
        }
        return redirect()->route('Galleries.index')->with('success','Covers Deleted Successfully');
        //return back();
    }
}
