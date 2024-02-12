<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlanResource;
use App\Http\Traits\GeneralTrait;
use App\Models\Plan;
use App\Models\Player;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
   
     public function show($matche_id)
     {

     
         try {
             $players = Plan::where('matche_id', $matche_id)
                 ->where('status', 'beanch')
                 ->get();
                 $player = PlanResource::collection($players);
            
             
            return $this->apiResponse([
                
                 $player,
            ]);
         } catch (\Exception $e) {
             return response()->json(['error' => 'Players not found.'], 404);
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
