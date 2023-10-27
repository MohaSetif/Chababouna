<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/LoginStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
    <title>صفحة التسجيل</title>
</head>
<body>
<form action="صفحة-الدخول" method="POST">
    @csrf
    <section>
    <div class="ImgBox">
        <img src="/img/religion-city-aerial-photography-metropolis-wallpaper-preview.jpg">
    </div>
    <div class="ContentBox">
        <div class="FormBox">
            <h2>إعادة التسجيل</h2>
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
                    <span>:البريد الالكتروني</span>
                    <input type="text" name="email" value="{{old('email')}}">
                    @error('email')
                        <div class="error">
                            <?php echo 'نسيت ملء البريد الالكتروني'; ?>
                        </div>
                    @enderror
                    <br>
                    <br>
                    
                <div class="InputBox">
                    <span>:رقم الهاتف</span>
                    <input type="text" name="Tel" value="{{old('Tel')}}">
                    @error('Tel')
                        <div class="error">
                            <?php echo 'نسيت ملء رقم الهاتف أو هو خاطئ'; ?>
                        </div>
                    @enderror
                </div>
                <div class="InputBox">
                    <button type="submit">أدخل الآن</button>
                </div>
            </div>
        </div>
    </form>
</section>
</form>
</body>
</html>