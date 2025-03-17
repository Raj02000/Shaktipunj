<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Destination;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::simplePaginate(15);

        return view('admin.blogs.index', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        return view('admin.blogs.view', compact('blog'));
    }

    public function create()
    {
        $destination = Destination::all();
        $tags = Tag::all();

        return view('admin.blogs.add', compact('destination', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tag_id' => 'required|exists:tags,id',
        ]);

        $imagePath = 'storage/'.$request->file('image')->storeAs('images/blogs', $request->file('image')->getClientOriginalName(), 'public');
        Blog::create([
            'image' => str_replace('public/', '', $imagePath),
            'title' => $request->title,
            'content' => $request->description,
            'tag_id' => $request->tag_id,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        return redirect()->route('blog.index')->with('success', 'Blog added successfully');
    }

    public function edit(Blog $blog)
    {
        $destination = Destination::all();
        $tags = Tag::all();

        return view('admin.blogs.add', compact('blog', 'destination', 'tags'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tag_id' => 'required|exists:tags,id',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = 'storage/'.$request->file('image')->storeAs('images/blogs', $request->file('image')->getClientOriginalName(), 'public');

            if ($blog->image) {
                Storage::delete('public/'.$blog->image);
            }
            $blog->update([
                'title' => $request['title'],
                'content' => $request['description'],
                'image' => $imagePath,
                'tag_id' => $request->tag_id,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
            ]);
        } else {

            $blog->update([
                'title' => $request->title,
                'content' => $request->description,
                'short_description' => $request->short_description,
                'tag_id' => $request->tag_id,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
            ]);
        }

        return redirect()->route('blog.index')->with('success', 'Blog updated successfully');
    }

    public function delete(Blog $blog)
    {
        if ($blog->image) {
            Storage::delete('public/'.$blog->image);
        }
        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog deleted successfully');
    }
}
