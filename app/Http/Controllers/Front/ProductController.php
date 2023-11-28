<?php

namespace App\Http\Controllers\Front;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductsFilter;
use App\Models\ProductsAttribute;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    public function listing(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            $url = $data['url']; 
            $_GET['sort'] = $data['sort'];
            $categoryCount = Category::where(['url'=>$url, 'status'=>1])->count();
            if($categoryCount>0){
                $categoryDetails = Category::categoryDetails($url);
                $categoryProducts = Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])
                ->where('status',1);

                $productFilters = ProductsFilter::productFilters(); 
                foreach ($productFilters as $key => $filter) {
                    if(isset($filter['filter_column']) && isset($data[$filter['filter_column']]) &&
                    !empty($filter['filter_column']) && !empty($data[$filter['filter_column']])){
                        $categoryProducts->whereIn($filter['filter_column'],$data[$filter['filter_column']]);
                    }
                }

                //Sort by
                if(isset($_GET['sort']) && !empty($_GET['sort'])){
                    if($_GET['sort']=="product_latest"){
                        $categoryProducts->orderby('products.id','Desc');
                    }
                    else if($_GET['sort']=="price_lowest"){
                        $categoryProducts->orderby('products.product_price', 'Asc');
                    }
                    else if($_GET['sort']=="price_highest"){
                        $categoryProducts->orderby('products.product_price', 'Desc');
                    }
                    else if($_GET['sort']=="name_z_a"){
                        $categoryProducts->orderby('products.product_name', 'Asc');
                    }
                    else if($_GET['sort']=="name_a_z"){
                        $categoryProducts->orderby('products.product_name', 'Desc');
                    }
                }

                //Filter by size
                if(isset($data['size']) && !empty($data['size'])){
                    $productIds = ProductsAttribute::select('product_id')
                    ->whereIn('size',$data['size'])
                    ->pluck('product_id')
                    ->toArray();

                    $categoryProducts->whereIn('products.id',$productIds);
                }

                //Filter by Color
                if(isset($data['color']) && !empty($data['color'])){
                    $productIds = Product::select('id')
                    ->whereIn('product_color',$data['color'])
                    ->pluck('id')
                    ->toArray();
                    $categoryProducts->whereIn('products.id',$productIds);
                }

                //Filter by brand
                if(isset($data['brand']) && !empty($data['brand'])){
                    $productIds = Product::select('id')
                    ->whereIn('brand_id',$data['brand'])
                    ->pluck('id')
                    ->toArray();
                    $categoryProducts->whereIn('products.id',$productIds);
                }
 
                //Filter by Price
                if(isset($data['price']) && !empty($data['price'])){
                    $implodePrices = implode('-',$data['price']);
                    $explodePrices = explode('-',$implodePrices);
                    // echo "<pre>"; print_r($explodePrices); die;
                    $min = reset($explodePrices);
                    $max = end($explodePrices);
                    $productIds = Product::select('id')
                    ->whereBetween('product_price',[$min, $max])
                    ->pluck('id')
                    ->toArray();
                    $categoryProducts->whereIn('products.id',$productIds);
                }
            
            $categoryProducts= $categoryProducts->simplePaginate(3);
            // dd($categoryDetails);
            // echo "Category Exist";die;
            return view('front.products.ajax_products_listing')->with(compact('categoryDetails','categoryProducts','url'));
        }
        else{
            abort(404);
        }
        }
        else{
            $url = Route::getFacadeRoot()->current()->uri(); 
            $categoryCount = Category::where(['url'=>$url, 'status'=>1])->count();
            if($categoryCount>0){
                $categoryDetails = Category::categoryDetails($url);
                $categoryProducts = Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])
                ->where('status',1);

                if(isset($_GET['sort']) && !empty($_GET['sort'])){
                    if($_GET['sort']=="product_latest"){
                        $categoryProducts->orderby('products.id','Desc');
                    }
                    else if($_GET['sort']=="price_lowest"){
                        $categoryProducts->orderby('products.product_price', 'Asc');
                    }
                    else if($_GET['sort']=="price_highest"){
                        $categoryProducts->orderby('products.product_price', 'Desc');
                    }
                    else if($_GET['sort']=="name_z_a"){
                        $categoryProducts->orderby('products.product_name', 'Asc');
                    }
                    else if($_GET['sort']=="name_a_z"){
                        $categoryProducts->orderby('products.product_name', 'Desc');
                    }
                }
                
                $categoryProducts= $categoryProducts->simplePaginate(3);
                // dd($categoryDetails);
                // echo "Category Exist";die;
                return view('front.products.listing')->with(compact('categoryDetails','categoryProducts','url'));
            }
            else{
                abort(404);
            }
        }
             // echo "test"; die;
    }

    public function detail($id){
        $productDetails = Product::with(['section','category','brand','attributes'=>function($query){
            $query->where('stock','>',0)->where('status',1);
        },'vendor'])->find($id)->toArray();
        $categoryDetails = Category::categoryDetails($productDetails['category']['url']);
        // dd($productDetails);

        //Get Similar Products
        $similarProducts = Product::with('brand')->where('category_id',$productDetails['category']['id'])
        ->where('id','!=',$id)->limit(4)->inRandomOrder()->get()->toArray();
        // dd($similarProducts);
        $totalStock = ProductsAttribute::where('product_id',$id)->sum('stock');
        return view('front.products.detail')->with(compact('productDetails','categoryDetails','totalStock','similarProducts'));
    }

    public function getProductPrice(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            $getDiscountAttributePrice = Product::getDiscountAttributePrice($data['product_id'],$data['size']);
            return $getDiscountAttributePrice;
        }
    }

    public function cart(){
        $getCartItems = Cart::getCartItems();
        // dd($getCartItems);
        return view('front.products.cart')->with(compact('getCartItems'));
    }

    public function cartAdd(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data); die;
            
            //Check Product Stock
            $getProductStock = ProductsAttribute::isStockAvailable($data['product_id'],$data['size']);

            if($getProductStock<$data['quantity']){
                return redirect()->back()->with('error_message','Required Quantity is not available');
            }

            //Genereate Session Id
            $session_id = Session::get('session_id');
            if(empty($session_id)){
                $session_id = Session::getId();
                Session::put('session_id',$session_id);
            }

            //Check product if already exists in cart
            if(Auth::check()){
                $user_id = Auth::user()->id;
                $countProducts = Cart::where(['product_id'=>$data['product_id'],'size'=>$data['size'],'user_id'=>$user_id])->count();
            }
            else{
                $user_id = 0;
                $countProducts = Cart::where(['product_id'=>$data['product_id'],'size'=>$data['size'],'session_id'=>$session_id])->count();

            }

            //Save Product in carts table
            $item = new Cart;
            $item->session_id = $session_id;
            $item->user_id = $user_id;
            $item->product_id = $data['product_id'];
            $item->size = $data['size'];
            $item->quantity = $data['quantity'];
            $item->save();
            return redirect()->back()->with('success_message','Product has been added in Cart!');
        }
    }

    public function cartUpdate(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>";print_r($data); die;

            $cartDetails = Cart::find($data['cartid']);

            $availableStock = ProductsAttribute::select('stock')
            ->where(['product_id'=>$cartDetails['product_id'],'size'=>$cartDetails['size']])
            ->first()
            ->toArray();
            // echo "<pre>";print_r($availableStock); die;

            //Check the stock if less than stock eror
            if($data['qty']>$availableStock['stock']){
                $getCartItems = Cart::getCartItems();
                return response()->json([
                    'status'=>false,
                    'message'=>'Product Stock is not available!',
                    'view'=>(String)View::make('front.products.cart_items')
                ->with(compact('getCartItems'))
            ]);
            }

            //Check the size is available
            $availableSize = ProductsAttribute::where(['product_id'=>$cartDetails['product_id'],'size'=>$cartDetails['size'],'status'=>1])
            ->count();
            if($availableSize==0){
                $getCartItems = Cart::getCartItems();
                return response()->json([
                    'status'=>false,
                    'message'=>'Product Size is not available. Please remove and choose another product!',
                    'view'=>(String)View::make('front.products.cart_items')
                ->with(compact('getCartItems'))
                ]);
            }

            //Update the Quantity
            Cart::where('id',$data['cartid'])->update(['quantity'=>$data['qty']]);
            $getCartItems = Cart::getCartItems();
            return response()->json([
                'status'=>true,
                'view'=>(String)View::make('front.products.cart_items')
            ->with(compact('getCartItems'))
            ]);
        }
    }
    
    public function cartDelete(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>";print_r($data); die;
            Cart::where('id',$data['cartid'])->delete();
            $getCartItems = Cart::getCartItems();
            return response()->json([
                'view'=>(String)View::make('front.products.cart_items')
            ->with(compact('getCartItems'))
            ]);
        }
    }
}
