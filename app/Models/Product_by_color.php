<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_by_color extends Model
{
    use HasFactory;
    public function size()
    {
        $this->belongsTo(Size::class);
    }
}
