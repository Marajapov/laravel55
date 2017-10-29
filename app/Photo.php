<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  protected $table = 'photos';
  protected $fillable = ['*'];

  public function getId()
  {
      return $this->id;
  }

  public function getName()
  {
      return $this->name;
  }

  public function getImage()
  {
      return $this->image;
  }
}
