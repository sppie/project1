<?php
session_start();

$servername = "localhost";
$database = "aposite";
$usernamedb = "root";
$password = "";

$conn = mysqli_connect($servername, $usernamedb, $password, $database);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$username = $_SESSION['username'];
$query = "SELECT user_id FROM users WHERE user_name = 'admin'";
$result = mysqli_query($conn, $query);
if ($result == false){
  echo $result;
  //echo "user id: " . $result . "<br>";
} else {

}
echo $_SESSION['username'];

if(isset($_POST['save']))
{
	 $user = $_SESSION['username'];

	 $med1 = $_POST['med1'];
	 $med2 = $_POST['med2'];
   $med3 = $_POST['med3'];
   $med4 = $_POST['med4'];
   $med5 = $_POST['med5'];
	 $sql = "INSERT INTO orders (med1,med2,med3,med4,med5)
	 VALUES ('$med1','$med2','$med3','$med4','$med5')";
	 if (mysqli_query($conn, $sql)) {
		echo "uw bestelling is geplaatst";
	 } else {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
}

?>

<html>
<head>
  <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
  <h1>bestellingen wip</h1>
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
    <?php
      $sql = "SELECT * FROM orders WHERE username = '$username'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "bestelling id: " . $row['order_id'] . "inhoud bestelling" . $row['med1'] . $row['med2'] . $row['med3'] . $row['med4'] . $row['med5'];
        }
      } else {
        echo "er zijn geen resultaten";
      }
    ?>
    <p>bestellingen hier</p>
    <form method="post" action="orders.php">
      medicijn: <br>
      <select class="med" name="med1">
        <option value="">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
      </select>
      <select class="med" name="med2">
        <option value="">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
      </select>
      <select class="med" name="med3">
        <option value="">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
      </select>
      <select class="med" name="med4">
        <option value="">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
      </select>
      <select class="med" name="med5">
        <option value="">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
      </select>
      <br><input type="submit" name="save" value="submit">
    </form>
  </div>
</body>
</html>

<?php
mysqli_close($conn);
 ?>
