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

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"> </script>
    <script src="http://code.highcharts.com/stock/highstock.js"></script>
    <script src="http://code.highcharts.com/stock/modules/exporting.js"></script>

    <script>

        $(function () {

            $.getJSON('http://www.highcharts.com/samples/data/jsonp.php?filename=aapl-c.json&callback=?', function (data) {
                // Create the chart
                $('#container').highcharts('StockChart', {


                    rangeSelector : {
                        selected : 1
                    },

                    title : {
                        text : 'AAPL Stock Price'
                    },

                    series : [{
                        name : 'AAPL',
                        data : data,
                        tooltip: {
                            valueDecimals: 2
                        }
                    }]
                });
            });

        });
    </script>


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
                <div>

            <div class="header">Market Performance</div>

                    <div class="col-md-12">
                        <div class="col-md-3"  id="SP_market">
                           <span class="legend_line"></span>
                            <span><p style="font-weight: 500;color:blue">S&P 500</p></span>
                            <br>
                            <p class="main-ticker"> 2,012</p> <span class="ticker-lows"> -11.33 (0.55%)</span> <br>
                            <div class="tiny-things"><p>High:2,102.12</p> <span> Low:2,102.12</span></div>

                        </div>
                        <div class="col-md-3"  id="SP_market">
                            <span class="legend_line"></span>
                            <span><p style="font-weight: 500;color:blue"">Dow</p></span>
                            <br>
                            <p class="main-ticker">2,012</p> <span class="ticker-lows"> -11.33 (0.55%)</span> <br>
                            <div class="tiny-things"><p>High:2,102.12</p> <span> Low:2,102.12</span></div>
                        </div>
                        <div class="col-md-3"  id="SP_market">
                            <span class="legend_line"></span>
                            <span><p style="font-weight: 500;color:blue"">Nasdaq</p></span>
                            <br>
                            <p class="main-ticker">2,012</p> <span class="ticker-lows"> -11.33 (0.55%)</span> <br>
                            <div class="tiny-things"><p>High:2,102.12</p> <span> Low:2,102.12</span></div>
                        </div>

                        <div class="col-md-3" style="background-color: #303f9f;padding: 10px;">
                         <form id="searchthis" action="/search" style="display:inline;" method="get">
                             <div class="form-group">
                         <div class="input-group">
                    <input autocomplete="on" class="form-control" name="q" title="search" placeholder="Search stock ticker" id="search-query-3" style="width:145%;border-radius: 5px;height:40px;border-color:transparent;" />
                                  </div>
                             </div>
                         </form>

                            <p style="text-align: left;font-size: 18px;color:#fff;">
                                <b> Recommended Symbols: </b> <br>
                                AAPL (US) | BABA (US) |
                                EURCHF (CUR) | FB (US)
                            </p>
                        </div>
                    </div>

                    <div id="container" style="height: 300px;width: 850px;min-width:250px;"></div>


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


                </div></div></div> </div>
</header>


</body>
</html>