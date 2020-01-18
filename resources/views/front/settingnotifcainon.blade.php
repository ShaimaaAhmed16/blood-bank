@extends('front.master')
@section('content')
    @include('flash::message')
    <div class="ml-5 form-group">
        <form method="post" action="{{url('notification-settings')}}">
            @csrf
        <div class="mt-3">
            <p>{{$setting->notification_settings_text}}</p>
        </div>
    <div>
        <h1>Blood Type</h1>
    </div>
    <div class="row">
        @foreach($blood->all() as $bloods)
            <div class="col-sm-2">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="blood_types[]" value="{{$bloods->id}}"
                        >{{$bloods->name}}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
    <div>
        <h1>Governorate</h1>
    </div>
    <div class="row">
        @foreach($govrn->all() as $govenr)
            <div class="col-sm-2">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="governorates[]" value="{{$govenr->id}}"
                        >{{$govenr->name}}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
    <div>
        <button style="margin-left: 40% ;margin-top: 30px;margin-bottom: 30px">save</button>
    </div>
        </form>
    </div>
    @endsection