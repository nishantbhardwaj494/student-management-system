<?php 
include "complaint.php";

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO complaints(name,email,subject,message) VALUES('$name','$email','$subject','$message')";

    mysqli_query($conn,$sql);
}
?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Complaint Form</title>
</head>
<body>
	<h2>Submit Complaint</h2>

	<form method = "POST">
		Name: <input type="text" name="name" required><br><br>
		Email: <input type="email" name="email" required><br><br>

		Subject: <input type="text" name="subject" required><br><br>

		Message:<br>
		<textarea name = "message" required></textarea><br><br>

		<input type="submit" name="submit" value = "Submit Complaint">
	</form>

</body>
</html>