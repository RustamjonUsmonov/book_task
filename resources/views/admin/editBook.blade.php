@extends('layouts.app')
@section('title')
    Edit Book
@endsection
@section('content')
    <form action="{{route('sub',$data->id)}}" method="POST">
        @csrf
        <div class="form-group" >
            <label for="bname">{{__('Book Name')}}</label>
            <input type="text" class="form-control" name="bname" value="{{$data->bname}}" id="bname" >
        </div>
        <div>
            <button type="submit"  class="btn btn-outline-success">{{__('Save Changes')}}</button>
        </div>
    </form>
@endsection
