<?php

namespace App\Http\Controllers;

use App\Models\QuickLink;
use App\Http\Requests\StoreQuickLinkRequest;
use App\Http\Requests\UpdateQuickLinkRequest;
use Illuminate\Http\Request;

class QuickLinkController extends Controller
{
    public function index()
    {
        $quickLinks = QuickLink::orderBy('order','asc')->simplePaginate(15);

        return view('admin.quick-links.index', compact('quickLinks'));
    }

    public function create()
    {
        return view('admin.quick-links.add');
    }

    public function show(QuickLink $link)
    {
        return view('admin.quick-links.view', compact('link'));
    }

    public function edit(QuickLink $link)
    {
        return view('admin.quick-links.edit', compact('link'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'order' => 'integer|nullable'
        ]);

        QuickLink::create([
            'name' => $request->name,
            'url' => $request->url,
            'order' => $request->order,
        ]);

        return redirect()->route('quick-link.index')->with('success', 'QuickLink added successfully');
    }

    public function update(Request $request, QuickLink $link)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'order' => 'integer|nullable'
        ]);

        $link->update([
            'name' => $request->name,
            'url' => $request->url,
            'order' => $request->order,
        ]);

        return redirect()->route('quick-link.index')->with('success', 'QuickLink updated successfully');
    }

    public function destroy(QuickLink $link)
    {
        $link->delete();

        return redirect()->route('quick-link.index')->with('success', 'QuickLink deleted successfully');
    }
}
