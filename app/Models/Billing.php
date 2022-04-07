<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Billing extends Model
{
    use HasFactory;
    protected $table='billing_address';
    protected $fillable=['user_id','firstname','lastname','emailid','city','state','zipcode','country','phonenumber','status'];
}
