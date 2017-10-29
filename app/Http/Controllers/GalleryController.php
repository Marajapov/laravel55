<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

use App\Flat as Flat;
use App\Gallery as Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function galleryIndex(Request $request, $id) // flat ID
    {
        $flat = Flat::where('id',$id)->first();
        $galleries = Gallery::where('flat_id','=',$id)->get();
        return view('gallery.index',[
            'galleries'=>$galleries,
            'flat' => $flat
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
    public function store(\Illuminate\Http\Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $flat_id = $request->input('flat_id');
        $gallery = new Gallery();
        $gallery->owner_id = \Auth::user()->id;
        $gallery->flat_id = $flat_id;
        $gallery->name = $name;
        $gallery->description = $description;
        $gallery->save();
        return redirect()->route('galleryIndex', ['id' => $flat_id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = Gallery::find($id);
        return view('gallery.show',['gallery'=>$gallery]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('gallery.edit',['gallery'=>$gallery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateGallery(\Illuminate\Http\Request $request, $id)
    {
        $gallery = Gallery::find($id);
        $gallery->name = $request->input('name');
        $gallery->description = $request->input('description');
        $gallery->save();
        return redirect()->route('galleryIndex', ['id' => $gallery->flat_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteGallery()
    {
      if(Request::ajax()) {
          $data = Input::all();
          $gallery = Gallery::find($data['id']);
          $gallery->delete();
          $gallery = Gallery::get();
      }
    }
}
