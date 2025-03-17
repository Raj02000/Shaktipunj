<?php

namespace App\Http\Controllers;

use App\Enums\PageModelEnum;
use App\Enums\PageType;
use App\Models\Page;
use App\Utilities\ImageUploader;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public string $storagePath = 'page';

    public function index()
    {
        $model = PageModelEnum::TRAVEL_INFO;

        $query = Page::query();

        if (request()->has('model') && request('model') == PageModelEnum::COMPANY_INFO->value) {
            $model = PageModelEnum::COMPANY_INFO;
        }
        $query->where('model', $model)->orderBy('display_order');

        $pages = $query->simplePaginate(100);

        return view('admin.pages.index', compact('pages', 'model'));
    }

    public function show(Page $page)
    {
        return view('admin.pages.view', compact('page'));
    }

    public function create()
    {
        $model = PageModelEnum::TRAVEL_INFO;

        if (request()->has('model')) {
            $model = PageModelEnum::from(request('model'));
        }

        return view('admin.pages.add', compact('model'));
    }

    public function createGallery()
    {

        $model = PageModelEnum::TRAVEL_INFO;

        if (request()->has('model')) {
            $model = PageModelEnum::from(request('model'));
        }

        return view('admin.pages.add-gallery', compact('model'));
    }

    public function edit(Page $page)
    {
        if ($page->slug == 'our-teams') {
            return view('admin.pages.edit-team', compact('page'));
        }

        $model = PageModelEnum::TRAVEL_INFO;

        if (request()->has('model')) {
            $model = PageModelEnum::from(request('model'));
        }

        if ($page->type == PageType::GALLERY) {
            return view('admin.pages.edit-gallery', compact('page', 'model'));
        }

        return view('admin.pages.edit', compact('page', 'model'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp',
            'title' => 'required|string|max:255|unique:pages,title',
            'content' => 'required',
            'model' => 'required|string|max:255',
        ]);

        $image = ImageUploader::upload($request->file('image'), $this->storagePath);

        $maxDisplayOrder = Page::where('model', $request->model)->max('display_order') ?? 0;
        Page::create([
            'image' => $image,
            'title' => $request->title,
            'model' => $request->model,
            'content' => $request->content,
            'display_order' => $maxDisplayOrder + 1,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        return redirect()->route('page.index', ['model' => $request->model])->with('success', 'Page added successfully');
    }

    public function storeGallery(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:pages,title',
            'model' => 'required|string|max:255',
            'image_title.*' => 'required|string|max:255',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,webp',
        ], [
            'image_title.*.required' => 'Image title is required',
            'image_title.*.max' => 'Image title should not exceed 255 characters',
            'image.*.required' => 'Image is required',
            'image.*.image' => 'Image should be an image',
            'image.*.mimes' => 'Image should be of type jpeg, png, jpg, or webp',
        ]);

        // Check if images and titles are present and match in count
        if (empty($request->image_title) || empty($request->image)) {
            return redirect()->back()->with('error', 'Please add at least one image with a title');
        }

        if (count($request->image_title) !== count($request->image)) {
            return redirect()->back()->with('error', 'Each image must have a corresponding title');
        }

        // Build the content array
        $content = [];
        foreach ($request->image_title as $key => $title) {
            if (isset($request->image[$key])) {
                $imagePath = ImageUploader::upload($request->file('image')[$key], $this->storagePath);
                $content[] = [
                    'image' => $imagePath,
                    'title' => $title,
                ];
            }
        }

        $maxDisplayOrder = Page::where('model', $request->model)->max('display_order');
        $maxDisplayOrder = $maxDisplayOrder  ?? 0;



        // Create the gallery page
        Page::create([
            'title' => $request->title,
            'model' => $request->model,
            'content' => $content,
            'display_order' => $maxDisplayOrder + 1,
            'type' => PageType::GALLERY,
            'meta_title' => $request->meta_title ?? null,
            'meta_description' => $request->meta_description ?? null,
            'meta_keywords' => $request->meta_keywords ?? null,
        ]);

        return redirect()->route('page.index', ['model' => $request->model])
            ->with('success', 'Page added successfully');
    }

    public function updateGallery(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:pages,title,' . $page->id,
            'image_title.*' => 'required|string|max:255',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,webp',
        ], [
            'image_title.*.required' => 'Image title is required',
            'image_title.*.max' => 'Image title should not exceed 255 characters',
            'image.*.image' => 'Image should be an image',
            'image.*.mimes' => 'Image should be of type jpeg, png, jpg, or webp',
        ]);

        // Decode the existing content from the page
        $existingContent = $page->content ?? [];
        $updatedContent = [];

        foreach ($request->image_title as $key => $title) {
            $imagePath = null;

            // Check if an image is provided for this title
            if ($request->hasFile("image.$key")) {
                $imagePath = ImageUploader::upload($request->file("image.$key"), $this->storagePath);
            } elseif (isset($existingContent[$key]['image'])) {
                // Retain the existing image if no new image is uploaded
                $imagePath = $existingContent[$key]['image'];
            }

            $updatedContent[] = [
                'image' => $imagePath,
                'title' => $title,
            ];
        }

        // Update the page with the new content
        $page->update([
            'title' => $request->title,
            'content' => $updatedContent,
            'meta_title' => $request->meta_title ?? $page->meta_title,
            'meta_description' => $request->meta_description ?? $page->meta_description,
            'meta_keywords' => $request->meta_keywords ?? $page->meta_keywords,
        ]);

        return redirect()->route('page.index', ['model' => $request->model])
            ->with('success', 'Gallery updated successfully');
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'title' => 'required|string|max:255',
            'content' => 'required',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ];

        if ($request->hasFile('image')) {
            $image = ImageUploader::upload($request->file('image'), $this->storagePath);
            $data['image'] = $image;
        }

        $page->update($data);

        return redirect()->route('page.index', ['model' => $request->model])->with('success', 'Page updated successfully');
    }

    public function destroy(Page $page)
    {
        $model = PageModelEnum::TRAVEL_INFO;

        if (request()->has('model')) {
            $model = PageModelEnum::from(request('model'));
        }
        if($page->slug== 'our-teams'){
            return redirect()->back()->withErrors('This page is not deletable');
        }

        $page->delete();

        return redirect()->route('page.index', ['model' => $model])->with('success', 'Page deleted successfully');
    }

    public function changeDisplayOrder(Request $request, $model)
    {
        foreach ($request->toArray() as $key => $value) {
            if ($key == '_token') {
                continue;
            }
            $page = Page::find($key);
            $page->update(['display_order' => $value]);
        }

        return redirect()->route('page.index', ['model' => $model])->with('success', 'Display Order Changed successfully');
    }

    public function editTeams(Request $request, Page $page)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Decode the existing content from the page
        $existingContent = $page->content ?? [];
        $updatedContent = [];

        foreach ($request->title as $key => $title) {
            $imagePath = null;

            // Check if an image is provided for this title
            if ($request->hasFile("image.$key")) {
                $imagePath = ImageUploader::upload($request->file("image.$key"), $this->storagePath);
            } elseif (isset($existingContent[$key]['image'])) {
                // Retain the existing image if no new image is uploaded
                $imagePath = $existingContent[$key]['image'];
            }

            $updatedContent[] = [
                'image' => $imagePath,
                'title' => $title,
                'position' => $request->position[$key],
                'description' => $request->description[$key],
            ];
        }

        // Update the page with the new content
        $page->update([
            'title' => $request->name,
            'content' => $updatedContent,
            'meta_title' => $request->meta_title ?? $page->meta_title,
            'meta_description' => $request->meta_description ?? $page->meta_description,
            'meta_keywords' => $request->meta_keywords ?? $page->meta_keywords,
        ]);

        return redirect()->route('page.index', ['model' => 'company_info'])
            ->with('success', 'Page updated successfully');
    }
}
