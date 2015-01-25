<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Grayscale - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--    Custom CSS -->
    <link href="css/custom_css.css" rel="stylesheet">

    <title>HTML with PHP</title>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand page-scroll" href="#page-top">
                <span class="light">Pi</span>
            </a>
        </div>



        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-justified navbar-main-collapse">
            <ul class="nav navbar-nav">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="#about">About</a>
                </li>
                <li class="active">
                    <a class="page-scroll " href="#download">Market Insights</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Find your Advisor</a>
                </li>


            </ul>
            <a class="login" href="#page-top"> <span class="light">Login</span>
            </a>
        </div>
        <!-- /.navbar-collapse -->

    </div>
    <!-- /.container -->
</nav>

<!--SHOOT ME IN THE FACE I WANT TO SLEEP-->
<header class="intro">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <?php

                    $yql_base_url = "http://query.yahooapis.com/v1/public/yql";
                    $yql_query = "select * from yahoo.finance.quoteslist where symbol='^IXIC'";
                    $yql_query_url = $yql_base_url . "?q=" . urlencode($yql_query) . "&env=store://datatables.org/alltableswithkeys";
                    $yql_query_url .= "&format=json";

                    $session = curl_init($yql_query_url);
                    curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
                    $json = curl_exec($session);
                    $phpObj =  json_decode($json);

                    if(!is_null($phpObj->query->results)){
                        foreach($phpObj->query->results as $quotes){
                            print_r($quotes->symbol);
                            print_r($quotes->Change);
                        }
                    }
                    ini_set('display_errors',1);
                    ini_set('display_startup_errors',1);
                    error_reporting(-1);
                    ?>


                </div></div></div> </div></header>


</body>
</html>