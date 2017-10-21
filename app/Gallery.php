<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
  protected $table = 'galleries';
  protected $fillable = ['*'];

  public function getId()
  {
      return $this->id;
  }

  public function getName()
  {
      return $this->name;
  }

  public function getDescription()
  {
      return $this->description;
  }
}
