<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a new cURL resource
        $ch = curl_init();
        
        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, "https://ipinfo.io/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        
        // grab URL and pass it to the browser
        $loc = curl_exec($ch);
        
        // close cURL resource, and free up system resources
        curl_close($ch);
        
        $times = \App\Data::orderBy('id', 'desc')->take(24)->pluck('time')->reverse();
                
        return view('locations', [
                                  'location' => json_decode($loc),
                                  'times' => $times,
                                  ]);
    }
}
