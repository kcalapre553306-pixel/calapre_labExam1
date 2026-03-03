<?php
include "config.php";

session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}
$result = mysqli_query($conn, "SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Student Dashboard</h1>

<p>Welcome, <?php echo $_SESSION['username']; ?> | 
<a href="logout.php" style="color:red;">Logout</a></p>

<a href="pages/create.php" class="btn-add">+ Add Student</a>

<div class="container">

<?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>

<div class="card">
    <h3><?php echo $row['name']; ?></h3>
    <p>Student No: <?php echo $row['student_number']; ?></p>
    <p>Email: <?php echo $row['email']; ?></p>
    <p>Course: <?php echo $row['course']; ?></p>

    <a href="pages/edit.php?id=<?php echo $row['id']; ?>" class="edit">Edit</a>
    <a href="pages/delete.php?id=<?php echo $row['id']; ?>" class="delete">Delete</a>
</div>

<?php
    }
} else {
    echo "<p>No students yet.</p>";
}
?>

</div>

</body>
</html>