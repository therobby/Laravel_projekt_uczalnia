<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    public function category()
    {
        return \App\Categories::find($this->category_id)->name;//$this->hasOne('\App\Categories', 'category_id')->get()->first()->name;
    }
}
