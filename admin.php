<?php
session_start();
include "complaint.php"; // DB connection file

// Admin check
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin')
{
    echo "Access denied";
    exit();
}

// DELETE logic
if(isset($_GET['delete_id']))
{
    $id = $_GET['delete_id'];
    $delete = "DELETE FROM complaints WHERE id=$id";
    mysqli_query($conn, $delete);
    header("Location: admin.php");
}

// FETCH data
$query = "SELECT * FROM complaints";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>

<h2>Complaint List</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Complaint</th>
        <th>Action</th>
    </tr>

    <?php
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
    ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['message']; ?></td>
        
        <td>
            <!-- UPDATE -->
            <a href="update.php?id=<?php echo $row['id']; ?>">Update</a>

            <!-- DELETE -->
            <a href="admin.php?delete_id=<?php echo $row['id']; ?>" 
               onclick="return confirm('Are you sure?');">
               Delete
            </a>
        </td>
    </tr>
    <?php
        }
    }
    else
    {
        echo "<tr><td colspan='4'>No Data Found</td></tr>";
    }
    ?>
</table>

</body>
</html>