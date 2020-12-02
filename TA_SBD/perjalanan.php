<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM detail_perjalanan ORDER BY id_perjalanan ASC");
?>

<html>
<head>    
    <title>Detail Perjalanan</title>
</head>

<body>

<form action="" method="POST">
<input type="text" name="query" placeholder="Type Here">
<input type="submit" name="search" value="Search">
</form>

<a href="user.php">Home</a><br/>
<a href="transport.php">Back</a><br/>

    <h2>Data Perjalanan</h2>

    <table width='80%' border=1 style="text-align:center;">

    <tr>
        <th>Id Perjalanan</th> <th>No Kursi</th> <th>Waktu Keberangkatan</th> <th>Waktu Tiba</th> <th>Lokasi Asal</th> <th>Lokasi Tujuan</th> <th>Update</th>
    </tr>
    <?php  
    
    if(isset($_POST['query'])){
    $query = $_POST['query'];
    if($query != ''){
        $result = mysqli_query($mysqli, "SELECT * FROM detail_perjalanan WHERE id_perjalanan LIKE '%".$query."%' OR no_kursi LIKE '%".$query."%' OR waktu_berangkat LIKE '%".$query."%' OR waktu_tiba LIKE '%".$query."%' OR lok_asal LIKE '%".$query."%' OR lok_tujuan LIKE '%".$query."%' ");
    }else{
        $result = mysqli_query($mysqli, "SELECT * FROM detail_perjalanan");
    }
    }
    if(mysqli_num_rows($result)){

    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id_perjalanan']."</td>";
        echo "<td>".$user_data['no_kursi']."</td>";
        echo "<td>".$user_data['waktu_berangkat']."</td>";
        echo "<td>".$user_data['waktu_tiba']."</td>";
        echo "<td>".$user_data['lok_asal']."</td>";
        echo "<td>".$user_data['lok_tujuan']."</td>";
        echo "<td><a href='edit_perjalanan.php?id_perjalanan=$user_data[id_perjalanan]'>Edit</a> | <a href='delete_perjalanan.php?id_perjalanan=$user_data[id_perjalanan]'>Delete</a></td></tr>";        
    }
}else{
    echo '<tr><td colspan="7">Data Tidak Ditemukan</td></tr>';
}
    ?>
    </table>
    <a href="add_perjalanan.php">Isi Data</a><br/><br/>
</body>
</html>