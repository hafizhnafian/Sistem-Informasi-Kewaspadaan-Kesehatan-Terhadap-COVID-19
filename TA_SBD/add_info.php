<html>
<head>
    <title>Add Info</title>
</head>

<body>
    <a href="user.php">Home</a><br/>
    <a href="info_tambah.php">Back</a><br/>

    <h3>Isi Data Tambahan Anda</h3>

    <form action="add_info.php" method="post" name="form1">
        <table width="30%" border="0">
            <tr> 
                <td>No Tlp</td>
                <td><input type="text" name="no_tlp"></td>
            </tr>
            <tr> 
                <td>NIK</td>
                <td><input type="text" name="nik"></td>
            </tr>
            <tr> 
                <td>Hasil Rapid Test</td>
                <td><input type="text" name="hasil_rapid"></td>
            </tr>
            <tr> 
                <td>Lokasi Publik Terakhir</td>
                <td><input type="text" name="lokasi_terakhir"></td>
            </tr>
            <tr> 
                <td>Kednaraan Terakhir yang Digunakan</td>
                <td><input type="text" name="kendaraan_terakhir"></td>
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
        $no_tlp = $_POST['no_tlp'];
        $nik = $_POST['nik'];
        $hasil_rapid = $_POST['hasil_rapid'];
        $lokasi_terakhir = $_POST['lokasi_terakhir'];
        $kendaraan_terakhir = $_POST['kendaraan_terakhir'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO info_tambahan(no_tlp, nik, hasil_rapid, lokasi_terakhir, kendaraan_terakhir) VALUES('$no_tlp', '$nik', '$hasil_rapid', '$lokasi_terakhir', '$kendaraan_terakhir')");

        // Redirect to homepage to display updated user in list
        header("Location: info_tambah.php");
    }
    ?>
</body>
</html>
