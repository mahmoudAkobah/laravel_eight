<?php

// test pull and push
// test commit from code
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(){

        try {
            $countries = Country::all();

            $arr = array(
                'countries' => $countries,
                'name_of_user' => auth()->user()->email,
                'response' => [
                    'response_code' => 0,
                    'response_message' => 'Countries has been returned successfully',
                ]
            );
            return response()->json($arr, 200);
        } catch (\Exception $e) {
            $arr = array(
                'error' => $e->getMessage(),
                'countries' => [],
                'response' => [
                    'response_code' => -1,
                    'response_message' => 'Failed to get countries',
                ]
            );
            return response()->json($arr, 400);
        }
    }
}
