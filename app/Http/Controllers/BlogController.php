<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogFormRequest $request)
    {
        Blog::create([
            'title' => $request->title,
            'body' => $request->body,
            'date' => $request->date,
            'author_id' => Auth::user()->id
        ]);
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
                'blog' => $blog
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogFormRequest $request, $id)
    {
        Blog::find($id)->update([
            'title' => $request->title,
            'body' => $request->body,
            'date' => $request->date
        ]);
        return redirect(route('blog.show', ['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if($blog->user->id != Auth::user()->id) {
            return view('unauthorized.index');
        } else {
            Blog::destroy($id);
            if(redirect()->back() === route('dashboard')) {
                return redirect()->back();
            }
            return redirect(route('home'));
        }
    }
}
