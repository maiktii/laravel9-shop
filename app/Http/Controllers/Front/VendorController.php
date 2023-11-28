<?php

namespace App\Http\Controllers\Front;

use App\Models\Admin;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    public function loginRegister(){
        return view('front.vendors.login_register');
    }

    public function vendorRegister(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;

            //Validate Vendor
            $rules = [
                "name" => "required",
                "email" => "required|email|unique:admins|unique:vendors",
                "mobile" => "required|min:11|numeric|unique:admins|unique:vendors",
                "accept" => "required"

            ];
            $customMessages = [
                "name.required"=>"Name is required",
                "email.required"=>"Email is required",
                "email.unique"=>"Email is already exists",
                "mobile.required"=>"Mobile is required",
                "mobile.unique"=>"Mobile is already exists",
                "accept.required"=>"Please accept Terms and Conditions",
            ];
            $validator = Validator::make($data,$rules,$customMessages);
            if($validator->fails()){
                return Redirect::back()->withErrors($validator);
            }

            DB::beginTransaction();

            //Insert Regis to vendors table
            $vendor = new Vendor;
            $vendor->name = $data['name'];
            $vendor->mobile = $data['mobile'];
            $vendor->email = $data['email'];
            $vendor->status= 0;
            $vendor->save();

            $vendor_id = DB::getPdo()->lastInsertId();

            //Insert regis to admins table
            $admin = new Admin;
            $admin->type ='vendor';
            $admin->vendor_id = $vendor_id;
            $admin->name = $data['name'];
            $admin->mobile = $data['mobile'];
            $admin->email = $data['email'];
            $admin->password = bcrypt($data['password']);
            $admin->status= 0;
            $admin->save();

            DB::commit();     
            
            //Redirect back Vendor
            $message = "Thank you for registering as vendor. We will confirm by email once your account is approved";
            return redirect()->back()->with('success_message', $message);
        }
    }
}
