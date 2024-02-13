<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matche;
use App\Models\Video;
use App\Models\Information;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\GeneralTrait;
use App\Http\Resources\MatcheResource;
use App\Http\Resources\VideoResource;
use App\Http\Resources\InformationResource;
use App\Http\Resources\MatcheNewsResource;
use App\Http\Resources\MatcheStatisticResource;
use App\Http\Resources\StatisticResource;
use App\Http\Resources\MatchDateResource;
use Carbon\Carbon;
class MatcheController extends Controller
{ use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ //المباريات القادمة
    public function index()
    {
       try {
           //$data = Matche::where('status','not_started')->orderBy('when')->get();
            $data = Matche::where('when','>',Carbon::now()->format('Y-m-d'))->orderBy('when')->get();
            $match=MatcheResource::collection($data);
            return $this->apiResponse($match,true,null,200);
            } catch (\Exception $e) {
                return $this->apiResponse(null,0, $e->getMessage(),500);
            }
    }
    //  المباريات الحالية
   
    public function currentMatch(){
        try {
            $result = Matche::where('status','=','live')->get();
           $data= MatcheStatisticResource::collection($result);
            return $this->apiResponse($data, true, null, 200);
        } catch (\Exception $e) {
            return $this->apiResponse(null, 0, $e->getMessage(), 500);
        }
    }
    
  
      // المباراة مع النتيجة
      public function showMatch($uuid)
      {
        try {
            $match= Matche::where('uuid',$uuid)->first();
             $statictis=$match->statistic()->get();
             $data= MatcheStatisticResource::make($match);
            return $this->apiResponse($data,true,null,200);
        } catch (\Exception $e) {
            return $this->apiResponse(null,0, $e->getMessage(),500);
        }
    }
    

//all date for match
public function Date()
{
    try {
        $data = Matche::all();
       $match=MatchDateResource::collection($data);
        return $this->apiResponse($match,true,null,200);
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
    // تفاصيل المباراة
    public function show($uuid)
    {
        try {
            $data = Matche::where('uuid',$uuid)->first();
            $match=MatcheResource::make($data);
            return $this->apiResponse($match,true,null,200);
        } catch (\Exception $e) {
            return $this->apiResponse(null,0, $e->getMessage(),500);
        }
    }
    //  صفحة الخبر مع زيادة عدد مشاهدات الخبر
    public function newPage($uuid)
    {
        try {
            $match= Matche::where('uuid',$uuid)->first();
            $news=$match->information()->where('type','news')->get();
            foreach ($news as $new) {
                $new->update(['reads' => $new->reads + 1]);
            }
             $statictis=$match->statistic()->get();
             $video=$match->video()->get();
             $data['المباراة']= MatcheNewsResource::make($match);
              $data['احصائيات المباراة']= StatisticResource::collection($statictis);
             $data[' ملخص المباراة والأهداف']= VideoResource::collection($video);
            return $this->apiResponse($data,true,null,200);
        } catch (\Exception $e) {
            return $this->apiResponse(null,0, $e->getMessage(),500);
        }
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
