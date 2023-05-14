<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $fillable = ['order_id','menu_item_id','quantity','total'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function menu_items()
    {
        return $this->belongsTo(MenuItem::class,'menu_item_id','id');
    }
}
