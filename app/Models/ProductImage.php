<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductImage extends Model
{
    use HasFactory;
    protected $fillable =['image_path','product_id'];


    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id')->withDefault();
    }


}
