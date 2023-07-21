<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'product_id',
        'size_id',
        'color_id',
        'qty',
        'description',
        'price',
        'image',
    ];
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
    public function product(){
        return $this->belongsTo('App\Models\Product','product_id','id');
    }
    public function Size(){
        return $this->belongsTo('App\Models\Size','size_id','id');
    }
    public function Color(){
        return $this->belongsTo('App\Models\Color','color_id','id');
    }
}
