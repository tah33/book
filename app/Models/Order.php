<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','billing_address_id','delivery_status','payment_type','payment_status','sub_total','delivery_charge','total_amount','invoice_no','total_discount','total_tax',
        'delivery_charge','total_payable'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function billingAddress()
    {
        return $this->belongsTo(BillingAddress::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function returnOrder()
    {
        return $this->hasMany(ReturnOrder::class);
    }

    public function getReturnedAttribute()
    {
        return $this->returnOrder()->where('is_reject',0)->where('status',1)->first();
    }

    public function getReturnRequestedAttribute()
    {
        return $this->returnOrder()->where('is_reject',0)->where('status',0)->first();
    }
}
