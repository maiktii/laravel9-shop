@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Update Vendor Details</h3>
                    </div>
                </div>
            </div>
        </div>
        @if($slug=="personal")
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Personal Infromation</h4>
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
                  <form class="forms-sample" action="{{url('admin/update-vendor-details/personal') }}" method="POST">@csrf
                    <div class="form-group">
                      <label>Vendor Username/Email</label>
                      <input class="form-control" readonly="" value="{{ Auth::guard('admin')->user()->email }}">
                    </div>
                    <div class="form-group">
                      <label for="vendor_name">Name</label>
                      <input type="text" class="form-control" id="vendor_name" placeholder="Enter Current Password" name="vendor_name" required="" value="{{ Auth::guard('admin')->user()->name }}">
                    </div>
                    <div class="form-group">
                      <label for="vendor_address">Address</label>
                      <input type="text" class="form-control" id="vendor_address" placeholder="Enter Your Address" name="vendor_address" required="" value="{{ $vendorDetails['address'] }}">
                    </div>
                    <div class="form-group">
                      <label for="vendor-city">City</label>
                      <input type="text" class="form-control" id="vendor_city" placeholder="Enter Your City" name="vendor_city" required="" value="{{ $vendorDetails['city'] }}">
                    </div>
                    <div class="form-group">
                      <label for="vendor_state">State</label>
                      <input type="text" class="form-control" id="vendor_state" placeholder="Enter Your State" name="vendor_state" required="" value="{{ $vendorDetails['state'] }}">
                    </div>
                    <div class="form-group">
                      <label for="vendor_country">Country</label>
                      <select name="vendor_country" id="vendor_country" class="form-control">
                        <option value="">Select Country</option>
                        @foreach($countries as $country)
                          <option value="{{ $country['country_name'] }}" @if($country['country_name']==$vendorDetails['country']) selected @endif>{{ $country['country_name'] }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="vendor_pincode">Pincode</label>
                      <input type="text" class="form-control" id="vendor_pincode" placeholder="Enter Your Pincode" name="vendor_pincode" required="" value="{{ $vendorDetails['pincode'] }}">
                    </div>
                    <div class="form-group">
                      <label for="vendor_mobile">Mobile</label>
                      <input type="text" class="form-control" id="vendor_mobile" placeholder="Enter Your Phone Number" name="vendor_mobile" required="" value="{{ Auth::guard('admin')->user()->mobile }}" maxlength="12" minlength="11">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>    
        @elseif($slug=="business")
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Business Infromation</h4>
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
                            <span aria-hidden="true">&times;</span>
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
                  <form class="forms-sample" action="{{url('admin/update-vendor-details/business') }}" method="POST">@csrf
                    <div class="form-group">
                      <label>Vendor Username/Email</label>
                      <input class="form-control" readonly="" value="{{ Auth::guard('admin')->user()->email }}">
                    </div>
                    <div class="form-group">
                      <label for="shop_name">Shop Name</label>
                      <input type="text" class="form-control" id="shop_name" placeholder="Enter Your Shop Name" name="shop_name" required="" @if(isset($vendorDetails['shop_name']))  value="{{ $vendorDetails['shop_name'] }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="shop_address">Shop Address</label>
                      <input type="text" class="form-control" id="shop_address" placeholder="Enter Your Shop Address" name="shop_address" required="" @if(isset($vendorDetails['shop_address'])) value="{{ $vendorDetails['shop_address'] }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="shop-city">Shop City</label>
                      <input type="text" class="form-control" id="shop_city" placeholder="Enter Your Shop City" name="shop_city" required="" @if(isset($vendorDetails['shop_city'])) value="{{ $vendorDetails['shop_city'] }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="shop_pincode">Shop Pincode</label>
                      <input type="text" class="form-control" id="shop_pincode" placeholder="Enter Your Shop Pincode" name="shop_pincode" required="" @if(isset($vendorDetails['shop_pincode'])) value="{{ $vendorDetails['shop_pincode'] }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="shop_mobile">Shop Mobile</label>
                      <input type="text" class="form-control" id="shop_mobile" placeholder="Enter Your Shop Phone Number" name="shop_mobile" required="" @if(isset($vendorDetails['shop_mobile'])) value="{{ $vendorDetails['shop_mobile'] }}" maxlength="12" minlength="11" @endif>
                    </div>
                    <div class="form-group">
                      <label for="shop_email">Shop Email</label>
                      <input type="text" class="form-control" id="shop_email" placeholder="Enter Your Shop Email" name="shop_email" required="" @if(isset($vendorDetails['shop_email']))  value="{{ $vendorDetails['shop_email'] }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="business_license_number">Business License Number</label>
                      <input type="text" class="form-control" id="business_license_number" placeholder="Enter Your Business License Number" name="business_license_number" required="" @if(isset($vendorDetails['business_license_number'])) value="{{ $vendorDetails['business_license_number'] }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="address_proof">Address Proof</label>
                      <select name="address_proof" id="address_proof" class="form-control">
                        <option value="Passport" @if(isset($vendorDetails['address_proof']) && $vendorDetails['address_proof'] == "Passport" ) selected @endif>Passport</option>
                        <option value="KTP" @if(isset($vendorDetails['address_proof']) && $vendorDetails['address_proof'] == "KTP" ) selected @endif>KTP</option>
                        <option value="SIM" @if(isset($vendorDetails['address_proof']) && $vendorDetails['address_proof'] == "SIM" ) selected @endif>SIM</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>    
        @elseif($slug=="bank")
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Bank Infromation</h4>
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
                  <form class="forms-sample" action="{{url('admin/update-vendor-details/bank') }}" method="POST">@csrf
                    <div class="form-group">
                      <label>Vendor Username/Email</label>
                      <input class="form-control" readonly="" value="{{ Auth::guard('admin')->user()->email }}">
                    </div>
                    <div class="form-group">
                      <label for="account_name">Account Name</label>
                      <input type="text" class="form-control" id="account_name" placeholder="Enter Your Bank Account Name" name="account_name" required="" @if(isset($vendorDetails['account_name'])) value="{{ $vendorDetails['account_name'] }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="account_number">Account Number</label>
                      <input type="text" class="form-control" id="account_number" placeholder="Enter Your Bank Account Number" name="account_number" required="" @if(isset($vendorDetails['account_number'])) value="{{ $vendorDetails['account_number'] }}" @endif maxlength="16" minlength="10">
                    </div>
                    <div class="form-group">
                      <label for="bank_name">Bank Name</label>
                      <select name="bank_name" id="address_proof" class="form-control">
                        <option value="BCA" @if(isset($vendorDetails['bank_name']) && $vendorDetails['bank_name'] == "BCA" )selected @endif>BCA</option>
                        <option value="BRI" @if(isset($vendorDetails['bank_name']) && $vendorDetails['bank_name']== "BRI" ) selected @endif>BRI</option>
                        <option value="BTN" @if(isset($vendorDetails['bank_name']) && $vendorDetails['bank_name']=="BTN" ) selected @endif>BTN</option>
                        <option value="Mandiri" @if(isset($vendorDetails['bank_name']) && $vendorDetails['bank_name']=="Mandiri" ) selected @endif>Mandiri</option>
                        <option value="PermataBank" @if(isset($vendorDetails['bank_name']) && $vendorDetails['bank_name']=="PermataBank" ) selected @endif>Permata Bank</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="bank_code">Bank Code</label>
                      <select name="bank_code" id="address_proof" class="form-control">
                        <option value="014" @if(isset($vendorDetails['bank_code']) &&  $vendorDetails['bank_code']== "014" )selected @endif>014 - BCA</option>
                        <option value="002" @if(isset($vendorDetails['bank_code']) && $vendorDetails['bank_code']== "002" ) selected @endif>002 - BRI</option>
                        <option value="200" @if(isset($vendorDetails['bank_code']) && $vendorDetails['bank_code']=="200" ) selected @endif>200 - BTN</option>
                        <option value="008" @if(isset($vendorDetails['bank_code']) && $vendorDetails['bank_code']=="008" ) selected @endif>008 - Mandiri</option>
                        <option value="0013" @if(isset($vendorDetails['bank_code']) && $vendorDetails['bank_code']=="0013" ) selected @endif>0013 - Permata Bank</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>  
        @endif
</div>
    
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('admin.layout.footer')
    <!-- partial -->
</div>


@endsection