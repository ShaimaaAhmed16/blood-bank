<div class="form-group">
    <label for="patientName">patientName:</label>
    {!!  Form::text('patient',null,[
        'class'=>'form-control',"value"=>"{{$record->patient_name}}"
    ]) !!}
    <label for="patientPhone">patientPhone:</label>
    {!!  Form::text('phone',null,[
        'class'=>'form-control',"value"=>"{{$record->patient_phone}}"
    ]) !!}
    <label for="notes">notes</label>
    {!!  Form::text('notes',null,[
        'class'=>'form-control',"value"=>"{{$record->notes}}"
    ]) !!}
    <label for=age">age</label>
    {!!  Form::text('age',null,[
        'class'=>'form-control',"value"=>"{{$record->age}}"
    ]) !!}
    <label for="bagsNumber">bagsNumber</label>
    {!!  Form::text('bags',null,[
        'class'=>'form-control',"value"=>"{{$record->bags_number}}"
    ]) !!}
    <label for="hospitalName">HospitalName</label>
    {!!  Form::text('hospital',null,[
        'class'=>'form-control',"value"=>"{{$record->hospital_name}}"
    ]) !!}
    <label for="hospitalAddress">hospitalAddress</label>
    {!!  Form::text('address',null,[
        'class'=>'form-control',"value"=>"{{$record->hospital_address}}"
    ]) !!}
    <label for="latitude">latitude</label>
    {!!  Form::text('latitude',null,[
        'class'=>'form-control',"value"=>"{{$record->latitude}}"
    ]) !!}
    <label for="longitude">longitude</label>
    {!!  Form::text('longitude',null,[
        'class'=>'form-control',"value"=>"{{$record->longitude}}"
    ]) !!}
    <label for="city">city</label>
    {!!  Form::text('city_id',null,['class'=>'form-control',"value"=>"{{$record->city_id}}"
    ]) !!}
    <label for="bloodType">bloodType</label>
    {!!  Form::text('blood_type',null,[
        'class'=>'form-control',"value"=>"{{$record->blood_type_id}}"
    ]) !!}
    <label for="client">client</label>
    {!!  Form::text('client_id',null,[
        'class'=>'form-control',"value"=>"{{$record->client_id}}"
    ]) !!}
</div>
