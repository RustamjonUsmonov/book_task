@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">{{__('Book ID')}}</th>
            <th scope="col">{{__('Author Name')}}</th>
            <th scope="col">{{__('Book Name')}} </th>

        </tr>
        </thead>
        <tbody>
        @foreach($books as $key => $data)
            <tr>
                <th scope="row">{{$data->id}}</th>
                <td>{{$anames[$data->id]}}</td>
                <td>{{$data->bname}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="ml-4 text-right text-sm text-gray-500 sm:text-right sm:ml-0">
        <u>Total Count: {{count($books)}}</u>
    </div>
@endsection
