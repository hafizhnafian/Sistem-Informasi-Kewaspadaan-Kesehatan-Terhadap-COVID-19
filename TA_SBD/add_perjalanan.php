<html>
<head>
    <title>Add Perjalanan</title>
</head>

<body>
    <a href="user.php">Home</a><br/>
    <a href="perjalanan.php">Back</a><br/>

    <h3>Isi Detail Perjalanan Anda</h3>

    <form action="add_perjalanan.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Id Perjalanan</td>
                <td><input type="text" name="id_perjalanan"></td>
            </tr>
            <tr> 
                <td>No Kursi</td>
                <td><input type="text" name="no_kursi"></td>
            </tr>
            <tr> 
                <td>Waktu Keberangkatan</td>
                <td><input type="text" name="waktu_berangkat"></td>
            </tr>
            <tr> 
                <td>Waktu Tiba</td>
                <td><input type="text" name="waktu_tiba"></td>
            </tr>
            <tr> 
                <td>Lokasi Asal</td>
                <td><input type="text" name="lok_asal"></td>
            </tr>
            <tr> 
                <td>Lokasi Tujuan</td>
                <td><input type="text" name="lok_tujuan"></td>
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
        $id_perjalanan = $_POST['id_perjalanan'];
        $no_kursi = $_POST['no_kursi'];
        $waktu_berangkat = $_POST['waktu_berangkat'];
        $waktu_tiba = $_POST['waktu_tiba'];
        $lok_asal = $_POST['lok_asal'];
        $lok_tujuan = $_POST['lok_tujuan'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO detail_perjalanan(id_perjalanan, no_kursi, waktu_berangkat, waktu_tiba, lok_asal, lok_tujuan) VALUES('$id_perjalanan', '$no_kursi', '$waktu_berangkat', '$waktu_tiba', '$lok_asal', '$lok_tujuan')");

        // Redirect to homepage to display updated user in list
        header("Location: perjalanan.php");
    }
    ?>
</body>
</html>
