<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use App\Gallery as Gallery;
use App\Photo as Photo;
use App\Inventory as Inventory;
use App\FlatInventory as FlatInventory;

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

    public function flat_photos()
    {
      $gallery = Gallery::where('flat_id','=',$this->id)->where('main','1')->first();
      if($gallery != null)
      {
        $photos = Photo::where('gallery_id','=',$gallery->id)->get();
        return $photos;
      }else{
        return null;
      }

    }

    public function flat_inventories()
    {
      $flat_inventories = FlatInventory::where('flat_id',$this->id)->get();
      if($flat_inventories != null)
      {
        return Inventory::whereIn('id',$flat_inventories->pluck('inventory_id'))->get();
      }
    }
}
