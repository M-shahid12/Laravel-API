<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Validator;



class DeviceController extends Controller
{


    function list()
    {
        return Device::all();
    }


    function userlogin(Request $req)
    {
        $data = $req->input();
        $req->session()->put('user', $data['user']);
        return redirect('profile');
    }
    function add(Request $req)
    {
        $Device = new Device;
        $Device->id = $req->id;
        $Device->name = $req->name;
        $Device->member_id = $req->member_id;
        $result = $Device->save();
        if ($result) {
            return  ["result" => "Data has been saved "];
        } else {
            return  ["result" => "Operation Failed "];
        }
    }
    function update(Request $req)
    {
        $Device = Device::find($req->id);

        $Device->name = $req->name;
        $Device->member_id = $req->member_id;
        $Device->id = $req->id;
        $result = $Device->save();

        if ($result) {
            return ["Request" => "Data has been update"];
        } else {
            return ["Result " => "Operation have been failed"];
        }
    }
    function delete($id)
    {
        $Device = Device::find($id);
        $result = $Device->delete();



        if ($result) {
            return ["Request" => "record has been deleted"];
        } else {
            return ["Result " => "Operation have been failed"];
        }
    }


    function search($name)
    {
        return Device::where("name", "like", "%" . $name . "%")->get();
    }
    function testData(Request $req)
    {
        $rules = array(
            "member_id" => "required"
        );
        $validator = 'Validator'::make($req->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $Device = new Device;
            $Device->name = $req->name;
            $Device->member_id = $req->member_id;
            $result = $Device->save();
            if ($result) {
                return ["Request" => "record has been deleted"];
            } else {
                return ["Result " => "Operation have been failed"];
            }
        }
    }

    public function register(Request $request)
    {

        $request->validate([



            'id' => 'required',
            'name' => 'required',
            'member_id' => 'required|confirmed',



        ]);
        if (Device::where('name', $request->name)->first()) {
            return response([
                'message' => 'name already exist',
                'status ' => 'failed'
            ], 200);
        }
        $device = Device::create([
            'id' => $request->id,
            'name' => $request->name,
            'member_id' => $request->member_id,

        ]);
        $token = $device->createToken($request->name)->plainTextToken;

        return response([
            'token' => $token,
            'message' => 'Registration Success',
            'status ' => 'Success'
        ], 201);
    }
}
