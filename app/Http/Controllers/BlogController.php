<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogFormRequest;
use App\Models\Category;
use App\Models\CategoryBlog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome', [
            'blogs' => Blog::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogFormRequest $request)
    {
        $blog = Blog::create([
            'title' => ($request->title),
            'body' => ($request->body),
            'date' => $request->date,
            'author_id' => Auth::user()->id
        ]);

        if(isset($request->categories)){
            foreach ($request->categories as $categoryId) {
                CategoryBlog::create([
                    'blog_id' => $blog->id,
                    'category_id' => $categoryId
                ]);
            }
        }
        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('blogs.show', [
            'blog' => Blog::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        if($blog->user->id != Auth::user()->id) {
            return view('unauthorized.index');
        } else {
            return view('blogs.edit', [
                'blog' => $blog,
                'categories' => Category::get(),
                'registered' => CategoryBlog::where('blog_id', $id)->get()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogFormRequest $request, $id)
    {
        Blog::findOrFail($id)->update([
            'title' => ($request->title),
            'body' => ($request->body),
            'date' => $request->date
        ]);
        CategoryBlog::where('blog_id', $id)->delete();

        if(isset($request->categories)){
            foreach ($request->categories as $categoryId) {
                CategoryBlog::create([
                    'blog_id' => $id,
                    'category_id' => $categoryId
                ]);
            }
        }

        return redirect(route('blog.show', ['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id, $before)
    {
        $blog = Blog::findOrFail($id);
        if($blog->user->id != Auth::user()->id) {
            return view('unauthorized.index');
        } else {
            Blog::destroy($id);
            if(url()->previous() == route('dashboard') || $before == 'dashboard') {
                return redirect(route('dashboard'));
            }
            return redirect(route('home'));
        }
    }
}
