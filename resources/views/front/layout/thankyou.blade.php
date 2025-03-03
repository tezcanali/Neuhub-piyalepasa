<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>Thank You | Piyalepaşa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css')}}" type="text/css" />
</head>
<body>
    <div class="thank-you-container" style="text-align: center; padding: 50px;">
        <h1>Your Form Information Received Successfully</h1>
        <div class="form-details" style="margin: 30px auto; max-width: 400px; text-align: left;">
            <p id="name"><strong>Name:</strong> {{ $name }}</p>
            <p id="email"><strong>Email:</strong> {{ $email }}</p>
            <p id="phone"><strong>Phone:</strong> {{ $phone }}</p>
        </div>
        <p>We will contact you as soon as possible.</p>
        <a href="/en" class="btn" style="display: inline-block; margin-top: 20px;">Back to Home Page</a>
    </div>
</body>
</html>
