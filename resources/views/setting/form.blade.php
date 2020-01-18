<div class="form-group ">
    <label for="NotificationSettingsText">NotificationSettingsText</label>
    {!!  Form::text('notification_settings_text',null,[
        'class'=>'form-control'
    ]) !!}
    <label for="Phone">Phone</label>
    {!!  Form::text('phone',null,[
        'class'=>'form-control'
    ]) !!}
    <label for="AboutApplication">AboutApplication</label>
    {!!  Form::text('about_app',null,[
        'class'=>'form-control'
    ]) !!}
    <label for=Email">Email</label>
    {!!  Form::text('email',null,[
        'class'=>'form-control'
    ]) !!}
    <label for="FacebookLink">FacebookLink</label>
    {!!  Form::text('fb_link',null,[
        'class'=>'form-control'
    ]) !!}
    <label for="TwitterLink">TwitterLink</label>
    {!!  Form::text('tw_link',null,[
        'class'=>'form-control'
    ]) !!}
    <label for="InstagramLink">InstagramLink</label>
    {!!  Form::text('insta_link',null,[
        'class'=>'form-control'
    ]) !!}
    <label for="GoogleLink">GoogleLink</label>
    {!!  Form::text('goog_link',null,[
        'class'=>'form-control'
    ]) !!}
    <label for="whatsappLink">YoutubeLink</label>
    {!!  Form::text('whatsapp_link',null,[
        'class'=>'form-control'
    ]) !!}
</div>
<div class="form-group">
    <button class="btn btn-primary" type="submit">save</button>
</div>