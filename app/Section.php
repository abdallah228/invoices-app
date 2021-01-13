<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //
    protected $guarded = [];

    //start relations between section && products
    public function products()
    {
        return $this->hasMany('App\Product','section_id');
    } 
}
