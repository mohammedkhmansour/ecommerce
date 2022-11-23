<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
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

    public function reviews()
    {
        return $this->morphMany(Review::class,'reviewsble');
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

    public function images()
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }

    public function scopeActivestatus(Builder $builder)
    {
        $builder->where('status','=','فعال');
    }

    public function scopeActivefeatured(Builder $builder)
    {
        $builder->where('featured','=','مميز');
    }

    // هاد عشان اجيب نسبة الخصم
    public function getSalePrice()
    {
        if(!$this->compare_price){
            return 0;
        }
        return round(100 - (100 * $this->price / $this->compare_price),1);
    }
}
