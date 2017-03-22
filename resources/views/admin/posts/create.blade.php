@extends('layouts.admin')

@section('content-title')
    Create post
@endsection

@section('content')

    @include('admin.partials.errors-validation')

    {!! Form::open(['method' => 'POST', 'action' => 'Admin\AdminPostsController@store', 'class' => 'form-horizontal', 'files' => true]) !!}

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
                {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@endsection