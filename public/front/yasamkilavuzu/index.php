<html>

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

       <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>PİYALEPAŞA | YAŞAM KILAVUZUNUZ - Piyalepasa</title>

    <link rel="stylesheet" href="">

        <!-- Flipbook StyleSheet -->

        <link href="css/dflip.css" rel="stylesheet" type="text/css"/>
        <link rel="canonical" href="https://www.piyalepasa.com.tr/assets/yasamkilavuzu/" />


        <!-- Icons Stylesheet -->

        <link href="css/themify-icons.css" rel="stylesheet" type="text/css"/>

        <link href="css/style.css" rel="stylesheet" type="text/css"/>

    </head>

    <body>
        
    <div class="landscape"></div>

    <div id="flipbookContainer"></div> 

    <script src="js/libs/jquery.min.js" type="text/javascript"></script>

    <script src="js/jquery.maskedinput.js" type="text/javascript"></script>

    <script src="js/dflip.min.js" type="text/javascript"></script>

    <script>

        jQuery(document).ready(function () {

            var options = {pageMode:2};

            var images = [<?php for($i=1;$i<=34;$i++){ echo "'images/flipfile/$i.jpg?v=".rand(0,10000)."',"; } ?>];

            var flipBook = $("#flipbookContainer").flipBook(images, options);

        });

    </script>

</body>

</html>