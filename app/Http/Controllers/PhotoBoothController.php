<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoBoothController extends Controller
{
    //
    public function index()
    {
        return view('photobooth.index');
    }

    public function upload(Request $request)
    
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:10248',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->store('photos', 'public');

            return response()->json(['path' => $path], 200);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }

}
