@extends('layouts.app')
@section('title')
    All Authors
@endsection
@section('content')

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Author Name </th>
        <th scope="col">Book Count</th>
        <th scope="col">Handle</th>
    </tr>
    </thead>
    <tbody>
    @foreach($authors as $key => $data)
        <tr>
            <th scope="row">{{$data->id}}</th>
            <td>{{$data->aname}}</td>
            <td>{{$book_counts[$data->id]}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
