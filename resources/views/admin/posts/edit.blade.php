@extends('layouts.admin')

@section('content-title')
    Edit post
@endsection

@section('content')

    @include('admin.partials.errors-validation')

    <div class="row">

        <div class="col-md-3">
            {!! $post->photo ? '<img class="img img-responsive" src='. $post->photo->file . '>' : '<img src="https://placehold.it/400x400" class="img img-responsive">' !!}
        </div>
        <div class="col-md-9">
            {!! Form::model($post, ['method' => 'PATCH', 'action' => ['Admin\AdminPostsController@update', $post->id], 'class' => 'form-horizontal', 'files' => true]) !!}

            <div class="form-group">
                {!! Form::label('title', 'Title', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Category', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

                </div>
            </div>

            <div class="form-group">
                {!! Form::label('body', 'Description', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!!  Form::file('photo_id', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {!! Form::submit('Update Post', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}


            {!! Form::open(['method' => 'DELETE', 'action' => ['Admin\AdminPostsController@destroy', $post->id]]) !!}
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::submit('Delete Post', ['class' => 'btn btn-danger pull-right']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>


@endsection