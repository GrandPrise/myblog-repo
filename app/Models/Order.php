<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
   // protected $table = ['client', 'phone_number', 'whatsapp_number', 'city', 'address', 'item', 'quantity', 'total_price', 'remark', 'created_by'];
}
