<!-- This is a vulnerable application, please do not use in production! -->
<!DOCTYPE html>
<html>
<body>
  <h1>Enter the photo name to search for:</h1>

  <form method="post">
    <input type="text" name="filename">
    <input type="submit" value="Submit">
  </form>

<?php
  $name = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchterm = $_POST["filename"];
    if (preg_match('/\|/', $searchterm)) {
      echo "Try again";
    } else {
      $command = "find photos/ -name $searchterm";
      $output = exec($command);
      echo $output;
    }
  }
?>

</body>
</html>