<?php

namespace App\Http\Controllers;

use App\Models\OurService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OurServiceController extends Controller
{
    public function index()
    {
        $ourServices = OurService::simplePaginate(15);

        return view('admin.ourServices.index', compact('ourServices'));
    }

    public function show(OurService $ourService)
    {

        return view('admin.ourServices.view', compact('ourService'));
    }

    public function create()
    {
        return view('admin.ourServices.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|integer',
        ]);
        $imagePath = 'storage/'.$request->file('icon')->store('public');

        OurService::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->route('our-services.index')->with('success', 'Service added successfully');
    }

    public function edit(OurService $ourService)
    {
        // dd($ourService);
        return view('admin.ourServices.add', compact('ourService'));
    }

    public function update(Request $request, OurService $ourService)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|integer',
        ]);

        $imagePath = $ourService->icon;
        if ($request->hasFile('icon')) {
            $imagePath = 'storage/'.$request->file('icon')->store('public');
            Storage::delete($ourService->icon);
        }

        $ourService->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->route('our-services.index')->with('success', 'Service updated successfully');
    }

    public function destroy(OurService $ourService)
    {
        $ourService->delete();

        return redirect()->route('our-services.index')->with('success', 'Service deleted successfully');
    }
}
