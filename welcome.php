<html>
<body>
<?php
if(isset($_COOKIE["Email"])) {
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "web";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>

Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>

<?php 
$name = $_POST["name"];
$email = $_POST["email"];
$sql = "INSERT INTO login (name, email)
VALUES ('$name', '$email');";
if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>


<form action="quiz.php" method="post">
How many number of questions you want to frame?: <input type="text" name="count"><br>
<input type="submit" value = "Next">
</form>
<?php }
else{
	$url = '/WebSite/Logout.php';
	header( "Location: $url" );
}?>
</body>
</html>

