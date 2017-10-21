<?php

namespace App;
use App\City as City;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';
    protected $fillable = ['city_id', 'region_title','status'];

    public function getId()
    {
        return $this->id;
    }
    
    public function city()
    {
        return $this->belongsTo('App\City'); 
    }

    public function getRegionTitle()
    {
        return $this->region_title;
    }
    
    public function getStatus()
    {
        return ( $this->status != null)?'on':null;
    }
}
