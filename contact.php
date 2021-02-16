<?php
$servername = "localhost";
$database = "aposite";
$usernamedb = "root";
$password = "";

$conn = mysqli_connect($servername, $usernamedb, $password, $database);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['save']))
{
	 $email = $_POST['email'];
	 $name = $_POST['name'];
	 $descr = $_POST['descr'];
	 $sql = "INSERT INTO contact (email,name,descr)
	 VALUES ('$email','$name','$descr')";
	 if (mysqli_query($conn, $sql)) {
		echo "uw bericht is verstuurd";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}

?>

<html>
<head>
  <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
  <h1>basic wip</h1>
  <img src="img/placeholder.png" width="100" height="100">
  <div class="menu">
    <h4>menu</h4>
    <ul class="l1">
      <li class="i1"><a href="index.php">Home</a></li>
      <li class="i1"><a href="service.php">Service</a></li>
      <li class="i1"><a href="info.php">Voorlichting</a></li>
      <li class="i1"><a href="login.php">Mijn APO</a></li>
    </ul>
  </div>
  <div class="detail">
    <form method="post" action="contact.php">
      Email:<br>
      <input type="email" name="email" maxlength="50" size="53" required><br>
      Naam:<br>
      <input type="text" name="name" maxlength="50" size="53" required><br>
      Onderwerp: <br>
      <textarea name="descr" maxlength="200" rows="5" cols="50" required placeholder="beschrijf waarom u contact opneemt hier"></textarea>
      <br><input type="submit" name="save" value="submit">
    </form>
  </div>
  <script src="JS/non-empty.js"></script>
</body>
</html>
