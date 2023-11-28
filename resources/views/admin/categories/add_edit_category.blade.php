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
                  @if(Session::has('error_massage'))
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Error :</strong> {{Session::get('error_massage')}}
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
                  <form class="forms-sample"  @if(empty($category['id']))  action="{{url('admin/add-edit-category') }}" @else action="{{url('admin/add-edit-category/' .$category['id']) }}" @endif method="POST" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                      <label for="category_name">Category Name</label>
                      <input type="text" class="form-control" id="category_name" placeholder="Enter Category Name" name="category_name" @if(!empty($category['category_name'])) value="{{ $category['category_name'] }}" @else value="{{ old('category_name') }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="section_id">Section Name</label>
                      <select name="section_id" id="section_id" class="form-control">
                        <option value="">Select</option>
                        @foreach($getSections as $section)
                        <option value="{{ $section['id']}}" @if(!empty($category['section_id']) && $category['section_id']==$section['id']) selected="" @endif>&nbsp;&nbsp;&nbsp;--&nbsp;{{ $section['name']}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div id="appendCategoriesLevel">
                        @include('admin.categories.append_categories_level')
                    </div>
                    <div class="form-group">
                      <label for="category_discount">Category Discount</label>
                      <input type="text" class="form-control" id="category_discount" placeholder="Enter Category discount" name="category_discount" @if(!empty($category['category_discount'])) value="{{ $category['category_discount'] }}" @else value="{{ old('category_discount') }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="description">Category Description</label>
                      <textarea name="description" id="description" cols="3" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="url">Category URL</label>
                      <input type="text" class="form-control" id="url" placeholder="Enter Category url" name="url" @if(!empty($category['url'])) value="{{ $category['url'] }}" @else value="{{ old('url') }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="meta_title">Meta Title</label>
                      <input type="text" class="form-control" id="meta_title" placeholder="Enter Category Meta Title" name="meta_title" @if(!empty($category['meta_title'])) value="{{ $category['meta_title'] }}" @else value="{{ old('meta_title') }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="meta_description">Meta Description</label>
                      <input type="text" class="form-control" id="meta_description" placeholder="Enter Category Meta Description" name="meta_description" @if(!empty($category['meta_description'])) value="{{ $category['meta_description'] }}" @else value="{{ old('meta_description') }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="meta_keywords">Meta Keywords</label>
                      <input type="text" class="form-control" id="meta_keywords" placeholder="Enter Category Meta Keywords" name="meta_keywords" @if(!empty($category['meta_keywords'])) value="{{ $category['meta_keywords'] }}" @else value="{{ old('meta_keywords') }}" @endif>
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