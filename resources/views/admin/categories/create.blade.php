@extends('layouts.admin')

@section('content-title')
    Create category
@endsection

@section('content')

    @include('admin.partials.errors-validation')

    {!! Form::open(['method' => 'POST', 'action' => 'Admin\AdminCategoriesController@store', 'class' => 'form-horizontal']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Title', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection