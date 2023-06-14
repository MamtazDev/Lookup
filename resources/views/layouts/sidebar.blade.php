 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{ asset('/vendors/dist/img/fevicon-512.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">LakouPhotos</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     <!--  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/vendors/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
   <!--    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
                 <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
            @can('customer-list')
           <li class="nav-item">
            <a href="{{ route('customer.index') }}" class="nav-link">
                 <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Manage Users
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @endcan
           @can('artist-list')
           <li class="nav-item">
            <a href="{{ route('artist.index') }}" class="nav-link">
                 <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Manage Artist
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @endcan
           @can('withdraw-list')
           <li class="nav-item">
            <a href="{{ route('withdraw.index') }}" class="nav-link">
                 <i class="nav-icon fas fa-list-alt"></i> 
                <!--  <img  class="nav-icon fas fa-user-alt" src="/public_html/Lakou/public/image/cash-withdrawal.png"> -->
              <p>
                Withdraw Requests
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @endcan
           @can('banner-list')

            <li class="nav-item">
            <a href="{{ route('banner.index') }}" class="nav-link">
             <p>
              <i class="far fa-image nav-icon"></i>
                 Banners
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
           
           @endcan
           @can('cms-list')

            <li class="nav-item">
            <a href="{{ route('cms.index') }}" class="nav-link">
             <p>
              <i class="far fa-image nav-icon"></i>
                 CMS
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
           
           @endcan

          @can('blog-list')
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>Blog<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
            <a href="{{ route('blog.index') }}" class="nav-link">
                <!--  <i class="nav-icon fas fa-user-alt"></i> -->
              <p>
                <i class="far fa-circle nav-icon"></i>
               Blog
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('blogcategory.index') }}" class="nav-link">
                <!--  <i class="nav-icon fas fa-user-alt"></i> -->
              <p>
                <i class="far fa-circle nav-icon"></i>
               Blog Category
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li> 
              <!-- @can('permission-list')
           <li class="nav-item">
            <a href="{{ route('permission.index') }}" class="nav-link">
                
              <p>
                <i class="far fa-circle nav-icon"></i>
                Permission
                
              </p>
            </a>
          </li> 
          @endcan -->
            </ul>
          </li>
           
           @endcan
           @can('role-list')
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tag"></i>
             
              <p>
                Roles and rights
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
            <a href="{{ route('role.index') }}" class="nav-link">
                <!--  <i class="nav-icon fas fa-user-alt"></i> -->
              <p>
                <i class="far fa-circle nav-icon"></i>
               Roles
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li> 
              <!-- @can('permission-list')
           <li class="nav-item">
            <a href="{{ route('permission.index') }}" class="nav-link">
                
              <p>
                <i class="far fa-circle nav-icon"></i>
                Permission
                
              </p>
            </a>
          </li> 
          @endcan -->
            </ul>
          </li>
           
           @endcan
          
           
           @can('admin-list')
            <li class="nav-item">
            <a href="{{ route('adminusers.index') }}" class="nav-link">
                 <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Admin Users
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li> 
          @endcan
              @can('role-list')
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                 Manage Products
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
                @can('brand-list')
           <li class="nav-item">
            <a href="{{ route('brand.index') }}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
              <p>
                Product Brands
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @endcan
               @can('product-category-list')
            <li class="nav-item">
            <a href="{{ route('product-category.index') }}" class="nav-link">
                 <!-- <i class="nav-icon fas fa-user-alt"></i> -->
              <p>
                <i class="far fa-circle nav-icon"></i>
                Product Categories
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @endcan
                @can('category-type-list')
            <li class="nav-item">
            <a href="{{ route('category-type.index') }}" class="nav-link">
                 <!-- <i class="nav-icon fas fa-user-alt"></i> -->
              <p>
                <i class="far fa-circle nav-icon"></i>
                Category types
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @endcan
           @can('frames-list')
            <li class="nav-item">
            <a href="{{ route('frames.index') }}" class="nav-link">
                 <!-- <i class="nav-icon fas fa-user-alt"></i> -->
              <p>
                <i class="far fa-circle nav-icon"></i>
                Frames
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @endcan
            <!-- @can('sizes-list')
            <li class="nav-item">
            <a href="{{ route('size.index') }}" class="nav-link">
                 
              <p>
                <i class="far fa-circle nav-icon"></i>
                Add Sizes
               
              </p>
            </a>
          </li>
          @endcan -->
           <!-- @can('orientation-list')
            <li class="nav-item">
            <a href="{{ route('orientation.index') }}" class="nav-link">
               
              <p>
                <i class="far fa-circle nav-icon"></i>
               Add Orientations
             
              </p>
            </a>
          </li>
          @endcan -->
            @can('colors-list')
            <li class="nav-item">
            <a href="{{ route('colors.index') }}" class="nav-link">
                 <!-- <i class="nav-icon fas fa-user-alt"></i> -->
              <p>
                <i class="far fa-circle nav-icon"></i>
               Colors
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @endcan
           @can('products-list')
            <li class="nav-item">
            <a href="{{ route('productSize.index') }}" class="nav-link">
                 <!-- <i class="nav-icon fas fa-user-alt"></i> -->
              <p>
                <i class="far fa-circle nav-icon"></i>
               Products Sizes 
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{ route('product.index') }}" class="nav-link">
                 <!-- <i class="nav-icon fas fa-user-alt"></i> -->
              <p>
                <i class="far fa-circle nav-icon"></i>
               Products 
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @endcan
            </ul>
          </li>

           
           @endcan
             @can('order-list')
           <li class="nav-item">
            <a href="{{ route('order.index') }}" class="nav-link">
                 <!-- <i class="nav-icon fas fa-user-alt"></i> -->
              <p>
                <i class="nav-icon fa fa-shopping-cart" aria-hidden="true"></i>
               Manage Orders
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @endcan
           @can('currency-list')
          <li class="nav-item">
            <a href="{{ route('currency.index') }}" class="nav-link">
                 <!-- <i class="nav-icon fas fa-user-alt"></i> -->
              <p>
                <i class="nav-icon far fa-money-bill-alt" aria-hidden="true"></i>
               Manage Currency
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
         @endcan

           @can('collections-list')
          <li class="nav-item">
            <a href="{{ route('collections.index') }}" class="nav-link">
                 <!-- <i class="nav-icon fas fa-user-alt"></i> -->
              <p>
                <i class="nav-icon fa fa-shopping-cart" aria-hidden="true"></i>
               Collections
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @endcan
    
           @can('collections-list')
          <li class="nav-item">
            <a href="{{ route('seo.index') }}" class="nav-link">
                 <!-- <i class="nav-icon fas fa-user-alt"></i> -->
              <p>
                <i class="nav-icon fa fa-cog" aria-hidden="true"></i>
               SEO Settings
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @endcan
          <!-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="nav-icon fa fa-power-off" aria-hidden="true"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li> -->

         <!--  <li class="nav-item menu">
            <a href="#" class="nav-link active">
           
              <p>
                Customers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{  request()->routeIs('customer') ? 'active' : '' }}">
                <a href="/customer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/customer/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
            </ul>
          </li> -->
         
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>