@extends('front.master')
@section('content')
<!-- Navigator Start -->
<section id="navigator">
    <div class="container">
        <div class="path">
            <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
            <div class="path-directio" style="color: grey; display:inline-block;"> / Contact Us</div>
        </div>

    </div>
</section>
<!-- Navigator End -->

<!-- login Start -->
<section id="contact">
    <div class="container">
        <div class="mt-3">
            @include('flash::message')
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-6 call">
                <div class="title">Head</div>
                <img src="{{asset('front/imgs/logo.png')}}" alt="">
                <hr>
                <h4>Mobile:{{$setting->phone}}</h4>
                        <h4>Email:{{$setting->email}}</h4>
                            <hr>
                            <h3>Find Us On</h3>
                            <div class="icons">
                             <a href="{{$setting->fb_link}}}"><i class="fab fa-facebook-square fa-3x"></i></a>
                               <a href="{{$setting->goog_link}}}"><i class="fab fa-google-plus-square fa-3x"></i></a>
                               <a href="{{$setting->tw_link}}}"><i class="fab fa-twitter-square fa-3x"></i></a>
                                <a href="{{$setting->whatsapp_link}}}"><i class="fab fa-whatsapp-square fa-3x"></i></a>
                                <a href="{{$setting->youtube}}}"><i class="fab fa-youtube-square fa-3x"></i></a>
                            </div>
            </div>
            <div class="col-md-6 info">
                <div class="title">Head</div>
                <form action="{{url('contactus')}}" method="post">
                    @csrf
                    <input type="text" name="name" id="" placeholder="Name" >
                    <input type="email" name="email" id="" placeholder="Email" >
                    <input type="number" name="phone" id="" placeholder="Phone" >
                    <input type="text" name="title" id="" placeholder="Title" >
                    {{--<input type="text" name="title" id="" placeholder="Title" required="">--}}
                    <textarea name="message" id="" cols="10" rows="5" placeholder="Message"></textarea>
                    <div class="reg-group">
                        <button type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- login End -->
@endsection