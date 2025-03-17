<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Organization;
use App\Models\OurAchievements;
use App\Utilities\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminHomePageController extends Controller
{
    public function achievements()
    {
        return view('admin.achievements.index', [
            'achievements' => OurAchievements::paginate(),
        ]);
    }

    public function achievementsEdit(OurAchievements $achievement)
    {
        return view('admin.achievements.edit', [
            'achievement' => $achievement,
        ]);
    }

    public function achievementsUpdate(Request $request, OurAchievements $achievement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'required|numeric',
            'postfix' => 'sometimes',
        ]);

        $achievement->update([
            'title' => $request->title,
            'value' => $request->value,
            'postfix' => $request->postfix,
        ]);

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement updated successfully');
    }

    public function about()
    {
        $abouts = About::paginate(15);

        return view('admin.about.index', compact('abouts'));
    }

    public function aboutEdit(About $about)
    {
        return view('admin.about.edit', [
            'about' => $about,
        ]);
    }

    public function aboutUpdate(Request $request, About $about)
    {
        $request->validate([
            'image' => 'sometimes|mimes:png,jpg,jpeg,webp',
            'content' => 'required',
        ]);

        $imagePath = $about->image;
        if ($request->hasFile('image')) {
            $about->image ? Storage::delete($about->image) : null;
            $imagePath = ImageUploader::upload($request->file('image'), 'about');
        }

        $about->update([
            'image' => $imagePath,
            'content' => $request->content,
        ]);

        return redirect()->route('about.index')->with('success', 'About page updated successfully');
    }

    public function organization()
    {
        $organization = Organization::first();

        return view('admin.organization.index', compact('organization'));
    }

    public function organizationEdit(Organization $organization)
    {
        return view('admin.organization.edit', [
            'organization' => $organization,
        ]);
    }

    public function organizationUpdate(Request $request, Organization $organization)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'sometimes',
            'phone' => 'required',
            'alt_phone' => 'nullable',
            'whatsapp_phone' => 'required',
            'email' => 'required',
            'facebook' => 'nullable|url',
            'linkedIn' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'pinterest' => 'nullable|url',
            'license_no' => 'nullable',
            'map' => 'nullable',
        ]);

        $extra = $organization->extra;
        $extra['map'] = $request->map;

        $organization->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'alt_phone' => $request->alt_phone,
            'whatsapp_phone' => $request->whatsapp_phone,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'linkedIn' => $request->linkedIn,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'pinterest' => $request->pinterest,
            'youtube' => $request->youtube,
            'license_no' => $request->license_no,
            'extra' => $extra,
        ]);

        return redirect()->route('organization.index')->with('success', 'Organization updated successfully');
    }
}
