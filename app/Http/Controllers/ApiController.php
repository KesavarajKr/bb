<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Zone;
use Exception;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ApiController extends Controller
{
    //
    public function invalidId()
    {
        return response(["message" => "Invalid ID", "status" => 500], 500);
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
        } catch (Exception $e) {
            return response(["status" => 500,  "message" => "Zone id is required and should be numeric value"], 500);
        }
        $zoneId  = "Zone_" . $request->input('zoneid');
        try {
            $data = Zone::create([
                "zoneid" => $zoneId
            ]);
        } catch (Exception $e) {
            return response(["message" => "Zone ID Already Exists", "status" => 500], 500);
        }
        return ["message" => "Zone Created", "data" => $data, "Status" => "200"];
    }

    // View Zone
    public function viewzone($id)
    {
        try {
            $data = Zone::findOrFail($id);
        } catch (Exception $e) {
            return $this->invalidId();
        }
        return ["message" => "Zone Data", "data" => $data, "Status" => "200"];
    }



    // UpdateZone
    public function updatezone(Request $request, $id)
    {

        try {
            $request->validate([
                'zoneid' => 'required|numeric',
            ]);
        } catch (Exception $e) {
            return response(["message" => "Zone id is required and should be numeric value", "status" => 500], 500);
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
        return ["message" => "Zone Updated", "data" => $data];
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
        return ["message" => "Zone Deleted", "data" => $data];
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
        } catch (Exception $e) {
            return response(["message: Validation Failed", "status" => 500], 500);
        }
        try {
            $data = Area::create($request->all());
        } catch (Exception $e) {
            return response(["message" => "Area Name Already Exists", "status" => 500], 500);
        }
        return ["message" => "Area Created", "data" => $data];
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
        } catch (Exception $e) {
            return response(["message: Validation Failed", "status" => 500], 500);
        }

        try {
            $data = Area::findOrFail($id);
        } catch (Exception $e) {
            return $this->invalidId();
        }
        $data->update($request->all());

        return ["message" => "Area Updated", "data" => $data, "status" => 200];
    }

    // View Area
    public function viewArea($id)
    {
        try {
            $data = Area::findOrFail($id);
        } catch (Exception $e) {
            return $this->invalidId();
        }
        return ["message" => "Area", "data" => $data, "status" => 200];
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
        return ["message" => "Area Deleted Successfully", "data" => $data, "status" => 200];
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
        } catch (Exception $e) {
            return response(["message: Validation Failed", "status" => 500], 500);
        }
        try {
            $data = Area::create($request->all());
        } catch (Exception $e) {
            return response(["message" => "Area Name Already Exists", "status" => 500], 500);
        }
        return ["message" => "Area Created", "data" => $data];
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
        } catch (Exception $e) {
            return response(["message: Validation Failed", "status" => 500], 500);
        }

        try {
            $data = Area::findOrFail($id);
        } catch (Exception $e) {
            return $this->invalidId();
        }
        $data->update($request->all());

        return ["message" => "Area Updated", "data" => $data, "status" => 200];
    }

    // View Area
    public function viewArea($id)
    {
        try {
            $data = Area::findOrFail($id);
        } catch (Exception $e) {
            return $this->invalidId();
        }
        return ["message" => "Area", "data" => $data, "status" => 200];
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
        return ["message" => "Area Deleted Successfully", "data" => $data, "status" => 200];
    }
}
