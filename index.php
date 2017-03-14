<?php
require_once 'dbconnect.php';

?>

<html>
<head>
<title>Doge Poll</title>
</head>
<body>
<h1>Instant Doge Poll</h1>
<header class="main-header" role="banner">
  <img src="meme.jpg" alt="Banner Image"/>
</header>
<p>For all your polling needs!</p>
</body>
</html>

<form action="view_all.php" method="post">
 <input type="submit" value="View all polls" /><br>
</form>

<form action="add_poll.php" method="post">
 <input type="submit" value="Create a poll" /><br>
</form>
