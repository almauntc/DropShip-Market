<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Intervention\Image\Facades\Image as Image;
use App\Product;
use App\Category;
use App\productsAttribute;

class ProductsController extends Controller
{
     public function newProducts(Request $request){

       
     	if($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>"; print_r($data); die;

            if(empty($data['id_category'])){
                return redirect()->back()->with('flash_message_error', 'Under Category is missing!');
            }

    		$product = new Product;
            $product->id_category = $data['id_category'];
    		$product->name_product = $data['name_product'];
    		$product->code_product = $data['code_product'];
            $product->color_product = $data['color_product'];
            $product->stok = $data['stok'];
    		if(!empty($data['desc'])){
    			$product->desc = $data['desc'];
    		}else{
    			$product->desc = '';
    		}
    		$product->price_retail = $data['price_retail'];
            $product->price_reseller = $data['price_reseller'];
            $product->profit = $data['profit'];

    		//Upload Image
    		if($request->hasFile('image')){
    			$image_tmp = Input::file('image');
    			if($image_tmp->isValid()){
    				$extension = $image_tmp->getClientOriginalExtension();
    				$filename = rand(111,99999).'.'.$extension;
    				$large_image_path = 'images/backend_images/products/large/' .$filename;
    				$medium_image_path = 'images/backend_images/products/medium/' .$filename;
    				$small_image_path = 'images/backend_images/products/small/' .$filename;

    				//Resize images
    				Image::make($image_tmp)->save($large_image_path);
    				Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
    				Image::make($image_tmp)->resize(300,300)->save($small_image_path);

    				//Store Image name in product table
    				$product->image = $filename;
    			}

    		}
    		$product->save();
    		/*return redirect()->back()->with('flash_message_success', 'Product has been added succsessfully!');*/
            return redirect('/admin/products')->with('flash_message_success', 'Product has been Successfully!');
    	}

         $categories = Category::where(['id_parent'=>0])->get();
        $categories_dropdown = "<option selected disabled>Select</option>";
        foreach ($categories as $cat) {
            $categories_dropdown.="<option value='".$cat->id."'>".$cat->name_category."</option>";
            $sub_categories = Category::where(['id_parent'=>$cat->id])->get();
            foreach ($sub_categories as $sub_cat) {
                $categories_dropdown.= "<option value = '".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name_category."</option>";
            }
        }
        
        return view('admin.products.create')->with(compact('categories_dropdown'));
    }

    public function products(Request $request){
    	 $product = Product::get();
         $product = json_decode(json_encode($product));
         foreach ($product as $key => $val) {
             $name_category = Category::where(['id'=>$val->id_category])->first();
             $product[$key]->name_category = $name_category->name;
         }
        return view('admin.products.index')->with(compact('product'));
    }

    public function editProducts(Request $request, $id = null){
        //Get Product Details
         $productsDetails = Product::where(['id'=>$id])->first();

        //Categories dropdown start
         $categories = Category::where(['id_parent'=>0])->get();
        $categories_dropdown = "<option selected disabled>Select</option>";
        foreach ($categories as $cat) {
            $categories_dropdown.="<option value='".$cat->id."'>".$cat->name_category."</option>";
            $sub_categories = Category::where(['id_parent'=>$cat->id])->get();
            foreach ($sub_categories as $sub_cat) {
                $categories_dropdown.= "<option value = '".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name_category."</option>";
            }
        }
        // Categories dropdown ends

        if($request->isMethod('post')){
            $data = $request->all();
            
            //Upload Image
            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/products/large/' .$filename;
                    $medium_image_path = 'images/backend_images/products/medium/' .$filename;
                    $small_image_path = 'images/backend_images/products/small/' .$filename;

                    //Resize images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                }

            }else if(!empty($data['current_image'])){
                $filename=$data['current_image'];
            }else{
                $filename='';
            }

        
            if(empty($data['desc'])){
                $data['desc']='';
            }

            Product::where(['id'=>$id])->update(['id_category'=>$data['id_category'],'name_product'=>$data['name_product'],'code_product'=>$data['code_product'],'color_product'=>$data['color_product'],'stok'=>$data['stok'],'desc'=>$data['desc'],'price_retail'=>$data['price_retail'],'price_reseller'=>$data['price_reseller'],'profit'=>$data['profit'],'image'=>$filename]);
            return redirect('/admin/products')->with('flash_message_success','Product updated Successfully!');
        
        }
       
        return view('admin.products.edit')->with(compact('productsDetails','categories_dropdown'));

    }

    public function deleteProducts($id = null){
        Product::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Product has been deleted Successfully1');
    }

    public function deleteProductsImage($id = null){
        Product::where(['id'=>$id])->update(['image'=>'']);
        return redirect()->back()->with('flash_message_success','Product Image has been deleted Successfully !');
    }

    public function newAttributes(Request $request, $id=null){
        $productsDetails=Product::with('attributes')->where(['id'=>$id])->first();
        /*$productsDetails=json_decode(json_encode($productsDetails)); */

        if($request->isMethod('post')){
            $data=$request->all();
           // echo "<pre>"; print_r($data); die;
            foreach ($data['sku'] as $key => $val) {
                if(!empty($val)){
                $attribute = new productsAttribute;
                $attribute->product_id = $id;
                $attribute->sku = $val;
                $attribute->size = $data['size'][$key];
                $attribute->price_retail = $data['price_retail'][$key];
                $attribute->price_reseller = $data['price_reseller'][$key];
                $attribute->profit = $data['profit'][$key];
                $attribute->stock = $data['stock'][$key];
                $attribute->save();

            }
            }
               return redirect('/admin/product-attributes/newAtrributes/'.$id)->with('flash_message_success', 'Product attribute has been added Successfully!');
        }
        return view('admin.product-attributes.create')->with(compact('productsDetails'));

    }

     public function attributes(Request $request){
         $attributes = productsAttribute::get();
         
        return view('admin.product-attributes.index')->with(compact('attributes'));
    }

    public function deleteAttributes($id = null){
        productsAttribute::where(['id'=>$id])->deleted();
        return redirect()->back()->with('flash_message_success','Attribute has been deleted succsessfully!');
    }




}
