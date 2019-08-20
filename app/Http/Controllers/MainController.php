<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    //
    public function index(){

        return view('login');
    }

    public function display(Request $request){

        $validator = Validator::make($request->all(),[

            'email'=>'sometimes',
            'password'=>'sometimes',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = User::query()->select([
            'id',
            'name',
            'email',
            'password',
        ])->get();


        return response()->json(['users' => $user]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    function checklogin(Request $request)
    {

       $kk = $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'

        ]);
        dd($kk);

        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );
//        dd($user_data);

        if(Auth::attempt($user_data))
        {
            return redirect('main/successlogin');
        }
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }

    }

    function successlogin()
    {
        return view('successlogin');
    }

    function logout()
    {
        Auth::logout();
        return redirect('main');
    }
}
