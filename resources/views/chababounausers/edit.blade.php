@extends('chababounausers.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Chababouna User</h2>
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
  
    <form action="{{ route('chababounausers.update',$chababounauser->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" value="{{ $chababounauser->name }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Surname:</strong>
                <input type="text" name="surname" class="form-control" value="{{ $chababounauser->surname }}">
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
                <input type="text" name="job" class="form-control" value="{{ $chababounauser->job }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Day:</strong>
                <input type="number" name="day" class="form-control" value="{{ $chababounauser->day }}">
                <strong>Month:</strong>
                <input type="text" name="month" class="form-control" value="{{ $chababounauser->month }}">
                <strong>Year:</strong>
                <input type="number" name="year" class="form-control" value="{{ $chababounauser->year }}">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Wilaya:</strong>
                <input type="text" name="place" class="form-control" value="{{ $chababounauser->place }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Residence:</strong>
                <input type="text" name="residence" class="form-control" value="{{ $chababounauser->residence }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hobby:</strong>
                <input type="text" name="hobby" class="form-control" value="{{ $chababounauser->hobby }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>What you can do:</strong>
                <input type="text" name="help" class="form-control" value="{{ $chababounauser->help }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Photo:</strong>
                <input type="file" name="photo" class="form-control">
                <img src="uploads/utilisateurs/{{ $chababounauser->photo }}" width="100px">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" value="{{ $chababounauser->email }}">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Scholar Year:</strong>
                <input type="text" name="scholar_year" class="form-control" value="{{ $chababounauser->scholar_year }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tel:</strong>
                <input type="number" name="tel" class="form-control" value="{{ $chababounauser->tel }}">
            </div>
        </div>


        <!-- <form action="PendingStatus"> -->
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" name = "btn" class="btn btn-warning" value="accepted">قبول</button>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" name = "btn" class="btn btn-danger" value="rejected">رفض</button>
        </div>
        <!-- </form> -->

      
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">اضغط</button>
            </div>
        </div>
   
    </form>


@endsection