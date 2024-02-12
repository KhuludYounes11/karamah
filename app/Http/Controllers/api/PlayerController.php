<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\GeneralTrait;
use App\Http\Resources\PlayerResource;
use App\Http\Resources\PlayerShowResource;
class PlayerController extends Controller
{ use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $defener = Player::where('play','المدافع')->get();
            $goalkeeper= Player::where('play','حارس مرمى ')->get();
            $middleline= Player::where('play','خط وسط')->get();
            $attacker = Player::where('play','هجوم')->get();
            $data['المدافعون'] = PlayerResource::collection($defener);
            $data['حراس المرمى'] = PlayerResource::collection($goalkeeper);
            $data['خط الوسط'] = PlayerResource::collection($middleline);
            $data['المهاجمون'] = PlayerResource::collection($attacker);
            return $this->apiResponse($data,true,null,200);
        } catch (\Exception $e) {
            return $this->apiResponse(null, 0, $e->getMessage(), 500);
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
    public function show($uuid)
    {
        try {
            $data = Player::where('uuid',$uuid)->first();
            $player=PlayerShowResource::make($data);
            return $this->apiResponse($player,true,null,200);
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
