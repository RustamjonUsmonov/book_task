@extends('layouts.app')
@section('title')
    All Books
@endsection
@section('content')

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Book Name </th>
            <th scope="col">Author Name</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $key => $data)
            <tr>
                <th scope="row">{{$data->id}}</th>
                <td>{{$data->bname}}</td>
                <td>{{$anames[$data->id]}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
