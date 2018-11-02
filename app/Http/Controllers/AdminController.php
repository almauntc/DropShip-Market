<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Product;
use App\Sale;
use App\UserDropshipper;
use App\Customer;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //Login
    public function login(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->input();
    		if(Auth::attempt(['email'=> $data['email'],'password'=>$data['password'], 'admin'=>'1'])){
    			//echo "Success"; die;
                return redirect('/admin/dashboard');
    		}else{
    			//echo "Failed"; die;
                return redirect('admin')->with('flash_message_error', 'Invalid Email Or Password');
    		}
    	}
    	return view('admin.admin_login');
    }

    //Dasboard
    public function dashboard(){
        $products = Product::count();
        $sales = Sale::count();
        $dropshipper = UserDropshipper::count();
        $customers = Customer::count();
        return view('admin.dashboard')->with(compact('products','sales','dropshipper','customers'));;
    }

    //Change Password
    public function settings(){
        return view('admin.settings');
    }

    public function chkPassword(Request $request){
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $check_password = User::where(['admin'=>'1'])->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $check_password = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['current_pwd'];
            if(Hash::check($current_password,$check_password->password)){
                $password = bcrypt($data['new_pwd']);
                User::where('id','1')->update(['password'=>$password]);
                return redirect('/admin/settings')->with('flash_message_success','Password updated Successfully!');
            }else {
                return redirect('/admin/settings')->with('flash_message_error','Incorrect Current Password!');
            }
        }
    }


    

     public function transactions(){
        return view('admin.dropshipper-management.transactions.index');
    }

    public function newTransactions(){
        return view('admin.dropshipper-management.transactions.create');
    }

    //Sales
    public function sales(){
        return view('admin.sales.index');
    }

     public function newSales(){
        return view('admin.sales.create');
    }

    

    //Logout
    public function logout(){
        Session::flush();
         return redirect('admin')->with('flash_message_success', 'Logged out Successfully');
    }

   
}
