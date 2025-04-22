<?php
include '../db.php';

$kodemk = $_GET['kodemk'];

$query = "DELETE FROM matakuliah WHERE kodemk='$kodemk'";
mysqli_query($conn, $query);

header("Location: index.php");
?>