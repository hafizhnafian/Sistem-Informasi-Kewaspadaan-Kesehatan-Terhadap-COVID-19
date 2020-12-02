<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM info_tambahan ORDER BY no_tlp ASC");
?>

<html>
<head>    
    <title>Info Tambahan</title>
</head>

<body>

<form action="" method="POST">
<input type="text" name="query" placeholder="Type Here">
<input type="submit" name="search" value="Search">
</form>

<a href="user.php">Home</a><br/>
<a href="user.php">Back</a><br/>
<a href="transport.php">Data Transportasi</a><br/>

    <h2>Informasi Tambahan</h2>

    <table width='80%' border=1 style="text-align:center;">

    <tr>
        <th>No Tlp</th> <th>NIK</th> <th>Hasil Rapid Test</th> <th>Lokasi Publik Terakhir</th> <th>Kendaraan Terakhir yang Digunakan</th> <th>Update</th>
    </tr>
    <?php  

    if(isset($_POST['query'])){
    $query = $_POST['query'];
    if($query != ''){
        $result = mysqli_query($mysqli, "SELECT * FROM info_tambahan WHERE no_tlp LIKE '%".$query."%' OR nik LIKE '%".$query."%' OR hasil_rapid LIKE '%".$query."%' OR lokasi_terakhir LIKE '%".$query."%' OR kendaraan_terakhir LIKE '%".$query."%' ");
    }else{
        $result = mysqli_query($mysqli, "SELECT * FROM info_tambahan");
    }
    }
    if(mysqli_num_rows($result)){

    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['no_tlp']."</td>";
        echo "<td>".$user_data['nik']."</td>";
        echo "<td>".$user_data['hasil_rapid']."</td>";
        echo "<td>".$user_data['lokasi_terakhir']."</td>";
        echo "<td>".$user_data['kendaraan_terakhir']."</td>";    
        echo "<td><a href='edit_info.php?no_tlp=$user_data[no_tlp]'>Edit</a> | <a href='delete_info.php?no_tlp=$user_data[no_tlp]'>Delete</a></td></tr>";        
    }
}else{
    echo '<tr><td colspan="6">Data Tidak Ditemukan</td></tr>';
}
    ?>
    </table>
    <a href="add_info.php">Isi Data</a><br/><br/>
</body>
</html>