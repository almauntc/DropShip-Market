<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserDropshipper;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image as Image;
use App\Product;
use Auth;
use App\Category;
use App\ProductsAttribute;
use App\Cart;
use App\Sale;
use App\Customer;
use App\Transfer;
use DB;

class CustomerController extends Controller
{
    //Dropshipper Web
    public function addCustomers(Request $request, $id=null){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu Harus Login');
        }
        else{
        $data =  new Customer();
        $data->sale_id = $request->sale_id;
        $data->dropshipper_id = $request->dropshipper_id;
        $data->name_customer=$request->name_customer;
        $data->email=$request->email;
        $data->handphone = $request->handphone;
        $data->kode_pos = $request->kode_pos;
        $data->address = $request->address;
        $data->save();
         $productsDetails = Sale::where('id',$id)->first();
        //echo "<pre>"; print_r($data); die;
        //    DB::table('customers')->insert(['product_id'=>$data['product_id'],'dropshipper_id'=>$data['dropshipper_id'],'name_customer'=>$data['name_customer'],'email'=>$data->email,'handphone'=>$data['handphone'],'kode_pos'=>$data['kode_pos'],'address'=>$data['address']]);
       return redirect()->back()->with('flash_message_success','Data Customer berhasil di tambahkan!');
         
        }
    }


        public function customer($id=null){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu Harus Login');
        }
        else{
          
              //Get Product Details
		        $productsDetails = Sale::where('id',$id)->first();
		        $productsDetails = json_decode(json_encode($productsDetails));
		    //    echo "<pre>"; print_r($productsDetails); die;
            
           // echo "<pre>"; print_r($userCart);
            return view('products.customer')->with(compact('productsDetails'));
        }
    }

     public function editCustomers(Request $request, $id=null){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu Harus Login');
        }
        else{
        if($request->isMethod('post')){
            $data = $request->all();
            Customer::where(['id'=>$id])->update(['name_customer'=>$data['name_customer'],'email'=>$data['email'],'handphone'=>$data['handphone'],'kode_pos'=>$data['kode_pos'],'address'=>$data['address']]);
            return redirect()->back()->with('flash_message_success','Data Customer Berhasil di Ubah!');
        }
        $customerDetails = Customer::where(['id'=>$id])->first();
        return view('products.edit_customer')->with(compact('customerDetails'));


        }
    }


    // Admin Customer
    public function customerlist(){
        $customers = Customer::get();
        return view('admin.customer.index')->with(compact('customers'));
    }

    public function delCustomerlist(Request $request, $id = null){    
            Customer::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Customer deleted Successfully!');
    }

    public function customer_info(Request $request, $id=null){
        
        $data = $request->all();
         $status=Sale::where(['id'=>$id])->with('mystatus')->first();
         $customerInfo = DB::table('customers')->where(['sale_id'=>$id])->get();
         $transfer = DB::table('transfers')->where(['id_customer'=>$id])->get();
       // echo "<pre>"; print_r($userSale); die;
         $productsDetails=Product::where(['id'=>$id])->with('attributes')->first();


        return view('admin.dropshipper-management.dropshipper.customer')->with(compact('status','customerInfo','transfer'));   
    }

    public function upload_bukti(Request $request, $id=null){
        $SaleDetails = Sale::where('id',$id)->first();
        $SaleDetails = json_decode(json_encode($SaleDetails));
          //echo "<pre>"; print_r($SaleDetails); die;
        $CustomerDetails = Customer::where('id',$id)->first();

        if($request->isMethod('post')){
            $data = $request->all();
           // echo "<pre>"; print_r($data); die;

            $transfer = new Transfer;
            $transfer->id_customer = $data['id_customer'];
            $transfer->id_sale = $data['id_sale'];
            $transfer->id_dropshipper = $data['id_dropshipper'];
           
            //Upload Image
            if($request->hasFile('transfer_image')){
                $image_tmp = Input::file('transfer_image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/frontend_images/transfer/large/' .$filename;
                    $medium_image_path = 'images/frontend_images/transfer/medium/' .$filename;
                    $small_image_path = 'images/frontend_images/transfer/small/' .$filename;

                    //Resize images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                    //Store Image name in product table
                    $transfer->transfer_image = $filename;
                }

            }
            $transfer->save();
            /*return redirect()->back()->with('flash_message_success', 'Product has been added succsessfully!');*/
           return redirect()->back()->with('flash_message_success', 'Bukti Transfer Berhasil di Kirim!');
    }
    return redirect()->back()->with(compact('SaleDetails','CustomerDetails'));
}

    public function payment(Request $request, $id=null){
        $dropshipper_id = Session::get('id');
        $SaleDetails = Sale::where('id',$id)->first();
        $SaleDetails = json_decode(json_encode($SaleDetails));
        $CustomerDetails = Customer::where('id',$id)->first();
        $userPayment=Cart::where(['id'=>$id])->first();
      /* $userPayment = DB::table('sales')->where(['dropshipper_id'=>$dropshipper_id])->get();
            foreach ($userPayment as $key => $product) {
                $cartDetails = Cart::where('id',$product->product_id)->first();
                $userPayment[$key]->quantity = $cartDetails->quantity;
                $userPayment[$key]->price_retail = $cartDetails->price_retail;
                
                # code...
            }
            */
        //echo "<pre>"; print_r($userPayment); die;
        return view('products.payment')->with(compact('SaleDetails','CustomerDetails','userPayment'));
        
    }

    public function deleteTransferImage($id = null){
        Transfer::where(['id'=>$id])->update(['transfer_image'=>'']);
        return redirect()->back()->with('flash_message_success','Transfer Image has been deleted Successfully !');
    }

     public function print_info(Request $request, $id=null){
        $dropshipper_id = Session::get('id');
         $SaleDetails = Sale::where('id',$id)->first();
        $Customer=Sale::where(['id'=>$id])->with('mystatus')->first();
        //echo "<pre>"; print_r($SaleDetails); die;
        $userSale=Cart::where(['id'=>$id])->first();
        return view('print.index')->with(compact('SaleDetails','userSale','Customer'));
        
    }

}
