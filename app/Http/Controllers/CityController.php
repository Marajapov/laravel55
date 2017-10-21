<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\City as City;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::get();
        return view('city.index',['cities'=>$cities]);
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
        $city = new City();
        $city->name = $request->input('name');
        $city->name_translit = $request->input('name_translit');
        $city->save();
        return redirect('/city');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::find($id);
        return view('city.show',['city'=>$city]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        return view('city.edit',['city'=>$city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCity(\Illuminate\Http\Request $request, $id)
    {
        $city = City::find($id);
        $city->name = $request->input('name');
        $city->name_translit = $request->input('name_translit');
        $city->save();
        return redirect('/city');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteCity()
    {
         if(Request::ajax()) {
            $data = Input::all();
            $city = City::find($data['id']);
            $city->delete();
            $cities = City::get();
            
        }
    }
}
