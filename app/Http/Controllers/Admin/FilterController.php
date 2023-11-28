<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\ProductsFilter;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ProductsFiltersValue;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class FilterController extends Controller
{
    public function filters(){
        Session::put('page','filters');
        $filters = ProductsFilter::get()->toArray();
        // dd($filters);
        return view('admin.filters.filters')->with(compact('filters'));
    }

    public function filtersValues(){
        Session::put('page','filters');
        $filters_value = ProductsFiltersValue::get()->toArray();
        // dd($filters);
        return view('admin.filters.filters_values')->with(compact('filters_value'));
    }

    public function updateFilterStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            if($data['status']=="Active"){
                $status = 0;
            }
            else{
                $status = 1;
            }
            ProductsFilter::where('id', $data['filter_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'filter_id'=>$data['filter_id']]);
        }
    }

    public function updateFilterValueStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            if($data['status']=="Active"){
                $status = 0;
            }
            else{
                $status = 1;
            }
            ProductsFiltersValue::where('id', $data['filter_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'filter_id'=>$data['filter_id']]);
        }
    }

    public function addEditFilter(Request $request, $id=null){
        Session::put('page','filters');
        if($id==""){
            $title = "Add Filter Columns";
            $filter = new ProductsFilter;
            $message = "Filter added Successfully";
        }
        else{
            $title = "Edit Filter Columns";
            $filter = ProductsFilter::find($id);
            $message = "Filter updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            $cat_ids = implode(',',$data['cat_ids']);

            //save filter column details in table
            $filter->cat_ids = $cat_ids;
            $filter->filter_name = $data['filter_name'];
            $filter->filter_column = $data['filter_column'];
            $filter->status = 1;
            $filter->save();

            DB::statement('Alter table products add '.$data['filter_column'].' varchar(255) after description');
            return redirect()->back()->with('success_message', $message);
        }
        //Get Section with Categories and Sub Categories
        $categories = Section::with('categories')
        ->get()
        ->toArray();
        
        return view('admin.filters.add_edit_filter')->with(compact('title','categories','filter'));

    }

    public function addEditFilterValue(Request $request, $id=null){
        Session::put('page','filters');
        if($id==""){
            $title = "Add Filter Value";
            $filter = new ProductsFiltersValue;
            $message = "Filter added Successfully";
        }
        else{
            $title = "Edit Filter Value";
            $filter = ProductsFiltersValue::find($id);
            $message = "Filter updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;

            //save filter values details in table
            $filter->filter_id = $data['filter_id'];
            $filter->filter_value = $data['filter_value'];
            $filter->status = 1;
            $filter->save();

            return redirect()->back()->with('success_message', $message);
        }
        //Get Filters
        $filters = ProductsFilter::where('status',1)->get()->toArray();
        
        return view('admin.filters.add_edit_filter_value')->with(compact('title','filter','filters'));

    }

    public function categoryFilters(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            $category_id = $data['category_id'];
            return response()->json(['view'=>(String)View::make('admin.filters.category_filters')->with(compact('category_id'))]);
        }
    }
}
