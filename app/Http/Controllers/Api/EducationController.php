<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UploadImageService;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::all();
        return response()->json($educations);
    }

    public function store(Request $request)
    {
        return $this->saveEducation($request);
    }

    public function update(Request $request, $id)
    {
        return $this->saveEducation($request, $id);
    }


    private function saveEducation(Request $request, $id=null)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'education_title' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string'
        ],
        [
            'title.required'=>'Başlık Boş Geçilemez',
            'education_title.required'=>'Okul Adı Boş Geçilemez'
        ]);

        $startDate = Carbon::parse($validatedData['start_date'])->format('Y-m-d');
        $endDate = isset($validatedData['end_date']) ? Carbon::parse($validatedData['end_date'])->format('Y-m-d') : null;

        $educationData = [
            'title' => $validatedData['title'],
            'education_title' => $validatedData['education_title'],
            'start_date' => $startDate,
            'end_date' => $endDate,
            'description' => $validatedData['description'],
            'status' => $request->status ?? !empty($endDate) ? 0 : 1
        ];

        $education = !empty($id) ? Education::find($id) : Education::create($educationData);

        if(empty($education)) {
            return response()->json(['message' => 'Okul Bulunamadı!'], 404);
        }

        if($request->hasFile('file')) {
            $uploadedImages =  $this->saveImageUpload($request, $education);
            $education->image = $uploadedImages[0]['path'];
        }

        $education->update($educationData);

        return response()->json(['message' => !empty($id) ? 'Başarıyla Okul Güncellendi.' : 'Başarıyla Okul Oluşturuldu.', 'data'=> $education], 200);
    }

    private function saveImageUpload($request, $data) {

            $images = $request->file('file');

            $uploadImageService = new UploadImageService();

            $uploadImageService->createFolder('uploads/education');
            $uploadImageService->deleteFile($data->image);

            $uploadedImages = $uploadImageService->uploadMultipleImages($images,'education');

            return $uploadedImages;

    }
}
