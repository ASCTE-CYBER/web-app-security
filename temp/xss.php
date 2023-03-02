<!-- This is a vulnerable application, please do not use in production! -->
<!DOCTYPE html>
<html>
<body>
  <h1>Enter your name:</h1>

  <form method="post" action="/xss.php">
    <input type="text" name="username">
    <input type="submit" value="Submit">
  </form>

<?php
  $name = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["username"];
    echo "<h1>Hello $name, welcome to the website!</h1>";
  }
?>

</body>
</html>