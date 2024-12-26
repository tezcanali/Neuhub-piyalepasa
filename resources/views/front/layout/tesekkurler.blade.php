<!DOCTYPE html>
<html lang="tr" class="no-js">
<head>
    <meta charset="utf-8">
    <title>Piyalepaşa İstanbul Premium Projesi | Piyalepaşa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css')}}" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" href="{{ asset('front/assets/css/icofont.min.css')}}" type="text/css" media="screen" charset="utf-8" />
    <link rel="canonical" href="https://www.piyalepasa.com.tr/tesekkurler.html" />

    <meta name="description" content="Piyalepaşa İstanbul Premium'un konforlu rezidans daireleri, geniş balkonları, terasları ve yanıbaşındaki Polat Piyalepaşa Çarşı ile ayrıcalıklı bir yaşam sizi bekliyor !">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NMH2WR8');</script>
    <!-- End Google Tag Manager -->
    <!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-TB1CLZL2SX"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-TB1CLZL2SX'); </script>


</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NMH2WR8"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>
<script src="{{ asset('front/assets/js/messagebox.js')}}"></script>

<!-- Offer Conversion: Piyalepasa [CPL] -->
<iframe src="https://ad.adrttt.com/SLBjU" scrolling="no" frameborder="0" width="1" height="1"></iframe>
<!-- // End Offer Conversion -->



<script>
    const messageContent = `
        <div>
            <p>Formunuz Başarıyla İletildi. Form doldurduğunuz için teşekkür ederiz. Müşteri temsilcilerimiz en kısa sürede sizinle irtibata geçecektir.</p>
            <br/>
            <div id="name"><strong>İsim: </strong>{{ $formData['name'] ?? '' }}</div>
            <div id="email"><strong>Email: </strong>{{ $formData['email'] ?? '' }}</div>
            <div id="phone"><strong>Telefon: </strong>{{ $formData['phone'] ?? '' }}</div>
        </div>
    `;

    $.MessageBox(messageContent).done(function () {
        location.href = '/';
    });
</script>



</body>
</html>
