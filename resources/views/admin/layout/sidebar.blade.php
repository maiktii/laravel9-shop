<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a @if(Session::get('page')=="dashboard") style="background:#4B49AC; color:#fff;" @endif class="nav-link" href="{{ url('admin/dashboard') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if(Auth::guard('admin')->user()->type=="vendor")
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-vendors" aria-expanded="false" aria-controls="ui-vendors">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Vendor Details</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-vendors">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{url('admin/update-vendor-details/personal') }}">Personal Details</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('admin/update-vendor-details/business') }}">Business Details</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('admin/update-vendor-details/bank') }}">Bank Details</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-catalogue" aria-expanded="false" aria-controls="ui-catalogue">
            <i class="icon-head menu-icon"></i>
            <span class="menu-title">Catalogue</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-catalogue">
                <ul class="nav flex-column sub-menu" style="background:#fff; color:#4B49AC;">
                    <li class="nav-item"> <a @if(Session::get('page')=="products") style="background:#4B49AC; color:#fff;" @else style="background:#fff; color:#4B49AC;" @endif  class="nav-link" href="{{ url('admin/products') }}"> Products </a></li>
                </ul>
            </div>
        </li>
        @else
        <li class="nav-item">
            <a @if(Session::get('page')=="update_admin_password" || Session::get('page')=="update_admin_details") style="background:#4B49AC; color:#fff;" @endif class="nav-link" data-toggle="collapse" href="#ui-settings" aria-expanded="false" aria-controls="ui-settings">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Settings</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-settings">
                <ul class="nav flex-column sub-menu" style="background:#fff; color:#4B49AC;">
                    <li class="nav-item"> <a @if(Session::get('page')=="update_admin_password") style="background:#4B49AC; color:#fff;" @else style="background:#fff; color:#4B49AC;" @endif class="nav-link" href="{{url('admin/update-admin-password') }}">Update Password</a></li>
                    <li class="nav-item"> <a @if(Session::get('page')=="update_admin_details") style="background:#4B49AC; color:#fff;" @else style="background:#fff; color:#4B49AC;" @endif class="nav-link" href="{{url('admin/update-admin-details') }}">Update Details</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a  @if(Session::get('page')=="view_admins" || Session::get('page')=="view_subadmins" || Session::get('page')=="view_vendors" || Session::get('page')=="view_all") style="background:#4B49AC; color:#fff;" @endif class="nav-link" data-toggle="collapse" href="#ui-admins" aria-expanded="false" aria-controls="ui-admins">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Admin Management</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-admins">
                <ul class="nav flex-column sub-menu" style="background:#fff; color:#4B49AC;">
                    <li class="nav-item"> <a  @if(Session::get('page')=="view_admins") style="background:#4B49AC; color:#fff;" @else style="background:#fff; color:#4B49AC;" @endif class="nav-link" href="{{url('admin/admins/admin') }}">Admins</a></li>
                    <li class="nav-item"> <a  @if(Session::get('page')=="view_subadmins") style="background:#4B49AC; color:#fff;" @else style="background:#fff; color:#4B49AC;" @endif class="nav-link" href="{{url('admin/admins/subadmin') }}">Subadmins</a></li>
                    <li class="nav-item"> <a  @if(Session::get('page')=="view_vendors") style="background:#4B49AC; color:#fff;" @else style="background:#fff; color:#4B49AC;" @endif class="nav-link" href="{{url('admin/admins/vendor') }}">Vendors</a></li>
                    <li class="nav-item"> <a  @if(Session::get('page')=="view_all") style="background:#4B49AC; color:#fff;" @else style="background:#fff; color:#4B49AC;" @endif class="nav-link" href="{{url('admin/admins') }}">All</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-catalogue" aria-expanded="false" aria-controls="ui-catalogue">
            <i class="icon-head menu-icon"></i>
            <span class="menu-title">Catalogue</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-catalogue">
                <ul class="nav flex-column sub-menu" style="background:#fff; color:#4B49AC;">
                    <li class="nav-item"> <a @if(Session::get('page')=="sections") style="background:#4B49AC; color:#fff;" @else style="background:#fff; color:#4B49AC;" @endif class="nav-link" href="{{ url('admin/sections') }}"> Section </a></li>
                    <li class="nav-item"> <a @if(Session::get('page')=="categories") style="background:#4B49AC; color:#fff;" @else style="background:#fff; color:#4B49AC;" @endif  class="nav-link" href="{{ url('admin/categories') }}"> Categories </a></li>
                    <li class="nav-item"> <a @if(Session::get('page')=="brands") style="background:#4B49AC; color:#fff;" @else style="background:#fff; color:#4B49AC;" @endif  class="nav-link" href="{{ url('admin/brands') }}"> Brand </a></li>
                    <li class="nav-item"> <a @if(Session::get('page')=="products") style="background:#4B49AC; color:#fff;" @else style="background:#fff; color:#4B49AC;" @endif  class="nav-link" href="{{ url('admin/products') }}"> Products </a></li>
                    <li class="nav-item"> <a @if(Session::get('page')=="filters") style="background:#4B49AC; color:#fff;" @else style="background:#fff; color:#4B49AC;" @endif  class="nav-link" href="{{ url('admin/filters') }}"> Filters </a></li>

                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a @if(Session::get('page')=="banners") @endif class="nav-link" data-toggle="collapse" href="#ui-banners" aria-expanded="false" aria-controls="ui-banners">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Banners Management</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-banners">
                <ul class="nav flex-column sub-menu" style="background:#fff; color:#4B49AC;">
                    <li class="nav-item"> <a  @if(Session::get('page')=="banners") style="background:#4B49AC; color:#fff;" @else style="background:#fff; color:#4B49AC;" @endif class="nav-link" href="{{url('admin/banners') }}">Home Page Banners</a></li>
                </ul>
            </div>
        </li>
        @endif      
    </ul>
</nav>