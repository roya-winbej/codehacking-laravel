@extends('layouts.admin')

@section('content-title')
    Posts
@endsection

@section('content')

    @include('admin.partials.flash-msg')

    <div class="table-responsive">
        <table class="table">
            <thead>

            <col width="1%">
            <col width="5%">
            <col width="15%">
            <col width="40%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
            <col width="10%">

            <tr>
                <th>#</th>
                <th>Photo</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Created by</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
            </thead>
            <tbody>

                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{!! $post->photo ?'<img height=50 src='.$post->photo->file.'>' : '' !!}</td>
                        <td><a href="{{ route('posts.edit', $post->id) }}">{{$post->title}}</a></td>
                        <td>{{$post->body}}</td>
                        <td>{{$post->category->name}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->created_at ? $post->created_at->diffForHumans() : ''}}</td>
                        <td>{{$post->updated_at ? $post->updated_at->diffForHumans() : ''}}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection