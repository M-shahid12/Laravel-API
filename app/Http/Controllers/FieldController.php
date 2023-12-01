<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\field;

class fieldcontroller extends Controller
{
    //

    function list()
    {
        return field::all();
    }

    function fieldadd(Request $req)
    {
        $field = new field;

        $field->name = $req->name;
        $field->type = $req->type;
        $result = $field->save();
        if ($result) {
            return  ["result" => "Data has been saved "];
        } else {
            return  ["result" => "Operation Failed "];
        }
    }


    function fieldupdate(Request $req)
    {
        $field = field::find($req->id);

        $field->name = $req->name;
        $field->type = $req->type;
        $field->id = $req->id;

        $result = $field->save();

        if ($result) {
            return ["Request" => "Data has been update"];
        } else {
            return ["Result " => "Operation have been failed"];
        }
    }

    function fielddelete($id)
    {
        $field = field::find($id);
        $result = $field->delete();



        if ($result) {
            return ["Request" => "record has been deleted"];
        } else {
            return ["Result " => "Operation have been failed"];
        }
    }
}
