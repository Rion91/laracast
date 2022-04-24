<?php

namespace App\Http\Middleware;

use App\Models\Blog;
use Closure;
use Illuminate\Http\Request;

class RoleModel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // dd(request('blog')->id); 1
        $blog_id = request('blog')->id;
        $authId = Blog::find($blog_id)->user_id;
        // dd($authId);
        // dd($authId);
        if(auth()->id() == $authId){
            return $next($request);
        }else{
            return redirect()->route('index');
        }
    }
}
