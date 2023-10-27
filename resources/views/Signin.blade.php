<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/LoginStyle.css">
    <link rel="icon" type="image/x-icon" href="/img/android-chrome-512x512.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
			$( function() { // jquery document ready function
				$( '#first_jquery_checkbox' ).on( 'click', function() { // do things when the checkbox gets clicked
					if ( this.checked ) { // check box is checked so disable input and select
						$( '#first_jquery_input1' ).prop( 'disabled', 'disabled' );
                        $( '#first_jquery_input2' ).prop( 'disabled', 'disabled' );
					} else { // checkbox is not checked, make input and select editable
						$( '#first_jquery_input1' ).prop( 'disabled', '' );
                        $( '#first_jquery_input2' ).prop( 'disabled', '' );
					}
				} )	
			} );
		</script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
    <title>التعليم القرآني</title>
</head>
<body>
<form action="التسجيل" method="POST" enctype="multipart/form-data">
    @csrf
    <section>
    <div class="ImgBox">
        <img src="/img/10051f000001gsrxu99A6.jpg">
    </div>
    <div class="ContentBox">
        <div class="FormBox">
            <h2>التعليم القرآني</h2>
                <div class="InputBox">
                    <span>:الاسم</span>
                    <input type="text" name="name" value="{{old('name')}}">
                    @error('name')
                        <div class="error">
                            <?php echo 'نسيت ملء الاسم'; ?>
                        </div>
                    @enderror
                    <span>:اللقب</span>
                    <input type="text" name="surname" value="{{old('surname')}}">
                    @error('surname')
                        <div class="error">
                            <?php echo 'نسيت ملء اللقب'; ?>
                        </div>
                    @enderror
                </div>
                <div class="InputBox">
                    <span>:المهنة</span>
                    <input type="text" name="job" value="{{old('job')}}" id="first_jquery_input1">
                    @error('job')
                        <div class="error">
                            <?php echo 'نسيت أن تضع مهنتك'; ?>
                        </div>
                    @enderror
                    
                    <span>:مهنة الولي</span>
                    <input type="text" name="DadJob" value="{{old('DadJob')}}">
                </div>
                <div class="InputBox">
                    <span>:مهنة الأم</span>
                    <input type="text" name="MomJob" value="{{old('MomJob')}}">
                    <span>:ذكر</span><input type="radio" name="sex" value="ذكر">
                    <span>:أنثى</span><input type="radio" name="sex" value="أنثى">
                    @error('sex')
                        <div class="error">
                            <?php echo 'نسيت أن تضع جنسك'; ?>
                        </div>
                    @enderror
                </div>

            <div class="InputBox">  
                <div class="check">
                    <span for="first_jquery_checkbox">(أقل من 18؟ (أكتب مهنة الأولياء و لا تكتب البريد الالكتروني</span>
                    <input type="checkbox" id="first_jquery_checkbox" name="Over">
                </div>
            </div>

                <div class="InputBox">
                    <span>:تاريخ الميلاد</span>
                    <select name="day" id="day">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
                        <option>31</option>
                    </select>
                    <select name="month" id="month">
                        <option>جانفي</option>
                        <option>فيفري</option>
                        <option>مارس</option>
                        <option>أفريل</option>
                        <option>ماي</option>
                        <option>جوان</option>
                        <option>جويلية</option>
                        <option>أوت</option>
                        <option>سبتمبر</option>
                        <option>أكتوبر</option>
                        <option>نوفمبر</option>
                        <option>ديسمبر</option>
                    </select>
                    <div class="YearBox">
                        <input type="number" name="year" value="{{old('year')}}" id="year">
                        @error('year')
                        <div class="error">
                            <?php echo 'نسيت ملء سنة الميلاد'; ?>
                        </div>
                    @enderror
                    </div>
                </div>
                <div class="InputBox">
                    <span>:مكان الميلاد</span>
                    <input type="text" name="place" value="{{old('place')}}">
                    @error('place')
                        <div class="error">
                            <?php echo 'نسيت ملء مكان الميلاد'; ?>
                        </div>
                    @enderror
                    <span>:العنوان</span>
                    <input type="text" name="residence" value="{{old('residence')}}">
                    @error('residence')
                        <div class="error">
                            <?php echo 'نسيت ملء مكان الإقامة'; ?>
                        </div>
                    @enderror
                </div>
                <div class="InputBox">
                   <span>:المستوى الدراسي</span>
                   <select name="scholar_year">
                        <option>التمهيدي</option>
                        <option>التحضيري</option>
                        <option>الابتدائي</option>
                        <option>المتوسطي</option>
                        <option>الثانوي</option>
                        <option>الجامعي</option>
                        <option>خيار آخر</option>
                   </select>
                   <span>:المقر</span>
                   <select name="local">
                        <option>-البشير الإبراهيمي -لعرارسة</option>
                        <option>-عائشة أم المؤمنين -ديرو</option>
                   </select>
                </div>
            
                <div class="InputBox">
                    <span>:رقم الهاتف</span>
                    <input type="text" name="tel" value="{{old('tel')}}">
                    @error('tel')
                        <div class="error">
                            <?php echo 'نسيت ملء رقم الهاتف أو هو خاطئ'; ?>
                        </div>
                    @enderror
                    <br><br>
                    <span>أدخل صورتك</span>
                    <input type="file" name="photo" id="photo" class="custom-file-input">
                    @error('photo')
                        <div class="error">
                            <?php echo 'نسيت وضع صورتك'; ?>
                        </div>
                    @enderror
                </div>

                <div class="InputBox">
                    <button type="submit">سجل الآن</button>
                </div>
            </div>
        </div>
    </form>
</section>
</form>

<script type="text/javascript">
			( function() { // javascript document ready function
				var firstJavaScriptInput1 = document.getElementById( 'first_javascript_input1' );
                var firstJavaScriptInput2 = document.getElementById( 'first_javascript_input2' );
				var firstJavaScriptCheckbox = document.getElementById( 'first_javascript_checkbox' );
				
				firstJavaScriptCheckbox.addEventListener( 'click', function() { // do things when the checkbox gets clicked
					if ( this.checked ) { // check box is checked so disable input and select
						firstJavaScriptInput1.disabled = 'disabled';
                        firstJavaScriptInput2.disabled = 'disabled';
					} else { // checkbox is not checked, make input and select editable
						firstJavaScriptInput1.disabled = '';
                        firstJavaScriptInput2.disabled = '';
					}
 				} );
			} )();
		</script>

</body>
</html>