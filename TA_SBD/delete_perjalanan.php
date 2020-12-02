<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$id_perjalanan = $_GET['id_perjalanan'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM detail_perjalanan WHERE id_perjalanan=$id_perjalanan");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:Perjalanan.php");
?>
