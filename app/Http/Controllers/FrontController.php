<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Flat as Flat;
use App\City as City;

class FrontController extends Controller
{
    public function __construct()
  	{
      $this->all_cities = City::get();
      $this->title = 'С У Т К И : База объявлений гостиничнего бизнеса';
      $this->popular = Flat::where('popular_flag','=',true)->get();

  	}
    public function index()
    {
      $flats = Flat::take(6)->orderBy('id', 'desc')->get();

      $data = array(
          'flats'  => $flats,
          'all_cities' => $this->all_cities,
          'popular' => $this->popular,
      );
      return view('index')->with($data);
    }

    public function search(Request $request)
    {
      $request->validate([
        'city' => 'integer',
        'region' => 'integer',
        'room_number' => 'integer',
      ]);
      if(!empty($request->post('city')))
      {
        $city_id = $request->post('city');
        $region_id = $request->post('region');
        $room_number = $request->post('room_number');
        $query = Flat::where('city','=',$city_id);
        if(isset($region_id))
        {
          $query->where('region_id','=',$region_id);
        }
        if(isset($room_number))
        {
          $query->where('room','=',$room_number);
        }
        $flats = $query->get();
        $data = array(
            'flats'  => $flats,
            'all_cities' => $this->all_cities,
            'popular' => $this->popular,
        );
        return view('search_result')->with($data);
      }else
      {
        $flats = Flat::orderBy('id','desc')->get();
        $data = array(
            'flats'  => $flats,
            'all_cities' => $this->all_cities,
            'popular' => $this->popular,
        );
        return view('search_result')->with($data);

      }

    }

    // Detail
    public function detail($id)
    {
      $row = Flat::find($id);
      $data = array(
          'row'  => $row,
          'all_cities' => $this->all_cities,
          'popular' => $this->popular,
      );
      return view('detail')->with($data);
    }
}
