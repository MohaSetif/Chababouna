@extends('books.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Book</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('books.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Field:</strong>
                <input type="text" name="field" class="form-control" placeholder="Field" value="{{old('filed')}}">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{old('title')}}">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Writer's Name:</strong>
                <input type="text" name="writer_name" class="form-control" placeholder="Writer's Name" value="{{old('writer_name')}}">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Review:</strong>
                <input type="text" name="review" class="form-control" placeholder="Review" value="{{old('review')}}">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Documentation:</strong>
                <input type="text" name="documentation" class="form-control" placeholder="Documentation" value="{{old('documentation')}}">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Publication:</strong>
                <input type="text" name="publication" class="form-control" placeholder="Publication" value="{{old('publication')}}">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Parts:</strong>
                <input type="text" name="parts" class="form-control" placeholder="Parts" value="{{old('parts')}}">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Note:</strong>
                <input type="text" name="note" class="form-control" placeholder="Note" value="{{old('note')}}">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Copies:</strong>
                <input type="text" name="copies" class="form-control" placeholder="Copies" value="{{old('copies')}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Photo:</strong>
                <input type="file" name="photo" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">اضغط</button>
        </div>
    </div>
   
</form>
@endsection