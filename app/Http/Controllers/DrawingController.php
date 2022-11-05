<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class DrawingController extends Controller
{

    public function drawrequest(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'clientid' => 'required',
            'engineerid' => 'required',
        ]);

        $clientid = $request->clientid;
        $engineerid = $request->engineerid;
        // $drawimage = $request->drawimage;


        $invID =0;
         $maxValue = DB::table('drawings')->max('id');
         $invID=$maxValue+1;
         $invID = str_pad($invID, 3, '0', STR_PAD_LEFT);
         $drawid="BB-DRA-".$invID;
         if($request->hasfile('drawimage'))
         {
             $file = $request->file('drawimage');
             $extension = $file ->getClientOriginalExtension();
             $filename = time().'_drawimg'.'.'.$extension;
             $file->move('images/',$filename);
             $drawimage = $filename;
         }


         if($validated->passes())
         {
            $drawimage = DB::table('drawings')->insert([
                "clientid"=>$clientid,
                "engineerid"=>$engineerid,
                "drawimage"=>$drawimage,
                "drawid" =>$drawid
            ]);

            if($drawimage)
            {
                return response()->json(['success'=>'Drawing Created Successfully']);
            }

         }

         return response()->json(['error'=>$validated->errors()]);
    }


    public function replydraw(Request $request)
    {
        $drawid = $request->drawid;
        // $officesededimage = $request->officesededimage;
        $officesideuser = $request->officesideuser;
        $officesideupdeddate = date("Y-m-d H:i:s");

        if($request->hasfile('officesededimage'))
         {
             $file = $request->file('officesededimage');
             $extension = $file ->getClientOriginalExtension();
             $filename = time().'_drawimg'.'.'.$extension;
             $file->move('images/',$filename);
             $officesededimage = $filename;
         }

        $updatedraw = DB::table('drawings')
        ->select('*')
        ->where('drawid','=',$drawid)
        ->update([
            "officesededimage"=>$officesededimage,
            "officesideuser"=>$officesideuser,
            "officesideupdeddate"=>$officesideupdeddate
        ]);

        if($updatedraw)
        {
            return response()->json(['success'=>'Drawing Updated Successfully']);
        }
    }

}
