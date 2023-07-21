<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'quantity',
        'sub_total',


    ];
    public function product(){
        return $this->belongsTo('App\Models\Product','product_id','id');
    }

    public function order(){
        return $this->hasMany('App\Models\Order');
    }
}
