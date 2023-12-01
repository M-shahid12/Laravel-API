<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyApi extends Controller
{
    function getdata()
    {
        return ['name' => 'Sir Yahya ', 'Supervisor ' => 'Shahid'];
    }
}
