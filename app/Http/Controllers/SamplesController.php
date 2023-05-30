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
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sample $sample)
    {
        $property_id = ($request->property_id) ?? $sample->property_id;
        if($this->isNotAuthorize($property_id)) {
            return $this->isNotAuthorize($property_id);
        } else {
            $sample->update($request->all());
        }
        return new SamplesResource($sample);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sample $sample)
    {
        return $this->isNotAuthorize($sample->property_id) ? $this->isNotAuthorize($sample->property_id) : $sample->delete();
    }

    /**
     * Show sample by property (slug) name from request.
     */
    public function showSampleByProperty(Request $request, String $propertySlug, String $sampleOrder)
    {
        $propertyName = str_replace('-', ' ', $propertySlug);
        $propertyModel = Property::where('name', $propertyName)->first();
        $limit = 1;
        $ignoreLines = ($sampleOrder - $limit);
        $sample = Sample::where('property_id', $propertyModel->id)
            ->orderBy('id')
            ->offset($ignoreLines)
            ->limit($limit)
            ->first();
        return new SamplesResource($sample);
    }
    
    /**
     * Check if action is not authorize for user.
     */
    private function isNotAuthorize($property_id) 
    {
        $property = Property::findOrFail($property_id);
        if (Auth::user()->id !== $property->user_id) {
            return $this->error('','You are not authorized to make this request', 403);
        }
    }
}
