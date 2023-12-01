<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;




//

// app/Http/Controllers/ApplicationController.php




class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::all();

        return response()->json([
            'data' => $applications,
        ]);
    }
}
