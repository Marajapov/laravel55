<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Flat extends Model
{
    protected $table = 'flats';
    protected $fillable = ['*'];

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getMainImg()
    {
        return $this->main_img;
    }
}
