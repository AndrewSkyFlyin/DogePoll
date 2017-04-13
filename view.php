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

                        <h1>Doge Poll Listing</h1>                        
                        
<?php
require_once 'dbconnect.php';

if(!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

$id = $_GET['id'];

$query = "SELECT * FROM pollform WHERE pollid = $id";
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
    echo "<Form name ='votingform' method ='post' action ='results.php?id={$row['pollid']}'>
          Poll ID: {$row['pollid']}<br>
          Question: {$row['pollq']}<br>
          <input type = 'radio' name ='radio' value = 'one' >{$row['ch_one']}<br>
          <input type = 'radio' name ='radio' value = 'two' >{$row['ch_two']}<br>
          <input type = 'radio' name ='radio' value = 'three' >{$row['ch_three']}<br>
          <input type = 'hidden' name = 'view_pollid' value = {$row['pollid']}>
          <input type = 'hidden' name = 'one_count' value = {$row['ch_one_count']}>
          <input type = 'hidden' name = 'two_count' value = {$row['ch_two_count']}>
          <input type = 'hidden' name = 'three_count' value = {$row['ch_three_count']}>
          <p>
          <input type = 'submit' name = 'vote-btn' value = 'Vote'>
          <input type = 'submit' name = 'view-results-btn' value = 'View Results'>
          </form>";
    echo "</td></tr>";
  }

    /*while($row = mysqli_fetch_array($result)) {
      echo "<tr><td>";
      echo "Poll ID: {$row['pollid']}<br>";
      echo "Question: {$row['pollq']}<br>";
      echo "Choice: {$row['ch_one']}<br>";
      echo "Choice: {$row['ch_two']}<br>";
      echo "Choice: {$row['ch_three']}<br>";
      echo "</td></tr>";
    }*/
  echo "</table>";
}

?>

<form action="results.php?id={$row['pollid']}" method="post">
 <input type="submit" value="View Results" /><br>
</form

<form action="view_all.php" method="post">
 <input type="submit" value="Return to listings" /><br>
</form>

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


