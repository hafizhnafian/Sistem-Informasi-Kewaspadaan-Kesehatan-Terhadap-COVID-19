<html>
<head>
    <title>Add Transportasi</title>
</head>

<body>
    <a href="user.php">Home</a><br/>
    <a href="transport.php">Back</a><br/>

    <h3>Isi Data Transportasi Anda</h3>

    <form action="add_transport.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Id Transportasi</td>
                <td><input type="text" name="id_transportasi"></td>
            </tr>
            <tr> 
                <td>Jenis Kendaraan</td>
                <td><input type="text" name="jenis_kendaraan"></td>
            </tr>
            <tr> 
                <td>Id Perjalanan</td>
                <td><input type="text" name="id_perjalanan"></td>
            </tr>
            <tr> 
                <td>NIK</td>
                <td><input type="text" name="nik"></td>
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
        $id_transportasi = $_POST['id_transportasi'];
        $jenis_kendaraan = $_POST['jenis_kendaraan'];
        $id_perjalanan = $_POST['id_perjalanan'];
        $nik = $_POST['nik'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO transportasi(id_transportasi, jenis_kendaraan, id_perjalanan, nik) VALUES('$id_transportasi', '$jenis_kendaraan', '$id_perjalanan', '$nik')");

        // Redirect to homepage to display updated user in list
        header("Location: transport.php");
    }
    ?>
</body>
</html>
