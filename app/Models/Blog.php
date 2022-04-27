<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $with = ['author', 'category'];

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //search query
    public function scopeFilter($query, $filter){
        // dd($filter['category']);
        $query->when($filter['search'] ?? false, function($query, $search){
            $query->where('title', 'LIKE', '%'.$search.'%')
                ->orWhere('detail', 'LIKE', '%'.$search.'%');
        });

        $query->when($filter['category'] ?? false, function($query, $name){
            $query->whereHas('category', function($query) use ($name){
                $query->where('name', $name); 
            });
        });

        

    }
}


// if(true){
//     //true
// }else{
//     //false
// }   

// ternary 
// true? true : false

//??
// true??false 