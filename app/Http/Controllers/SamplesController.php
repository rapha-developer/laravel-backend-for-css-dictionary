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

}
