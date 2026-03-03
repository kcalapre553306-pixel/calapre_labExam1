<?php
include "../config.php";

session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: ../login.php");
    exit();
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM students WHERE id=$id");

header("Location: ../index.php");
?>