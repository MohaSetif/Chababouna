@extends('books.layout')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 9 CRUD Application - Chababouna's Library</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('books.create') }}"> Create New Book</a>
            </div>
        </div>
    </div>
   
    <div class="example">
    <input type="text" name="SearchBar" id="SearchBar1" placeholder="ابحث..." onkeyup="myFunction()">
</div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered" id="userTable">
        <tr>
           <th>الصورة</th>
           <th>عدد النسخ</th>
           <th>الملاحظة</th>
           <th>عدد الأجزاء</th>
           <th>دار النشر</th>
           <th>التخريج</th>
           <th>التحقيق</th>
           <th>المؤلف</th>
           <th>العنوان</v>
           <th>التخصص</th>
           <th>تاريخ الإدخال</th>
           <th>الرقم</th>
           <th>العمليات</th>
        </tr>
        @foreach ($books as $book)
        <tr>
            <td><img src="/uploads/books/{{ $book->photo }}" width="100px"></td>
            <td>{{ $book->copies }}</td>
            <td>{{ $book->note }}</td>
            <td>{{ $book->parts }}</td>
            <td>{{ $book->publication }}</td>
            <td>{{ $book->documentation }}</td>
            <td>{{ $book->review }}</td>
            <td>{{ $book->writer_name }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->field }}</td>
            <td>{{ $book->created_at }}</td>
            <td>{{ ++$i }}</td>

            <td>
                <form action="{{ route('books.destroy',$book->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('books.show',$book->id) }}">عرض</a>
    
                    <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">تعديل</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">إزالة</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <style>

        .example input[type=text] {
  padding: 4px;
  font-size: 17px;
  border: 1px solid grey;
  float: right;
  width: 50%;
  background: #f1f1f1;
  direction: rtl;
  font-family: Janna;
}

.example button {
  float: left;
  width: 10%;
  padding: 10px;
  background: #0db116;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

.example button:hover {
  background: #74dd7d;
}

.example::after {
  content: "";
  clear: both;
  display: table;
}

    </style>

<script>
 function myFunction(){
    var input = document.getElementById("SearchBar1");
var filter = input.value.toUpperCase();
var table = document.getElementById("userTable");
var trs = table.tBodies[0].getElementsByTagName("tr");

// Loop through first tbody's rows
for (var i = 0; i < trs.length; i++) {

  // define the row's cells
  var tds = trs[i].getElementsByTagName("td");

  // hide the row
  trs[i].style.display = "none";

  // loop through row cells
  for (var i2 = 0; i2 < tds.length; i2++) {

    // if there's a match
    if (tds[i2].innerText.indexOf(filter) > -1) {

      // show the row
      trs[i].style.display = "";

      // skip to the next row
      continue;

    }
  }
}
}

</script>

@endsection