<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SeasoneResource;
use App\Models\Seasone;
use Illuminate\Http\Request;

class SeasoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try{
        $seasone = Seasone::all();
        return $this->apiResponse(SeasoneResource::collection($seasone));
        }
        catch (\Exception $e){
            return $this->apiResponce($e->getMessage(), 500);
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
        try{

            $seasone= Seasone::where('uuid',$uuid)->firstOrFail();
            $resource= new SeasoneResource($seasone);
             return $this->apiResponse($resource);

        }
        catch(\Exception $e){
            return $this->apiResponseError($e->getMessage(), 500);
        }

        /* try {
            $prime = Prime::where('uuid', $uuid)->firstOrFail();
            $resource = new PrimsResource($prime);

            return $this->apiResponse($resource);
        } catch (\Exception $e) {
            return $this->apiResponseError($e->getMessage(), 500);
        }*/
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
