<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FilterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use DeepCopy\Filter\Filter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



require __DIR__.'/auth.php';

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    Route::match(['get','post'],'login', 'AdminController@login');

    Route::group(['middleware'=>['admin']], function(){

        //Admin Route
        Route::get('dashboard', 'AdminController@dashboard');
        Route::match(['get', 'post'],'update-admin-password', 'AdminController@updateAdminPassword');
        Route::match(['get', 'post'],'update-admin-details', 'AdminController@updateAdminDetails');
        Route::match(['get', 'post'],'update-vendor-details/{slug}', 'AdminController@updateVendorDetails');
        Route::get('admins/{type?}', 'AdminController@admins');
        Route::get('view-vendor-details/{id}', 'AdminController@viewVendorDetails');
        Route::post('check-admin-password', 'AdminController@checkAdminPassword');
        Route::post('update-admin-status', 'AdminController@updateAdminStatus');
        
        //Section Route
        Route::get('sections', 'SectionController@sections');
        Route::post('update-section-status', 'SectionController@updateSectionStatus');
        Route::get('delete-section/{id}', 'SectionController@deleteSection');
        Route::match(['get', 'post'], 'add-edit-section/{id?}', 'SectionController@addEditSection');

        //Category Route
        Route::get('categories', 'CategoryController@categories');
        Route::post('update-category-status', 'CategoryController@updateCategoryStatus');
        Route::match(['get', 'post'], 'add-edit-category/{id?}', 'CategoryController@addEditCategory');
        Route::get('append-categories-level', 'CategoryController@appendCategoryLevel');
        Route::get('delete-category/{id}', 'CategoryController@deleteCategory');
        
        //Brand Route
        Route::get('brands', 'BrandController@brands');
        Route::post('update-brand-status', 'BrandController@updateBrandStatus');
        Route::get('delete-brand/{id}', 'BrandController@deleteBrand');
        Route::match(['get', 'post'], 'add-edit-brand/{id?}', 'BrandController@addEditBrand');

        //Products Route
        Route::get('products', 'ProductController@products');
        Route::post('update-product-status', 'ProductController@updateProductStatus');
        Route::get('delete-product/{id}', 'ProductController@deleteProduct');
        Route::match(['get', 'post'], 'add-edit-product/{id?}', 'ProductController@addEditProduct');
        Route::get('delete-product-image/{id}', 'ProductController@deleteProductImage');
        Route::get('delete-product-video/{id}', 'ProductController@deleteProductVideo');

        //Atrribute Route
        Route::match(['get', 'post'], 'add-edit-attributes/{id}', 'ProductController@addAttributes');
        Route::post('update-attribute-status', 'ProductController@updateAttributeStatus');
        Route::get('delete-attribute/{id}', 'ProductController@deleteAttribute');
        Route::match(['get','post'],'edit-attributes/{id}','ProductController@editAttributes');

        //Filter Route
        Route::get('filters','FilterController@filters');
        Route::get('filters-values','FilterController@filtersValues');
        Route::post('update-filter-status', 'FilterController@updateFilterStatus');
        Route::post('update-filter-value-status', 'FilterController@updateFilterValueStatus');
        Route::match(['get','post'],'add-edit-filter/{id?}','FilterController@addEditFilter');
        Route::match(['get','post'],'add-edit-filter-value/{id?}','FilterController@addEditFilterValue');
        Route::post('category-filters','FilterController@categoryFilters');

        //Banner Route
        Route::get('banners','BannerController@banners');
        Route::post('update-banner-status', 'BannerController@updateBannerStatus');
        Route::get('delete-banner/{id}', 'BannerController@deleteBanner');
        Route::match(['get', 'post'], 'add-edit-banner/{id?}', 'BannerController@addEditBanner');

        //Admin Logout
        Route::get('logout', 'AdminController@logout');
    });  
});

Route::namespace('App\Http\Controllers\Front')->group(function(){
    //Home Page Front End Route
    Route::get('/', 'IndexController@index');

    //Listing /Categories Route
    $catUrls = Category::select('url')->where('status', 1)->get()->pluck('url')->toArray();
    // dd($catUrls);
    foreach ($catUrls as $key => $url) {
        Route::match(['get','post'],'/'.$url, 'ProductController@listing');
    }

    //Product Detail Page
    Route::get('/product/{id}','ProductController@detail');

    //Get Product Attribute Price
    Route::post('get-product-price','ProductController@getProductPrice');

    //vendor login/regis
    Route::get('vendor/login-register', 'VendorController@loginRegister');

    //Vendor regis
    Route::post('vendor/register','VendorController@vendorRegister');

    //Cart Page Route
    Route::get('cart','ProductController@cart');

    //Cart Add Route
    Route::post('cart/add','ProductController@cartAdd');

    //Update cart item quantity
    Route::post('cart/update','ProductController@cartUpdate');

    //Delete Cart item
    Route::post('cart/delete', 'ProductController@cartDelete');
});
