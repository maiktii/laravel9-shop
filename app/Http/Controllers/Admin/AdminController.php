<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Vendor;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\VendorsBankDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\VendorsBusinessDetail;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard(){
        Session::put('page', 'dashboard');
        return view('admin.dashboard');
    }
    
    
    public function login(Request $request){
        // echo $password = Hash::make('123456'); die;
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            if(Auth::guard('admin')->attempt([
                'email'=> $data['email'],
                'password' => $data['password'],
                'status' => 1
            ])){
            return redirect('admin/dashboard');
            }
            else{
                return redirect()->back()->with('error_massage', 'Invalid Email or Password');
            }
            
        }
        return view('admin.login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    public function updateAdminPassword(Request $request){
        Session::put('page', 'update_admin_password');
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if(Hash::check($data['current_password'], Auth::guard('admin')->user()->password)){
                if($data['confrim_password']==$data['new_password']){
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_password'])]);
                    return redirect()->back()->with('success_massage', 'Your Password Has Been Updated!');
                }else{
                    return redirect()->back()->with('error_massage', 'Your New Password Is Not Updated');
                }
            }else{
                return redirect()->back()->with('error_massage', 'Your Current Password Is Incorrect');
            }
        }
        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update_admin_password')->with(compact('adminDetails'));
    }

    public function checkAdminPassword(Request $request){
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;
        if(Hash::check($data['current_password'], Auth::guard('admin')->user()->password)){
            return "true";
        }else{
            return "false";
        }
    }

    public function updateAdminDetails(Request $request){
        Session::put('page', 'update_admin_details');
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $rules=[
                'admin_name' => 'required |regex:/^[\pL\s\-]+$/u',
                'admin_mobile'=> 'required|numeric',
            ];

            $customMessages =[
                'admin_name.required' => 'Name is required',
                'admin_name.regex' => 'Valid Name is required',
                'admin_mobile.required' => 'Mobile is required',
                'admin_mobile.numeric'=> 'Valid Mobile is required',
            ];


            $this->validate($request, $rules, $customMessages);

            Admin::where('id', Auth::guard('admin')->user()->id)
                ->update([
                    'name'=>$data['admin_name'],
                    'mobile'=>$data['admin_mobile']
                ]);
                return redirect()->back()->with('success_massage', 'Admin Details Updated!');
        }
        return view('admin.settings.update_admin_details');
    }

    public function updateVendorDetails($slug, Request $request){
        if($slug=="personal"){
            if($request->isMethod('post')){
                $data = $request->all();
                // echo "<pre>"; print_r($data); die;
                $rules=[
                    'vendor_name' => 'required |regex:/^[\pL\s\-]+$/u',
                    'vendor_mobile'=> 'required|numeric',
                ];
    
                $customMessages =[
                    'vendor_name.required' => 'Name is required',
                    'vendor_name.regex' => 'Valid Name is required',
                    'vendor_mobile.required' => 'Mobile is required',
                    'vendor_mobile.numeric'=> 'Valid Mobile is required',
                ];
    
    
                $this->validate($request, $rules, $customMessages);
    
                Admin::where('id', Auth::guard('admin')->user()->id)
                    ->update([
                        'name'=>$data['vendor_name'],
                        'mobile'=>$data['vendor_mobile']
                    ]);
                Vendor::where('id', Auth::guard('admin')->user()->vendor_id)
                    ->update([
                        'name'=>$data['vendor_name'],
                        'mobile'=>$data['vendor_mobile'],
                        'address'=>$data['vendor_address'],
                        'city'=>$data['vendor_city'],
                        'state'=>$data['vendor_state'],
                        'country'=>$data['vendor_country'],
                        'pincode'=>$data['vendor_pincode'],
                    ]);
                    return redirect()->back()->with('success_massage', 'Vendor Details Updated!');
            }
            $vendorDetails = Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->first()->toArray(); 
            
        }
        else if($slug=="business"){
            if($request->isMethod('post')){
                $data = $request->all();
                // echo "<pre>"; print_r($data); die;
                $rules=[
                    'shop_name' => 'required |regex:/^[\pL\s\-]+$/u',
                    'shop_mobile'=> 'required|numeric',
                    'shop_city'=> 'required |regex:/^[\pL\s\-]+$/u',
                    'address_proof'=> 'required',
                ];
    
                $customMessages =[
                    'shop_name.required' => 'Name is required',
                    'shop_city.required'=> 'City Name is required',
                    'shop_name.regex' => 'Valid Name is required',
                    'shop_city.regex'=> 'Valid City Name is required',
                    'shop_mobile.required' => 'Mobile is required',
                    'shop_mobile.numeric'=> 'Valid Mobile is required',
                ];
    
    
                $this->validate($request, $rules, $customMessages);
                $vendorCount =  VendorsBusinessDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->count();
                if($vendorCount>0){
                    VendorsBusinessDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)
                    ->update([
                        'shop_name'=>$data['shop_name'],
                        'shop_mobile'=>$data['shop_mobile'],
                        'shop_email'=>$data['shop_email'],
                        'shop_address'=>$data['shop_address'],
                        'shop_city'=>$data['shop_city'],
                        'shop_pincode'=>$data['shop_pincode'],
                        'address_proof'=>$data['address_proof'],
                        'business_license_number'=>$data['business_license_number'],
                    ]);
                }
                else{
                    VendorsBusinessDetail::insert(['vendor_id', Auth::guard('admin')->user()
                    ->vendor_id,
                        'shop_name'=>$data['shop_name'],
                        'shop_mobile'=>$data['shop_mobile'],
                        'shop_email'=>$data['shop_email'],
                        'shop_address'=>$data['shop_address'],
                        'shop_city'=>$data['shop_city'],
                        'shop_pincode'=>$data['shop_pincode'],
                        'address_proof'=>$data['address_proof'],
                        'business_license_number'=>$data['business_license_number'],
                    ]);
                }
                    return redirect()->back()->with('success_massage', 'Vendor Details Updated!');
                }
                $vendorCount = VendorsBusinessDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->count(); 
                if($vendorCount>0){
                    $vendorDetails = VendorsBusinessDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first()->toArray(); 
                }
                else{
                    $vendorDetails = array();
                }
        }
        else if($slug=="bank"){
            if($request->isMethod('post')){
                $data = $request->all();
                $rules=[
                    'bank_name' => 'required |regex:/^[\pL\s\-]+$/u',
                    'account_number'=> 'required|numeric',
                    'account_name' => 'required |regex:/^[\pL\s\-]+$/u',
                ];
    
                $customMessages =[
                    'bank_name.required' => 'Bank Name is required',
                    'bank_name.regex' => 'Valid Bank Name is required',
                    'account_name.required' => 'Bank Name is required',
                    'account_name.regex' => 'Valid Bank Name is required',
                    'account_number.required' => 'Mobile is required',
                    'account_number.numeric'=> 'Valid Mobile is required',
                ];
    
    
                $this->validate($request, $rules, $customMessages);
                $vendorCount =  VendorsBankDetail::where('id', Auth::guard('admin')->user()->vendor_id)->count();
                if($vendorCount>0){    
                    VendorsBankDetail::where('id', Auth::guard('admin')->user()->vendor_id)
                        ->update([
                            'account_name'=>$data['account_name'],
                            'account_number'=>$data['account_number'],
                            'bank_name'=>$data['bank_name'],
                            'bank_code'=>$data['bank_code'],
                        ]);
                }
                else{
                    VendorsBankDetail::insert(['id', Auth::guard('admin')->user()
                    ->vendor_id,
                        'account_name'=>$data['account_name'],
                        'account_number'=>$data['account_number'],
                        'bank_name'=>$data['bank_name'],
                        'bank_code'=>$data['bank_code'],
                    ]);
                }
                    return redirect()->back()->with('success_massage', 'Vendor Details Updated!');
            }

                $vendorCount = VendorsBankDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->count(); 
                    if($vendorCount>0){
                        $vendorDetails = VendorsBankDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first()->toArray(); 
                    }
                    else{
                        $vendorDetails = array();
                    }            
        }
        $countries = Country::get()->toArray();
        return view('admin.settings.update_vendor_details')->with(compact('slug', 'vendorDetails', 'countries'));
    }

    public function admins($type=null){
        $admins = Admin::query();
        if(!empty($type)){
            $admins = $admins->where('type', $type);
            $title = ucfirst($type)."s";
            Session::put('page', 'view_'.strtolower($title));
        }
        else{
            $title = "All Admins/Subadmins/Vendors";
            Session::put('page', 'view_all');
        }
        $admins = $admins->get()->toArray();

        return view('admin.admins.admins')->with(compact('admins', 'title'));
    }

    public function viewVendorDetails($id){
        $vendorDetails = Admin::with('vendorPersonal', 'vendorBusiness', 'vendorBank')->where('id', $id)->first();
        $vendorDetails = json_decode(json_encode($vendorDetails),true);
        return view('admin.admins.view_vendor_details')->with(compact('vendorDetails'));
    }

    public function updateAdminStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            if($data['status']=="Active"){
                $status = 0;
            }
            else{
                $status = 1;
            }
            Admin::where('id', $data['admin_id'])->update(['status'=>$status]);
            $adminDetails = Admin::where('id',$data['admin_id'])->first()->toArray();
            if($adminDetails['type']=="vendor" && $status==1){
                Vendor::where('id',$adminDetails['vendor_id'])->update(['status'=>$status]);
            }
            return response()->json(['status'=>$status, 'admin_id'=>$data['admin_id']]);
        }
    }
}
