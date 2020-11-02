@extends('layouts.app')
@section('title')
    All Books
@endsection
@section('content')

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">{{__('Book ID')}}</th>
            <th scope="col">{{__('Book Name')}} </th>
            <th scope="col">{{__('Author Name')}}</th>
            <th scope="col">{{__('Edit')}}</th>
            <th scope="col">{{__('Delete')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $key => $data)
            <tr>
                <th scope="row">{{$data->id}}</th>
                <td>{{$data->bname}}</td>
                <td>{{$anames[$data->id]}}</td>
                <td><a class="btn btn-outline-secondary" href="{{route('edit',$data->id)}}">{{__('Edit')}}</a></td>
                <td><a class="btn btn-outline-danger" href="{{route('del',$data->id)}}">{{__('Delete')}}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="ml-4 text-right text-sm text-gray-500 sm:text-right sm:ml-0">
        <u>Total Count: {{count($books)}}</u>
    </div>
@endsection
