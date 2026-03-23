<?php
include "complaint.php";

$id = $_GET['id'];

// Fetch old data
$query = "SELECT * FROM complaints WHERE id=$id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Update logic
if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $complaint = $_POST['message'];

    $update = "UPDATE complaints SET name='$name', message='$complaint' WHERE id=$id";
    mysqli_query($conn, $update);

    header("Location: admin.php");
}
?>

<form method="POST">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
    Complaint: <input type="text" name="message" value="<?php echo $row['message']; ?>"><br><br>

    <button type="submit" name="update">Update</button>
</form>