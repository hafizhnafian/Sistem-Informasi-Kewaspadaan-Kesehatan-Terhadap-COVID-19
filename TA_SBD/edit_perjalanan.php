<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id_perjalanan = $_POST['id_perjalanan'];
    $no_kursi = $_POST['no_kursi'];
    $waktu_berangkat = $_POST['waktu_berangkat'];
    $waktu_tiba = $_POST['waktu_tiba'];
    $lok_asal = $_POST['lok_asal'];
    $lok_tujuan = $_POST['lok_tujuan'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE detail_perjalanan SET id_perjalanan=$id_perjalanan, no_kursi='$no_kursi', waktu_berangkat='$waktu_berangkat', waktu_tiba='$waktu_tiba', lok_asal='$lok_asal', lok_tujuan='$lok_tujuan' WHERE id_perjalanan=$id_perjalanan");

    // Redirect to homepage to display updated user in list
    header("Location: perjalanan.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id_perjalanan = $_GET['id_perjalanan'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM detail_perjalanan WHERE id_perjalanan=$id_perjalanan");

while($user_data = mysqli_fetch_array($result))
{
    $id_perjalanan = $user_data['id_perjalanan'];
    $no_kursi = $user_data['no_kursi'];
    $waktu_berangkat = $user_data['waktu_berangkat'];
    $waktu_tiba = $user_data['waktu_tiba'];
    $lok_asal = $user_data['lok_asal'];
    $lok_tujuan = $user_data['lok_tujuan'];
}
?>
<html>
<head>  
    <title>Edit Detail Perjalanan</title>
</head>

<body>
    <a href="user.php">Home</a><br/>
    <a href="perjalanan.php">Back</a><br/>

    <h2>Silahkan ubah data Anda</h2>

    <form name="update_perjalanan" method="post" action="edit_perjalanan.php">
        <table border="0"> 
            <tr> 
                <td>Id Perjalanan</td>
                <td><input type="text" name="id_perjalanan" value=<?php echo $id_perjalanan;?>></td>
            </tr>
                <td>NO Kursi</td>
                <td><input type="text" name="no_kursi" value=<?php echo $no_kursi;?>></td>
            </tr>
            <tr> 
                <td>Waktu Keberangkatan</td>
                <td><input type="text" name="waktu_berangkat" value=<?php echo $waktu_berangkat;?>></td>
            </tr>
            <tr> 
                <td>Waktu Tiba</td>
                <td><input type="text" name="waktu_tiba" value=<?php echo $waktu_tiba;?>></td>
            </tr>
            <tr> 
                <td>Lokasi Asal</td>
                <td><input type="text" name="lok_asal" value=<?php echo $lok_asal;?>></td>
            </tr>
            <tr> 
                <td>Lokasi Tujuan</td>
                <td><input type="text" name="lok_tujuan" value=<?php echo $lok_tujuan;?>></td>
            </tr>
            <tr>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
