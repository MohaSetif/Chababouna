@extends('layouts.app')
@section('content')
<div class="container">
    <!-- this function of java Script play Camera -->
<script src="https://reeteshghimire.com.np/wp-content/uploads/2021/05/html5-qrcode.min_.js"></script>
<!-- Header --> 
<div class="container-fluid header_se">
 <div class="col-md-12">
 <div class="title col" style="padding:30px;">
    <h2>اقرأ الكود</h2>
    <div id="result">النتيجة هنا: </div>
   </div>
  <div class="row">
   <div class="col">
    <div id="reader"></div>
   </div>
  </div>
  <div class="scanner">
  <script type="text/javascript">
     // after success to play camera Webcam Ajax paly to send data to Controller
     function onScanSuccess(data) {
    try {
        // Send the data to the server via AJAX
        $.ajax({
            type: "POST",
            cache: false,
            url: "{{ action('App\Http\Controllers\QrCheckUserController@checkUser') }}",
            data: { "_token": "{{ csrf_token() }}", data: JSON.stringify(data) },
            success: function (response) {
                var user = JSON.parse(response.user);
                if (user) {
                  // User found, display user's information
                  document.getElementById('result').innerHTML = '<span class="result">موجود</span>';
                  var userNameContainer = document.getElementById('user-name-container');
                  userNameContainer.innerText = "رقم التلميذ: " + user.id + "، اسمه الكامل: " + user.name + ' ' + user.surname;
                } else {
                  // Check if a message is returned
                  if (response.message) {
                    alert(response.message);
                  } else {
                    // User not found, show a default message
                    return confirm('هذا الكود لا ينتمي لأحد.');
                  }
                }
            }
        });
    } catch (error) {
        console.error('Error parsing JSON data:', error);
        alert('Invalid QR code data');
    }
}
  var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
  html5QrcodeScanner.render(onScanSuccess);
 </script>
  </div>
 </div>
 </div>
</div>
<hr/>
<div class="container">
<div id="user-name-container">
    <!-- User's name will be displayed here -->
</div>
	 © {{ date('Y') }}. جمعية شبابنا - سطيف
	 <br/>
</div>

<script type="text/javascript">
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
  });
</script>
<style>
  .title{
    direction: rtl;
  }

  .result{
    background-color: green;
    color:#fff;
    padding:10px;
  }
  .row{
    display:flex;
  }
  #reader {
    background: black;
    width:500px;
  }
  button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 6px;
}
a#reader__dashboard_section_swaplink {
  background-color: blue; /* Green */
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 6px;
}
span a{
  display:none
}

#reader__camera_selection{
  background: blueviolet;
  color: aliceblue;
}
#reader__dashboard_section_csr span{
  color:red
}
</style>
@yield('scripts')
@endsection