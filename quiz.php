<html>
<body>
<form method="post" action = "<?=$_SERVER['PHP_SELF'];?>"> 
<?php
echo "Create Questionnaire of your Choice!";
$count1 = $_POST['count'];
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
<?php echo "For loop "; for ($x = 0; $x < $count1; $x++) {?>

	 Question: <input type="text" name="question[]" style="width: 500px;"><br>
<?php } ?>
<input type="submit" name="submit">

<?php 
if (isset($_POST['submit'])) {
$questions = $_POST['question'];
$new_count = sizeof($questions);
for ($x = 0; $x < $new_count; $x++) {
echo ".$questions[$x].";
$sql = "INSERT INTO questionaire(question, answer) VALUES ('$questions[$x]', '');";
if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}}
$conn->close();
?>
</form>
</body>
</html>