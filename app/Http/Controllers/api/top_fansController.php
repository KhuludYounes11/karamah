<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\top_fansResource;
use App\Http\Traits\GeneralTrait;
use App\Models\TopFan;
use Illuminate\Http\Request;

class top_fansController extends Controller
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
            $topFans = TopFan::all();
            $top_fansResource=top_fansResource::collection($topFans);
            return $this->apiResponse($top_fansResource);
        } catch (\Exception $e) {
            return $this->apiResponse($e->getMessage(),500);
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
            $topFan = TopFan::where('uuid', $uuid)->first();
            if (!$topFan) {
                return $this->apiResponse('Resource not found', 404);
            }
            $top_fans=new top_fansResource($topFan);
            return $this->apiResponse( $top_fans,200);
        } catch (\Exception $e) {
            return $this->apiResponse('Failed to retrieve resource', 500);
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
