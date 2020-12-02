<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$no_tlp = $_GET['no_tlp'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM info_tambahan WHERE no_tlp=$no_tlp");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:info_tambah.php");
?>
