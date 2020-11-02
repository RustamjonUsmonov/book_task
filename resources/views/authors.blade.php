@extends('layouts.app')
@section('title')
    All Authors
@endsection
@section('content')

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">{{__('Author ID')}}</th>
        <th scope="col">{{__('Author Name')}}</th>
        <th scope="col">{{__('Book Count')}}</th>
        <th scope="col">{{__('Edit')}}</th>
        <th scope="col">{{__('Delete')}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($authors as $key => $data)
        <tr>
            <th scope="row">{{$data->id}}</th>
            <td>{{$data->aname}}</td>
            <td>{{$book_counts[$data->id]}}</td>
            <td><a class="btn btn-outline-secondary" href="{{route('editAuthor',$data->id)}}">{{__('Edit')}}</a></td>
            <td><a class="btn btn-outline-danger" href="{{route('deleteAuthor',$data->id)}}">{{__('Delete')}}</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="ml-4 text-right text-sm text-gray-500 sm:text-right sm:ml-0">
    <u>Total Count: {{count($authors)}}</u>
</div>

@endsection
