<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Variant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'category_variant_id',
        'variant_name',
    ];
    public function category_variant()
    {
        $this->belongsTo(Category_variant::class);
    }
    // public function Addproduct()
    // {
    //     $this->belongsTo(AddProduct::class);
    // }
}
