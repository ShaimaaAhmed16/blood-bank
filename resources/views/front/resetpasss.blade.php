@extends('front.master')
@section('content')

<!-- Navigator Start -->
<section id="navigator">
    <div class="container">
        <div class="path">
            <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
            <div class="path-directio" style="color: grey; display:inline-block;"> / reset password</div>
        </div>

    </div>
</section>
<!-- Navigator End -->

<!-- Login Start -->
<section id="login">
    <div class="container">
        @include('flash::message')
        <img src="{{asset('front/imgs/logo.png')}}" alt="">
        <form action="{{url('changePassword')}}" >
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input class="username" type="text" placeholder="pin code"  name="code">
            <input class="username" type="Password" placeholder="new Password" name="password" >
            <input class="username" type="Password" placeholder="confirm Password" name="confirmed" >
            <input class="check" type="checkbox" >Remember me
            <a href="#">Forget Password ?</a><br>
            <div class="reg-group">
                <button style="background-color: #004a99;">change</button>
                {{--<button style="background-color: rgb(51, 58, 65);">Make new account</button>--}}
            </div>
        </form>
    </div>
</section>
<!-- Login End -->

@endsection