<?php

namespace App\Http\Controllers\Api;

use App\Models\sorcial;
use App\Models\SorcialMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UploadImageService;

class SorcialController extends Controller
{
    public function index()
    {
        $sorcials = SorcialMedia::orderBy('order_no')->paginate(20);
        return response()->json($sorcials);
    }

    public function edit($id)
    {
        $sorcial = SorcialMedia::where('id',$id)->first();
        return response()->json($sorcial);
    }


    public function store(Request $request)
    {
        return $this->saveTag($request);
    }

    public function update(Request $request, $id)
    {
        return $this->saveTag($request, $id);
    }


    public function order(Request $request)
    {

        foreach ($request->order as $key => $id) {
            SorcialMedia::where('id',$id)->update(['order_no'=> $key]);
        }

        return response()->json(['message' => 'Sosyal Medya Sırası Güncellendi!','data'=> SorcialMedia::orderBy('order_no')->get()], 200);
    }

    private function saveTag(Request $request, $id=null)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
        ],
        [
            'title.required'=>'Başlık Boş Geçilemez',
        ]);


        $sorcialData = [
            'title' => $validatedData['title'],
            'link'=>$request->link,
            'icon'=>$request->icon,
            'status' => $request->status ?? 1
        ];

        $sorcial = !empty($id) ? SorcialMedia::find($id) : SorcialMedia::create($sorcialData);

        if(empty($sorcial)) {
            return response()->json(['message' => 'Sosyal Medya Bulunamadı!'], 404);
        }

        $sorcial->update($sorcialData);

        return response()->json(['message' => !empty($id) ? 'Başarıyla Sosyal Medya Güncellendi.' : 'Başarıyla Sosyal Medya Oluşturuldu.', 'data'=> $sorcial], 200);
    }

}
