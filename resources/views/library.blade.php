<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/BooksTable.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="/img/android-chrome-512x512.png">
    <title>كتبنا</title>
</head>
<body>
<div class="example">
    <button type="submit" onclick="return myFunction()"><i class="fa fa-search"></i></button>
    <input type="text" name="SearchBar" id="SearchBar" placeholder="ابحث...">
</div>
<div class="table">
<table id="userTable">
    <thead>
        <tr>
           <th>الرقم</th>
           <th>تاريخ الإدخال</th>
           <th>التخصص</th>
           <th>العنوان</v>
           <th>المؤلف</th>
           <th>التحقيق</th>
           <th>التخريج</th>
           <th>دار النشر</th>
           <th>عدد الأجزاء</th>
           <th>الملاحظة</th>
           <th>عدد النسخ</th>
           <th>الصورة</th>
        </tr>
    </thead>
    @foreach($books as $item)
    <tbody>
      <tr>
         <td>{{ $item->id }}</td>
         <td>{{ $item->created_at }}</td>
         <td>{{ $item->field }}</td>
         <td>{{ $item->title }}</td>
         <td>{{ $item->writer_name }}</td>
         <td>{{ $item->review }}</td>
         <td>{{ $item->documentation }}</td>
         <td>{{ $item->publication }}</td>
         <td>{{ $item->parts }}</td>
         <td>{{ $item->note }}</td>
         <td>{{ $item->copies }}</td>
         <td><img src="uploads/books/{{ $item->photo }}" width="100px"></td></td>
      </tr>
    </tbody>
    @endforeach
</table>
</div>

<script>
  function myFunction(){
    var input, filter, table, tr, td, cell, i, j;
  filter = document.getElementById("SearchBar").value.toLowerCase();
  table = document.getElementById("userTable");
  tr = table.getElementsByTagName("tr");
  for (i = 1; i < tr.length; i++) {
    tr[i].style.display = "none";
    const tdArray = tr[i].getElementsByTagName("td");
    for (var j = 0; j < tdArray.length; j++) {
      const cellValue = tdArray[j];
      if (cellValue && cellValue.innerText.toLowerCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
        break;
      }
    }
  }
  }
</script>


</body>
</html>