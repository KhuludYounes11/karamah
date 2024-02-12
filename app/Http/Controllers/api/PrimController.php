<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PrimsResource;
use App\Http\Traits\GeneralTrait;
use App\Models\Prime;
use Illuminate\Http\Request;

class PrimController extends Controller
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
            $personalData = Prime::where('type', 'personal')->get();
            $clubData = Prime::where('type', 'club')->get();

            $personalResources = PrimsResource::collection($personalData);
            $clubResources = PrimsResource::collection($clubData);

            return $this->apiResponse([
                'personal_data' => $personalResources,
                'club_data' => $clubResources,
            ]);
        } catch (\Exception $e) {
            return $this->apiResponse($e->getMessage(), 500);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        try {
            $prime = Prime::where('uuid', $uuid)->firstOrFail();
            $resource = new PrimsResource($prime);

            return $this->apiResponse($resource);
        } catch (\Exception $e) {
            return $this->apiResponseError($e->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
    }
}
