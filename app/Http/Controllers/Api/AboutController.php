<?php

namespace App\Http\Controllers\Api;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UploadImageService;
class AboutController extends Controller
{
    public function index()
    {
        return About::firstOrFail();
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $content = About::first();

        if($request->hasFile('file')) {
            $images = $request->file('file');

            $uploadImageService = new UploadImageService();


            $uploadImageService->createFolder('uploads');
            $uploadImageService->deleteFile($content->image);


            $uploadedImages = $uploadImageService->uploadMultipleImages($images,'about');

            $request->merge(['image' => $uploadedImages[0]['path']]);


        }

        $content->update($request->only('title','image','content'));


        return response()->json(['message' => 'Başarıyla Güncellendi.', 'data'=>$content], 200);
    }
}
