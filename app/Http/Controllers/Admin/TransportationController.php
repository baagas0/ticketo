<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transportation;

class TransportationController extends Controller
{
    public function getIndex() {
    	$data['data'] = Transportation::get();
        return view('admin.transportation.main', $data);
    }

    public function postAdd(Request $request) {
        // dd($request->all());
        $add = new Transportation;
        $add->name              = $request->name;
        $add->economy_seat      = $request->economy_seat;
        $add->economy_price     = $request->economy_price;
        $add->bussiness_seat    = $request->bussiness_seat;
        $add->bussiness_price   = $request->bussiness_price;
        $add->first_seat        = $request->first_seat;
        $add->first_price       = $request->first_price;
        $add->save();

        return 'Data Saved Successfully';
    }

    public function postUpdate($id, Request $request) {
    	$data = Transportation::findOrFail($id);
	    	if (!empty($request->name)) {
	    		$data->name = $request->name;
	    	}
	    	if (!empty($request->economy_seat)) {
	    		$data->economy_seat = $request->economy_seat;
	    	}
            if (!empty($request->economy_price)) {
                $data->economy_price = $request->economy_price;
            }
            if (!empty($request->bussiness_seat)) {
                $data->bussiness_seat = $request->bussiness_seat;
            }
            if (!empty($request->bussiness_price)) {
                $data->bussiness_price = $request->bussiness_price;
            }
            if (!empty($request->first_seat)) {
                $data->first_seat = $request->first_seat;
            }
            if (!empty($request->first_price)) {
                $data->first_price = $request->first_price;
            }
    	$save = $data->update();
    	if ($save) {
    		return 'Data Successfully Saved';
    	}else {
    		return 'Data Failed Saved';
    	}
    }

    public function postDestroy($id) {
    	$data = Transportation::findOrFail($id);
    	$delete = $data->delete();

    	if ($delete) {
    		return 'Data Successfully Deleted';
    	}else {
    		return 'Data Failed Deleted';
    	}
    }
}
