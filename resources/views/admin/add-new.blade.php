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
            <form action="{{route('storeBook')}}" method="POST">
                @csrf
                <div class="form-group" >
                    <label for="bname">{{__('Book Name')}}</label>
                    <input type="text" class="form-control" name="bname" id="bname">
                </div>
                <div>
                    <button type="submit"  class="btn btn-outline-success">{{__('Save Changes')}}</button>
                </div>
            </form>
        </div>

        <div class="col">
            <h3>{{__('Bind Author and Book')}}</h3>
            <small>Be Aware, if you will not complete this step, there will not be your new book in "Books"</small>
            <form action="{{route('store')}}" method="POST">
                @csrf
                <div class="form-group" >
                    <label for="author_id">{{__('Choose Author')}}</label>
                    <select class="form-control " name="author_id" id="author_id">
                        @foreach($authors as $key => $data)
                            <option value="{{$data->id}}">{{$data->aname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" >
                    <label for="book_id">{{__('Choose Book')}}</label>
                    <select class="form-control " name="book_id" id="book_id">
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

