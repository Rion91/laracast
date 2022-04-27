<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::latest()->filter(request(['search', 'category']))->get();
        $categories =Category::where('user_id', auth()->id())->get()->pluck('name', 'id');

        return view('index',compact(['blogs','categories']));
    }

    public function show(Blog $blog){
        $category = $blog->category;
        return view('show',compact(['blog', 'category']));
    }

    public function create(){
        $categories = Category::where('user_id',auth()->id())->get()->pluck('name','id');

        return view('create', compact('categories'));
    }

    public function store(Request $request){
        $attributes = $request->validate([
            'title' => 'required',
            'detail' => 'required',
            // 'user_id' => 'exists:App\Model\User, id',
            'category_id' => 'required'
        ]);

        Blog::create($attributes + [
            'user_id' => auth()->id()
        ]);

        return redirect()->route('index');
    }

    public function edit(Blog $blog){
        $categories = Category::get()->pluck('name','id');

        return view('edit',[
            'categories'=>$categories,
            'blog'=>$blog
        ]);
    }
    public function update(Blog $blog,Request $request){
        $attributes=$request->validate([
            'title'=>'required',
            'detail'=>'required',
            'category_id'=>'required'
        ]);

        $blog->update($attributes + [
            'user_id'=>auth()->id()
        ]);
        return redirect()->route('index');
    }    

    public function destroy(Blog $blog){
        $blog->delete();

        return redirect()->route('index');
    }

    // protected function getBLogs(){
    //     $blogs=Blog::latest();

    //     // // dd(request('search'));
    //     // if(request('search')){
    //     //     //query where()
    //     //     $blogs = $blogs->where('title', 'LIKE', '%'.request('search').'%')
    //     //                     ->orWhere('detail', 'LIKE', '%'.request('search').'%');
    //     // }

        // $blogs->when(request('search'), function($query, $search){
        //     $query->where('title', 'LIKE', '%'.$search.'%')
        //         ->orWhere('detail', 'LIKE', '%'.$search.'%');
        // });

    //     return $blogs;
    // }
}

// user can create many categories
// category -> user 