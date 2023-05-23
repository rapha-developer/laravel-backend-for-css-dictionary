<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSampleRequest;
use App\Http\Resources\SamplesResource;
use App\Models\Property;
use App\Models\Sample;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SamplesController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allPropertyFromCurrentUser = Property::where('user_id', Auth::user()->id)->get('id');
        $array = [];
        foreach($allPropertyFromCurrentUser as $property) 
        {
            $array[] = $property['id'];
        }
        return SamplesResource::collection(
            Sample::whereIn('property_id', $array)->get()
        );
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSampleRequest $request)
    {
        $request->validated($request->all());
        
        if ($this->isNotAuthorize($request->property_id)) 
        {
            return $this->isNotAuthorize($request->property_id);
        } else {
            $sample = Sample::create([
                'property_id' => $request->property_id,
                'title' => $request->title,
                'description' => $request->description,
                'description_pt' => $request->description_pt,
            ]);
            return new SamplesResource($sample);
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Sample $sample)
    {
        return ($this->isNotAuthorize($sample->property_id)) ? $this->isNotAuthorize($sample->property_id) : new SamplesResource($sample);
    }

    /**
     * Check if action is not authorize for user.
     */
    private function isNotAuthorize($property_id) 
    {
        $property = Property::where('id', $property_id)->first();
        if (Auth::user()->id !== $property->user_id) {
            return $this->error('','You are not authorized to make this request', 403);
        }
    }
}
