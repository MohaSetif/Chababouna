@extends('chababounausers.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 9 CRUD Application - Chababouna</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('chababounausers.create') }}">Add New User</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
           <th>الطلب</th>
           <th>التسجيل في</th>
           <th>تاريخ التسجيل</th>
           <th>رقم الهاتف</th>
           <th>المستوى الدراسي</th>
           <th>المقر</th>
           <th>البريد الالكتروني</th>
           <th>الصورة</th>
           <th>ما يمكن تقديمه</th>
           <th>الهواية</th>
           <th>مكان الإقامة</th>
           <th>الولاية</th>
           <th>عام الميلاد</th>
           <th>شهر الميلاد</th>
           <th>يوم الميلاد</th>
           <th>المهنة</th>
           <th>الجنس</th>
           <th>اللقب</th>
           <th>الاسم</th>
           <th>الرقم</th>
           <th>العمليات</th>
        </tr>
        @foreach ($chababounausers as $chababounauser)
        <tr>
            <td>{{ $chababounauser->status }}</td>
            <td>{{ $chababounauser->inscripted_in }}</td>
            <td>{{ $chababounauser->created_at }}</td>
            <td>{{ $chababounauser->tel }}</td>
            <td>{{ $chababounauser->scholar_year }}</td>
            <td>{{ $chababounauser->local }}</td>
            <td>{{ $chababounauser->email }}</td>
            <td><img src="uploads/utilisateurs/{{ $chababounauser->photo }}" width="100px"></td>
            <td>{{ $chababounauser->help }}</td>
            <td>{{ $chababounauser->hobby }}</td>
            <td>{{ $chababounauser->residence }}</td>
            <td>{{ $chababounauser->place }}</td>
            <td>{{ $chababounauser->year }}</td>
            <td>{{ $chababounauser->month }}</td>
            <td>{{ $chababounauser->day }}</td>
            <td>{{ $chababounauser->job }}</td>
            <td>{{ $chababounauser->sex }}</td>
            <td>{{ $chababounauser->surname }}</td>
            <td>{{ $chababounauser->name }}</td>
            <td>{{ ++$i }}</td>

            <td>
                <form action="{{ route('chababounausers.destroy',$chababounauser->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('chababounausers.show',$chababounauser->id) }}">عرض</a>
    
                    <a class="btn btn-primary" href="{{ route('chababounausers.edit',$chababounauser->id) }}">تعديل</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">إزالة</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $chababounausers->links() !!}
      <style>
        .w-5{
            display: none;
        }
      </style>
@endsection