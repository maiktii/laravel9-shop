<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function categories(){
        Session::put('page', 'categories');
        $categories = Category::with(['section', 'parentcategory'])->get()->toArray();

        return view('admin.categories.categories')->with(compact('categories'));
    }

    public function updateCategoryStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            if($data['status']=="Active"){
                $status = 0;
            }
            else{
                $status = 1;
            }
            Category::where('id', $data['category_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'category_id'=>$data['category_id']]);
        }
    }

    public function addEditCategory(Request $request, $id=null){
        if($id==""){
            //Add Category
            $title = "Add Category";
            $category = new Category;
            $getCategories = array();
            $message = "Category Added Successfully!";
        }
        else{
            //Edit Category
            $title = "Add Category";
            $category = Category::find($id);
            $getCategories = Category::with('subcategories')->where(['parent_id'=>0,'section_id'=>$category['section_id']])->get();
            $message = "Category Edited Successfully!";
        }

        if($request->isMethod('post')){
            $data = $request->all();

            
            $rules=[
                'category_name' => 'required |regex:/^[\pL\s\-]+$/u',
                'section_id'=> 'required',
                'url'=> 'required',
            ];

            $customMessages =[
                'category_name.required' => 'Category Name is required',
                'category_name.regex' => 'Valid Category Name is required',
                'section_id.required' => 'Section ID is required',
                'url.required' => 'Category URL is required',
            ];

            $this->validate($request, $rules, $customMessages);

            if($data['category_discount']==""){
                $data['category_discount']=0;
            }


            $category->section_id = $data['section_id'];
            $category->parent_id = $data['parent_id'];
            $category->category_name = $data['category_name'];
            $category->category_discount = $data['category_discount'];
            $category->description= $data['description'];
            $category->url= $data['url'];
            $category->meta_title= $data['meta_title'];
            $category->meta_description= $data['meta_description'];
            $category->meta_keywords= $data['meta_keywords'];
            $category->status= 1;
            $category->save();

            return redirect('admin/categories')->with('success_message', $message);
        }

        //Get All Sections
        $getSections = Section::get()->toArray();

        return view('admin.categories.add_edit_category')->with(compact('title', 'category', 'getSections', 'getCategories'));
    }

    public function appendCategoryLevel(Request $request){
        if($request->ajax()){
            $data = $request->all();
            $getCategories = Category::with('subcategories')
            ->where(['parent_id'=>0,'section_id'=>$data['section_id']])
            ->get()
            ->toArray();
            // dd($getCategories);
            return view('admin.categories.append_categories_level')->with(compact('getCategories'));
        }
    }

    public function deleteCategory($id){
        Category::where('id', $id)->delete();
        $message = "Category Has Been Deleted Successfully!";
        return redirect()->back()->with('success_message', $message);
    }
    
}
