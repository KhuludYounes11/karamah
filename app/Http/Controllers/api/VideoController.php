<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VideosResource;
use App\Http\Traits\GeneralTrait;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
    try {
        $videos = Video::all();
        $video=VideosResource::collection($videos);
        return $this->apiResponse($video);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Failed to retrieve videos.'], 500);
    }

}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        try {
            $video = Video::where('uuid', $uuid)->firstOrFail();
            $videoResource=VideosResource::collection($video);
            return $this->apiResponse($videoResource);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Video not found.'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
