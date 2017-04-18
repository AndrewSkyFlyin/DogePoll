<?php
require_once 'dbconnect.php';

if(isset($_POST['add-btn']))
{
  unset($_POST['add-btn']);
  $question = $_POST['question'];
  $choice_one = $_POST['choiceone'];
  $choice_two = $_POST['choicetwo'];
  $choice_three = $_POST['choicethree'];
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
		echo "Poll created.<br>";
    $pollurl = mysqli_insert_id($link);
    echo "Poll ID: $pollurl<br>";
    $pollurl2 = ((8121 * $pollurl) + 28411) % 134456;
    $result = is_int($pollurl2);
    echo "LCG ID :$pollurl2<br>";

    if(!$result)
    {
      echo "Error<br>";
    }

    $query = "UPDATE pollform SET pollurl = $pollurl2 WHERE pollid = $pollurl";
    $result = mysqli_query($link, $query);

    if(!$result){
  		echo "mySQL error.  Unable to insert LCG url.<br>";
  	}

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
