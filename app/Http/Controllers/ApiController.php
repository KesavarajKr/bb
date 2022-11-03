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

            return ["Result" => "User Created"];
        } else {
            // return response()->json([
            //     // 'status' => '200',
            //     'message' => 'Register Failed',
            // ]);
        }
    }




    public function createzone(Request $request)
    {
        try {
            $validated = $request->validate([
                'zoneid' => 'required',
                'mainzone' => 'required',
                'subzone' => 'required',
            ]);

            $data =   Zone::create($request->all());

            return ["Result" => "Zone Created", "data" => $data];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    // Create Area
    public function createArea(Request $request)
    {
        try {
            $request->validate([
                'areaname' => 'required',
            ]);


            $data = Area::create($request->all());

            return ["Result" => "Area Created", "data" => $data];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    // UpdateArea
    public function updateArea(Request $request, $id)
    {

        try {
            $request->validate([
                'areaname' => 'required',
            ]);
            $data = Area::findOrFail($id);
            $data->update($request->all());

            return ["Result" => "Area Updated", "data" => $data];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // View Area
    public function viewArea($id)
    {
        try {
            $data = Area::findOrFail($id);
            return ["Result" => "Area", "data" => $data];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }



    // To delete Area
    public function deleteArea($id)
    {
        try {
            $data = Area::findOrFail($id);
            $data->delete();

            return ["Result" => "Area Deleted", "data" => $data];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }




    // Create Zone
    public function createzone(Request $request)
    {
        try {
            $request->validate([
                'zoneid' => 'required',
            ]);


            $data = Zone::create($request->all());

            return ["Result" => "Zone Created", "data" => $data];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // View Zone
    public function viewzone($id)
    {
        try {
            $data = Zone::findOrFail($id);
            return ["Result" => "Zone Data", "data" => $data];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }



    // UpdateZone
    public function updatezone(Request $request, $id)
    {

        try {
            $request->validate([
                'zoneid' => 'required',
            ]);
            $data = Zone::findOrFail($id);
            $data->update($request->all());

            return ["Result" => "Zone Updated", "data" => $data];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // View Area
    public function viewzone($id)
    {
        try {
            $data = Zone::findOrFail($id);
            return ["Result" => "Zone Data", "data" => $data];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }



    // To delete Zone
    public function deletezone($id)
    {
        try {
            $data = Zone::findOrFail($id);
            $data->delete();
            return ["Result" => "Zone Deleted", "data" => $data];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
