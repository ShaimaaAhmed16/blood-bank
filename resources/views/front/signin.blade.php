@extends('front.master')
@section('content')

<!-- Navigator Start -->
<section id="navigator">
    <div class="container">
        <div class="path">
            <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
            <div class="path-directio" style="color: grey; display:inline-block;"> / Login</div>
        </div>

    </div>
</section>
<!-- Navigator End -->

<!-- Login Start -->
<section id="login">
    <div class="container">
        <img src="{{asset('front/imgs/logo.png')}}" alt="">
        <form action="{{url('login-user')}}" method="POST" >
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
            <input class="username" type="phone" placeholder="phone"  name="phone">
            <input class="password" type="Password" placeholder="Password" name="password" >
            <input class="check" type="checkbox">Remember me
            <a href="{{url('reset-password-user')}}">Forget Password ?</a><br>
            <div class="reg-group">
                <button style="background-color: darkred;">Login</button>
                {{--<button style="background-color: rgb(51, 58, 65);">Make new account</button>--}}
            </div>
        </form>
    </div>
</section>
<!-- Login End -->

@endsection