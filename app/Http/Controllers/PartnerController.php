<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Utilities\ImageUploader;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::simplePaginate(15);

        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.add');
    }

    public function show(Partner $partner)
    {
        return view('admin.partners.view', compact('partner'));
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,webp',
        ]);

        $imagePath = ImageUploader::upload($request->file('logo'), 'partners');
        Partner::create([
            'name' => $request->name,
            'logo' => $imagePath,
        ]);

        return redirect()->route('partner.index')->with('success', 'Partner added successfully');
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp',
        ]);

        $imagePath = $partner->logo;
        if ($request->hasFile('logo')) {
            $imagePath = ImageUploader::upload($request->file('logo'), 'partners');
        }

        $partner->update([
            'name' => $request->name,
            'logo' => $imagePath,
        ]);

        return redirect()->route('partner.index')->with('success', 'Partner updated successfully');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->route('partner.index')->with('success', 'Partner deleted successfully');
    }
}
