<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::simplePaginate(15);

        return view('admin.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tag.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Tag::create([
            'name' => $request->name,
        ]);

        return redirect()->route('tag.index')->withSuccess('The tagTag has been added!');
    }

    public function show(Tag $tag)
    {
        return view('admin.tag.view', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $data = [
            'name' => $request->name,
            'location' => $request->location,
            'duration' => $request->duration,
            'price' => $request->price,
            'overview' => $request->overview,
            'what_we_expect' => $request->what_we_expect,
            'useful_info' => $request->useful_info,
        ];

        $tag->update($data);

        return redirect()->route('tag.index')->withSuccess('The tag has been updated!');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tag.index')->withSuccess('The tag has been deleted');
    }

    public function userTagDetails($slug)
    {
        $tag = Tag::where('slug', $slug)->first();

        return view('tag-details', compact('tag'));
    }

    public function changePublish($id)
    {
        $tag = Tag::find($id);
        $tag->publish = ! $tag->publish;
        $tag->save();

        return redirect(route('tag.index'));
    }
}
