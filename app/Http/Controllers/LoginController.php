<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Auth;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request){
        $this->validate($request, [
            'mobileNumber' => 'required',
            'password' => 'required',
        ]);

        $data = ['mobile'  => $request->mobileNumber, 'password' => $request->password];
        Auth::attempt($data);
        
        return redirect()->route('admin.dashboard');
    }

    public function register(){
        return view('register');
    }

    public function registerStore(Request $request){
        $this->validate($request, [
            'mobile' => 'required',
            'password' => 'required',
        ]);

        $data = User::create([
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ]);

        if($data){
            session()->flash('success', 'Registration Successfully');
            return redirect()->back();
        }else{
            session()->flash('error', 'Something Error. Please Try Again.');
            return redirect()->back()->withInput();
        }
    }
}
