@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Vendor Details</h3>
                        <h6 class="font-weight-normal mb-0"><a href="{{url('admin/admins/vendor') }}">Back to Vendors</a></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Personal Infromation</h4>
                    <div class="form-group">
                      <label>Email</label>
                      <input class="form-control" readonly="" value="{{ $vendorDetails['vendor_personal']['email'] }}">
                    </div>
                    <div class="form-group">
                      <label for="vendor_name">Name</label>
                      <input class="form-control" value="{{ $vendorDetails['vendor_personal']['name'] }}" readonly="">
                    </div>
                    <div class="form-group">
                      <label for="vendor_address">Address</label>
                      <input  class="form-control" value="{{ $vendorDetails['vendor_personal']['address'] }}" readonly="">
                    </div>
                    <div class="form-group">
                      <label for="vendor-city">City</label>
                      <input  class="form-control" value="{{ $vendorDetails['vendor_personal']['city'] }}" readonly="">
                    </div>
                    <div class="form-group">
                      <label for="vendor_state">State</label>
                      <input  class="form-control" value="{{ $vendorDetails['vendor_personal']['state'] }}" readonly="">
                    </div>
                    <div class="form-group">
                      <label for="vendor_country">Country</label>
                      <input  class="form-control"value="{{ $vendorDetails['vendor_personal']['country'] }}" readonly="">
                    </div>
                    <div class="form-group">
                      <label for="vendor_pincode">Pincode</label>
                      <input  class="form-control" value="{{ $vendorDetails['vendor_personal']['pincode'] }}" readonly="">
                    </div>
                    <div class="form-group">
                      <label for="vendor_mobile">Mobile</label>
                      <input class="form-control" value="{{ $vendorDetails['vendor_personal']['mobile'] }}" readonly="">
                    </div>
                </div>
              </div>
            </div>
          </div>    

            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Business Infromation</h4>
                    <div class="form-group">
                      <label for="shop_name">Shop Name</label>
                      <input  class="form-control" @if(isset($vendorDetails['vendor_business']['shop_name']))  value="{{ $vendorDetails['vendor_business']['shop_name'] }}" @endif readonly="">
                    </div>
                    <div class="form-group">
                      <label for="shop_address">Shop Address</label>
                      <input class="form-control" @if(isset($vendorDetails['vendor_business']['shop_address']))   value="{{ $vendorDetails['vendor_business']['shop_address'] }}" @endif readonly="">
                    </div>
                    <div class="form-group">
                      <label for="shop-city">Shop City</label>
                      <input class="form-control" @if(isset($vendorDetails['vendor_business']['shop_city']))   value="{{ $vendorDetails['vendor_business']['shop_city'] }}" @endif readonly="">
                    </div>
                    <div class="form-group">
                      <label for="shop_pincode">Shop Pincode</label>
                      <input  class="form-control" @if(isset($vendorDetails['vendor_business']['shop_pincode']))   value="{{ $vendorDetails['vendor_business']['shop_pincode'] }}" @endif readonly="">
                    </div>
                    <div class="form-group">
                      <label for="shop_mobile">Shop Mobile</label>
                      <input  class="form-control" @if(isset($vendorDetails['vendor_business']['shop_mobile']))   value="{{ $vendorDetails['vendor_business']['shop_mobile'] }}" @endif readonly="">
                    </div>
                    <div class="form-group">
                      <label for="shop_email">Shop Email</label>
                      <input  class="form-control" @if(isset($vendorDetails['vendor_business']['shop_email']))  value="{{ $vendorDetails['vendor_business']['shop_email'] }}" @endif readonly="">
                    </div>
                    <div class="form-group">
                      <label for="business_license_number">Business License Number</label>
                      <input  class="form-control" @if(isset($vendorDetails['vendor_business']['business_license_number']))  value="{{ $vendorDetails['vendor_business']['business_license_number'] }}" @endif readonly="">
                    </div>
                    <div class="form-group">
                      <label for="address_proof">Address Proof</label>
                      <input  class="form-control"  @if(isset($vendorDetails['vendor_business']['address_proof'])) value="{{ $vendorDetails['vendor_business']['address_proof'] }}" @endif readonly="">
                    </div>
                </div>
              </div>
            </div>   
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bank Infromation</h4>
                    <div class="form-group">
                      <label for="account_name">Account Name</label>
                      <input  class="form-control" @if(isset($vendorDetails['vendor_bank']['account_name'])) value="{{ $vendorDetails['vendor_bank']['account_name'] }}" @endif  readonly="">
                    </div>
                    <div class="form-group">
                      <label for="account_number">Account Number</label>
                      <input class="form-control"  @if(isset($vendorDetails['vendor_bank']['account_number'])) value="{{ $vendorDetails['vendor_bank']['account_number'] }}" @endif readonly="">
                    </div>
                    <div class="form-group">
                      <label for="bank_name">Bank Name</label>
                      <input class="form-control" @if(isset($vendorDetails['vendor_bank']['bank_name']))  value="{{ $vendorDetails['vendor_bank']['bank_name'] }}" @endif readonly="">
                    </div>
                    <div class="form-group">
                      <label for="bank_code">Bank Code</label>
                      <input class="form-control" @if(isset($vendorDetails['vendor_bank']['bank_code']))  value="{{ $vendorDetails['vendor_bank']['bank_code'] }}" @endif  readonly="">
                    </div>
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