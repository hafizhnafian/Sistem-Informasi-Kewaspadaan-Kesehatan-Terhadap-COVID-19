<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT A.nik, A.nama, A.usia, A.alamat, B.no_tlp, B.hasil_rapid, B.lokasi_terakhir, B.kendaraan_terakhir FROM user A INNER JOIN info_tambahan B ON A.nik = B.nik");
?>

<html>
<head>    
    <title>JOIN USER</title>
</head>

<body>
<h2>Informasi Detail User</h2>

<a href="user.php">Home</a><br/>

    <table width='80%' border=1 style="text-align:center;" >

    <tr>
        <th>NIK</th> <th>Nama</th> <th>Usia</th> <th>Alamat</th> <th>No Tlp</th> <th>Hasil Rapid Test</th> <th>Lokasi Publik Terakhir</th> <th>Kendaraan Terakhir yang Digunakan</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['nik']."</td>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['usia']."</td>";    
        echo "<td>".$user_data['alamat']."</td>"; 
        echo "<td>".$user_data['no_tlp']."</td>"; 
        echo "<td>".$user_data['hasil_rapid']."</td>"; 
        echo "<td>".$user_data['lokasi_terakhir']."</td>"; 
        echo "<td>".$user_data['kendaraan_terakhir']."</td>"; 
    }  
    ?>
    </table> 
</body>
</html>
