<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserDropshipper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Product;
use Auth;
use App\Category;
use App\ProductsAttribute;
use App\Cart;
use App\Sale;
use DB;

class DropshipperController extends Controller
{
   public function index(){
        
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu Harus Login');
        }
        else{
            //In Ascending order (by default)
            $productsAll = Product::get();

            //In Descending order
            $productsAll = Product::orderBy('id','DESC')->get();

            //In Random Order
            $productsAll = Product::inRandomOrder()->get();

            //Get all Categories and sub Categories
            $categories = Category::with('categories')->where(['id_parent'=>0])->get();

            return view('home')->with(compact('productsAll','categories_menu','categories'));
        }

	}

//Login Register
        public function login(){
         $GetId = UserDropshipper::get();
         $GetId = json_decode(json_encode($GetId));
        return view('login')->with(compact('GetId'));;
    }

         public function loginPost(Request $request){
        $id = $request->id;
        $email = $request->email;
        $password = $request->password;
        $data =UserDropshipper::where('email',$email)->first();
        if(count($data) > 0){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('name', $data->name);
                Session::put('id', $data->id);
                Session::put('email',$data->email);
                Session::put('login',TRUE);
                //$userCart= Session::get('id');
                //echo "<pre>"; print_r($userCart); die;
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
            'address' => 'required|min:4',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);
        $data =  new UserDropshipper();
        $data->name = $request->name;
        $data->handphone = $request->handphone;
        $data->address=$request->address;
        $data->bank_account_number=$request->bank_account_number;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);

        $data->save();
        return redirect('login')->with('alert-success','Kamu berhasil Register');
    }

    public function contact(){
        return view('contact');
    }

//Keranjang Saya  
     public function cart(Request $request){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu Harus Login');
        }
        else{
            $session_id = Session::get('session_id');
            $userCart = DB::table('carts')->where(['session_id'=>$session_id])->get();
            foreach ($userCart as $key => $product) {
                $producsDetails = Product::where('id',$product->product_id)->first();
                $userCart[$key]->image = $producsDetails->image;
                # code...
            }
           // echo "<pre>"; print_r($userCart);
            return view('products.cart')->with(compact('userCart'));
        }
    }

     public function addtocart(Request $request){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu Harus Login');
        }
        else{
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;
        if(empty($data['dropshipper_email'])){
            $data['dropshipper_email']='';
        }

       if(empty($data['dropshipper_id'])){
            $data['dropshipper_id']=1;
        } 

        $session_id = Session::get('session_id');
        if (empty($session_id)) {
            $session_id = str_random(40);
             Session::put('session_id',$session_id);
        }
        
        $sizeArr = explode("-",$data['size']);

        $countProducts = DB::table('carts')->where(['product_id'=>$data['product_id'],'color_product'=>$data['color_product'],'size'=>$sizeArr[1],'session_id'=>$session_id])->count();
        if($countProducts>0){
            return redirect()->back()->with('flash_message_error','Produk sudah ada di Produk Saya!');
        }else{
            $getSKU = ProductsAttribute::select('sku')->where(['product_id'=>$data['product_id'],'size'=>$sizeArr[1]])->first();
            DB::table('carts')->insert(['product_id'=>$data['product_id'],'dropshipper_id'=>$data['dropshipper_id'],'name_product'=>$data['name_product'],'code_product'=>$getSKU->sku,'color_product'=>$data['color_product'],'price_retail'=>$data['price_retail'],'price_reseller'=>$data['price_reseller'],'size'=>$sizeArr[1],'quantity'=>$data['quantity'],'profit'=>$data['profit'],'dropshipper_email'=>$data['dropshipper_email'],'session_id'=>$session_id]);
        }
            return redirect('produk-saya')->with('flash_message_success','Produk berhasil di tambahkan di Produk Saya!');
        }
    }


    public function deleteCartProduct($id = null){
        DB::table('carts')->where('id',$id)->delete();
        return redirect('produk-saya')->with('flash_message_success','Produk berhasil dihapus dari Produk Saya!');
    }

    public function updateCartQuantity($id=null,$quantity=null){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu Harus Login');
        }else{
            $getCartDetails = DB::table('carts')->where('id',$id)->first();
            $getAttributeStock = ProductsAttribute::where('sku',$getCartDetails->code_product)->first();
            $updated_quantity = $getCartDetails->quantity+$quantity;

        if($getAttributeStock->stock >= $updated_quantity){
            DB::table('carts')->where('id',$id)->increment('quantity',$quantity);
            return redirect('produk-saya')->with('flash_message_success','Jumlah produk berhasil diubah!');
            }else{
                return redirect('produk-saya')->with('flash_message_error', 'Jumlah yang anda butuhkan tidak tersedia');
            }
        }
    }

