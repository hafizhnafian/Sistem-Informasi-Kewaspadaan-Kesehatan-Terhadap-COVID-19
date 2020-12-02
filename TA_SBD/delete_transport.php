<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$id_transportasi = $_GET['id_transportasi'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM transportasi WHERE id_transportasi=$id_transportasi");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:transport.php");
?>
