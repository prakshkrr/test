<?php

namespace App\Modules\Product\Models;
use App\Modules\category\Models\category;
use App\Modules\color\Models\color;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $table ="product";

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function color()
    {
        return $this->belongsTo(Color::class,'color_id','id');
    }
}
