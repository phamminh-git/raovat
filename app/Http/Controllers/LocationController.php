<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use HoangPhi\VietnamMap\Models\Province;
use HoangPhi\VietnamMap\Models\District;
use HoangPhi\VietnamMap\Models\Ward;

class LocationController extends Controller
{
    public function getProvinces(){
        $provinces = Province::all();
        return response()->json($provinces);
    }

    public function getDistricts(Request $request, Province $province){
        $districts = $province->districts;
        return response()->json($districts);
    }

    public function getWards(Request $request, District $district){
        $wards = $district->wards;
        return response()->json($wards);
    }
}
