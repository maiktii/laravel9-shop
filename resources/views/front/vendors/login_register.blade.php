@extends('front.layout.layout')   
@section('content') 
        <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Account</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="account.html">Account</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Account-Page -->
    <div class="page-account u-s-p-t-80">
        <div class="container">
        @if(Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success : </strong> {{Session::get('success_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                </div>
            @endif
            @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error : </strong> {{Session::get('error_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error : </strong><?php implode('', $errors->all('<div>:message</div>'))?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                </div>
            @endif
            <div class="row">
                <!-- Login -->
                <div class="col-lg-6">
                    <div class="login-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">Login</h2>
                        <h6 class="account-h6 u-s-m-b-30">Welcome back! Sign in to your account.</h6>
                        <form action="{{ url('admin/login') }}" method="post"> @csrf
                            <div class="u-s-m-b-30">
                                <label for="vendor-email">Email</label>
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" id="email" name="email" class="text-field" placeholder="Email">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendor-password">Password
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="password" name="password" class="text-field" placeholder="Password">
                            </div>
                            <div class="m-b-45">
                                <button class="button button-outline-secondary w-100">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Login /- -->
                <!-- Register -->
                <div class="col-lg-6">
                    <div class="reg-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">Register</h2>
                        <h6 class="account-h6 u-s-m-b-30">Registering for this site allows you to access your order status and history.</h6>
                        <form id="vendorForm" action="{{ url('/vendor/register') }}" method="post">@csrf
                            <div class="u-s-m-b-30">
                                <label for="vendorName">Name
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="vendorName" name="name" class="text-field" placeholder="Vendor Name">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendorMobile">Mobile
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="vendorMobile" name="mobile" class="text-field" placeholder="Vendor Mobile">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendorEmail">Email
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" id="vendorEmail" name="email" class="text-field" placeholder="Vendor Email">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendorPassword">Password
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="vendorPassword" name="password" class="text-field" placeholder="Vendor Password">
                            </div>
                            <div class="u-s-m-b-30">
                                <input type="checkbox" class="check-box" id="accept" name="accept">
                                <label class="label-text no-color" for="accept">I’ve read and accept the
                                    <a href="terms-and-conditions.html" class="u-c-brand">terms & conditions</a>
                                </label>
                            </div>
                            <div class="u-s-m-b-45">
                                <button class="button button-primary w-100">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Register /- -->
            </div>
        </div>
    </div>
    <!-- Account-Page /- -->

@endsection