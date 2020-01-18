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
        <form action="{{url('sendMessage')}}" >
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
            <input class="username" type="email" placeholder="email"  name="email">
            <div class="reg-group">
                <button style="background-color: darkred;">send</button>
                {{--<button style="background-color: rgb(51, 58, 65);">Make new account</button>--}}
            </div>
        </form>
    </div>
</section>
<!-- Login End -->

@endsection