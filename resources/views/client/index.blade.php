@extends('admin.home')
@inject('model','App\Models\Client')
@section('page')
    Client
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Client</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div>
                    {!! Form::open(['action'=>'ClientController@index','method'=>'get']) !!}
                    <input type="text" name="name" placeholder="name">
                    <input type="text" name="city_name" placeholder="cityName">
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
                                   <th>Name</th>
                                   <th>Phone</th>
                                   <th>Email</th>
                                   <th>BloodType</th>
                                   <th>City</th>
                                   <th>DateBirth</th>
                                   <th>lastDonationDate</th>
                                   <th>Delete</th>
                                   <th>Active</th>
                               </tr>
                           </thead>
                            <tbody>
                                @foreach($records as $record)
                                    <tr>
                                        <th>{{$loop->iteration}}</th>
                                        <th>{{$record->name}}</th>
                                        <th>{{$record->phone}}</th>
                                        <th>{{$record->email}}</th>
                                        <th>{{$record->blood_type->name}}</th>
                                        <th>{{($record->City)->name}}</th>
                                        <th>{{$record->date_birth}}</th>
                                        <th>{{$record->last_donation_date}}</th>
                                        <th>
                                            {!! Form::open(['action'=>['ClientController@destroy',$record->id],'method'=>'delete']) !!}
                                                 <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                            {!! Form::close() !!}
                                        </th>
                                        <th>
                                            @if($record->is_active==0)
                                                <a href="client/{{$record->id}}/active" class="btn btn-danger btn-xs">deactive</a>
                                                @else
                                                <a href="client/{{$record->id}}/deactive" class="btn btn-success btn-xs">active</a>
                                                @endif
                                        </th >
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
