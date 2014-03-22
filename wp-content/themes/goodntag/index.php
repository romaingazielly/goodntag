<?php

$root = get_template_directory_uri();
define(ROOT, $root);
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Goodntag - Habil(l)ement connecté</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="<?php echo ROOT; ?>/css/normalize.min.css">
        <link rel="stylesheet" href="<?php echo ROOT; ?>/css/site.css">
        
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="full">
            <div class="home"></div>
        </div>
        <div class="mobile"></div>

        <div class="dad"></div>

        <div class="scan"></div>

        <div class="nfc"></div>

        <div class="infos"></div>

        <div class="page"></div>

        <div class="contact">
            <div class="wrapper">
                <div class="arrow"></div>
                <a class="btn_contact" href="mailto:contact.goodntag@gmail.com"></a>
                <a class="fb" href="https://www.facebook.com/sofarawaysfa?fref=ts" target="_blank"></a>
                <a class="twitter" href="https://twitter.com/RicouDenis" target="_blank"></a>
            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>

        $('.arrow').on('click',function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
        });


            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
