<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
     public function category(Request $request){
     	 $category = Category::get();
        return view('admin.categories.index')->with(compact('category'));
    }

     public function newCategory(Request $request){
     	if($request->isMethod('post')){
     		$data = $request->all();
     		$category=new Category;
     		$category->name_category = $data['name_category'];
     		$category->id_parent=$data['id_parent'];
     		$category->description = $data['description'];
     		$category->url = $data['url'];
     		$category->save();
     		return redirect()->back()->with('flash_message_success','Category Added Successfully!');
     	}
     	$levels = Category::where(['id_parent'=>0])->get();
        return view('admin.categories.create')->with(compact('levels'));
    }

     public function editCategory(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            Category::where(['id'=>$id])->update(['name_category'=>$data['name_category'],'description'=>$data['description'],'url'=>$data['url']]);
            return redirect('/admin/category')->with('flash_message_success','Category updated Successfully!');
        }
        $categoryDetails = Category::where(['id'=>$id])->first();
        $levels=Category::where(['id_parent'=>0])->get();
        return view('admin.categories.edit')->with(compact('categoryDetails','levels'));

    }

    public function deleteCategory(Request $request, $id = null){
        if(empty($id)){
            Category::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Category deleted Successfully!');
        }
    }

}
