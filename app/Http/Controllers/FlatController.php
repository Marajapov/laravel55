<?php

namespace App\Http\Controllers;
use Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

use Intervention\Image\ImageManagerStatic as Image;

use App\Region as Region;
use App\City as City;
use App\Flat as Flat;
use App\Inventory as Inventory;
use App\FlatInventory as FlatInventory;


class FlatController extends Controller
{
    public function __construct()
  	{
		$this->cities = City::pluck('name', 'id')->toArray();
		$this->regions = Region::pluck('region_title', 'id')->toArray();
		$this->inventories = Inventory::get();
    }

    public function index()
    {
        $flats = Flat::get();
        return view('flat.index',[
            'flats'=>$flats,
            'cities'=>$this->cities,
            'regions'=>$this->regions,
            'inventories'=>$this->inventories,
            ]);
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $inventories = $request->input('inventories');
        $image = $request->file('main_img');
        if($image){
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('flats/main_img');
            $destinationPathTiny = public_path('flats/main_img_tiny');
            $newImage = $image->move($destinationPath,$input['imagename']);
            $result = Image::make($newImage)->fit(250,150)->save($destinationPathTiny.'/'.$input['imagename']);
        }

        $flat = new Flat();
        $flat->owner_id = \Auth::user()->id;
        $flat->city = $request->input('city_id');
        $flat->region = $request->input('region');
        $flat->name = $request->input('name');
        $flat->phone = $request->input('phone');
        $flat->phone2 = $request->input('phone2');
        $flat->phone3 = $request->input('phone3');
        $flat->street = $request->input('street');

        $flat->price24 = $request->input('price24');
        $flat->price_hour = $request->input('price_hour');
        $flat->price_night = $request->input('price_night');
        $flat->price_month = $request->input('price_month');

        $flat->main_img = ($image)?$input['imagename']:'';
        $flat->description = $request->input('description');
        $flat->save();
        // Flat Inventory
        for($i=0; $i<count($inventories); $i++){
            $flatInventory = new FlatInventory();
            $flatInventory->flat_id = $flat->getId();
            $flatInventory->inventory_id = $inventories[$i];
            $flatInventory->save();
        }
        $result = FlatInventory::get();
        return redirect('/flat');
    }

    public function show($id)
    {
        $flat = Flat::find($id);
        $flatInventories = FlatInventory::where('flat_id',$id)->get();

        return view('flat.show',[
            'flat'=>$flat,
            'inventories'=>$this->inventories,
            'flatInventories'=>$flatInventories,
            ]);
    }

    public function edit($id)
    {
        $city = City::find($id);
        return view('city.edit',['city'=>$city]);
    }

    public function updateCity(\Illuminate\Http\Request $request, $id)
    {
        $city = City::find($id);
        $city->name = $request->input('name');
        $city->name_translit = $request->input('name_translit');
        $city->in_the_city = $request->input('in_the_city');
        $city->save();
        return redirect('/city');
    }
// Ajax functions
    public function deleteFlat()
    {
        if(Request::ajax()) {
            $data = Input::all();
            $flat = Flat::find($data['id']);
            $destinationPath = public_path('flats/main_img');
            $destinationPathTiny = public_path('flats/main_img_tiny');
            if(file_exists($destinationPath.'/'.$flat->main_img)){
                @unlink($destinationPath.'/'.$flat->main_img);
                @unlink($destinationPathTiny.'/'.$flat->main_img);
            }
            $flat->delete();
            $flat = Flat::get();

        }
    }

    public function ajaxRegions()
    {
         if(Request::ajax()) {
            $data = Input::all();
            $regions = Region::where('city_id','=',$data['id'])->get();
            return \Response::json($regions);
        }
    }
}
