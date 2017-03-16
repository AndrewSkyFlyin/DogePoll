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

<form action="view_all.php" method="post">
 <input type="submit" value="Return to listings" /><br>
</form>

<form action="index.php" method="post">
 <input type="submit" value="Homepage" /><br>
</form>
