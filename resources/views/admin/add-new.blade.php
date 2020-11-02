@extends('layouts.app')
@section('title')
    Add New
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <h3>{{__('New Author')}}</h3>
            <form action="{{route('storeAut')}}" method="POST">
                @csrf
                <div class="form-group" >
                    <label for="aname">{{__('Author Name')}}</label>
                    <input type="text" class="form-control" name="aname"  id="aname" >
                </div>
                <div>
                    <button type="submit"  class="btn btn-outline-success">{{__('Save Changes')}}</button>
                </div>
            </form>
        </div>

        <div class="col">
            <h3>{{__('New Book')}}</h3>
            <form action="#" method="POST">
                @csrf
                <div class="form-group" >
                    <label for="title">{{__('Book Name')}}</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
                <div>
                    <button type="submit"  class="btn btn-outline-success">{{__('Save Changes')}}</button>
                </div>
            </form>
        </div>

        <div class="col">
            <h3>{{__('Bind Author and Book')}}</h3>
            <form action="{{--{{route('sub',$data->id)}}--}}" method="POST">
                @csrf

                <div class="form-group" >
                    <label for="autList">{{__('Choose Author')}}</label>
                    <select class="form-control " name="autList" id="autList">
                        @foreach($authors as $key => $data)
                            <option value="{{$data->id}}">{{$data->aname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" >
                    <label for="autList">{{__('Choose Book')}}</label>
                    <select class="form-control " name="autList" id="autList">
                        @foreach($books as $key => $data)
                            <option value="{{$data->id}}">{{$data->bname}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit"  class="btn btn-outline-success">{{__('Save Changes')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

