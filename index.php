<!doctype html>
<html class="no-js" lang="cs">

<head>
  	<meta charset="utf-8">
	<title>Generátor hesel - vygeneruj si silné heslo!</title>

	<meta name="keywords" content="generator,hesel,hesla" />
	<meta name="description" content="Generátor hesel, pomocí kterého si můžete vygenerovat silné heslo." />
	<meta name="copyright" content="Vojtěch Svoboda; mailto:info@vojtasvoboda.cz" />
	<meta name="distribution" content="global" />
	<meta name="author" content="Vojta Svoboda; mailto:info@vojtasvoboda.cz" />
	<meta name="language" content="Czech" />
	<meta name='robots' content='all,follow' />
	<meta name="rating" content="general" />
	<meta name="revisit-after" content="30 days" />
	<meta name="y_key" content="14d7527aa624b8f3" />
	<meta name="google-site-verification" content="bk3qspKYZHRn5G3BO4JlWT5k1Bv0mrU0qPuzhxrYHf0" />

	<style>
        @charset "utf-8";
        html,body,p,form,img,table,tr,th,td,h1,h2,h3,div { border: 0 none; margin: 0; padding: 0; }
        body { font-family: Verdana, Arial, Tahoma, sans-serif; }
        h3 { text-align: center; font-size: 280%; font-weight: normal; margin: 7% 0 4% 0; }
        p { text-align: center; color: #888; font-size: 75% }
        p.info { margin-bottom: 5px; }
        p.light a { color: #bbb; }
        a { border: none; color: #888; text-decoration: none; }
        a:hover { text-decoration: underline }
        #content { font-size: 1%; color: #fff; text-indent: -9999px; width: 100%; height: 1px; }
        #button { text-align: center; margin-bottom: 20px; }
        #button a {
            display: block; margin: 0 auto; padding: 15px 30px; width: 140px;
            background-color: #bae88b; color: #000; border: 1px solid #80ab30;
            -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;
            font-size: 150%; text-align: center;
        }
        #button a:hover { text-decoration: none; }
    </style>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-30324249-2', 'auto');
        ga('send', 'pageview');
    </script>

</head>

<body>

    <div id="content">
        <h1>Generátor hesel</h1>
        <p>Pomocí generátoru hesel si můžete vygenerovat silné heslo pro všechny vaše aplikace. To je vhodné například pro hesla do FTP účtů, hesla do emailů a dále pro hesla do všech aplikací, které potřebujete mít chráněna.</p>
        <h2>Silná hesla</h2>
        <p>Silné heslo je takové, které nelze rozšifrovat v rozumném čase. V dnešní době se silným heslem rozumí to, které má alespoň 8 znaků. Mezi znaky se počítají malá a velká písmena, číslice a speciální znaky, jako je zavináč, tečka a podobné.</p>
        <h2>Generování silného hesla</h2>
        <p>Pro generování hesla můžete využít tlačítko níže na této stránce.</p>
        <h2>Změna délky generovaného řetězce</h2>
        <p>Změnu délky generovaného řetězce provedete změnou paramtru v URL adrese. Například http://gen.vojtasvoboda.cz/?c=20 pro generování hesla, které bude mít 20 znaků.</p>
    </div>

    <?php

    function generate($length = 12, $letters = '1234567890qwertuiopasdfghjklxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM') {
        $s = '';
        $lettersLength = strlen($letters)-1;
        for($i = 0 ; $i < $length ; $i++) {
        $s .= $letters[rand(0,$lettersLength)];
        }
        return $s;
    }

    setlocale(LC_ALL, 'cs_CZ');
    $s = '';
    $count = 12;
    if (isset($_GET["c"])) {
        $count = min(1,max(intval($_GET["c"],128)));
    }
    $s = generate($count);

    ?>

    <div id="wrapper">

        <h3 title="vygenerované heslo - pro zkopírování stačí dvakrát kliknout a Ctrl+C"><?=$s?></h3>

        <p id="button">
            <a href="/<?php if(isset($_GET["c"])) { echo "?c=" . $count; }?>">Generuj&nbsp;heslo!</a>
        </p>

        <p class="info">
        <?php
        if (isset($_GET["c"])) {
            echo "<a href=\"/?c=" . $count . "\">délku lze změnit parametrem v URL</a>";
        } else {
            echo "<a href=\"/?c=20\" title=\"změnit délku hesla\">změnit délku hesla</a>";
        }
        ?> &#124; <a href="http://hasher.7ka.cz/?p=<?=$s;?>">zobrazit hash hesla</a></p>
        <p class="light"><a href="http://www.vojtasvoboda.cz/" title="Vojta Svoboda">vojta svoboda</a> &#124; <a href="https://plus.google.com/+VojtaSvoboda?rel=author" rel="author me">g+</a></p>

    </div><!-- end of DIVu wrapper -->

</body>
</html>
