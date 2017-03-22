@extends('layouts.admin')

@section('content-title')
    Edit post
@endsection

@section('content')

    @include('admin.partials.errors-validation')

    <div class="row">

        <div class="col-md-3">
            {!! $user->photo ? '<img class="img img-responsive" src='. $user->photo->file . '>' : '<img src="https://placehold.it/400x400" class="img img-responsive">' !!}
        </div>
        <div class="col-md-9">
            {!! Form::model($user, ['method' => 'PATCH', 'action' => ['Admin\AdminUsersController@update', $user->id], 'class' => 'form-horizontal', 'files' => true]) !!}

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
                    {!! Form::submit('Update User', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}


            {!! Form::open(['method' => 'DELETE', 'action' => ['Admin\AdminUsersController@destroy', $user->id]]) !!}
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::submit('Delete User', ['class' => 'btn btn-danger pull-right']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>


@endsection