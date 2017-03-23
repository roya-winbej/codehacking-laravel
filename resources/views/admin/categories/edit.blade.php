@extends('layouts.admin')

@section('content-title')
    Edit category
@endsection

@section('content')

    @include('admin.partials.errors-validation')

    <div class="row">

        <div class="col-md-9">
            {!! Form::model($category, ['method' => 'PATCH', 'action' => ['Admin\AdminCategoriesController@update', $category->id], 'class' => 'form-horizontal']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Title', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {!! Form::submit('Update Category', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}


            {!! Form::open(['method' => 'DELETE', 'action' => ['Admin\AdminCategoriesController@destroy', $category->id]]) !!}
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::submit('Delete Category', ['class' => 'btn btn-danger pull-right']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>


@endsection