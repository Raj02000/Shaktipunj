<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use Illuminate\Http\Request;

class BannerImageController extends Controller
{
    public function index()
    {
        $bannerImages = HomeBanner::simplePaginate(15);

        return view('admin.banner-image.index', compact('bannerImages'));
    }

    public function show(HomeBanner $bannerImage)
    {
        return view('admin.banner-image.view', compact('bannerImage'));
    }

    public function create()
    {
        return view('admin.banner-image.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            // 'sub_title' => 'required',
            'title' => 'required',
            'description' => 'required',
            'redirect_url' => 'required',
            'button_label' => 'required',
        ]);

        $imagePath = 'storage/'.$request->file('image')->store('images/banner', 'public');
        HomeBanner::create([
            'image' => $imagePath,
            'sub_title' => $request->title,
            'title' => $request->title,
            'description' => $request->description,
            'extra' => [
                'redirect_url' => $request->redirect_url,
                'button_label' => $request->button_label,
            ],
        ]);

        return redirect()->route('banner-image.index')->with('success', 'Banner created successfully');
    }

    public function edit(HomeBanner $bannerImage)
    {
        return view('admin.banner-image.edit', compact('bannerImage'));
    }

    public function update(Request $request, HomeBanner $bannerImage)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'title' => 'required',
            'description' => 'required',
            'redirect_url' => 'required',
            'button_label' => 'required',
        ]);

        $imagePath = $bannerImage->image;
        if ($request->hasFile('image')) {
            $imagePath = 'storage/'.$request->file('image')->store('images/banner', 'public');
        }
        $bannerImage->update([
            'image' => $imagePath,
            'sub_title' => $request->sub_title,
            'title' => $request->title,
            'description' => $request->description,
            'extra' => [
                'redirect_url' => $request->redirect_url,
                'button_label' => $request->button_label,
            ],
        ]);

        return redirect()->route('banner-image.index')->with('success', 'Banner updated successfully');
    }

    public function destroy(HomeBanner $bannerImage)
    {
        $bannerImage->delete();

        return redirect()->route('banner-image.index')->with('success', 'Banner deleted successfully');
    }
}
