<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserDropshipper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DropshipperController extends Controller
{
   public function index(){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu Harus Login');
        }
        else{
            return view('home');
        }
	}
        public function login(){
        return view('login');
    }

     public function loginPost(Request $request){
        $email = $request->email;
        $password = $request->password;
        $data =UserDropshipper::where('email',$email)->first();
        if(count($data) > 0){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
            	Session::put('name',$data->name);
                Session::put('email',$data->email);
                Session::put('login',TRUE);
                return redirect('home');
            }
            else{
                return redirect('login')->with('alert','Password atau Email, Salah !'.Hash::check($password,$data->password));
            }
        }
        else{
            return redirect('login')->with('alert','Password atau Email, Salah!');
        }
    }

 	public function logout(){
        Session::flush();
        return redirect('login')->with('alert','Kamu sudah logout');
    }

    public function register(Request $request){
        return view('login');
    }

    public function registerPost(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|min:4|email|unique:dropshippers',
            'handphone' => 'required|min:4',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);
        $data =  new UserDropshipper();
        $data->name = $request->name;
        $data->handphone = $request->handphone;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('login')->with('alert-success','Kamu berhasil Register');
    }

    //Dropshipper Admin
     public function dropshipper(Request $request){
         $dropshippers = UserDropshipper::get();
        return view('admin.dropshipper-management.dropshipper.index')->with(compact('dropshippers'));
    }

    public function newDropshipper(){
        return view('admin.dropshipper-management.dropshipper.create');
    }
}
