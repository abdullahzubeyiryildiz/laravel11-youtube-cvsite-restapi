<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Services\UploadImageService;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('category')->orderBy('id','desc')->paginate(20);
        return response()->json($projects);
    }

    public function edit($id)
    {
        $project = Project::where('id',$id)->with('category')->first();
        return response()->json($project);
    }


    public function store(ProjectRequest $request)
    {
        return $this->saveTag($request);
    }

    public function update(ProjectRequest $request, $id)
    {
        return $this->saveTag($request, $id);
    }


    private function saveTag($request, $id=null)
    {


        $projectData = [
            'name' => $request->name,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'finish_time' => Carbon::parse($request->finish_time)->format('Y-m-d'),
            'link'=>$request->link,
            'tags'=>$request->tags,
            'status' => $request->status ?? 1
        ];

        $project = !empty($id) ? Project::find($id) : Project::create($projectData);

        if(empty($project)) {
            return response()->json(['message' => 'Proje Bulunamadı!'], 404);
        }

        if($request->hasFile('file')) {
            $uploadedImages =  $this->saveImageUpload($request, $project);
            $project->image = $uploadedImages[0]['path'];
        }
        $project->slug = null;
        $project->update($projectData);

        return response()->json(['message' => !empty($id) ? 'Başarıyla Proje Güncellendi.' : 'Başarıyla Proje Oluşturuldu.', 'data'=> $project], 200);
    }

    private function saveImageUpload($request, $data) {

            $images = $request->file('file');

            $uploadImageService = new UploadImageService();

            $uploadImageService->createFolder('uploads/project');
            $uploadImageService->deleteFile($data->image);

            $uploadedImages = $uploadImageService->uploadMultipleImages($images,'project');

            return $uploadedImages;

    }
}
