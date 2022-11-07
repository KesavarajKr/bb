<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Zone;
use Exception;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;




class ApiController extends Controller
{
    //
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



    public function createuser(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'mobilenumber' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        $name = $request->name;
        $email = $request->email;
        $mobilenumber = $request->mobilenumber;
        $role = $request->role;
        $password = $request->password;

        $invID = 0;
        $maxValue = DB::table('users')->max('id');
        $invID = $maxValue + 1;
        $invID = str_pad($invID, 3, '0', STR_PAD_LEFT);
        $userid = "BB-USR-" . $invID;

        $saveuser = DB::table('users')->insert([
            "name" => $name,
            "email" => $email,
            "mobilenumber" => $mobilenumber,
            "role" => $role,
            "password" => $password,
            "userid" => $userid
        ]);

        if ($saveuser) {
            // return response()->json([
            //     // 'status' => '200',
            //     'message' => 'Register Successfully',
            // ]);

            return ["message" => "User Created"];
        } else {
            // return response()->json([
            //     // 'status' => '200',
            //     'message' => 'Register Failed',
            // ]);
        }
    }




    //Create Area
    public function createArea(Request $request)
    {

        try {
            $request->validate([
                'district_name' => 'required',
                "district_code" => "required",
                "taluk_name.*" => "required",
                "taluk_code.*" => "required",
            ]);
        } catch (ValidationException $error) {
            return  $this->validationInvalid($error->errors());
        }


        $talukNames = $request->input("taluk_name");
        $talukCodes = $request->input("taluk_code");
        $data = [];

        foreach ($talukNames as $key => $taluk) {
            $area = new Area();
            $area->district_name = $request->input("district_name");
            $area->district_code = $request->input("district_code");
            $area->taluk_name = $taluk;
            $area->taluk_code = $talukCodes[$key];
            array_push($data, $area);
            $area->save();
        }

        return redirect("/create_zone")->with("data", $data);
    }




    // View Area
    public function viewArea($id)
    {
        try {
            $data = Area::findOrFail($id);
        } catch (Exception $e) {
            return $this->invalidId();
        }

        $viewArea =  view("pages.view_area", ["data" => $data])->render();

        return $viewArea;
    }



    public function editArea($id)
    {
        try {
            $data = Area::findOrFail($id);
        } catch (Exception $e) {
            return $this->invalidId();
        }

        $viewArea =  view("pages.edit_area", ["data" => $data])->render();

        return $viewArea;
    }


    public function renderArea()
    {
        $areas  = Area::all();
        $tableView   = view("pages.render_area", compact("areas"))->render();
        return $tableView;
    }


    // View All Area
    public function viewAllArea()
    {
        $data = Area::all();
        return $this->successResponse($data);
    }



    // UpdateArea
    public function updateArea(Request $request, $id)
    {
        try {
            $request->validate([
                'district_name' => 'required',
                "district_code" => "required",
                "taluk_name" => "required",
                "taluk_code" => "required",
            ]);
        } catch (ValidationException $e) {
            return $this->validationInvalid($e->errors());
        }
        try {
            $data = Area::findOrFail($id);
        } catch (Exception  $e) {
            return $this->invalidId();
        }

        $data->update($request->all());

        return $this->successResponse($data);
    }

    public function deleteArea($id)
    {
        try {
            $data = Area::findOrFail($id);
        } catch (Exception $e) {
            return $this->invalidId();
        }
        $data->delete();
        return $this->successResponse($data);
    }



    // Create Zone
    public function createzone(Request $request)
    {

        try {
            $request->validate([
                'zone_id' => 'required|numeric',
                'district_name.*' => 'required',
                'district_code.*' => 'required',

            ]);
        } catch (ValidationException $e) {
            return $this->validationInvalid($e->errors());
        }

        $districtNames = $request->input("district_name");
        $districtCodes = $request->input("district_code");
        $zoneId  = "Zone_" . $request->input('zone_id');
        $data = [];

        foreach ($districtNames as $key => $districtN) {
            $zone = new Zone();
            $zone->zone_id = $zoneId;
            $zone->district_name = $districtN;
            $zone->district_code = $districtCodes[$key];
            array_push($data, $zone);
            $zone->save();
        }

        return  redirect("dashboard")->with("data", $this->successResponse($data));
    }

    // View Zone
    public function viewzone($id)
    {
        try {
            $data = Zone::findOrFail($id);
        } catch (Exception $e) {
            return $this->invalidId();
        }
        return $this->successResponse($data);
    }


    // View All Zone
    public function viewAllZone()
    {
        $data = Zone::all();
        return $this->successResponse($data);
    }



    // UpdateZone
    public function updatezone(Request $request, $id)
    {
        try {
            $request->validate([
                'zone_id' => 'required|numeric',
                'district_name' => 'required',
                'district_code' => 'required',

            ]);
        } catch (ValidationException $e) {
            return $this->validationInvalid($e->errors());
        }

        try {
            $data = Zone::findOrFail($id);
        } catch (Exception $e) {
            return $this->invalidId();
        }

        $zoneId  = "Zone_" . $request->input('zone_id');
        $data->update([
            "zone_id" => $zoneId,
            "district_name" => $request->input("district_name"),
            "district_code" => $request->input("district_code"),
        ]);

        return $this->successResponse($data);
    }





    // To delete Zone
    public function deletezone($id)
    {
        try {
            $data = Zone::findOrFail($id);
        } catch (Exception $e) {
            return $this->invalidId();
        }
        $data->delete();
        return $this->successResponse($data);
    }


    public function getTaluk(Request $request, $id)
    {
        $talukas = Area::where("district_name", $id)->get();
        $options =  view("pages.get_taluk", ["talukas" => $talukas])->render();
        return  $options;
    }
}
