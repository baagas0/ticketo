<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Schedulle;
use App\Transportation;
use App\Airport;
use Carbon\Carbon;
use App\Helpers\Calc;

class SchedulleController extends Controller
{
    public function getIndex() {
    	$data['data'] = Schedulle::orderBy('date', 'DESC')->get();
    	return view('admin.schedulle.main', $data);
    }

    public function getAdd() {
    	$data['transportation'] = Transportation::get();
    	return view('admin.schedulle.form', $data);
    }

    public function postStore(Request $request) {
    	$price = Calc::price([
						'idTransportation'	=> $request->transportation_id,
						'from'				=> $request->from_code,
						'destination'		=> $request->destination_code,
				 ]);
    	// dd($price['economy_price']);
    	$add = new Schedulle;
    	$add->transportation_id = $request->transportation_id;
    	$add->date 				= Carbon::parse($request->date);
    	$add->from_code 		= $request->from_code;
    	$add->destination_code 	= $request->destination_code;
    	$add->economy_price		= $price['economy_price'];
    	$add->bussiness_price	= $price['bussiness_price'];
    	$add->first_price		= $price['first_price'];
    	$add->save();

    	return redirect()->route('admin.schedulle');
    }

    public function getUpdate($id) {
    	$data['data'] = Schedulle::findOrFail($id);
    	$data['airportFrom'] = Airport::findOrFail($data['data']->from_code);
    	$data['airportTo'] = Airport::findOrFail($data['data']->destination_code);
    	$data['transportation'] = Transportation::get();
    	return view('admin.schedulle.form', $data);
    }

    public function postUpdate(Request $request, $id) {
    	$price = Calc::price([
						'idTransportation'	=> $request->transportation_id,
						'from'				=> $request->from_code,
						'destination'		=> $request->destination_code,
				 ]);
    	// dd($price['economy_price']);
    	$add = Schedulle::findOrFail($id);
    	$add->transportation_id = $request->transportation_id;
    	$add->date 				= Carbon::parse($request->date);
    	$add->from_code 		= $request->from_code;
    	$add->destination_code 	= $request->destination_code;
    	$add->economy_price		= $price['economy_price'];
    	$add->bussiness_price	= $price['bussiness_price'];
    	$add->first_price		= $price['first_price'];
    	$add->save();

    	return redirect()->route('admin.schedulle');
    }

    public function postDelete($id) {
    	$delete = Schedulle::findOrFail($id);
    	$delete->delete();
    	return 'Data Delete Successfully';
    }
}
