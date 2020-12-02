<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM user ORDER BY nik ASC");
?>

<html>
<head>    
    <title>HomePage</title>
</head>

<body>
<h2>Database Kewaspadaan Kesehatan Terhadap COVID-19</h2>

<a href="user.php">Home</a><br/><br/>

<form action="user.php" method="POST">
<input type="text" name="query" placeholder="Type Here">
<input type="submit" name="search" value="Search">
</form>

<a href="info_tambah.php">Info Tambahan</a> | <a href="transport.php">Data Transportasi</a> | <a href="perjalanan.php">Info Perjalanan</a><br/><br/>

    <table width='80%' border=1 style="text-align:center;">
    
    <tr>
        <th>NIK</th> <th>Nama</th> <th>Usia</th> <th>Alamat</th> <th>Update</th>
    </tr>
    <?php
    
    if(isset($_POST['query'])){
    $query = $_POST['query'];
    if($query != ''){
        $result = mysqli_query($mysqli, "SELECT * FROM user WHERE nik LIKE '%".$query."%' OR nama LIKE '%".$query."%' OR usia LIKE '%".$query."%' OR alamat LIKE '%".$query."%' ");
    }else{
        $result = mysqli_query($mysqli, "SELECT * FROM user");
    }
    }
    if(mysqli_num_rows($result)){

    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['nik']."</td>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['usia']."</td>";
        echo "<td>".$user_data['alamat']."</td>";    
        echo "<td><a href='edit_user.php?nik=$user_data[nik]'>Edit</a> | <a href='delete_user.php?nik=$user_data[nik]'>Delete</a></td></tr>";        
    }
}else{
    echo '<tr><td colspan="5">Data Tidak Ditemukan</td></tr>';
}
    ?>
    </table>
    <a href="add_user.php">Tambah User</a> | <a href="detail_user.php">Lihat Detail User</a> | <a href="detail_Perjalanan.php">Lihat Detail Perjalanan</a>
</body>
</html>