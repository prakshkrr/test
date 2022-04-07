<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $table='shipping_address';
    protected $fillable=['user_id','firstname','lastname','emailid','city','state','zipcode','country','phonenumber'];
}
