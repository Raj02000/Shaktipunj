<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // $imageName = time() . '.' . $request->file('upload')->getClientOriginalExtension();
        $imageName = $request->file('upload')->getClientOriginalName();
        $path = 'storage/'.$request->file('upload')->storeAs('media', $imageName, 'public');

        $url = asset('storage/media/'.$imageName);

        return response()->json([
            'fileName' => $imageName,
            'uploaded' => 1,
            'url' => $url,
        ]);
    }
}
