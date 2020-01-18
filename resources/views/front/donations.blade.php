@extends('front.master')
@section('content')
<!-- Navigator Start -->
<section id="navigator">
    <div class="container">
        <div class="path">
            <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
            <div class="path-directio" style="color: grey; display:inline-block;"> / Donations</div>
        </div>

    </div>
</section>
<!-- Navigator End -->

<!-- Requests Start -->
<section id="requests">
    <div class="title">
        <h2>Donations</h2>
        <hr class="line">
    </div>
    <div class="container">
        {!! Form::open(['method'=>'get']) !!}
        <div class="row">
            <div class="col-lg-5">
                {!!  Form::select('blood_type_id',$blood->pluck('name','id')->toArray(),request()->input('blood_type_id'),[
              'class' => 'form-control',
           'placeholder'=>'select Blood type',

           ]) !!}

            </div>

            <div >
                {!!  Form::select('city_id',$city->pluck('name','id')->toArray(),request()->input('city_id'),[
                'class' => 'form-control',
             'placeholder'=>'select city',

             ]) !!}
            </div>
            <div class="search " style="margin-left: 15%">
                <button type="submit"><i class="col-lg-2 fas fa-search"></i></button>
            </div>

        </div>
        @foreach($donation as $donate)
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="type">
                                <h2>{{(optional($donate->blood_type))->name}}</h2>
                            </div>
                        </div>
                        <div class="data col-lg-6">
                            <h4>Name:{{$donate->patient_name}}</h4>
                            <h4>Hospital:{{$donate->hospital_name}}</h4>
                            <h4>City:{{optional($donate->city)->name}} </h4>
                        </div>
                        <div class="col-lg-3">
                            <button onclick= "window.location.href = '{{url('donate/'.$donate->id)}}';">Details</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="page-num">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {{--<li class="page-item">--}}
                        {{--<a class="page-link" href="#" aria-label="Previous">--}}
                            {{--<span aria-hidden="true">&laquo;</span>--}}
                            {{--<span class="sr-only">Previous</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    <li>{!! $donation->render() !!}</li>
                    {{--<li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                    {{--<li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                    {{--<li class="page-item">--}}
                        {{--<a class="page-link" href="#" aria-label="Next">--}}
                            {{--<span aria-hidden="true">&raquo;</span>--}}
                            {{--<span class="sr-only">Next</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                </ul>
            </nav>
        </div>
    </div>
</section>
<!-- Requests End -->
@endsection
