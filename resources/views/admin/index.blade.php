@extends('admin.home')
@inject('client','App\Models\Client')
@inject('donation','App\Models\DonationRequest')
@inject('post','App\Models\Post')
@inject('city','App\Models\City')
@inject('blood','App\Models\BloodType')
@inject('governorate ','App\Models\Governorate ')
@inject('category ','App\Models\Category ')
@inject('notification ','App\Models\Notification')

@section('page')
    Dashboard
@endsection
@section('small_title')
    statistics
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">clients</span>
                        <span class="info-box-number">{{$client->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fas fa-plane-arrival"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Donation Request</span>
                        <span class="info-box-number">{{$donation->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"> <i class="fas fa-city"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"></i>cities</span>
                        <span class="info-box-number">{{$city->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fas fa-ambulance"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">BloodTypes</span>
                        <span class="info-box-number">{{$blood->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"> <i class="fas fa-address-card"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">posts</span>
                        <span class="info-box-number">{{$post->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fas fa-city"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"> governorates</span>
                        <span class="info-box-number">{{$governorate->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-align-justify"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">categories</span>
                        <span class="info-box-number">{{$category->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fas fa-bell"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">notifications</span>
                        <span class="info-box-number">{{$notification->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>

        <!-- Default box -->
       <!-- <div class="card">
            <div class="card-header">
                <h3 class="card-title">Title</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                Start creating your amazing application!
            </div>
            <!-- /.card-body -->
           <!-- <div class="card-footer">
                Footer
            </div>-->
            <!-- /.card-footer-->

        <!-- /.card -->

    </section>
@endsection
