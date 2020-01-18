@extends('admin.home')
@section('page')
    show donation
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">show donation</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!!  Form::open(['action'=>['DonationController@show',$record->id],'method'=>'put']) !!}
                    <div class="row ">
                        <div class="col-12   order-md-first mt-3 mt-md-0 ">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-12 col-md-3">
                                            <p class="m-0 font-weight-bold">
                                                patient Name:
                                            </p>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="m-0">{{$record->patient_name}}</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-12 col-md-3">
                                            <p class="m-0 font-weight-bold">
                                                patient Phone:
                                            </p>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="m-0">{{$record->patient_phone}}</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-12 col-md-3">
                                            <p class="m-0 font-weight-bold">
                                                notes:
                                            </p>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="m-0">{{$record->notes}}</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-12 col-md-3">
                                            <p class="m-0 font-weight-bold">
                                                age:
                                            </p>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="m-0">{{$record->age}}</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-12 col-md-3">
                                            <p class="m-0 font-weight-bold">
                                                bags Number:
                                            </p>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="m-0">{{$record->bags_number}}</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-12 col-md-3">
                                            <p class="m-0 font-weight-bold">
                                                Hospital Name:
                                            </p>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="m-0">{{$record->hospital_name}}</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-12 col-md-3">
                                            <p class="m-0 font-weight-bold">
                                                Hospital Address:
                                            </p>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="m-0">{{$record->hospital_address}}</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-12 col-md-3">
                                            <p class="m-0 font-weight-bold">
                                                latitude:
                                            </p>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="m-0">{{$record->latitude}}</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-12 col-md-3">
                                            <p class="m-0 font-weight-bold">
                                                longitude:
                                            </p>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="m-0">{{$record->longitude}}</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-12 col-md-3">
                                            <p class="m-0 font-weight-bold">
                                                city:
                                            </p>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="m-0">{{$record->city->name}}</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-12 col-md-3">
                                            <p class="m-0 font-weight-bold">
                                                bloodType:
                                            </p>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="m-0">{{$record->blood_type->name}}</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-12 col-md-3">
                                            <p class="m-0 font-weight-bold">
                                                client:
                                            </p>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="m-0">{{$record->client->name}}</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {!!  Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
