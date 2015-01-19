<!DOCTYPE html>
<html lang="en">
<head>
    <title>Basic HTML5/CSS3 Responsive Web Design</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8"/>
    <script src="media/js/jquery.js" type="text/javascript"></script>
    <script src="media/js/jquery.dataTables.js" type="text/javascript"></script>
    <style type="text/css">
        @import "media/css/demo_table_jui.css";
        @import "media/themes/smoothness/jquery-ui-1.8.4.custom.css";
    </style>
    <style>
        *{
            font-family : "Helvetica","Arial",Tahoma,Arial,Helvetica,sans-serif;
        }
    </style>
    <script type="text/javascript" charset="utf-8">

        $(document).ready(function(){
            $('#datatables').dataTable({
                "sPaginationType":"full_numbers",
                "aaSorting":[[2, "desc"]],
                "bJQueryUI":true,
                "bRetrieve":true

            });
            $('#datatables1').dataTable({
                "sPaginationType":"full_numbers",
                "aaSorting":[[2, "desc"]],
                "bJQueryUI":true,
                "bRetrieve":true
            });
            $('#datatables').dataTable();
            $('#datatables1').dataTable();
        })
    </script>

    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>
<script type="text/javascript">

    function UpdateRecord(id,action)
    {
        jQuery.ajax({
            type: "POST",
            url: "updateGreeting.php",
            data: 'id='+id +'&action='+action,
            cache: false,
            beforeSend: function()
            {

                // this is for the states
                if ( action == "like" )  // if liked then change image
                {
                    $("#like_user"+id).hide();
                    // $("#unlike_user"+id).show();
                    /*         $("#loading_like_or_unlike"+id).html('<img src="images/like.jpg" align="absmiddle" alt="Loading...">');*/

                }
                else if ( action == "unlike" )// if unlike then change the image
                {
                    $("#unlike_user"+id).hide();
                    // $("#like_user"+id).show();
                    /*          $("#loading_like_or_unlike"+id).html('<img src="images/dislike.jpg" align="absmiddle" alt="Loading...">');*/
                }
                else {}

            },
            success: function(response)// wht is this bit for ?,if we got a response from the php code and it's successful,then show the
            {// so bascically even if i refresh to keep the image clicked state .o.o? like 4 me i like  so its updates, but on refresh buttons falls back

                //oh for that i read from the database ,if

                if ( action == "like" )
                {
                    $("#unlike_user"+id).show();
                }
                else if ( action == "unlike" )
                {
                    $("#like_user"+id).show();
                }
                else {}
            }
        });
    }
</script>

<div id="wrapper">

    <header>
        <h1>
            <img src="images/twitter.jpg"/>
        </h1>
    </header>
    <nav id="nav">
        <a href="#nav" title="Show navigation">Show navigation</a>
        <a href="#" title="Hide navigation">Hide navigation</a>
        <ul>
            <li class='active'><a href="index.php">Home</a></li>
            <li><a href="#followers">Followers</a></li>
            <li><a href="#following">Following</a></li>
            <li><a href="#">LogOut</a></li>
        </ul>
        <div class="clearfix"></div>
    </nav>

    <section class="left-col"> <br/>
        <img src="images/pro_pic1.jpg"/><br/><br/>
    </section>

    <aside class="sidebar"><br/>
        <img src="images/tweets.jpg"/><br/><br/>
    </aside>

    <div class="clearfix"></div>

    <div id="table">
        <a id="followers"><h3>Followers</h3></a>

        <div id="dissapear">
            <table id="datatables" class="display">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Liked</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>NumFollowers</th>
                    <th>NumFollowing</th>
                    <th>NumTweets</th>
                </tr>
                </thead>
                <tbody>

                        </td>
                        <td><?=$row['Location']?></td>
                        <td><?=$row['Description']?></td>
                        <td><?=$row['NumFollowers']?></td>
                        <td><?=$row['NumFollowing']?></td>
                        <td><?=$row['NumTweets']?></td>
                    </tr>

                </tbody>
            </table>
            <br/>
            <form action="login.html" method="post">
                <p class="submit"><input type="submit" name="proceed" value="Add Followers"></p>
            </form>
        </div>
        <form action="viewFollowers.php" class="CSSlink" method="post	">
            <p class="submit"><input type="submit" name="view" value="View Followers"></p>
        </form>
    </div>

    <br/>
    <footer>
        Copy rights reserved
    </footer></div></div>
</div>
</body>
</html>