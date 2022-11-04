<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Taluk;
use App\Models\Zone;
use Exception;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use PHPUnit\Framework\Error;


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
            'name' => 'required|unique:users|max:255',
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


    // Create Zone
    public function createzone(Request $request)
    {

        try {
            $request->validate([
                'zoneid' => 'required|numeric',
            ]);
        } catch (ValidationException $e) {
            return $this->validationInvalid($e->errors());
        }
        $zoneId  = "Zone_" . $request->input('zoneid');
        try {
            $data = Zone::create([
                "zoneid" => $zoneId
            ]);
        } catch (Exception $e) {
            return response(["message" => "Zone ID Already Exists", "status" => 500], 500);
        }
        return $this->successResponse($data);
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
                'zoneid' => 'required',
            ]);
        } catch (ValidationException $e) {
            return $this->validationInvalid($e->errors());
        }
        try {
            $data = Zone::findOrFail($id);
        } catch (Exception $e) {
            return $this->invalidId();
        }
        $zoneId  = "Zone_" . $request->input('zoneid');
        try {
            $data->update([
                "zoneid" => $zoneId
            ]);
        } catch (Exception $e) {
            return response(["message" =>   "Zone id already Exists", "status" => 500], 500);
        }
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





    //Create Area
    public function createArea(Request $request)
    {
        try {
            $request->validate([
                "zoneid" => "required",
                'areaname' => 'required',
                "areacode" => "required"
            ]);
        } catch (ValidationException $e) {
            return $this->validationInvalid($e->errors());
        }
        try {
            $data = Area::create($request->all());
        } catch (Exception $e) {
            return response(["message" => "Area Name Already Exists", "status" => 500], 500);
        }
        return $this->successResponse($data);
    }


    // UpdateArea
    public function updateArea(Request $request, $id)
    {

        try {
            $request->validate([
                "zoneid" => "required",
                'areaname' => 'required',
                "areacode" => "required"
            ]);
        } catch (ValidationException $e) {
            return $this->validationInvalid($e->errors());
        }

        try {
            $data = Area::findOrFail($id);
        } catch (Exception $e) {
            return $this->invalidId();
        }
        $data->update($request->all());

        return $this->successResponse($data);
    }

    // View Area
    public function viewArea($id)
    {
        try {
            $data = Area::findOrFail($id);
        } catch (Exception $e) {
            return $this->invalidId();
        }
        return $this->successResponse($data);
    }


    // View All Area
    public function viewAllArea()
    {
        $data = Area::all();
        return $this->successResponse($data);
    }


    // To delete Area
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





    // Create Taluk


    public function createTaluk(Request $request)
    {
        try {
            $request->validate([
                "zoneid" => "required",
                'areaname' => 'required',
                "areacode" => "required",
                "talukname" => "required",
                "talukcode" => "required"
            ]);
        } catch (ValidationException $e) {
            $this->validationInvalid($e->errors());
        }
        try {
            $data = Taluk::create($request->all());
        } catch (Exception $e) {
            return response(["message" => "Taluk Name Already Exists", "status" => 500], 500);
        }
        return $this->successResponse($data);
    }


    // UpdateArea
    public function updateTaluk(Request $request, $id)
    {

        try {
            $request->validate([
                "zoneid" => "required",
                'areaname' => 'required',
                "areacode" => "required",
                "talukname" => "required",
                "talukcode" => "required"
            ]);
        } catch (ValidationException $e) {
            return $this->validationInvalid($e->errors());
        }

        try {
            $data = Taluk::findOrFail($id);
        } catch (Exception $e) {
            return $this->invalidId();
        }
        $data->update($request->all());

        return $this->successResponse($data);
    }




    // View Area
    public function viewTaluk($id)
    {
        try {
            $data = Taluk::findOrFail($id);
        } catch (Exception $e) {
            return $this->invalidId();
        }
        return $this->successResponse($data);
    }

    // View ALl Taluk
    public function viewAllTaluk()
    {
        $data = Taluk::all();
        return $this->successResponse($data);
    }


    // To delete Area
    public function deleteTaluk($id)
    {
        try {
            $data = Taluk::findOrFail($id);
        } catch (Exception $e) {
            return $this->invalidId();
        }
        $data->delete();
        return $this->successResponse($data);
    }
}
