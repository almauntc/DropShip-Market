<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
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
        return view('admin.dashboard');
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


    //Supplier
     public function supplier(){
        return view('admin.supplier-management.supplier.index');
    }

    public function newSupplier(){
        return view('admin.supplier-management.supplier.create');
    }

     public function products(){
        return view('admin.supplier-management.products.index');
    }

    public function newProducts(){
        return view('admin.supplier-management.products.create');
    }


    //Customer
     public function customer(){
        return view('admin.customer-management.customer.index');
    }

    public function newCustomer(){
        return view('admin.customer-management.customer.create');
    }

     public function order(){
        return view('admin.customer-management.order.index');
    }

    public function newOrder(){
        return view('admin.customer-management.order.create');
    }

    //Sales
    public function sales(){
        return view('admin.sales.index');
    }

     public function newSales(){
        return view('admin.sales.create');
    }

    //Comission
     public function comission(){
        return view('admin.comission');
    }

    //Logout
    public function logout(){
        Session::flush();
         return redirect('admin')->with('flash_message_success', 'Logged out Successfully');
    }

   
}
