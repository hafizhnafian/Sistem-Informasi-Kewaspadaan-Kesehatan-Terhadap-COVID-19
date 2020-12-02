<html>
<head>
    <title>Add Users</title>
</head>

<body>
    <a href="user.php">Home</a><br/>
    <a href="user.php">Back</a><br/>

    <h3>Isi data diri Anda</h3>

    <form action="add_user.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>NIK</td>
                <td><input type="text" name="nik"></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>Usia</td>
                <td><input type="text" name="usia"></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $usia = $_POST['usia'];
        $alamat = $_POST['alamat'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO user(nik, nama, usia, alamat) VALUES('$nik','$nama','$usia','$alamat')");

        // Redirect to homepage to display updated user in list
        header("Location: user.php");
    }
    ?>
</body>
</html>
