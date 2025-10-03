<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function quotation(){
        return $this->belongsTo('App\Models\Quotation');
    }
    public function customer(){
        return $this->belongsTo('App\Models\Customer');
    }
    public function pembayaran(){
        return $this->belongsTo('App\Models\Pembayaran');
    }
    public function produk(){
        return $this->belongsToMany(Produk::class, 'sales_order_items')
                    ->withPivot('kuantitas', 'harga', 'tax', 'subtotal')
                    ->withTimestamps();
    }
}
