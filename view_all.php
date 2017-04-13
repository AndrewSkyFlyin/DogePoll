<html>
<head>
<title>Doge Poll Listings</title>
</head>
<body>
	<h1>Doge Poll Listings</h1>
</body>
</html>

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
      echo "<a href='view.php?id=".$row['pollid']."'>".$row['pollq']."</a>";
    	echo "</td></tr>";
    }
    echo "</table>";
	}

?>

<form action="index.php" method="post">
 <input type="submit" value="Homepage" /><br>
</form>
