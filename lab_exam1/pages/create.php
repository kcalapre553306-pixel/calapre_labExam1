<?php
include "../config.php";

session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $student_number = $_POST['st    udent_number'];
    $name = strtoupper($_POST['name']); // simple string function
    $email = $_POST['email'];
    $course = $_POST['course'];

    mysqli_query($conn, "INSERT INTO students 
        (student_number, name, email, course)
        VALUES 
        ('$student_number', '$name', '$email', '$course')");

    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<h2>Add Student</h2>

<form method="POST">
    <input type="text" name="student_number" placeholder="Student Number" required>
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="course" placeholder="Course">
    <button type="submit">Save</button>
</form>

<a href="../index.php">Back</a>

</body>
</html>