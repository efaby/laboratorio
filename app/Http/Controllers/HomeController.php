<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;

class HomeController extends Controller
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
   // public function index()
   // {
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador','Analista','Secretaria']);
        return view('home');
    }

    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }

     public function changePassword(Request $request){
 
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Su Contrase&ntilde;a Actual no coincide con la ingresada. Intente nuevamente.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","La nueva Contrase&ntilde;a no puede ser igual a la Contrase&ntilde;a Actual. Por favor ingrese otra Contrase&ntilde;a.");
        }

        $this->validate($request, [
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","La Contrase&ntilde;a ha sido cambiada exitosamente!");
 
    }

}
