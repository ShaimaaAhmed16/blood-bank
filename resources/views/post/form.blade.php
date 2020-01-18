<div class="form-group">
    <label for="title">Title</label>
    {!!  Form::text('title',null,[
        'class'=>'form-control',"value"=>"{{old('title')}}"
    ]) !!}
    <label for="Content">Content</label>
    {!!  Form::textarea('content',null,[
        'class'=>'form-control',"value"=>"{{old('content')}}"
    ]) !!}
     @inject('categories','App\Models\Category')
    <label for="">Category</label>
    {!!  Form::select('category_id',$categories->pluck('name','id')->toArray(),null,[
        'class'=>'form-control',
    ]) !!}

    <label for="Image" class="btn-block">Image</label>
    @if($model->image)
    <img src="<?php echo asset($model->image)?>"/>
    @endif
    <br>
    {!!  Form::file('image',null,[
        'class'=>'form-control file_upload_preview'
    ]) !!}
</div>
<div class="form-group">
    <button class="btn btn-primary" type="submit">save</button>
</div>