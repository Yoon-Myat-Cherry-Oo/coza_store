<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [

        'name',
        'category_id',
        'size_id',
        'color_id',
        'qty',
        'description',
        'price',
        'image',


    ];
    public function orderList(){
        return $this->hasMany('App\Models\OrderList');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }

    public function Size(){
        return $this->belongsTo('App\Models\Size','size_id','id');
    }
    public function Color(){
        return $this->belongsTo('App\Models\Color','color_id','id');
    }

    // public function Entry(){
    //     return $this->hasMany('App\Models\Entry');
    // }

}
