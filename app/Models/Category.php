<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable =
    ['name','parent_id','slug','description','image','statuse'];

    public static function booted(){

    //     static::addGlobalScope('parent_name',function(Builder $builder){


    //         $builder->leftJoin('categories as parents','parents.id','=','categories.parent_id')
    //     ->select([
    //         'categories.*',
    //         'parents.name as parent_name',
    //     ]);
    // }
    }
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

    public function scopeFilter(Builder $builder , $filters){

        $builder->when($filters['name'] ?? false , function($builder , $value){
            $builder->where('name','LIKE',"%{$value}%");
        });

        $builder->when($filters['statuse'] ?? false , function($builder , $value){
            $builder->where('statuse','=',$value);
        });

    }

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id','id')
        // ->withDefault(); هاد بتزبط ويلي تحت لو م في تصنيف اب يطبعلي هاد الكلمة
        ->withDefault([
            'name'  => 'تصنيف رئيسي'
        ]);

    }

    public function child()
    {
        return $this->hasMany(Category::class,'parent_id','id');
    }


}
