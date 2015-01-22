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

                <li class="login">
                    <a class="page-scroll" href="#contact">Log In</a>
                </li>

            </ul>
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
            include_once('yahoostock.php');

            $objYahooStock = new YahooStock;

            /**
            Add format/parameters to be fetched

            s = Symbol
            n = Name
            l1 = Last Trade (Price Only)
            d1 = Last Trade Date
            t1 = Last Trade Time
            c = Change and Percent Change
            v = Volume
             */
            $objYahooStock->addFormat("snl1d1t1cv");

            /**
            Add company stock code to be fetched

            msft = Microsoft
            amzn = Amazon
            yhoo = Yahoo
            goog = Google
            aapl = Apple
             */
            $objYahooStock->addStock("msft");
            $objYahooStock->addStock("amzn");
            $objYahooStock->addStock("yhoo");
            $objYahooStock->addStock("goog");
            $objYahooStock->addStock("vgz");

            /**
             * Printing out the data
             */
            foreach( $objYahooStock->getQuotes() as $code => $stock)
            {
                ?>
                Code: <?php echo $stock[0]; ?> <br />
                Name: <?php echo $stock[1]; ?> <br />
                Last Trade Price: <?php echo $stock[2]; ?> <br />
                Last Trade Date: <?php echo $stock[3]; ?> <br />
                Last Trade Time: <?php echo $stock[4]; ?> <br />
                Change and Percent Change: <?php echo $stock[5]; ?> <br />
                Volume: <?php echo $stock[6]; ?> <br /><br />
            <?php
            }
            ?>

</div></div></div> </div></header>


 </body>
</html>