<?php
require_once 'dbconnect.php';

if(isset($_POST['vote-btn'])) {
  $ch_one_count = $_POST['one_count'];
  $ch_two_count = $_POST['two_count'];
  $ch_three_count = $_POST['three_count'];
  $pollid = $_POST['view_pollid'];
  $answer = $_POST['radio'];

  if($answer == "one") {
    ++$ch_one_count;
    $query = "UPDATE pollform SET ch_one_count = '$ch_one_count' WHERE pollid = '$pollid'";
  }
  else if ($answer == "two") {
    ++$ch_two_count;
    $query = "UPDATE pollform SET ch_two_count = '$ch_two_count' WHERE pollid = '$pollid'";
  }
  else if ($answer == "three") {
    ++$ch_three_count;
    $query = "UPDATE pollform SET ch_three_count = '$ch_three_count' WHERE pollid = '$pollid'";
  }

  $result = mysqli_query($link, $query);
  $count = mysqli_affected_rows($link);
  if ($result and $count == 1) {
    echo "Results";
    $query = "SELECT * FROM pollform WHERE pollid = $pollid";
    $result = mysqli_query($link, $query);

    echo "<table>";
    echo "<table border='2'>";

    while($row = mysqli_fetch_array($result)) {
      echo "<tr><td>";
      echo "Poll ID: {$row['pollid']}<br>";
      echo "Question: {$row['pollq']}<br>";
      $pieTitle = $row['pollq'];
      echo "{$row['ch_one']} - {$row['ch_one_count']} votes<br>";
      echo "{$row['ch_two']} - {$row['ch_two_count']} votes<br>";
      echo "{$row['ch_three']} - {$row['ch_three_count']} votes<br>";
      echo "</td></tr>";
      echo "</table>";

      #Variables for drawing the pie chart.
      $pieTitle = $row['pollq'];
      $pieOne = $row['ch_one'];
      $pieTwo = $row['ch_two'];
      $pieThree = $row['ch_three'];
      $pieCountOne = $row['ch_one_count'];
      $pieCountTwo = $row['ch_two_count'];
      $pieCountThree = $row['ch_three_count'];
    }
  }
  unset($_POST['vote-btn']);

}

#This if branch runs if the results page is viewed without voting.
else if (isset($_GET['id'])) {
  $pollid = $_GET['id'];

  echo "Results";
  $query = "SELECT * FROM pollform WHERE pollid = $pollid";
  $result = mysqli_query($link, $query);

  echo "<table>";
  echo "<table border='2'>";

  while($row = mysqli_fetch_array($result)) {
    echo "<tr><td>";
    echo "Poll ID: {$row['pollid']}<br>";
    echo "Question: {$row['pollq']}<br>";
    echo "{$row['ch_one']} - {$row['ch_one_count']} votes<br>";
    echo "{$row['ch_two']} - {$row['ch_two_count']} votes<br>";
    echo "{$row['ch_three']} - {$row['ch_three_count']} votes<br>";
    echo "</td></tr>";
    echo "</table>";

    #Variables for drawing the pie chart.
    $pieTitle = $row['pollq'];
    $pieOne = $row['ch_one'];
    $pieTwo = $row['ch_two'];
    $pieThree = $row['ch_three'];
    $pieCountOne = $row['ch_one_count'];
    $pieCountTwo = $row['ch_two_count'];
    $pieCountThree = $row['ch_three_count'];
  }
}

#If vote button is not POSTED and no Id is specificed in the url, return
#homepage.
else {
  header("Location: index.php");
  exit;
}

#echo $ch_one_count . "<br>";
#echo $ch_two_count . "<br>";
#echo $ch_three_count . "<br>";
?>

<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
  google.charts.load('current', {packages: ['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Question');
        data.addColumn('number', 'Votes');
        data.addRows([
          ['<?php echo $pieOne ?>', <?php echo $pieCountOne ?>],
          ['<?php echo $pieTwo ?>', <?php echo $pieCountTwo ?>],
          ['<?php echo $pieThree ?>', <?php echo $pieCountThree ?>],
        ]);

        // Set chart options
        var options = {'title':'<?php echo $pieTitle ?>',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
      </script>
</head>
<body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>

    <form action='view_all.php' method='post'>
    <input type='submit' value='Return to listings' /><br>
    </form>

    <form action='index.php' method='post'>
    <input type='submit' value='Homepage' /><br>
    </form>    
</body>