<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Utilities\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    public function index()
    {
        $query = Destination::with('parent');

        if (request()->has('search')) {
            $query->where('name', 'like', '%' . request('search') . '%');
        }

        $destinations = $query->latest()->simplePaginate(15);

        return view('admin.destination.index', compact('destinations'));
    }

    public function create()
    {
        $destinations = Destination::select(['id', 'name', 'slug'])->get();

        return view('admin.destination.add', compact('destinations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'thumbnail' => 'required|mimes:png,jpg,jpeg,webp',
            'parent' => 'sometimes',
        ]);
        $image = ImageUploader::upload($request->file('image'), 'destinations');
        $thumbnail = ImageUploader::upload($request->file('thumbnail'), 'destinations');

        Destination::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'image' => $thumbnail,
            'parent_id' => $request->parent ?? null,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        return redirect()->route('destination.index')->withSuccess('The destination has been added!');
    }

    public function show(Destination $destination)
    {
        return view('admin.destination.view', compact('destination'));
    }

    public function changePublish($id)
    {
        $destination = Destination::find($id);
        $destination->publish = ! $destination->publish;
        $destination->save();

        return redirect(route('destination.index'));
    }

    public function edit(Destination $destination)
    {
        $destinations = Destination::select(['id', 'name', 'slug'])->get();

        return view('admin.destination.edit', compact('destination', 'destinations'));
    }

    public function update(Request $request, Destination $destination)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable',
            'image' => 'mimes:png,jpg,jpeg,webp',
            'thumbnail' => 'mimes:png,jpg,jpeg,webp',
            'parent' => 'sometimes',
        ]);

        $image = $destination->image;
        $thumbnail = $destination->thumbnail;

        if ($request->hasFile('image')) {
            try {
                $image = ImageUploader::upload($request->file('image'), 'destinations');
                Storage::delete($destination->image);
            } catch (\Exception $e) {
            }
        }
        if ($request->hasFile('thumbnail')) {
            try {
                $thumbnail = ImageUploader::upload($request->file('thumbnail'), 'destinations');
                if (isset($destination->thumbnail))
                    Storage::delete($destination->thumbnail);
            } catch (\Exception $e) {
            }
        }
        $destination->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'thumbnail' => $thumbnail,
            'parent_id' => $request->parent,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        return redirect()->route('destination.index')->withSuccess('The destination has been updated!');
    }

    public function destroy(Destination $destination)
    {
        Storage::delete($destination->image);
        $destination->delete();

        return redirect()->route('destination.index')->withSuccess('The destination has been deleted');
    }
}
