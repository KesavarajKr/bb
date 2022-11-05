<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;


class EngineerController extends Controller
{
    //

    public function createEngineer(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'name' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
            'address' => 'required',
            'phnumber' => 'required',
            'emailid' => 'required',
            'dealershipregion' => 'required',
            'dealershiparea' => 'required',
            // 'photo' => 'required',
            // 'aadhardocument' => 'required',
            'officeaddress' => 'required',
            'maplocation' => 'required',
        ]);

        $name = $request->name;
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        $address = $request->address;
        $phnumber = $request->phnumber;
        $emailid = $request->emailid;
        $dealershipregion = $request->dealershipregion;
        $dealershiparea = $request->dealershiparea;
        // $photo = $request->photo;
        // $aadhardocument = $request->aadhardocument;
        $officeaddress = $request->officeaddress;
        $maplocation = $request->maplocation;

        $invID =0;
         $maxValue = DB::table('engineers')->max('id');
         $invID=$maxValue+1;
         $invID = str_pad($invID, 3, '0', STR_PAD_LEFT);
         $engineerid="BB-ENG-".$invID;
         if($request->hasfile('photo'))
         {
             $file = $request->file('photo');
             $extension = $file ->getClientOriginalExtension();
             $filename = time().'_eng'.'.'.$extension;
             $file->move('images/',$filename);
             $photo = $filename;
         }

         if($request->hasfile('aadhardocument'))
         {
             $file = $request->file('aadhardocument');
             $extension = $file ->getClientOriginalExtension();
             $filename = time().'_aadhar'.'.'.$extension;
             $file->move('images/',$filename);
             $aadhardocument = $filename;
         }

         if($validated->passes())
         {
            $engineers = DB::table('engineers')->insert([
                "engineerid"=>$engineerid,
                "name"=>$name,
                "startdate"=>$startdate,
                "enddate"=>$enddate,
                "address"=>$address,
                "phnumber"=>$phnumber,
                "emailid"=>$emailid,
                "dealershipregion"=>$dealershipregion,
                "dealershiparea"=>$dealershiparea,
                "photo"=>$photo,
                "aadhardocument"=>$aadhardocument,
                "officeaddress"=>$officeaddress,
                "maplocation"=>$maplocation,
            ]);

            if($engineers)
            {

                return response()->json(['success'=>'Engineer Created Successfully']);
            }

         }

         return response()->json(['error'=>$validated->errors()]);
    }


    public function viewengineer()
    {
        $getengineer = DB::table('engineers')
        ->select()
        ->get();
        return $getengineer;
    }

    public function viewengineerdetails($engid)
    {
        $getsingleengineer = DB::table('engineers')
        ->select()
        ->where('engineerid','=',$engid)
        ->first();

        return $getsingleengineer;
    }

    public function deleteeng($engid)
    {
        $deleteengineer = DB::table('engineers')
        ->select()
        ->where('engineerid','=',$engid)
        ->delete();

        return response()->json(['success'=>'Data Deleted']);
    }

}
