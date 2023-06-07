@extends('frontview.layouts.app')
@extends('frontview.layouts.header')
@section('content')
@inject('Country','App\Models\CountryModel')

    <section class="profile-content">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="left-pro-menu">
                        <div class="profile-pic">
                            <div class="pro-img">
                                <img src="{{ url('assets/images/user%20%286%29.png') }}">
                            </div>
                            <div class="profile-menu">
                                <ul class="profile-nav">
                                    <li class="profile-nav-items active">
                                        <img src="{{ url('assets/images/user-%285%29.png') }}">
                                        <a href="" class="pro-link active">Profile</a>
                                    </li>
                                    <li class="profile-nav-items">
                                        <img src="{{ url('assets/images/wishlist.png') }}">
                                        <a href="{{ url('/wish-list')}}" class="pro-link">Wishlist</a>
                                    </li>
                                    <li class="profile-nav-items">
                                        <img src="{{ url('assets/images/padlock%20%281%29.png') }}">
                                        <a href="{{url('/profile-changepassword')}}" class="pro-link">Change Password</a>
                                    </li>
                                    <li class="profile-nav-items">
                                        <img src="{{ url('assets/images/checkout.png') }}">
                                        <a href="{{ url('/orderhistory')}}" class="pro-link">My Order</a>
                                    </li>
                                    <li class="profile-nav-items logout">
                                        <img src="{{ url('assets/images/logout.png') }}">
                                        <a href="{{url('/userlogout')}}" class="pro-link">Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="art-profile">
                    <div class="profile-detail">
                             {!! Form::model($customer, ['route' => ['myaccount.update', $customer->id], 'method'=>'PATCH','enctype' => 'multipart/form-data']) !!}
                                 <div class="avatar-upload">
                  <div class="avatar-edit">
                      <input type="file" id="imageUpload" name="profileimage" value="{{ $customer->profileimage }}" placeholder="image">
                               
                                <label for="imageUpload"></label>
                            </div>
  
              <div class="avatar-preview" style="margin-bottom: 15px;">
                <?php $products['featuredimage'] = '404.png'; ?>
      <img height="120" width="150" class="img-thumbnail" src="{{url('/image/customer/'.$customer->profileimage)}}" id="imagePreview" onerror="this.onerror=null;this.src='{{url('/image/'.$products['featuredimage'])}}'">
             </div>
            
        </div>
                                <div class="row first-name ">
                                    
                                        <div class="profile-form margin">
                                            <label><strong>Full Name</strong></label><br>
                                            <input type="name" name="fullname" id="name" value="{{ $customer->fullname}}" placeholder="Name" required="">
                                        </div>
                                

                                    
                                   <!--  <div class="col-md-3 col-sm-12">    
                                        <div class="profile-form">
                                            <label><strong>Last Name</strong></label><br>
                                            <input type="name" name="name" id="name" placeholder="Name" required="">
                                        </div>
                                    </div>    --> 
                                    <!-- <div class="col-md-3 col-sm-12"></div>
                                    <div class="col-md-3 col-sm-12"></div> -->
                                 <br>
                                <div class="profile-form">
                                    <label><strong>Email ID</strong></label><br>
                                    <input type="email" name="email" value="{{ $customer->email}}" id="email" placeholder="name@gmail.com" required=""> 
                                </div>
                                <br>
                                <div class="profile-form">
                                    <label><strong>Contact No.</strong></label><br>
                                    <input type="number" name="phone" id="num" placeholder="+91 111 000 7777" value="{{ $customer->phone}}" required="" maxlength="0123-456-789"> 
                                </div>  <br>
                                 
                                <div class="profile-form">
                                    <label><strong>Gender</strong></label><br>
                                    <div class="radio-btn">
                                        <p>
                                            <input type="radio" id="test1" name="gender" value="M" {{ $customer->gender == 'M' ? 'checked' : ''}}>
                                            <label for="test1">Male</label>
                                        </p>
                                        <p class="radio2">
                                            <input type="radio" id="test2" name="gender" value="F" {{ $customer->gender == 'F' ? 'checked' : ''}}>
                                            <label for="test2">Female</label>
                                        </p>
                                    </div>    
                                </div> <br>
                                <div class="profile-form">
                                    <label><strong>Address</strong></label><br>
                                    <input type="street" class="form-control" id="autocomplete" name="address" value="{{ $customer->address}}" placeholder="Address">
                                </div><br>            
                              <div class="profile-form">
                                <label><strong>City</strong></label><br>
                                <input type="city" class="form-control" id="inputCity" name="city" value="{{ $customer->city}}">
                              </div><br>
                              <div class="profile-form">
                                <label><strong>Zip Code</strong></label><br>
                                <input type="zipcode" class="form-control"  id="inputCity" name="zipcode" value="{{ $customer->zipcode}}" >
                              </div><br>
                              <div class="profile-form">
                                <label><strong>State</strong></label><br>
                                <input type="state" class="form-control" id="inputState" name="state" value="{{ $customer->state}}">
                              </div><br>
                              <div class="profile-form">
                                <label><strong>Country</strong></label><br>
                                <input type="Country" class="form-control" id="inputState" name="country" value="{{ $customer->country}}">
                              </div><br>
                              <div class="profile-btn">
                                  <button type="submit" class="cancel-btn">
                                       Cancel
                                  </button>
                                  <button type="submit" class="save-btn">
                                       Save
                                  </button>
                               </div>   
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>    
            </div>
        </section>
    <script type="text/javascript">
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imagePreview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

    $("#imageUpload").change(function(){
        readURL(this);
    });
</script>
@extends('frontview.layouts.footer')
@endsection