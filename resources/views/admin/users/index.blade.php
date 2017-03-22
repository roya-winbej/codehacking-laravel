@extends('layouts.admin')

@section('content-title')
    Users
@endsection

@section('content')

    @include('admin.partials.flash-msg')

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>

                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{!! $user->photo ?'<img height=50 src='.$user->photo->file.'>' : '' !!}</td>
                        <td><a href="{{ route('users.edit', $user->id) }}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>{{$user->created_at ? $user->created_at->diffForHumans() : ''}}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection