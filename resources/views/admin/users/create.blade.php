@extends('layouts.admin')

@section('content-title')
    Create user
@endsection

@section('content')

    @include('admin.partials.errors-validation')

    {!! Form::open(['method' => 'POST', 'action' => 'Admin\AdminUsersController@store', 'class' => 'form-horizontal', 'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
            </div>
        </div>


        <div class="form-group">
            {!! Form::label('password', 'Password', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('role_id', 'Role', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::select('role_id', $roles, 'S', ['class' => 'form-control']) !!}

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
                {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@endsection