@extends('layouts.admin')

@section('content-title')
    Create user
@endsection

@section('content')

    @if(count($errors))
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store', 'class' => 'form-horizontal']) !!}

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
            {!! Form::label('role', 'Role', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::select('role', $roles, 'S', ['class' => 'form-control']) !!}

            </div>
        </div>




        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@endsection