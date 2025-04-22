<?php
include '../db.php';

$npm = $_GET['npm'];

$query = "DELETE FROM mahasiswa WHERE npm='$npm'";
mysqli_query($conn, $query);

header("Location: index.php");
?>