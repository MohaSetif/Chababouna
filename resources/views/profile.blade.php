<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/Profile.css">
    <title>حسابي الخاص</title>
</head>
<body>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5 mb-3" width="150px" src="/img/twitter-avi-gender-balanced-figure.png">{{ Auth::user()->name }}</span><span class="text-black-50">{{ Auth::user()->email }}</span><span> </span></div>
        </div>
        <div class="col">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">حسابي الخاص</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels" style="float: right;">الاسم</label><input type="text" class="form-control" placeholder="first name" value="{{ Auth::user()->name }}" disabled></div>
                    <div class="col-md-6"><label class="labels" style="float: right;">اللقب</label><input type="text" class="form-control" value="{{ Auth::user()->surname }}" placeholder="surname" disabled></div>
                </div>
                <br><br>
                <div class="row mt-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right" style="margin-right:15px;">تسجيلاتي</h4>
                </div>
                <div class="container text-center">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">نوع التسجيل</th>
                            <th scope="col">تاريخ التسجيل</th>
                            <th scope="col">الحالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrations as $registration)
                            <tr>
                                <td style="color:gray;">{{ $registration->inscripted_in }}</td>
                                <td style="color:gray;">{{ $registration->created_at }}</td>
                                <td style="color:gray;">{{ $registration->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>