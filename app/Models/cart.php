<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Category\Models\Category;
use App\Modules\Color\Models\Color;
use App\Modules\Product\Models\Product;


class cart extends Model
{
    use HasFactory;
    protected $table='carts';
    protected $fillable=['user_id','product_id','qty'];

    
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
 

}
