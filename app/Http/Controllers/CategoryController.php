<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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

    public function show(){
        $categories = Category::where('user_id', auth()->id())->get();

        return view('show_category',compact(['categories']));
    }

    public function destroy(Category $category){
        $category->delete();

        return back();
    }
}