//Cek Pembayaran Produk
    public function addsale(Request $request){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu Harus Login');
        }
        else{
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;
        if(empty($data['dropshipper_payment_status'])){
            $data['dropshipper_payment_status']='Belum Dibayar';
        }

       if(empty($data['customer_delivery_status'])){
            $data['customer_delivery_status']='Belum Dikirim';
        } 

        if(empty($data['customer_payment_status'])){
            $data['customer_payment_status']='Belum Bayar';
        }

        if(empty($data['delivery_payment'])){
            $data['delivery_payment']=0;
        }

        //$countProducts = DB::table('sales')->where(['product_id'=>$data['product_id']])->count();
         //"<pre>"; print_r($countProducts); die;
         // if($countProducts>0){
         //     return redirect()->back()->with('flash_message_error','Produk sudah di validasi!');
         // }else{
           // echo "<pre>"; print_r($data); die;
            DB::table('sales')->insert(['cart_id'=>$data['cart_id'],'dropshipper_id'=>$data['dropshipper_id'],'product_id'=>$data['product_id'],'name_product'=>$data['name_product'],'code_product'=>$data['code_product'],'color_product'=>$data['color_product'],'dropshipper_payment_status'=>$data['dropshipper_payment_status'],'customer_delivery_status'=>$data['customer_delivery_status'],'size'=>$data['size'],'profit'=>$data['profit'],'customer_payment_status'=>$data['customer_payment_status'],'delivery_payment'=>$data['delivery_payment']]);
            
            return redirect('produk-saya')->with('flash_message_success','Produk berhasil di Validasi!');
            //}
         }
    }

    public function sale(Request $request){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu Harus Login');
        }
        else{
             $dropshipper_id = Session::get('id');
            $dropshipperAtt=DB::table('dropshippers')->where(['id'=>$dropshipper_id])->first(); 
          //  $f= UserDropshipper::where(['id'=>$dropshipper_id])->get();
           // echo "<pre>"; print_r($f); die;
             $userCart = DB::table('sales')->where(['dropshipper_id'=>$dropshipper_id])->get();
            foreach ($userCart as $key => $product) {
                $producsDetails = Product::where('id',$product->product_id)->first();
                $cartDetails=Cart::where('id',$product->cart_id)->first();
                $dropshipperDetails = UserDropshipper::where('id',$product->dropshipper_id)->first();
                $userCart[$key]->quantity = $cartDetails->quantity;
                $userCart[$key]->image = $producsDetails->image;
                $userCart[$key]->profit = $cartDetails->profit;
                $userCart[$key]->price_retail = $cartDetails->price_retail;
                $userCart[$key]->bank_account_number = $dropshipperDetails->bank_account_number;
                $userCart[$key]->bank_account_name = $dropshipperDetails->bank_account_name;
                $userCart[$key]->name_bank = $dropshipperDetails->name_bank;

            }
           
            return view('products.sale')->with(compact('userCart','dropshipperAtt'));
        }
    }

    public function deleteSale($id = null){
        DB::table('sales')->where('id',$id)->delete();
        return redirect('penjualan-produk')->with('flash_message_success','Produk berhasil dihapus dari Cek Status Penjualan!');
    }

    public function editRekening(Request $request ,$id=null){
        $data = $request->all();
        
         //$dropshipper_id = Session::get('id');
          // $f= UserDropshipper::where(['id'=>$dropshipper_id])->update(['bank_account_number'=>$data['bank_account_number'],'bank_account_name'=>$data['bank_account_name'],'name_bank'=>$data['name_bank']])->get();
           // echo "<pre>"; print_r($f); die;
    
         
         UserDropshipper::where(['id'=>$id])->update(['bank_account_number'=>$data['bank_account_number'],'bank_account_name'=>$data['bank_account_name'],'name_bank'=>$data['name_bank']]);
         return redirect()->back()->with('flash_message_success','Informasi Rekening Anda Telah di Update!');
      
}

    // Chart Profit
    public function ProfitChart()
    {
        $profit = DB::table('carts')
                    ->select(
                        DB::raw("year(created_at) as year"),
                        DB::raw("SUM(profit) as total_profit")) 
                    ->orderBy("created_at")
                    ->groupBy(DB::raw("year(created_at)"))
                    ->get();


        $result[] = ['Year','Profit'];
        foreach ($profit as $key => $value) {
            $result[++$key] = [(string)$value->year, (int)$value->total_profit];
        }


        return view('products.chart')
                ->with('profit',json_encode($result));
    }


    //Dropshipper Admin
     public function dropshipper(Request $request){
         $dropshippers = UserDropshipper::get();
        return view('admin.dropshipper-management.dropshipper.index')->with(compact('dropshippers'));
    }

    public function editProduct(Request $request, $id=null){
        
        $data = $request->all();
         $userCart=UserDropshipper::where(['id'=>$id])->with('myproduct')->first();
         $userSale = DB::table('sales')->where(['dropshipper_id'=>$id])->get();
       // echo "<pre>"; print_r($userSale); die;
         foreach ($userSale as $key => $product) {
                $producsDetails = Product::where('id',$product->product_id)->first();
                $cartDetails=Cart::where('id',$product->cart_id)->first();
                $userSale[$key]->quantity = $cartDetails->quantity;
                $userSale[$key]->image = $producsDetails->image;
            }
         $productsDetails=Product::where(['id'=>$id])->with('attributes')->first();


        return view('admin.dropshipper-management.dropshipper.create')->with(compact('userCart','userSale'));
    
}

    public function editStatus(Request $request, $id=null){
         if($request->isMethod('post')){
            $data = $request->all();
            foreach ($data['idSale'] as $key => $attr) {
                Sale::where(['id'=>$data['idSale'][$key]])->update(['customer_delivery_status'=>$data['customer_delivery_status'][$key],'customer_payment_status'=>$data['customer_payment_status'][$key],'dropshipper_payment_status'=>$data['dropshipper_payment_status'][$key]]);
            }
            return redirect()->back()->with('flash_message_success', 'Product Status has been updated Successfully!');
         }
    }

     public function deleteStatus($id = null){
        Sale::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Product Sale has been deleted succsessfully!');
    }

    public function deleteDropship($id = null){
        UserDropshipper::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Product Sale has been deleted succsessfully!');
    }


    // Info Pembayaran Pembayaran
    

     public function kwitansi(Request $request){
       
            return view('products.kwitansi');
        
    }

    public function ongkir(Request $request){
       
            return view('products.ongkir');
        
    }

     public function kabupaten(Request $request){
       
            return view('products.cek_kabupaten');
        
    }

     public function cek_ongkir(Request $request){
            
            return view('products.cek_ongkir');
        
    }

}

