<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class AddProduct extends Model
{
    use HasFactory,SoftDeletes;
    public function category_variants()
    {
        return $this->hasMany(Category_variant::class,'product_id', 'id');
    }
    public function product_images()
    {
       return $this->hasMany(ProductImage::class,'product_id','id');
    }

}
