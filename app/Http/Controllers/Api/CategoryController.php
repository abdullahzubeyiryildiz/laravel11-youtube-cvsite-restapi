<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UploadImageService;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id','desc')->paginate(20);
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        return $this->saveTag($request);
    }

    public function update(Request $request, $id)
    {
        return $this->saveTag($request, $id);
    }


    private function saveTag(Request $request, $id=null)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
        ],
        [
            'name.required'=>'Kategori Boş Geçilemez',
        ]);


        $categoryData = [
            'name' => $validatedData['name'],
            'status' => $request->status ?? 1
        ];

        $category = !empty($id) ? Category::find($id) : Category::create($categoryData);

        if(empty($category)) {
            return response()->json(['message' => 'Kategori Bulunamadı!'], 404);
        }

        if($request->hasFile('file')) {
            $uploadedImages =  $this->saveImageUpload($request, $category);
            $category->image = $uploadedImages[0]['path'];
        }
        $category->slug = null;
        $category->update($categoryData);

        return response()->json(['message' => !empty($id) ? 'Başarıyla Kategori Güncellendi.' : 'Başarıyla Kategori Oluşturuldu.', 'data'=> $category], 200);
    }

    private function saveImageUpload($request, $data) {

            $images = $request->file('file');

            $uploadImageService = new UploadImageService();

            $uploadImageService->createFolder('uploads/category');
            $uploadImageService->deleteFile($data->image);

            $uploadedImages = $uploadImageService->uploadMultipleImages($images,'category');

            return $uploadedImages;

    }
}
