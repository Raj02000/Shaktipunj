<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Package;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::simplePaginate(15);

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')->withSuccess('The categoryCategory has been added!');
    }

    public function show(Category $category)
    {
        $category->load('packages');
        $associatedPackageIds = $category->packages->pluck('id');
        $packages = Package::whereNotIn('id', $associatedPackageIds)->simplePaginate(15);

        return view('admin.category.view', compact('category', 'packages'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
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

        $category->update($data);

        return redirect()->route('category.index')->withSuccess('The category has been updated!');
    }

    public function destroy(Category $category)
    {
        if(!$category->is_editable){
            return redirect()->route('category.index')->withErrors('This category is not deletable');
        }

        $category->delete();

        return redirect()->route('category.index')->withSuccess('The category has been deleted');
    }

    public function userCategoryDetails($slug)
    {
        $category = Category::where('slug', $slug)->first();

        return view('category-details', compact('category'));
    }

    public function changePublish($id)
    {
        $category = Category::find($id);
        $category->publish = ! $category->publish;
        $category->save();

        return redirect(route('category.index'));
    }

    public function assignPackage(Request $request, Category $category)
    {
        $request->validate([
            'package_id' => 'required',
        ]);
        $category->packages()->attach($request->package_id);

        return redirect()->route('category.show', $category->id);
    }

    public function detachPackage(Request $request, Category $category)
    {
        $request->validate([
            'package_id' => 'required',
        ]);

        $category->packages()->detach($request->package_id);

        return redirect()->route('category.show', $category->id);
    }
}
