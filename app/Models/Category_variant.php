<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category_variant extends Model
{
    use HasFactory, SoftDeletes;
    // protected $table='category_variants';
    protected $fillable = [
        'product_id',
        'category_name',
    ];
    public function Addproduct()
    {
        return $this->belongsTo(AddProduct::class, 'product_id');
    }
    public function variants()
    {
        return $this->hasMany(Variant::class, 'category_variant_id', 'id');
    }
    public function setCategoryNameAttribute($value)
    {
        $this->attributes['category_name'] = ucwords($value);
    }
}
