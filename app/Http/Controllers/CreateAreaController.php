<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CreateAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas  = Area::all();
        return view("pages.create_area", compact("areas"))->with("create_area", "create_area");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'district_name' => 'required',
            "district_code" => "required",
            "taluk_name.*" => "required",
            "taluk_code.*" => "required",
        ]);

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
