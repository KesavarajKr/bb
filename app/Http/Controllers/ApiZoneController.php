<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ApiZoneController extends Controller
{
    public function invalidId()
    {
        return response(["message" => "Invalid ID", "status" => 500], 500);
    }

    public function validationInvalid($errors)
    {
        return response(["message" => $errors, "status" => 400], 400);
    }

    public function successResponse($data)
    {
        return response(["message" => "success", "data" => $data, "status" => 200]);
    }


    public function createZone(Request $request)
    {
        try {
            $request->validate([
                "zone_id" => "required",
                'district_name.*' => 'required',
                "district_code.*" => "required",

            ]);
        } catch (ValidationException $error) {
            return  $this->validationInvalid($error->errors());
        }

        $districtNames = $request->input("district_name");
        $districtCodes = $request->input("district_code");
        $data = [];

        foreach ($districtNames as $key => $district) {
            $area = new Zone();
            $area->zone_id =  strtoupper($request->input("zone_id"));
            $area->district_name = strtoupper($district);
            $area->district_code = strtoupper($districtCodes[$key]);
            array_push($data, $area);
            $area->save();
        }

        return $this->successResponse($data);
    }
}
