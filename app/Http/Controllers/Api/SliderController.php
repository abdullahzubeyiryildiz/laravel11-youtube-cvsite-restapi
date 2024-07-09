<?php

namespace App\Http\Controllers\Api;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UploadImageService;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('id','desc')->paginate(20);
        return response()->json($sliders);
    }

    public function edit($id)
    {
        $slider = Slider::where('id',$id)->first();
        return response()->json($slider);
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
            'title' => 'required|string',
        ],
        [
            'title.required'=>'Başlık Boş Geçilemez',
        ]);


        $sliderData = [
            'title' => $validatedData['title'],
            'content'=>$request->content,
            'status' => $request->status ?? 1
        ];

        $slider = !empty($id) ? Slider::find($id) : Slider::create($sliderData);

        if(empty($slider)) {
            return response()->json(['message' => 'Slider Bulunamadı!'], 404);
        }

        if($request->hasFile('file')) {
            $uploadedImages =  $this->saveImageUpload($request, $slider);
            $slider->image = $uploadedImages[0]['path'];
        }

        $slider->update($sliderData);

        return response()->json(['message' => !empty($id) ? 'Başarıyla Slider Güncellendi.' : 'Başarıyla Slider Oluşturuldu.', 'data'=> $slider], 200);
    }

    private function saveImageUpload($request, $data) {

            $images = $request->file('file');

            $uploadImageService = new UploadImageService();

            $uploadImageService->createFolder('uploads/slider');
            $uploadImageService->deleteFile($data->image);

            $uploadedImages = $uploadImageService->uploadMultipleImages($images,'slider');

            return $uploadedImages;

    }
}
