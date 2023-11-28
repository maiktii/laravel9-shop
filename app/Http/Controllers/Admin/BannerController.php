<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\fileExists;

class BannerController extends Controller
{
    public function banners(){
        Session::put('page', 'banners');
        $banners = Banner::get()->toArray();
        //dd($banners);
        return view('admin.banners.banners')->with(compact('banners'));
    }

    public function updateBannerStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            if($data['status']=="Active"){
                $status = 0;
            }
            else{
                $status = 1;
            }
            Banner::where('id', $data['banner_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'banner_id'=>$data['banner_id']]);
        }
    }

    public function deleteBanner($id){
        $bannerImage = Banner::where('id', $id)->first();
        $banner_image_path = 'front/images/banner_images/';

        if(file_exists($banner_image_path.$bannerImage->image)){
            unlink($banner_image_path.$bannerImage->image);
        }

        Banner::where('id', $id)->delete();

        $message = "Banner Deleted Successfully!";
        return redirect()->back()->with('success_message', $message);
    }

    public function addEditBanner(Request $request, $id=null){
        if($id==""){
            $banner = new Banner;
            $title = "Add Banner Image";
            $message = "Banner Added Successfully";
        }
        else{
            $banner = Banner::find($id);
            $title = "Edit Banner Image";
            $message = "Banner Updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $banner->type = $data['type'];
            $banner->link = $data['link'];
            $banner->title = $data['title'];
            $banner->alt = $data['alt'];
            $banner->status = 1;

            if($data['type']=="Slider"){
                $width = "1920";
                $height = "720";
            }
            else if($data['type']=="Fix"){
                $width = "1920";
                $height = "450";
            }

            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();

                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'front/images/banner_images/'.$imageName;


                    Image::make($image_tmp)->resize($width,$height)->save($imagePath);
                    $banner->image = $imageName;
                }
            }
            $banner->save();
            return redirect('admin/banners')->with('success_message', $message);
        }

        return view('admin.banners.add_edit_banner')->with(compact('title','banner'));
    }
}
