<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $no_tlp = $_POST['no_tlp'];
    $nik = $_POST['nik'];
    $hasil_rapid = $_POST['hasil_rapid'];
    $lokasi_terakhir = $_POST['lokasi_terakhir'];
    $kendaraan_terakhir = $_POST['kendaraan_terakhir'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE info_tambahan SET no_tlp='$no_tlp', nik='$nik', hasil_rapid='$hasil_rapid', lokasi_terakhir='$lokasi_terakhir', kendaraan_terakhir='$kendaraan_terakhir' WHERE no_tlp=$no_tlp");

    // Redirect to homepage to display updated user in list
    header("Location: info_tambah.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$no_tlp = $_GET['no_tlp'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM info_tambahan WHERE no_tlp=$no_tlp");

while($user_data = mysqli_fetch_array($result))
{
    $no_tlp = $user_data['no_tlp'];
    $nik = $user_data['nik'];
    $hasil_rapid = $user_data['hasil_rapid'];
    $lokasi_terakhir = $user_data['lokasi_terakhir'];
    $kendaraan_terakhir = $user_data['kendaraan_terakhir'];
}
?>
<html>
<head>  
    <title>Edit Info Tambahan</title>
</head>

<body>
    <a href="user.php">Home</a><br/>
    <a href="info_tambah.php">Back</a><br/>

    <h2>Silahkan ubah data Anda</h2>

    <form name="update_info" method="post" action="edit_info.php">
        <table border="0">
            <tr> 
                <td>No Tlp</td>
                <td><input type="text" name="no_tlp" value=<?php echo $no_tlp;?>></td>
            </tr>
            <tr> 
                <td>NIK</td>
                <td><input type="text" name="nik" value=<?php echo $nik;?>></td>
            </tr>
            <tr> 
                <td>Hasil Rapid Test</td>
                <td><input type="text" name="hasil_rapid" value=<?php echo $hasil_rapid;?>></td>
            </tr>
            <tr> 
                <td>Lokasi Publik Terakhir</td>
                <td><input type="text" name="lokasi_terakhir" value=<?php echo $lokasi_terakhir;?>></td>
            </tr>
            <tr> 
                <td>Kendaraan Terakhir yang Digunakan</td>
                <td><input type="text" name="kendaraan_terakhir" value=<?php echo $kendaraan_terakhir;?>></td>
            </tr>
            <tr>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
