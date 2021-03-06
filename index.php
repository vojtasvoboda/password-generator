<!doctype html>
<html class="no-js" lang="cs">

<head>
    <meta charset="utf-8">
	<title>Generátor hesel - vygeneruj si silné heslo!</title>

	<meta name="keywords" content="generator,hesel,hesla" />
	<meta name="description" content="Generátor hesel, pomocí kterého si můžete vygenerovat silné heslo." />
	<meta name="copyright" content="Vojtěch Svoboda; mailto:vojtasvoboda.cz@gmail.com" />
    <meta name="viewport" content="width=device-width">
	<meta name="distribution" content="global" />
	<meta name="author" content="Vojta Svoboda; mailto:vojtasvoboda.cz@gmail.com" />
	<meta name="language" content="Czech" />
	<meta name='robots' content='all,follow' />
	<meta name="rating" content="general" />
	<meta name="revisit-after" content="30 days" />
	<meta name="y_key" content="14d7527aa624b8f3" />
	<meta name="google-site-verification" content="bk3qspKYZHRn5G3BO4JlWT5k1Bv0mrU0qPuzhxrYHf0" />

	<style>
        @charset "utf-8";
        html,body,p,form,img,table,tr,th,td,h1,h2,h3,div { border: 0 none; margin: 0; padding: 0; }
        body { font-family: Consolas, 'Liberation Mono', Courier, monospace; }
        h3 { text-align: center; font-size: 230%; font-weight: normal; margin: 7% 0; }
        p { text-align: center; color: #888; font-size: 75%; }
        a { border: none; color: #888; text-decoration: none; }
        a:hover { text-decoration: underline }
        p.info { margin-bottom: 5px; }
        p.light a { color: #bbb; }
        #content { text-indent: -9999px; width: 100%; height: 1px; }
        #wrapper { margin: 0 20px; }
        #button { text-align: center; margin-bottom: 7%; }
        #button a {
            display: block; margin: 0 auto; padding: 20px 0 15px 0; width: 200px;
            background-color: #bae88b; color: #000; border: 1px solid #80ab30;
            -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;
            font-size: 150%; text-align: center;
        }
        #button a:hover { text-decoration: none; }
        #badge { display: none; }
        @media (min-width: 600px) {
            h3 { margin: 7% 0 30px 0; font-size: 260%; }
            #button { margin-bottom: 30px; }
            #badge { display: block; position: absolute; top: 0; right: 0; }
        }
        @media (min-width: 900px) {
            h3 { font-size: 300%; }
        }
    </style>

</head>

<body>

    <!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-WWJX2Q"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WWJX2Q');</script>
    <!-- End Google Tag Manager -->

    <div id="content">
        <h1>Generátor hesel</h1>
        <p>Pomocí generátoru hesel si můžete vygenerovat silné heslo pro všechny vaše aplikace. To je vhodné například pro hesla do FTP účtů, hesla do emailů a dále pro hesla do všech aplikací, které potřebujete mít chráněna.</p>
        <h2>Silná hesla</h2>
        <p>Silné heslo je takové, které nelze rozšifrovat v rozumném čase. V dnešní době se silným heslem rozumí to, které má alespoň 8 znaků. Mezi znaky se počítají malá a velká písmena, číslice a speciální znaky, jako je zavináč, tečka a podobné.</p>
        <h2>Generování silného hesla</h2>
        <p>Pro generování hesla můžete využít tlačítko níže na této stránce.</p>
        <h2>Změna délky generovaného řetězce</h2>
        <p>Změnu délky generovaného řetězce provedete změnou paramtru v URL adrese. Například http://gen.7ka.cz/?c=20 pro generování hesla, které bude mít 20 znaků.</p>
    </div>

    <?php

    function generate($length = 12, $letters = '1234567890qwertuiopasdfghjklxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM') {
        $s = '';
        $lettersLength = strlen($letters) - 1;
        for($i = 0 ; $i < $length ; $i++) {
            $s .= $letters[rand(0, $lettersLength)];
        }
        return $s;
    }

    setlocale(LC_ALL, 'cs_CZ');
    $s = '';
    $count = 12;
    if (isset($_GET["c"])) {
        $count = min(max(1, intval($_GET["c"])), 64);
    }
    $s = generate($count);

    ?>

    <div id="wrapper">

        <h3 title="vygenerované heslo - pro zkopírování stačí dvakrát kliknout a Ctrl+C"><?=$s?></h3>

        <p id="button">
            <a href="/<?php if($count!=12) { echo "?c=" . $count; }?>">Generuj&nbsp;heslo!</a>
        </p>

        <p class="info">
        <?php
        if ($count!=12) {
            echo "<a href=\"/?c=" . $count . "\">délku lze změnit parametrem v URL</a>";
        } else {
            echo "<a href=\"/?c=20\" title=\"změnit délku hesla\">změnit délku hesla</a>";
        }
        ?> &#124; <a href="http://hasher.7ka.cz/?p=<?=$s;?>">zobrazit hash hesla</a></p>
        <p class="light"><a href="https://www.vojtasvoboda.cz/" title="Vojta Svoboda">vojta svoboda</a> &#124; <a href="https://plus.google.com/+VojtaSvoboda?rel=author" rel="author me">g+</a></p>

    </div><!-- /#wrapper -->

    <div id="badge">
        <a href="https://github.com/vojtasvoboda/password-generator" rel="nofollow">
            <img src="https://camo.githubusercontent.com/38ef81f8aca64bb9a64448d0d70f1308ef5341ab/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6461726b626c75655f3132313632312e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png">
        </a>
    </div>

</body>
</html>
