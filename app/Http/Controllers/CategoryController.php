<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $attributes = $request->validate([
            'name'=>'required'
        ]);

        // $attributes['user_id'] = auth()->id();

        Category::create($attributes + [
            'user_id' => auth()->id()
        ]);

        return back();
    }
}
