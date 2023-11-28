@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Settings</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{ $title }}</h4>
                  @if(Session::has('error_message'))
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Error :</strong> {{Session::get('error_message')}}
                        <button button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  @endif

                  @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-table="Close">
                            <span aria-hidden="true">$times;</span>
                        </button>
                    </div>
                    @endif

                  @if(Session::has('success_massage'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success : </strong> {{Session::get('success_massage')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                  @endif
                  <form class="forms-sample"  @if(empty($product['id']))  action="{{url('admin/add-edit-product') }}" @else action="{{url('admin/add-edit-product/' .$product['id']) }}" @endif method="POST" enctype="multipart/form-data">@csrf
                  <div class="form-group">
                      <label for="category_id">Select Category</label>
                      <select name="category_id" id="category_id" class="form-control">
                        <option value="">Select</option>
                        @foreach($categories as $section)
                            <optgroup label="{{ $section['name'] }}" ></optgroup>
                            @foreach($section['categories'] as $category)
                                <option @if(!empty($product['category_id'] == $category['id'])) selected="" @endif value="{{ $category['id'] }}">&nbsp;&nbsp;&nbsp;--&nbsp;{{ $category['category_name'] }}</option>
                                @foreach($category['subcategories'] as $subcategory)
                                <option @if(!empty($product['category_id']== $subcategory['id'])) selected="" @endif value="{{ $subcategory['id'] }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;{{ $subcategory['category_name'] }}</option>
                                @endforeach
                            @endforeach
                        @endforeach
                      </select>
                    </div>
                    <div class="loadFilters">
                      @include('admin.filters.category_filters')
                    </div>
                    <div class="form-group">
                      <label for="brand_id">Select Brand</label>
                      <select name="brand_id" id="brand_id" class="form-control">
                        <option value="">Select</option>
                        @foreach($brands as $brand)
                           <option @if(!empty($product['brand_id'] == $brand['id'])) selected="" @endif value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="product_name">Product Name</label>
                      <input type="text" class="form-control" id="product_name" placeholder="Enter product Name" name="product_name" @if(!empty($product['product_name'])) value="{{ $product['product_name'] }}" @else value="{{ old('product_name') }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="product_code">Product Code</label>
                      <input type="text" class="form-control" id="product_code" placeholder="Enter product Code" name="product_code" @if(!empty($product['product_code'])) value="{{ $product['product_code'] }}" @else value="{{ old('product_code') }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="product_color">Product Color</label>
                      <input type="text" class="form-control" id="product_color" placeholder="Enter product Color" name="product_color" @if(!empty($product['product_color'])) value="{{ $product['product_color'] }}" @else value="{{ old('product_color') }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="product_price">Product Price</label>
                      <input type="text" class="form-control" id="product_price" placeholder="Enter product Price" name="product_price" @if(!empty($product['product_price'])) value="{{ $product['product_price'] }}" @else value="{{ old('product_price') }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="product_discount">Product Discount (%)</label>
                      <input type="text" class="form-control" id="product_discount" placeholder="Enter product Discount" name="product_discount" @if(!empty($product['product_discount'])) value="{{ $product['product_discount'] }}" @else value="{{ old('product_discount') }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="product_weight">Product Weight</label>
                      <input type="text" class="form-control" id="product_weight" placeholder="Enter product Name" name="product_weight" @if(!empty($product['product_weight'])) value="{{ $product['product_weight'] }}" @else value="{{ old('product_weight') }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="product_image">Product Image (Recomended Size: 1000x1000)</label>
                      <input type="file" class="form-control" id="product_image"  name="product_image">
                      @if(!empty($product['product_image']))
                      <a href="{{ url('front/images/product_images/large/'.$product['product_image']) }}" target="_blank">View Image</a>&nbsp;|&nbsp;
                      <a href="javascript:void(0);" class="confirmDelete">Delete Image</a>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="product_video">Product Video (Recomended Size: Less then 2MB)</label>
                      <input type="file" class="form-control" id="product_video"  name="product_video">
                      @if(!empty($product['product_video']))
                      <a href="{{ url('front/videos/product_videos/'.$product['product_video']) }}" target="_blank">View Video</a>&nbsp; | &nbsp;
                      <a href="javascript:void(0);" class="confirmDelete" module="product-video" modulid="{{ $product['id'] }}">Delete Video</a>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="description">Product Description</label>
                      <textarea name="description" id="description" cols="3" class="form-control">{{ $product['description'] }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="meta_title">Meta Title</label>
                      <input type="text" class="form-control" id="meta_title" placeholder="Enter product Meta Title" name="meta_title" @if(!empty($product['meta_title'])) value="{{ $product['meta_title'] }}" @else value="{{ old('meta_title') }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="meta_description">Meta Description</label>
                      <input type="text" class="form-control" id="meta_description" placeholder="Enter product Meta Description" name="meta_description" @if(!empty($product['meta_description'])) value="{{ $product['meta_description'] }}" @else value="{{ old('meta_description') }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="meta_keywords">Meta Keywords</label>
                      <input type="text" class="form-control" id="meta_keywords" placeholder="Enter product Meta Keywords" name="meta_keywords" @if(!empty($product['meta_keywords'])) value="{{ $product['meta_keywords'] }}" @else value="{{ old('meta_keywords') }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="is_featured">Featured Item</label>
                      <input type="checkbox" name="is_featured" id="is_featured" value="Yes" @if(!empty($product['is_featured']) && $product['is_featured'] == "Yes") checked="" @endif>
                    </div>
                    <div class="form-group">
                      <label for="is_bestseller">Best Seller Item</label>
                      <input type="checkbox" name="is_bestseller" id="is_bestseller" value="Yes" @if(!empty($product['is_bestseller']) && $product['is_bestseller'] == "Yes") checked="" @endif>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>    
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('admin.layout.footer')
    <!-- partial -->
</div>


@endsection