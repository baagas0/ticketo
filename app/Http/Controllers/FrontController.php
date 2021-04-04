<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transportation;
use App\Schedulle;
use App\Airport;
use App\Slider;
use App\Tour;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $data['airport'] = Airport::orderBy('name', 'asc')->get();
        $data['sliders'] = Slider::orderBy('id', 'ASC')->get();
        $data['tours'] = Tour::orderBy('id', 'DESC')->get();
        $data['transportation'] = Transportation::orderBy('name', 'asc')->get();

        $from_code          = $request->get('from_code');
        $destination_code   = $request->get('destination_code');
        $transportation     = $request->get('transportation');
        $date               = $request->get('date');
        $now                = Carbon::parse('now');

        if($from_code && $destination_code) {
            if ($transportation && $date) {
                $data['schedules'] = Schedulle::where('from_code', $from_code)->where('destination_code', $destination_code)->where('transportation_id', $transportation)->where('date', $date)->where('date', '>', $now)->paginate(9);
            }else if($transportation){
                $data['schedules'] = Schedulle::where('from_code', $from_code)->where('destination_code', $destination_code)->where('transportation_id', $transportation)->where('date', '>', $now)->paginate(9);
            }else if($date) {
                $data['schedules'] = Schedulle::where('from_code', $from_code)->where('destination_code', $destination_code)->where('date', $date)->where('date', '>', $now)->paginate(9);
            }else{
                $data['schedules'] = Schedulle::where('from_code', $from_code)->where('destination_code', $destination_code)->where('date', '>', $now)->paginate(9);
            }
        }else {
            $data['schedules'] = Schedulle::where('date', '>', $now)->paginate(9);
        }

        return view('user.home', $data);
    }

    public function schedules(Request $request)
    {
        $from_code          = $request->get('from_code');
        $destination_code   = $request->get('destination_code');
        $transportation     = $request->get('transportation');
        $date               = $request->get('date');
        $now                = Carbon::parse('now');

        if($from_code && $destination_code) {
            if ($transportation && $date) {
                $schedules = Schedulle::where('from_code', $from_code)->where('destination_code', $destination_code)->where('transportation_id', $transportation)->where('date', $date)->where('date', '>', $now)->paginate(9);
            }else if($transportation){
                $schedules = Schedulle::where('from_code', $from_code)->where('destination_code', $destination_code)->where('transportation_id', $transportation)->where('date', '>', $now)->paginate(9);
            }else if($date) {
                $schedules = Schedulle::where('from_code', $from_code)->where('destination_code', $destination_code)->where('date', $date)->where('date', '>', $now)->paginate(9);
            }else{
                $schedules = Schedulle::where('from_code', $from_code)->where('destination_code', $destination_code)->where('date', '>', $now)->paginate(9);
            }
        }else {
            $schedules = Schedulle::where('date', '>', $now)->paginate(9);
        }

        $airport = Airport::orderBy('name', 'asc')->get();
        $transportation = Transportation::orderBy('name', 'asc')->get();

        // dd($schedules[2]->tour->title);

        return view('user.schedules', compact('schedules', 'airport', 'transportation'));
    }

    public function schedule($id)
    {
        $schedule = Schedulle::findOrFail($id);

        return view('user.schedule', compact('schedule'));
    }
}
