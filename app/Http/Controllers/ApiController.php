<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //

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

        $invID =0;
         $maxValue = DB::table('users')->max('id');
         $invID=$maxValue+1;
         $invID = str_pad($invID, 3, '0', STR_PAD_LEFT);
         $userid="BB-USR-".$invID;

         $saveuser = DB::table('users')->insert([
            "name"=>$name,
            "email"=>$email,
            "mobilenumber"=>$mobilenumber,
            "role"=>$role,
            "password"=>$password,
            "userid"=>$userid
         ]);

         if($saveuser)
         {
            // return response()->json([
            //     // 'status' => '200',
            //     'message' => 'Register Successfully',
            // ]);

            return ["Result"=>"User Created"];
         }
         else
         {
            // return response()->json([
            //     // 'status' => '200',
            //     'message' => 'Register Failed',
            // ]);
         }


    }
}
