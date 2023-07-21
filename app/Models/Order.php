<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [

        'user_id',
        'order_list_id',
        'address',
        'total_price',
        'delivery_date',

    ];
    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function orderList(){
        return $this->belongsTo('App\Models\orderList','order_list_id','id');
    }
}
