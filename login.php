<?php
$servername = "localhost";
$database = "aposite";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['username'])) {
        $email = $_REQUEST['email'];
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        $query    = "SELECT * FROM users WHERE email= $email
                      AND username= $username
                      AND password= $password";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            //$_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: account.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect username/password/email.</h3><br/>
                  </div>";
        }
    } else
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
    <form class="form" method="post" name="login">
            <h1 class="login-title">Login</h1>
            <input type="email" class="login-input" name="email" placeholder="Email" autofocus="true"/><br>
            <input type="text" class="login-input" name="username" placeholder="Username"/><br>
            <input type="password" class="login-input" name="password" placeholder="Password"/><br>
            <input type="submit" value="Login" name="submit" class="login-button"/>
      </form>
  </div>
</body>
</html>
