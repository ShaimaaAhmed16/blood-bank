@extends('front.master')
@section('content')
    <div style="background:whitesmoke">
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
        {{--{!!  Form::model($model,['action'=>['CityController@update',$model->id],'method'=>'put']) !!}--}}
        {{--@include('city.form')--}}
        {{--{!!  Form::close() !!}--}}
        <div class="form-group ml-5 mt-3 w-75" >
            <form method="post" action="{{url('profile-update/'.auth()->guard('client-web')->user()->id)}}">
                @csrf
                <label for="Name">Name:</label>
                {!!  Form::text('name',auth()->guard('client-web')->user()->name,[
                'class'=>'form-control',
                ]) !!}
                {{--<div class="form-control">{{auth()->guard('client-web')->user()->name}}</div>--}}
                <label for="Phone">Phone:</label>
                {!!  Form::text('phone',auth()->guard('client-web')->user()->phone,[
                    'class'=>'form-control',
                ]) !!}
                <label for="email">email</label>
                {!!  Form::text('email',auth()->guard('client-web')->user()->email,[
                 'class'=>'form-control',
                ]) !!}
                <label for= date_birth"> date birth</label>
                {!!  Form::text('date_birth',auth()->guard('client-web')->user()->date_birth,[
                  'class'=>'form-control',
                ]) !!}
                <label for="last_donation_date">last donation date</label>
                {!!  Form::text('last_donation_date',auth()->guard('client-web')->user()->last_donation_date,[
                    'class'=>'form-control',
                 ]) !!}
                <label for="blood_type_id"> blood Type</label>
                {!!  Form::text('blood_type_id',auth()->guard('client-web')->user()->blood_type_id,[
                      'class'=>'form-control',
                    ]) !!}
                {{--<div class="form-control">{{auth()->guard('client-web')->user()->blood_type->name}}</div>--}}
                <label for="city_id">city</label>
                {!!  Form::text('city_id',auth()->guard('client-web')->user()->city_id,[
                  'class'=>'form-control',
                ]) !!}
                {{--<div class="form-control">{{auth()->guard('client-web')->user()->city->name}}</div>--}}
                <input type="submit" value="save" style="margin-left: 40% ; margin-top: 20px;margin-bottom: 50px">
            </form>
        </div>
    </div>
@endsection