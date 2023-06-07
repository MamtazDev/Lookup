@extends('frontview.layouts.app')
@extends('frontview.layouts.header')
@section('content')


<!-- <section class="about-us">
	<h2 class="about-title">About Us</h2>
	<div class="about-img">
		<img src="{{ url('public/assets/images/coming%20soon2.jpg') }}">
	</div>
</section> -->







	@foreach($cms as $key=>$about)
	@if($about->slug=='about-us')
   <section class="privacy-content">
            <div class="container privacy">
                <h2 class="about-title">{{$about->title}}</h2>

                <p><strong>Welcome to LakouPhoto!</strong></p>

                <p>
                  @php 
                  echo $about->content;
                  @endphp
                </p>
              

            </div>    
        </section>
@endif
@endforeach












@extends('frontview.layouts.footer')
@endsection