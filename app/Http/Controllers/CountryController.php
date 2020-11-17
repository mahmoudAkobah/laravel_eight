<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(){

        $countries = Country::all();

        $arr = array(
            'countries' => $countries,
            'response' => [
                'response_code' => 0,
                'response_message' => 'Countries has been returned successfully',
            ]
        );
        return response()->json($arr, 200);
    }
}
