<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Career;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UploadImageService;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::all();
        return response()->json($careers);
    }

    public function store(Request $request)
    {
        return $this->saveCareer($request);
    }

    public function update(Request $request, $id)
    {
        return $this->saveCareer($request, $id);
    }


    private function saveCareer(Request $request, $id=null)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'company' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string'
        ],
        [
            'title.required'=>'Başlık Boş Geçilemez',
            'company.required'=>'Şirket Adı Boş Geçilemez'
        ]);

        $startDate = Carbon::parse($validatedData['start_date'])->format('Y-m-d');
        $endDate = isset($validatedData['end_date']) ? Carbon::parse($validatedData['end_date'])->format('Y-m-d') : null;

        $careerData = [
            'title' => $validatedData['title'],
            'company' => $validatedData['company'],
            'start_date' => $startDate,
            'end_date' => $endDate,
            'description' => $validatedData['description'],
            'status' => $request->status ?? !empty($endDate) ? 0 : 1
        ];

        $career = !empty($id) ? Career::find($id) : Career::create($careerData);

        if(empty($career)) {
            return response()->json(['message' => 'Kariyer Bulunamadı!'], 404);
        }

        if($request->hasFile('file')) {
            $uploadedImages =  $this->saveImageUpload($request, $career);
            $career->image = $uploadedImages[0]['path'];
        }

        $career->update($careerData);

        return response()->json(['message' => !empty($id) ? 'Başarıyla Kariyer Güncellendi.' : 'Başarıyla Kariyer Oluşturuldu.', 'data'=> $career], 200);
    }

    private function saveImageUpload($request, $data) {

            $images = $request->file('file');

            $uploadImageService = new UploadImageService();

            $uploadImageService->createFolder('uploads/kariyer');
            $uploadImageService->deleteFile($data->image);

            $uploadedImages = $uploadImageService->uploadMultipleImages($images,'kariyer');

            return $uploadedImages;

    }
}
