<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlatInventory extends Model
{
    protected $table = 'flat_inventories';
    protected $fillable = ['*'];

    public function getId()
    {
        return $this->id;
    }
}
