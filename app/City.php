<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = ['name', 'name_translit','in_the_city'];

    public function getName()
    {
        return $this->name;
    }
    
    public function getNameTranslit()
    {
        return $this->name_translit;
    }
    

    public function getId()
    {
        return $this->id;
    }
}

