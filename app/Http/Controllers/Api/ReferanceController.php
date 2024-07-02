<?php

namespace App\Http\Controllers\Api;

use App\Models\Referance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UploadImageService;

class ReferanceController extends Controller
{
    public function index()
    {
        $referances = Referance::orderBy('id','desc')->paginate(20);
        return response()->json($referances);
    }

    public function edit($id)
    {
        $referance = Referance::where('id',$id)->first();
        return response()->json($referance);
    }


    public function store(Request $request)
    {
        return $this->saveReferance($request);
    }

    public function update(Request $request, $id)
    {
        return $this->saveReferance($request, $id);
    }


    private function saveReferance(Request $request, $id=null)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
        ],
        [
            'name.required'=>'Referans Boş Geçilemez',
        ]);


        $referanceData = [
            'name' => $validatedData['name'],
            'link'=>$request->link ?? '#',
            'status' => $request->status ?? 1
        ];

        $referance = !empty($id) ? Referance::find($id) : Referance::create($referanceData);

        if(empty($referance)) {
            return response()->json(['message' => 'Referans Bulunamadı!'], 404);
        }

        if($request->hasFile('file')) {
            $uploadedImages =  $this->saveImageUpload($request, $referance);
            $referance->image = $uploadedImages[0]['path'];
        }
        $referance->update($referanceData);

        return response()->json(['message' => !empty($id) ? 'Başarıyla Referans Güncellendi.' : 'Başarıyla Referans Oluşturuldu.', 'data'=> $referance], 200);
    }

    private function saveImageUpload($request, $data) {

            $images = $request->file('file');

            $uploadImageService = new UploadImageService();

            $uploadImageService->createFolder('uploads/referance');
            $uploadImageService->deleteFile($data->image);

            $uploadedImages = $uploadImageService->uploadMultipleImages($images,'referance');

            return $uploadedImages;

    }
}
