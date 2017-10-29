<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

use App\Photo as Photo;
use App\Gallery as Gallery;
use Intervention\Image\ImageManagerStatic as Image;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function photoIndex(Request $request, $id)
    {
      $gallery = Gallery::where('id',$id)->first();
      $photos = Photo::where('gallery_id','=',$id)->get();
      return view('photo.index',[
          'gallery'=> $gallery,
          'photos' => $photos
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\UploadRequest $request)
    {
        $gallery_id = $request->input('gallery_id');
        foreach ($request->photos as $image) {
            $input['imagename'] = rand(1,1002).time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('photos/main_img');
            $destinationPathTiny = public_path('photos/main_img_tiny');
            $newImage = $image->move($destinationPath,$input['imagename']);
            $result = Image::make($newImage)->fit(250,150)->save($destinationPathTiny.'/'.$input['imagename']);
            $photo = new Photo();
            $photo->gallery_id = $gallery_id;
            $photo->image = $input['imagename'];
            $photo->save();
        }
        return redirect()->route('photoIndex', ['id' => $request->input('gallery_id')]);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePhoto()
    {
      if(Request::ajax()) {
        $data = Input::all();
        $photo = Photo::find($data['id']);
        $destinationPath = public_path('photos/main_img');
        $destinationPathTiny = public_path('photos/main_img_tiny');
        if(file_exists($destinationPath.'/'.$photo->getImage())){
            @unlink($destinationPath.'/'.$photo->getImage());
            @unlink($destinationPathTiny.'/'.$photo->getImage());
        }
        $photo->delete();
        $photos = Photo::get();
      }
    }
}
