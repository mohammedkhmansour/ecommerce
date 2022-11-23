<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'reviewsble_id','reviewsble_type','user_id','rating','review'
    ];

     public function review()
     {
        return $this->morphTo('reviewsble');
     }
     public function user()
     {
        return $this->belongsTo(User::class)->withDefault([
            'name'  => 'Anonemous'
        ]);
     }
}
