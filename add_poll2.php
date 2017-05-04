<?php
require_once 'dbconnect.php';

?>


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

                        <h1>Instant Doge Poll</h1>

                        <?php
require_once 'dbconnect.php';

if(isset($_POST['add-btn']))
{
  unset($_POST['add-btn']);
  $question =  mysqli_real_escape_string($link, $_POST['question']);
  $choice_one = mysqli_real_escape_string($link, $_POST['choiceone']);
  $choice_two = mysqli_real_escape_string($link, $_POST['choicetwo']);
  $choice_three = mysqli_real_escape_string($link, $_POST['choicethree']);
}

$error = false;
if (empty($question)) {
  $error = true;
  $errorMsg = "Error: Please type in a question.";
}

if (empty($choice_one)) {
  $error = true;
  $errorMsg = "Error: Choice one is empty.";
}

if (empty($choice_two)) {
  $error = true;
  $errorMsg = "Error: Choice two is empty.";
}

if (empty($choice_three)) {
  $error = true;
  $errorMsg = "Choice three is empty.";
}

if (!$error)
{
  $query = "INSERT INTO pollform (pollq, ch_one, ch_two, ch_three) VALUES ('$question',
    '$choice_one', '$choice_two', '$choice_three')";
  $result = mysqli_query($link, $query);

  if(!$result){
    echo "mySQL error.  Unable to add poll.<br>";
  }
  else
  {
    echo "Poll created successfully!<br><br>";
    $pollurl = mysqli_insert_id($link);
    $pollurl2 = ((8121 * $pollurl) + 28411) % 134456;
    $result = is_int($pollurl2);


    if(!$result)
    {
      echo "Error<br>";
    }

    $query = "UPDATE pollform SET pollurl = $pollurl2 WHERE pollid = $pollurl";
    $result = mysqli_query($link, $query);

    if(!$result){
      echo "mySQL error.  Unable to insert LCG url.<br>";
    }

    echo "Redirecting to your poll in 5 seconds...";
    echo "Or you can find your link <a href =\"/view.php?id=$pollurl2\">here</a>";

  }
}

else {
  echo "Unknown error.<br>";
}

?>

<form action="index.php" method="post">
 <input type="submit" value="Return to home page" /><br>
</form>

<form action="add_poll.php" method="post">
 <input type="submit" value="Make another poll" /><br>
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
<?php
    echo "
        <script>
        setTimeout(function(){
            window.location='view.php?id=$pollurl2';
        }, 5000);
        </script>";
?>
</body>

</html>
