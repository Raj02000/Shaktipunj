<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::simplePaginate(15);

        return view('admin.services.index', compact('services'));
    }

    public function show(Service $service)
    {
        return view('admin.services.view', compact('service'));
    }

    public function create()
    {
        return view('admin.services.add');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:200',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $imagePath = 'storage/'.$request->file('thumbnail')->storeAs('image/services', $request->file('thumbnail')->getClientOriginalName(), 'public');
        Service::create([
            'title' => $request->title,
            'icon' => $request->icon,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'image' => $imagePath,
        ]);

        return redirect()->route('services.index')->with('success', 'Services added successfully');
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:200',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);
        $imagePath = $service->image;
        if ($request->hasFile('image')) {
            Storage::delete($service->image);
            $imagePath = 'storage/'.$request->file('image')->storeAs('image/services', $request->file('image')->getClientOriginalName(), 'public');
        }

        $service->update([
            'title' => $request->title,
            'icon' => $request->icon,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'image' => $imagePath,
        ]);

        return redirect()->route('services.index')->with('success', 'Services updated successfully');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')->withSuccess('Service has been deleted!');
    }
}
