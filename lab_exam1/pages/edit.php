<?php
include "../config.php";

session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: ../login.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $student_number = $_POST['student_number'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    mysqli_query($conn, "UPDATE students SET
        student_number='$student_number',
        name='$name',
        email='$email',
        course='$course'
        WHERE id=$id");

    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h2>Edit Student</h2>

<form method="POST">
    <input type="text" name="student_number" value="<?php echo $row['student_number']; ?>" required>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
    <input type="email" name="email" value="<?php echo $row['email']; ?>">
    <input type="text" name="course" value="<?php echo $row['course']; ?>">
    <button type="submit">Update</button>
</form>

<a href="../index.php">Back</a>

</body>
</html>