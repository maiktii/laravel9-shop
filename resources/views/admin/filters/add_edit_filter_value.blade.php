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
                  <form class="forms-sample"  @if(empty($filter['id']))  action="{{url('admin/add-edit-filter-value') }}" @else action="{{url('admin/add-edit-filter-value/' .$filter['id']) }}" @endif method="POST" enctype="multipart/form-data">@csrf
                  <div class="form-group">
                      <label for="filter_id">Select Filter</label>
                      <select name="filter_id" id="filter_id" class="form-control" multiple="">
                        <option value="">Select</option>
                            @foreach($filters as $filter)
                                <option value="{{ $filter['id'] }}">{{ $filter['filter_name'] }}</option>
                            @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="filter_value">Filter Value</label>
                      <input type="text" class="form-control" id="filter_value" name="filter_value" placeholder="Enter filter value" value="filter_value" @if(!empty($filter['filter_value'])) value="{{ $filter['filter_value'] }}" @else value="{{ old('filter_value') }}" @endif>
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