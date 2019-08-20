<?php

namespace App\Http\Controllers;

use App\Device;
use App\Http\Requests\SaveDeviceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DevicesController extends Controller
{
    //
    public function index(){

        $devices = Device::all();

        return view('devices.index',compact('devices'));
    }


    /**

     */
    public function create(){

        return view('devices.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *  * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function storeDevice(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $device = new Device();

        $device->name = request('name');

        $device->description = $request->description;
//        dd($device);
        $device->save();

//        return redirect('/devices');
        return response()->json($device->refresh(), 201);

    }



}
