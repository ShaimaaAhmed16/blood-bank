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
        <div class="form-group ml-5 mt-3 w-75" >
            <form method="post" action="{{url('create')}}">
                @csrf
            <label for="patientName">patientName:</label>
            {!!  Form::text('patient_name',null,[
                'class'=>'form-control',
            ]) !!}
            <label for="patientPhone">patientPhone:</label>
            {!!  Form::text('patient_phone',null,[
                'class'=>'form-control',
            ]) !!}
            <label for="notes">notes</label>
            {!!  Form::text('notes',null,[
                'class'=>'form-control',
            ]) !!}
            <label for=age">age</label>
            {!!  Form::text('age',null,[
                'class'=>'form-control',
            ]) !!}
            <label for="bagsNumber">bagsNumber</label>
            {!!  Form::text('bags_number',null,[
                'class'=>'form-control',
            ]) !!}
            <label for="hospitalName">HospitalName</label>
            {!!  Form::text('hospital_name',null,[
                'class'=>'form-control',
            ]) !!}
            <label for="hospitalAddress">hospitalAddress</label>
            {!!  Form::text('hospital_address',null,[
                'class'=>'form-control',
            ]) !!}
            <label for="latitude">latitude</label>
            {!!  Form::text('latitude',null,[
                'class'=>'form-control',
            ]) !!}
            <label for="longitude">longitude</label>
            {!!  Form::text('longitude',null,[
                'class'=>'form-control',
            ]) !!}
            <label for="city">city</label>
            {!!  Form::text('city_id',null,['class'=>'form-control',
            ]) !!}
            <label for="bloodType">bloodType</label>
            {!!  Form::text('blood_type_id',null,[
                'class'=>'form-control',
            ]) !!}
            <label for="client">client</label>
            {!!  Form::text('client_id',null,[
                'class'=>'form-control',
            ]) !!}
                <input type="submit" value="save" style="margin-left: 40% ; margin-top: 20px;margin-bottom: 50px">
            </form>
        </div>
    </div>
    @endsection