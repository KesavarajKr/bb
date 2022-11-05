<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Validator;

class UserController extends Controller
{
    //


    public function createUser(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'mobilenumber' => 'required',
            'role' => 'required',
            'password' => 'required'
        ]);

        $name = $request->name;
        $email = $request->email;
        $mobilenumber = $request->mobilenumber;
        $role = $request->role;
        $password = Hash::make($request->password);
        $userid = $request->userid;
        $project = $request->project;
        $zones = $request->zones;
        $area = $request->area;
        $region = $request->region;
        $engineers = $request->engineers;
        $users = $request->users;
        $clients = $request->clients;
        $estimates = $request->estimates;
        $usertype = $request->usertype;


        if($validated->passes())
        {
            $saveuser = DB::table('users')
            ->insert([
                "name"=>$name,
                "email"=>$email,
                "mobilenumber"=>$mobilenumber,
                "role"=>$role,
                "password"=>$password,
                "userid"=>$userid,
                "project"=>$project,
                "zones"=>$zones,
                "area"=>$area,
                "region"=>$region,
                "engineers"=>$engineers,
                "users"=>$users,
                "clients"=>$clients,
                "estimates"=>$estimates,
                "usertype"=>$usertype
            ]);

            if($saveuser)
            {
                return response()->json(['success'=>'User Created Successfully']);
            }
        }
    }
}
