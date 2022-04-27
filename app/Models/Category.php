<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function blogs(){
        return $this->hasMany(Blog::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
}
