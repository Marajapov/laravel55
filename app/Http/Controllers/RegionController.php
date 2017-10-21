<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Region as Region;
use App\City as City;

class RegionController extends Controller
{
    public function __contract(){
        $this->cities = City::get()->toArray();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::get();
        $cities = City::get()->toArray();
        return view('region.index',compact(['regions','cities']));
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
        $status = $request->input('status');
        $region = new Region();
        $region->city_id = $request->input('city_id');
        $region->region_title = $request->input('region_title');
        
        if($status == null){
            $region->status = 0;
        }
        else{
            $region->status = 1;
        }
        $region->save();
        return redirect('/region');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $region = Region::find($id);
        $cities = City::get()->toArray();
        return view('region.show',compact(['region','cities']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $region = Region::find($id);
        $cities = City::get()->toArray();
        return view('region.edit',compact(['region','cities']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRegion(\Illuminate\Http\Request $request, $id)
    {
        $status = $request->input('status');
        $region = Region::find($id);
        $region->city_id = $request->input('city_id');
        $region->region_title = $request->input('region_title');
        if($status == null){
            $region->status = 0;
        }
        else{
            $region->status = 1;
        }
        $region->save();
        return redirect('/region');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteRegion()
    {
         if(Request::ajax()) {
            $data = Input::all();
            $region = Region::find($data['id']);
            $region->delete();
            $region = Region::get();
        }
    }
}
