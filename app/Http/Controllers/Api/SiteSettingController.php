<?php

namespace App\Http\Controllers\Api;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UploadImageService;

class SiteSettingController extends Controller
{
    public function index()
    {
        $sitesettings = SiteSetting::paginate(20);
        return response()->json($sitesettings);
    }

    public function edit($id)
    {
        $sitesetting = SiteSetting::where('id',$id)->first();
        return response()->json($sitesetting);
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
            'setting_key' => 'required|string',
        ],
        [
            'setting_key.required'=>'Key Boş Geçilemez',
        ]);


        $sitesettingData = [
            'setting_key' => $validatedData['setting_key'],
            'setting_value'=>$request->setting_value,
            'setting_type'=>$request->setting_type,
        ];

        $sitesetting = !empty($id) ? SiteSetting::find($id) : SiteSetting::create($sitesettingData);

        if(empty($sitesetting)) {
            return response()->json(['message' => 'Site Ayar Bulunamadı!'], 404);
        }

        $sitesetting->update($sitesettingData);

        return response()->json(['message' => !empty($id) ? 'Başarıyla Site Ayar Güncellendi.' : 'Başarıyla Site Ayar Oluşturuldu.', 'data'=> $sitesetting], 200);
    }

}
