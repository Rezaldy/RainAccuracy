<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon;
use \App\Data;

class DataController extends Controller
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
    
    public function apiGetCompareData($hour1, $minute1, $hour2, $minute2, $hourIntersect, $minuteIntersect){
        $dt = Carbon::today();
        $today = $dt->toDateString();
        $data1 = unserialize(Data::where('date', $today)->where('time', Carbon::createFromTime($hour1,$minute1,0,"Europe/Amsterdam"))->first()->data)["$hourIntersect:$minuteIntersect"];
        $data2 = unserialize(Data::where('date', $today)->where('time', Carbon::createFromTime($hour2,$minute2,0,"Europe/Amsterdam"))->first()->data)["$hourIntersect:$minuteIntersect"];
        
        $data = array("early" => $data1, "late" => $data2);
        
        return response()->json($data);
    }
    
    /**
     *
     * Get the last data from DB from a certain time to the end
     *
     */
    public function apiGetPossibleTimes($hour, $minute){
        $dt = Carbon::today();
        $today = $dt->toDateString();
        $todayData = Data::where('date',$today)->where('time','>=',Carbon::createFromTime($hour,$minute,0,"Europe/Amsterdam"))->orderBy('id', 'asc')->pluck('time');
        
        return response()->json($todayData);
    }
    /**
     *
     * Compare two data and return intersecting times
     *
     */
    public function apiIntersectData($hour1, $minute1, $hour2, $minute2){
        $dt = Carbon::today();
        $today = $dt->toDateString();
        $data1 = unserialize(Data::where('date', $today)->where('time', Carbon::createFromTime($hour1,$minute1,0,"Europe/Amsterdam"))->first()->data);
        $data2 = unserialize(Data::where('date', $today)->where('time', Carbon::createFromTime($hour2,$minute2,0,"Europe/Amsterdam"))->first()->data);
        
        $dataInsersect = array_intersect_key($data1,$data2);
        
        return response()->json($dataInsersect);
    }
    
    /**
     *
     * Get the data from Buienradar and save it to DB
     *
     */
    public function saveData()
    {
        $request = array_filter(explode("\r\n", file_get_contents('http://gpsgadget.buienradar.nl/data/raintext/?lat=52.37&lon=4.76')));
        
        $data = array();
        
        foreach($request as $dataLine){
            $fields = array("rainAmount", "time");
            $dataArray = array_combine($fields,explode("|", $dataLine));
            
            $data[$dataArray['time']] = $dataArray;
        }
        
        $dt = Carbon::create();
        $currentDate = $dt->toDateString();
        $currentTime = $dt->format("H:i");
        
        if(!empty($data)){
            $dataObj = new Data(array('date' => $currentDate, 'time' => $currentTime, 'data' => serialize($data)));
            $dataObj->save();
        }
        
        return json_encode($data, JSON_PRETTY_PRINT);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data',[
                            'data' => $this->saveData(),
                           ]);
    }
}
