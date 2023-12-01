<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\App;

class ApiController extends Controller

{


    public function index()
    {
        $apps = App::all();
        return response()->json($apps);
    }

    public function show($id)
    {
        $app = App::find($id);

        if (!$app) {
            return response()->json(['message' => 'App not found'], 404);
        }

        return response()->json($app);
    }
}
