@extends('layouts.app')
@section('title')
    Edit Author
@endsection
@section('content')
    <form action="{{route('subAuthor',$data->id)}}" method="POST">
        @csrf
        <div class="form-group" >
            <label for="bname">{{__('Author Name')}}</label>
            <input type="text" class="form-control" name="aname" value="{{$data->aname}}" id="aname" >
        </div>
        <div>
            <button type="submit"  class="btn btn-outline-success">{{__('Save Changes')}}</button>
        </div>
    </form>
@endsection
