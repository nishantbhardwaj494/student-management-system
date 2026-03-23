<?php
session_start();
include "complaint.php";

if(isset($_POST['login']))
{	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result) == 1)
	{
		$row = mysqli_fetch_assoc($result);
		$_SESSION['user'] = $row['username'];
		$_SESSION['role'] = $row['role'];

		if($row['role'] == 'admin')
		{
			header("Location: admin.php");
		}
		else
		{
			header("Location:insert.php");
		}
	}
	else
	{
		echo "Invalid login";
	}
}

	?>

	<form method = "POST">
		<label name ="username"> Username</label>
			<select name= "username">
			<option>admin</option>
			<option>student1</option>
		</select>
		<br>



		Password: <input type="password" name="password"><br><br>
		<input type="submit" name="login" value = "Login">
	</form>
  




	

