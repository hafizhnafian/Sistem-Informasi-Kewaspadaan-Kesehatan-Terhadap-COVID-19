<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT A.id_transportasi, A.jenis_kendaraan, A.nik, B.id_perjalanan, B.no_kursi, B.waktu_berangkat, B.waktu_tiba, B.lok_asal, B.lok_tujuan FROM transportasi A INNER JOIN detail_perjalanan B ON A.id_perjalanan = B.id_perjalanan");
?>

<html>
<head>    
    <title>JOIN PERJALANAN</title>
</head>

<body>
<h2>Informasi Detail Perjalanan</h2>

<a href="user.php">Home</a><br/>

    <table width='80%' border=1 style="text-align:center;" >

    <tr>
        <th>Id Transportasi</th> <th>Jenis Kendaraan</th> <th>NIK</th> <th>Id Perjalanan</th> <th>No Kursi</th> <th>Waktu Keberangkatan</th> <th>Waktu Tiba</th> <th>Lokasi Asal</th> <th>Lokasi Tujuan</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id_transportasi']."</td>";
        echo "<td>".$user_data['jenis_kendaraan']."</td>";
        echo "<td>".$user_data['nik']."</td>";    
        echo "<td>".$user_data['id_perjalanan']."</td>"; 
        echo "<td>".$user_data['no_kursi']."</td>"; 
        echo "<td>".$user_data['waktu_berangkat']."</td>"; 
        echo "<td>".$user_data['waktu_tiba']."</td>"; 
        echo "<td>".$user_data['lok_asal']."</td>";
        echo "<td>".$user_data['lok_tujuan']."</td>";  
    }   
    ?>
    </table> 
</body>
</html>
