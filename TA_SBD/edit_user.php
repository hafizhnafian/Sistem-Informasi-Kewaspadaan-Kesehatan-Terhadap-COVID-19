<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $usia = $_POST['usia'];
    $alamat = $_POST['alamat'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE user SET nik='$nik', nama='$nama', usia='$usia', alamat='$alamat' WHERE nik=$nik");

    // Redirect to homepage to display updated user in list
    header("Location: user.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$nik = $_GET['nik'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM user WHERE nik=$nik");

while($user_data = mysqli_fetch_array($result))
{
    $nik = $user_data['nik'];
    $nama = $user_data['nama'];
    $usia = $user_data['usia'];
    $alamat = $user_data['alamat'];
}
?>
<html>
<head>  
    <title>Edit User Data</title>
</head>

<body>
    <a href="user.php">Home</a><br/>
    <a href="user.php">Back</a><br/>

    <h2>Silahkan ubah data Anda</h2>

    <form name="update_user" method="post" action="edit_user.php">
        <table border="0">
            <tr> 
                <td>NIK</td>
                <td><input type="text" name="nik" value=<?php echo $nik;?>></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>Usia</td>
                <td><input type="text" name="usia" value=<?php echo $usia;?>></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
            </tr>
            <tr>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
