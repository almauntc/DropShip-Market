<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use Session;
use Auth;



class SupplierController extends Controller
{
    //
    public function supplier(){
        $supplier = Supplier::get();
        return view('admin.supplier-management.supplier.index')->with(compact('supplier'));
    }

    public function newSupplier(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>"; print_r($data); die;
    		$supplier = new Supplier;
    		$supplier->name = $data['name'];
    		$supplier->address = $data['address'];
    		$supplier->phone =$data['phone'];
    		$supplier->email = $data['email'];
    		$supplier->save();
            return redirect()->back()->with('flash_message_success','Supplier Added Successfully!');
    	}
        return view('admin.supplier-management.supplier.create');
    }

    public function editSupplier(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            Supplier::where(['id'=>$id])->update(['name'=>$data['name'],'address'=>$data['address'],'phone'=>$data['phone'],'email'=>$data['email']]);
            return redirect('/admin/supplier-management/supplier')->with('flash_message_success','Category updated Successfully!');
        }
        $supplierDetails = Supplier::where(['id'=>$id])->first();
        return view('admin.supplier-management.supplier.edit')->with(compact('supplierDetails'));

    }

    public function deleteSupplier(Request $request, $id = null){
        if(empty($id)){
            Supplier::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Supplier deleted Successfully!');
        }
    }

}
