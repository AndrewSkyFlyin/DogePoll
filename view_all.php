<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Doge Listing</title>

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
                <li>
                    <a href="/view_all.php">View All Polls</a>
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
                        <h1>Doge Listings</h1>
<?php
require_once 'dbconnect.php';

$query = "SELECT * FROM pollform";
$result = mysqli_query($link, $query);
if(!$result){
        echo "<br>Wow, much error.";
    }
    else
    {
    echo "<table>";
    echo "<table border='2'>";

    while($row = mysqli_fetch_array($result)) {
    	echo "<tr><td>";
      echo "<a href='view.php?id=".$row['pollurl']."'>".$row['pollq']."</a>";
    	echo "</td></tr>";
    }
    echo "</table>";
    }

?>
<br>
<form action="index.php" method="post">
 <input type="submit" value="Homepage" /><br>
</form>

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
