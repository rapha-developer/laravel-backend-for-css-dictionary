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
