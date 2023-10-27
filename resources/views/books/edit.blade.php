@extends('books.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Book</h2>
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
  
    <form action="{{ route('books.update',$book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row">
            
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Field:</strong>
                <input type="text" name="field" value="{{ $book->field }}" class="form-control" placeholder="Field">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" value="{{ $book->title }}" class="form-control" placeholder="Title">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Writer's Name:</strong>
                <input type="text" name="writer_name" value="{{ $book->writer_name }}" class="form-control" placeholder="Writer's Name">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Review:</strong>
                <input type="text" name="review" value="{{ $book->review }}" class="form-control" placeholder="Review">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Documentation:</strong>
                <input type="text" name="documentation" value="{{ $book->documentation }}" class="form-control" placeholder="Documentation">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Publication:</strong>
                <input type="text" name="publication" value="{{ $book->publication }}" class="form-control" placeholder="Publication">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Parts:</strong>
                <input type="text" name="parts" value="{{ $book->parts }}" class="form-control" placeholder="Parts">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Note:</strong>
                <input type="text" name="note" value="{{ $book->note }}" class="form-control" placeholder="Note">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Copies:</strong>
                <input type="text" name="copies" value="{{ $book->copies }}" class="form-control" placeholder="Copies">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Photo:</strong>
                <input type="file" name="photo" class="form-control" value="/uploads/books/{{old('photo')}}">
            </div>
        </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">اضغط</button>
            </div>
        </div>
   
    </form>
@endsection