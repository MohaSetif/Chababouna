@extends('chababounausers.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Chababouna User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('chababounausers.index') }}"> Back</a>
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
   
<form action="{{ route('chababounausers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Surname:</strong>
                <input type="text" name="surname" class="form-control" value="{{old('surname')}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sex:</strong>
                Male: <input type="radio" name="sex" value="ذكر">
                Female: <input type="radio" name="sex" value="أنثى">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Job</strong>
                <input type="text" name="job" class="form-control" value="{{old('job')}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Day:</strong>
                <input type="number" name="day" class="form-control" value="{{old('day')}}">
                <strong>Month:</strong>
                <input type="number" name="month" class="form-control" value="{{old('month')}}">
                <strong>Year:</strong>
                <input type="number" name="year" class="form-control" value="{{old('year')}}">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Wilaya:</strong>
                <input type="text" name="place" class="form-control" value="{{old('place')}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Residence:</strong>
                <input type="text" name="residence" class="form-control" value="{{old('residence')}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hobby:</strong>
                <input type="text" name="hobby" class="form-control" value="{{old('residence')}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>What you can do:</strong>
                <textarea name="help" class="form-control" cols="10" rows="10"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Photo:</strong>
                <input type="file" name="photo" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" value="{{old('email')}}">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Scholar level:</strong>
                <input type="text" name="scholar_year" class="form-control" value="{{old('scholar_year')}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tel:</strong>
                <input type="number" name="tel" class="form-control" value="{{old('tel')}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">اضغط</button>
        </div>
    </div>
   
</form>
@endsection