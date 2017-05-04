<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Doge Poll</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style = "background-color: powderblue;">

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Doge Menu
                    </a>
                </li>
                <li>
                    <a href="/">Home Page</a>
                </li>
                <li>
                    <a href="/add_poll.php">Create Your Own Poll!</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>                        
						<form action="add_poll2.php" method="post"><center><font face = "Didot">

                        <table>
                        
                        <p> Fill out contents of your poll here. </p>
 						<tr>
                        <th><p align="right"> Question: </th>
                        <th><input type="text" name="question" size="20" maxlength="200" value="" /> </p></th>
                        </tr>

                        <tr>
						<th><p align="right"> Choice One: </th>
                        <th><input type="text" name="choiceone" size="20" maxlength="100" value="" /> </p></th>
						</tr>

                        <tr>
                        <th><p align="right"> Choice Two: </th>
                        <th><input type="text" name="choicetwo" size="20" maxlength="100" value="" /> </p></th>
						</tr>

                        <tr>
                        <th><p align="right"> Choice Three: </th>
                        <th><input type="text" name="choicethree" size="20" maxlength="100" value="" /> </p></th>
                        </tr>
                        </table>
</font>
<input type="submit" name = "add-btn" value="Create poll" /><br>
</form>
</div>


<?php
require_once 'dbconnect.php';

?>                   
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!--Menu Toggle Script-->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>

