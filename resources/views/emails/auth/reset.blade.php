@component('mail::message')
# Introduction

Blood Bank Reset Password

@component('mail::button', ['url' => 'https://www.facebook.com'])
Reset
@endcomponent
<P>your reset code is:{{$code}}</P>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
