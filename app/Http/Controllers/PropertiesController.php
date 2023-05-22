<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Resources\PropertiesResource;
use App\Models\Property;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertiesController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PropertiesResource::collection(
            Property::where('user_id', Auth::user()->id)->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        $request->validated($request->all());
        $property = Property::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category
        ]);
        return new PropertiesResource($property);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return $this->isNotAuthorize($property) ? $this->isNotAuthorize($property) : new PropertiesResource($property);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        if ($this->isNotAuthorize($property)) {
            return $this->isNotAuthorize($property);
        } else {
            $property->update($request->all());
        }
        return new PropertiesResource($property);
    }
    
    /**
     * Check if action is not authorize for user.
     */
    private function isNotAuthorize($property) 
    {
        if (Auth::user()->id !== $property->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
