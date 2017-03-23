@extends('layouts.admin')

@section('content-title')
    Categories
@endsection

@section('content')

    @include('admin.partials.flash-msg')

    <div class="table-responsive">
        <table class="table">
            <thead>

            <col width="5%">
            <col width="50%">
            <col width="10%">
            <col width="10%">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
            </thead>
            <tbody>

            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="{{ route('categories.edit', $category->id) }}">{{$category->name}}</a></td>
                    <td>{{$category->created_at ? $category->created_at->diffForHumans() : ''}}</td>
                    <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : ''}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection