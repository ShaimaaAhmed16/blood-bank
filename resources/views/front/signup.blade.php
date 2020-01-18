@extends('front.master')
@section('content')

<!-- Navigator Start -->
<section id="navigator">
    <div class="container">
        <div class="path">
            <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
            <div class="path-directio" style="color: grey; display:inline-block;"> / Sign up</div>
        </div>

    </div>
</section>
<!-- Navigator End -->

<!-- Sign Up Start -->
<section id="sign-up">
    <div class="container">
        <img src="{{asset('front/imgs/logo.png')}}" alt="">
        <form action="{{route('sinup')}}" method="post">

            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input type="name" placeholder="Name" required name="name">
            <input type="email" placeholder="Email" required name="email">
            <input type="Phone" placeholder="Phone Number" required="" name="phone">
            <input type="password" placeholder="password" required="" name="password">
            {{--<input type="password-confirmed" placeholder="password confirmation">--}}
            <label for="Birth-date" style="margin-left: 15% ;margin-top: 15px">Birth date</label>
            <input type="date" name="date_birth" placeholder="Birth date">
                {!!  Form::select('blood_type_id',$bloods->pluck('name','id')->toArray(),null,[
                 'id'=>'blood','placeholder'=>'select blood Type'
                 ]) !!}
                {!!  Form::select('governorate_id',$governorates->pluck('name','id')->toArray(),null,[
                 'id'=>'governorates','placeholder'=>'select governorate'
                 ]) !!}
                 {!!  Form::select('city_id',[],null,[
                 'id'=>'cities','placeholder'=>'select city'
                 ]) !!}
                {{--@foreach($governorates as $governorate)--}}
                {{--<option value="Governorate" disabled>Governorate</option>--}}
                {{--<option value="{{$governorate->name}}">{{$governorate->name}}</option>--}}
               {{--@endforeach--}}
            <label for="donate-day"  style="margin-left: 15% ;margin-top: 15px">donate day</label>
            <input type="date" name="last_donation_date" placeholder="donate day">
            <div class="reg-group">
                <input class="check" type="checkbox" required="" style="height: auto; display:inline; margin: 0 auto;">Agree on terms and conditions<br>
                <button class="submit" type="submit" style="background-color: rgb(51, 58, 65);">Submit</button>
            </div>
        </form>
    </div>
</section>
<!-- Sign Up End -->
    @push('script')
        <script>
          $("#governorates").change (function (e) {
              e.preventDefault()
              var governorate_id = $("#governorates").val();
              if(governorate_id){
                  $.ajax({
                      url:'{{url('api/v1/cities?governorate_id=')}}'+governorate_id,
                      type:'get',
                      success:function (data) {
                          console.log(data);
                          if(data.status==1){
                              $("#cities").empty();
                              $("#cities").append('<option value="">select city</option>');
                              $.each(data.data,function (index,city) {
                                  $("#cities").append('<option value="'+city.id+'">'+city.name+'</option>');
                                  
                              })

                          }

                      },
                      error: function (jqXhr, textStatus, errorMessage) { // error callback
                          alert(errorMessage);
                      }

                  });
              }
              else{
                  $("#cities").empty();
                  $("#cities").append('<option value="">select city</option>');
              }



          });

        </script>
    @endpush
@endsection
