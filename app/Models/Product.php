<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable =
    ['category_id','name','slug','description','image','product_code','compare_price','price','quantity','featured','status','tag'];


    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return url('no_image.jpg');
        }
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }
        return asset('storage/' . $this->image);
    }

    public function category(){
        return $this->BelongsTo(Category::class,'category_id','id')->withDefault();
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'product_tag',
            'product_id',
            'tag_id',
            'id',
            'id'

        );
    }

}