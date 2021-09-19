<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monitor;

class MonitorController extends Controller
{
    //

    public function save(Request $request){
        $monitor = Monitor::updateOrCreate(
            ['name' => $request->name],
            ['data' => $request->data]
        );
        return 1;
    }

    public function index(Request $request){
        $monitor = Monitor::all();

        
        return view('main',compact('monitor'));
    }
}
