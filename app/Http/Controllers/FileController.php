<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    function index() {

    }

    function upload(Request $request) {
        $image_path = '';
        if ($request->hasFile('imageUrl')) {
            $image_path = $request->file('imageUrl')->store('image', 'public');
        }

        return $image_path;



        // return response()->json(['success' => 'You have successfully upload image.']);

    }

    function remove(Request $request) {}
}
