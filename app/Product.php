<?php

namespace App;
use App\Section;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = [];

    ///relation between section && products

    public function sections()
    {
       return $this->belongsTo('App\Section','section_id');
    }
}
