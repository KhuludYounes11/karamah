<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\GeneralTrait;
use App\Http\Resources\InformationResource;
use Carbon\Carbon;
class InformationController extends Controller
{ use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //الأخبار
    public function index()
    {
        try {  
           $data= Information::where('type','news')->orderBy('created_at')->get();
            $information=InformationResource::collection($data);
            return $this->apiResponse($information,true,null,200);
            } catch (\Exception $e) {
                return $this->apiResponse(null,0, $e->getMessage(),500);
            }
    }
    //آخر الأخبار
    public function RecentlyNews()
    {
        try {  
            $data = Information::where('type','news')->orderBy('created_at','desc')->take(5)->get();
            $information=InformationResource::collection($data);
            return $this->apiResponse($information,true,null,200);
            } catch (\Exception $e) {
                return $this->apiResponse(null,0, $e->getMessage(),500);
            }
    }
     //آخر الأخبار
     public function RecentlyaddedNews()
     {
         try {  
             $data = Information::where('type','news')->where('created_at','>=',Carbon::yesterday())->orderBy('created_at','desc')->get();
             $information=InformationResource::collection($data);
             return $this->apiResponse($information,true,null,200);
             } catch (\Exception $e) {
                 return $this->apiResponse(null,0, $e->getMessage(),500);
             }
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
