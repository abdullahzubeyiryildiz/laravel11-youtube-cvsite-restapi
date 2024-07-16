<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;
use App\Services\UploadImageService;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category')->orderBy('id','desc')->paginate(20);
        return response()->json($blogs);
    }

    public function edit($id)
    {

        $blog = Blog::where('id',$id)->with('category')->first();

        return response()->json($blog);
    }

    public function read($id) {

        $blog =  Blog::where('id',$id)->with('category')->first();

        $expiresAt = now()->addMinutes(5);

        views($blog)
        ->cooldown($expiresAt)
        ->record();

        return response()->json($blog);
    }


    public function store(BlogRequest $request)
    {
        return $this->saveTag($request);
    }

    public function update(BlogRequest $request, $id)
    {
        return $this->saveTag($request, $id);
    }


    private function saveTag($request, $id=null)
    {
        /*$validatedData = $request->validate([
            'name' => 'required|string',
        ],
        [
            'name.required'=>'Kategori Boş Geçilemez',
        ]); */


        $blogData = [
            'name' => $request->name,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'status' => $request->status ?? 1
        ];

        $blog = !empty($id) ? Blog::find($id) : Blog::create($blogData);

        if(empty($blog)) {
            return response()->json(['message' => 'Blog Bulunamadı!'], 404);
        }

        if($request->hasFile('file')) {
            $uploadedImages =  $this->saveImageUpload($request, $blog);
            $blog->image = $uploadedImages[0]['path'];
        }
        $blog->slug = null;
        $blog->update($blogData);

        return response()->json(['message' => !empty($id) ? 'Başarıyla Blog Güncellendi.' : 'Başarıyla Blog Oluşturuldu.', 'data'=> $blog], 200);
    }

    private function saveImageUpload($request, $data) {

            $images = $request->file('file');

            $uploadImageService = new UploadImageService();

            $uploadImageService->createFolder('uploads/blog');
            $uploadImageService->deleteFile($data->image);

            $uploadedImages = $uploadImageService->uploadMultipleImages($images,'blog');

            return $uploadedImages;

    }
}
