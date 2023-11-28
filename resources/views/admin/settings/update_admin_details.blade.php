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
                  <h4 class="card-title">Update Admin Details</h4>
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
                  <form class="forms-sample" action="{{url('admin/update-admin-details') }}" method="POST" name="updateAdminPassword" id="updateAdminPassword">@csrf
                    <div class="form-group">
                      <label>Admin Username/Email</label>
                      <input class="form-control" readonly="" value="{{ Auth::guard('admin')->user()->email }}">
                    </div>
                    <div class="form-group">
                      <label>Admin Type</label>
                      <input class="form-control" readonly="" value="{{ Auth::guard('admin')->user()->type }}">
                    </div>
                    <div class="form-group">
                      <label for="admin_name">Name</label>
                      <input type="tet" class="form-control" id="admin_name" placeholder="Enter Current Password" name="admin_name" required="" value="{{ Auth::guard('admin')->user()->name }}">
                    </div>
                    <div class="form-group">
                      <label for="admin_mobile">Mobile</label>
                      <input type="text" class="form-control" id="admin_mobile" placeholder="Enter Your Phone Number" name="admin_mobile" required="" value="{{ Auth::guard('admin')->user()->mobile }}" maxlength="12" minlength="11">
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