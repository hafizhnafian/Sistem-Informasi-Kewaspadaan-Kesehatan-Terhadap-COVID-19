<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id_transportasi = $_POST['id_transportasi'];
    $jenis_kendaraan = $_POST['jenis_kendaraan'];
    $id_perjalanan = $_POST['id_perjalanan'];
    $nik = $_POST['nik'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE transportasi SET id_transportasi='$id_transportasi', jenis_kendaraan='$jenis_kendaraan', id_perjalanan='$id_perjalanan', nik='$nik' WHERE id_transportasi=$id_transportasi");

    // Redirect to homepage to display updated user in list
    header("Location: transport.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id_transportasi = $_GET['id_transportasi'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM transportasi WHERE id_transportasi=$id_transportasi");

while($user_data = mysqli_fetch_array($result))
{
    $id_transportasi = $user_data['id_transportasi'];
    $jenis_kendaraan = $user_data['jenis_kendaraan'];
    $id_perjalanan = $user_data['id_perjalanan'];
    $nik = $user_data['nik'];
}
?>
<html>
<head>  
    <title>Edit Transportasi</title>
</head>

<body>
    <a href="user.php">Home</a><br/>
    <a href="transport.php">Back</a><br/>

    <h2>Silahkan ubah data Anda</h2>

    <form name="update_transport" method="post" action="edit_transport.php">
        <table border="0">
            <tr> 
                <td>Id Transportasi</td>
                <td><input type="text" name="id_transportasi" value=<?php echo $id_transportasi;?>></td>
            </tr>
            <tr> 
                <td>Jenis Kendaraan</td>
                <td><input type="text" name="jenis_kendaraan" value=<?php echo $jenis_kendaraan;?>></td>
            </tr>
            <tr> 
                <td>Id Perjalanan</td>
                <td><input type="text" name="id_perjalanan" value=<?php echo $id_perjalanan;?>></td>
            </tr>
            <tr> 
                <td>NIK</td>
                <td><input type="text" name="nik" value=<?php echo $nik;?>></td>
            </tr>
            <tr>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
