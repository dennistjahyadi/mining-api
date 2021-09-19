<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monitor;

class MonitorController extends Controller
{
    //

    public function save(Request $request){
        $strRand = rand(1,100000);
        $monitor = Monitor::updateOrCreate(
            ['name' => $request->name],
            ['data' => $request->data, 
              'random' => $strRand
            ]
        );
    
        return 1;
    }

    public function index(Request $request){
        $monitors = Monitor::all();

        return view('main',compact('monitors'));
    }
}
