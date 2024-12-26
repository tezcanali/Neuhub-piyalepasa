<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>Teşekkürler | Piyalepaşa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css')}}" type="text/css" />
</head>
<body>
    <div class="thank-you-container" style="text-align: center; padding: 50px;">
        <h1>Form Bilgileriniz Başarıyla Alındı</h1>
        <div class="form-details" style="margin: 30px auto; max-width: 400px; text-align: left;">
            <p id="name"><strong>İsim:</strong> {{ $name }}</p>
            <p id="email"><strong>Email:</strong> {{ $email }}</p>
            <p id="phone"><strong>Telefon:</strong> {{ $phone }}</p>
        </div>
        <p>En kısa sürede sizinle iletişime geçeceğiz.</p>
        <a href="/" class="btn" style="display: inline-block; margin-top: 20px;">Ana Sayfaya Dön</a>
    </div>
</body>
</html>
