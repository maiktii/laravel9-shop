<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Section;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductsAttribute;
use App\Http\Controllers\Controller;
use App\Models\ProductsFilter;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function products(){
        Session::put('page', 'products');
        $adminType = Auth::guard('admin')->user()->type;
        $vendor_id = Auth::guard('admin')->user()->vendor_id;
        if($adminType=="vendor"){
            $vendorStatus = Auth::guard('admin')->user()->status;
            if($vendorStatus==0){
                return redirect("admin/update-vendor-details/personal")->with('error_message','Your Vendor Account is not Active, Please make sure to fill your valid details');
            }
        }
        $products = Product::with(['section'=>function($query){
            $query->select('id', 'name');
        }, 'category'=>function($query){
            $query->select('id', 'category_name');
        }]);
        if($adminType=="vendor"){
            $products = $products->where('vendor_id',$vendor_id);
        }
        $products = $products->get()->toArray();
        // dd($products);
        return view('admin.products.products')->with(compact('products'));
    }

    public function updateProductStatus(Request $request){
        Session::put('page', 'products');
        if($request->ajax()){
            $data = $request->all();
            if($data['status']=="Active"){
                $status = 0;
            }
            else{
                $status = 1;
            }
            Product::where('id', $data['product_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'product_id'=>$data['product_id']]);
        }
    }

    public function deleteProduct($id){
        Session::put('page', 'products');
        Product::where('id', $id)->delete();
        $message = "Product Has Been Deleted Successfully!";
        return redirect()->back()->with('success_message', $message);
    }

    public function addEditProduct(Request $request, $id=null){
        Session::put('page', 'products');
        if($id==""){
            $title = "Add Product";
            $product = new Product;
            $message = "Product Added Successfully";

        }
        else{
            $title = "Edit Product";
            $product = Product::find($id);
            $message = "Product Updated Successfully";
            
        }

        if($request->isMethod('post')){
            $data = $request->all();
        //    echo "<pre>"; print_r($data); die;
            //Validation
            $rules=[
                'category_id'=> 'required',
                'product_name' => 'required |regex:/^[\pL\s\-]+$/u',
                'product_code' => 'required |regex:/^[\w-]*$/ ' ,
                'product_price' => 'required |numeric',
                'product_color' => 'required |regex:/^[\pL\s\-]+$/u',
            ];

            $customMessages =[
                'category_id.required' => 'Category ID is required',
                'product_name.required' => 'Product Name is required',
                'product_name.regex' => 'Valid Product Name is required',
                'product_code.required' => 'Product Code is required',
                'product_code.regex' => 'Valid Product Code is required',
                'product_price.required' => 'Product Price is required',
                'product_price.numeric' => 'Valid Product Price is required',
                'product_color.required' => 'Product Color is required',
                'product_color.regex' => 'Valid Product Color is required',
            ];

            $this->validate($request, $rules, $customMessages);

            //Upload Image after resize
            //Small Image : 250x250
            //Medium : 500x500
            //Large : 1000x1000
            if($request->hasFile('product_image')){
                $image_tmp = $request->file('product_image');
                    if($image_tmp->isValid()){
                        $extension = $image_tmp->getClientOriginalExtension();

                        $imageName = rand(111,99999).''.$extension;
                        $imageLargePath = 'front/images/product_images/large/'.$imageName;
                        $imageMediumPath = 'front/images/product_images/medium/'.$imageName;
                        $imageSmallPath = 'front/images/product_images/small/'.$imageName;

                //Upload Large, medium, small after resize
                Image::make($image_tmp)->resize(1000,1000)->save($imageLargePath);
                Image::make($image_tmp)->resize(500,500)->save($imageMediumPath);
                Image::make($image_tmp)->resize(250,250)->save($imageSmallPath);

                $product->product_image = $imageName;
                }
            
            }

            //Upload Video
            if($request->hasFile('product_video')){
                $video_tmp = $request->file('product_video');
                if($video_tmp->isValid()){
                    $extension = $video_tmp->getClientOriginalExtension();
                    $videoName = rand(111,99999).''.$extension;
                    $videoPath = 'front/videos/product_videos/';
                    $video_tmp->move($videoPath,$videoName);

                    $product->product_video = $videoName;

                }
            }
        
            //Save Product details in Products table
            $categoryDetails = Category::find($data['category_id']);
            $product->section_id = $categoryDetails['section_id'];
            $product->category_id = $data['category_id'];
            $product->brand_id = $data['brand_id'];

            $productFilters = ProductsFilter::productFilters();
            foreach($productFilters as $filter){
                /*echo $data[$filter['filter_column']]; die;*/
                $filterAvailable = ProductsFilter::filterAvailable($filter['id'],$data['category_id']);
                if($filterAvailable=="Yes"){
                    if(isset($filter['filter_column']) && $data[$filter['filter_column']]){
                        $product->{$filter['filter_column']} = $data[$filter['filter_column']];
                    }
                }
            }

            //Save Admin 
            $adminType = Auth::guard('admin')->user()->type;
            $vendor_id = Auth::guard('admin')->user()->vendor_id;
            $admin_id = Auth::guard('admin')->user()->id;

            $product->admin_type = $adminType;
            $product->admin_id = $admin_id;
            if($adminType=="vendor"){
                $product->vendor_id = $vendor_id;
            }
            else{
                $product->vendor_id = 0;
            }   
            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            $product->product_price = $data['product_price'];
            $product->product_discount = $data['product_discount'];
            $product->product_weight = $data['product_weight'];
            $product->description = $data['description'];
            $product->meta_title = $data['meta_title'];
            $product->meta_description = $data['meta_description'];
            $product->meta_keywords = $data['meta_keywords'];
            if(!empty($data['is_featured'])){
                $product->is_featured = $data['is_featured'];
            }
            else{
                $product->is_featured = "No";
            }
            if(!empty($data['is_bestseller'])){
                $product->is_bestseller = $data['is_bestseller'];
            }
            else{
                $product->is_bestseller = "No";
            }
            $product->status = 1;
            $product->save();
            return redirect('admin/products')->with('success_massage', $message);
        }

        //Get Section with Categories and Sub Categories
        $categories = Section::with('categories')
            ->get()
            ->toArray();

        //Get All Brand
        $brands = Brand::where('status',1)
        ->get()
        ->toArray();


        return view('admin.products.add_edit_product')->with(compact('title', 'categories', 'brands', 'product'));
    }

    public function deleteProductImage($id){
        Session::put('page', 'products');
        $productImage = Product::select('product_image')->where('id', $id)->first();

        $imageSmallPath = 'front/images/product_images/small/';
        $medium_image_path = 'front/images/product_images/medium/';
        $large_image_path = 'front/images/product_images/large/';


        //Delete Image From Form
        if(file_exists($imageSmallPath.$productImage->product_image)){
            unlink($imageSmallPath.$productImage->product_image);
        }

        if(file_exists($medium_image_path.$productImage->product_image)){
            unlink($medium_image_path.$productImage->product_image);
        }

        if(file_exists($large_image_path.$productImage->product_image)){
            unlink($large_image_path.$productImage->product_image);
        }

        //Delete Image from DB
        Product::where('id', $id)->update(['product_image'=>'']);

        $message = "Product Image has been Deleted Successfully";
        return redirect()->back()->with('success_message', $message);

    }

    public function deleteProductVideo($id){
        Session::put('page', 'products');
        $productVideo = Product::select('product_video')->where('id', $id)->first();

        $product_video_path = 'front/videos/product_videos/';

        if(file_exists($product_video_path.$productVideo->product_video)){
            unlink($product_video_path.$productVideo->product_video);
        }

        Product::where('id', $id)->update(['product_video'=>'']);

        $message = "Product Image has been Deleted Successfully";
        return redirect()->back()->with('success_message', $message);

    }

    public function addAttributes(Request $request, $id){
        Session::put('page', 'products');
        $product = Product::select('id','product_name','product_code','product_color','product_price','product_image')
        ->with('attributes')
        ->find($id);
        $product = json_decode(json_encode($product), true);
        // dd($product);
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            foreach ($data['sku'] as $key => $value) {
                if(!empty($value)){

                    $skuCount = ProductsAttribute::where('sku', $value)->count();
                    if($skuCount>0){
                        return redirect()->back()->with('error_message', 'SKU already exists! Please Add another SKU');
                    }

                    $sizeCount = ProductsAttribute::where(['product_id'=>$id, 'size'=> $data['size'][$key]])->count();
                    if($sizeCount>0){
                        return redirect()->back()->with('error_message', 'Size already exists! Please Add another Size');
                    }
                    $attribute = new ProductsAttribute;
                    $attribute->product_id = $id;
                    $attribute->sku = $value;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->status = 1;
                    $attribute->save();
                }
            }
            return redirect()->back()->with('success_message', 'Product Attribute has been Added Successfully!');
        }
        return view('admin.attributes.add_edit_attributes')->with(compact('product'));
    }

    public function updateAttributeStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            if($data['status']=="Active"){
                $status = 0;
            }
            else{
                $status = 1;
            }
            ProductsAttribute::where('id', $data['attribute_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'attribute_id'=>$data['attribute_id']]);
        }
    }

    public function editAttributes(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            foreach ($data['attributeId'] as $key => $attribute) {
                if(!empty($attribute)){
                    ProductsAttribute::where(['id'=>$data['attributeId'][$key]])
                    ->update(['price'=>$data['price'][$key], 'stock'=>$data['stock'][$key]]);
                }
            }
            return redirect()->back()->with('success_message', 'Product Attribute has been Updated Successfully!');
        }
    }

}
