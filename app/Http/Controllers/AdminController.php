<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//add new
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function loginHandler(Request $request){
        //return 'hello admin login';
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($fieldType == 'email'){
            $request->validate([
                'login_id'=>'required|email|exists:admins,email',
                'password'=>'required|min:5|max:25'
            ],[
                'login_id.required'=>'Please insert Email or Username',
                'login_id.email'=>'Invalid email address',
                'login_id.required'=>'Email does not exist in system',
                'password.required'=>'Please insert password'

            ]);
            
        } else{
            $request->validate([
                'login_id'=>'required|exists:admins,username',
                'password'=>'required|min:5|max:25'
            ],[
                'login_id.required'=>'Please insert Email or Username',
                //'login_id.email'=>'Invalid email address',
                'login_id.required'=>'Email does not exist in system',
                'password.required'=>'Please insert password'

            ]);
        }

        $creds = array(
            $fieldType => $request->login_id,
            'password'=>$request->password
        );

        if(Auth::guard('admin')->attempt($creds)){
            return redirect()->route('admin.home');
        }else{
            session()->flash('fail', 'incorrect credentials');
            return redirect()->route('admin.login');
        }
    }
}
