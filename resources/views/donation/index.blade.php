@extends('admin.home')
@section('page')
   Donation Request
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Donation Request</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div>
                    {!! Form::open(['action'=>'DonationController@index','method'=>'get']) !!}
                    <input type="text" name="patient_name" placeholder="patientName">
                    <input type="text" name="city" placeholder="city">
                    <button class="btn btn-primary " type="submit"><i class="fa fa-search"></i>search</button>
                    {!! Form::close() !!}
                </div>
                <div class="mt-3">
                    @include('flash::message')
                </div>
                @if(count($records))
                    <div class="table table-responsive">
                        <table class="table table-bordered text-center">
                           <thead>
                               <tr>
                                   <th>#</th>
                                   <th>patientName</th>
                                   <th>bloodType</th>
                                   <th>City</th>
                                   <th>HospitalName</th>
                                   <th>Show</th>
                                   <th>Delete</th>
                               </tr>
                           </thead>
                            <tbody>
                                @foreach($records as $record)
                                    <tr>
                                        <th>{{$loop->iteration}}</th>
                                        <th>{{$record->patient_name}}</th>
                                        <th>{{$record->blood_type->name}}</th>
                                        <th>{{$record->City->name}}</th>
                                        <th>{{$record->hospital_name}}</th>
                                        <th> <a href="{{url(route('donation.show',$record->id))}}" class="btn btn-primary btn-xs"><i class="fas fa-eye"></i></a>
                                        </th>
                                        <th>
                                            {!! Form::open(['action'=>['DonationController@destroy',$record->id],'method'=>'delete']) !!}
                                                 <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                            {!! Form::close() !!}
                                        </th>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        No data
                    </div>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
