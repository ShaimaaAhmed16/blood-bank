@extends('front.master')
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">change password</h3>

                {{--<div class="card-tools">--}}
                    {{--<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">--}}
                        {{--<i class="fas fa-minus"></i></button>--}}
                    {{--<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">--}}
                        {{--<i class="fas fa-times"></i></button>--}}
                {{--</div>--}}
            </div>
            <div class="card-body">
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
                {!! Form::open(['url'=>url('password-client'),'method'=>'post']) !!}
                <div class="form-group">
                    <label for="oldPassword">oldPassword</label>
                    {!!  Form::password('oldPassword',[
                        'class'=>'form-control'
                    ]) !!}

                    <label for="password">password</label>
                    {!!  Form::password('password',[
                        'class'=>'form-control'
                    ]) !!}
                    <label for="confirmed">confirmed</label>
                    {!!  Form::password('password_confirmation',[
                        'class'=>'form-control'
                    ]) !!}
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">submit</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
