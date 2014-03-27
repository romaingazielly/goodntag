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
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>/css/common.css" />
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create', 'UA-49219337-1', 'goodntag.com');ga('send','pageview');

        </script>
    </head>
    <body>
        <div id="fb-root"></div>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="full">
            <div class="screen">
                <div class="home parallax" ></div>
            </div>

            <div class="screen">
                <div class="mobile parallax">
                    <div class="wrapper">
                        <h1 class="bold">Un site<br/>mobile</h1>
                        <p>pour chacun de vos produits <br/>et pour votre marque</p>
                        <div class="mobile_img"></div>
                    </div>
                </div>
            </div>
            <!-- <div class="clear"></div> -->
            
            <div class="screen">
                <div class="dad parallax">
                    <div class="border"></div>
                    <div class="wrapper">
                        <div class="icon icon1 margin">
                            <div class="icon1"></div>
                            <h2 class="title">Donner</h2>
                            <p>une dimension expérientielle, 
                            informative et sociale à votre <br/>
                            marque et vos produits</p>
                        </div>
                        <div class="icon icon2 margin">
                            <div class="icon2"></div>
                            <h2 class="title">Avoir</h2>
                            <p>une visibilité sur les 
                            comportements<br/>in-store de vos clients</p>
                        </div>
                        <div class="icon icon3 margin">
                            <div class="icon3"></div>
                            <h2 class="title">Disposer</h2>
                            <p>d’un levier incitant à 
                            l’achat immédiat<br/> en magasin</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="screen small">
                <div class="scan parallax">
                    <div class="bg_texte"></div>
                    <div class="wrapper">
                        <div class="align">
                            <h1>Scannez</h1>
                            <h2>LIBÉREZ LEUR POTENTIEL DE<br/><span>COMMUNICATION  </span></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="screen">
                <div class="nfc parallax">
                    <div class="wrapper">
                        <div class="shirt icon"></div>
                        <div class="cross icon"></div>
                        <div class="phone icon"></div>
                    </div>
                </div>
            </div>

            <div class="screen small">
                <div class="infos parallax">
                    <div class="bg_texte"></div>
                    <div class="wrapper">
                        <div class="align">
                            <h1>Obtenez des informations</h1>
                            <h2>Vos produits ont une histoire à raconter </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="screen">
                <div class="page parallax">
                    <div class="wrapper">
                        <div class="fiche">
                            <h1>Page dédiée<br/>au <span>produit</span></h1>
                            <div class="descr">
                                <p>Visuel du produit<br/><br/>
                                Descriptif détaillé du produit<br/><br/>
                                Avis utilisateur<br/><br/>
                                Éventuelles <span>promotions</span> en cours<br/><br/>
                                <span>Suggestion</span> d’articles<br/><br/>
                                Mise en favoris</p>
                            </div>
                        </div>
                        <div class="fiche">
                            <h1>Page dédiée<br/>à la <span>marque</span></h1>
                            <div class="descr">
                                <p>Descriptif défftaillé de la marque<br/><br/>
                                Mise en avant des dernières <span>actualités</span> <br/><br/>
                                Mise en avant de produits<br/><br/>
                                Localisation des <span>points de vente</span><br/><br/>
                                Accès aux réseaux sociaux de la marque<br/><br/>
                                Espaces pour diffuser du <span>contenu propre à la marque</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="screen small">
                <div class="contact parallax">
                    <div class="wrapper">
                        <div class="arrow"></div>
                        <a class="btn_contact" href="mailto:contact.goodntag@gmail.com"></a>
                        <a class="fb" href="https://www.facebook.com/sofarawaysfa?fref=ts" target="_blank"></a>
                        <a class="twitter" href="https://twitter.com/RicouDenis" target="_blank"></a>
                    </div>
                </div>
            </div>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
        $('.screen').css({'height': $(window).height()});
        $('.arrow').on('click',function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
        });

            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '747588765259709',
                    status     : true,
                    xfbml      : true
                });
            };
                    // Load the SDK asynchronously
            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/fr_FR/all.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
    </body>
</html>
