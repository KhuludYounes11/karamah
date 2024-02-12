<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AssociationResource;
use App\Http\Traits\FileUploader;
use App\Http\Traits\GeneralTrait;
use App\Models\Association;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
class AssociationController extends Controller
{
    use GeneralTrait;
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        try{
      
            $associations = Association::all();
            return $this->apiResponse(AssociationResource::collection($associations));
        }
        catch (\Exception $e) {
            return $this->apiResponseError($e->getMessage(), 500);
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
    $validator = Validator::make($request->all(), [
      ,
        'boss' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'description' => 'string',
        'country' => 'required|string',
        'sport_id' => 'required|integer',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 400);
    }

    try {
        $imagePath = $request->file('image')->store('associations', 'public');

        $association = Association::create([
            'uuid' => Str::uuid(),
            'boss' => $request->boss,
            'image' => $imagePath,
            'description' => $request->description,
            'country' => $request->country,
            'sport_id' => $request->sport_id,
        ]);

        return response()->json(['data' => $association], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 404);
    }
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        //
     try{
     $association = Association::where('uuid', $uuid)->firstOrFail();
     return $this->apiResponse(AssociationResource::collection($association));
    }
     catch (\Exception $e) {
        return $this->apiResponseError($e->getMessage(), 500);
     }
    
  
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        //
        
    
        $validator = Validator::make($request->all(), [
            'uuid' => 'required|string',
            'boss' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'country' => 'required|string',
            'sport_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        try {
            $association = Association::where('uuid', $uuid)->firstOrFail();

            // بنقوم بنشوف اذا الصورة موجودة بنحدثا اذا م موجودة بعد ما قمنا بنرجع نقعد خخ
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('associations', 'public');
                $association->image = $imagePath;
            }

            
            $association->update($request->all());

            return response()->json(['data' => $association], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Association not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update association'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        //
        try {
            $association = Association::where('uuid', $uuid)->firstOrFail();
            $association->delete();

            return response()->json(['message' => 'Association deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Association not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete association'], 500);
        }
    }
    }


