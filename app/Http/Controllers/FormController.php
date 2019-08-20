<?php
/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 8/13/2019
 * Time: 11:26 AM
 */



namespace App\Http\Controllers;


use Illuminate\Support\Facades\Validator;
use App\Http\Requests\SaveDeviceRequest;
use Illuminate\Http\Request;

class FormController extends Controller
{

    public function create(){

        return view('loginform.loginform');
    }
    public function index(){
        $customers = new FormController();

        return view('loginform.display',compact('customers'));
    }
    public function store(){

        $customer = new FormController();
        $customer->name =\request('name');
        $customer->email=\request('email');
        $customer->phone=\request('phone');
//        dd($customer);
//        $customer->save();

        return redirect('/display');
    }

}