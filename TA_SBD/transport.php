<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM transportasi ORDER BY id_transportasi ASC");
?>

<html>
<head>    
    <title>Transportasi</title>
</head>

<body>

<form action="" method="POST">
<input type="text" name="query" placeholder="Type Here">
<input type="submit" name="search" value="Search">
</form>

<a href="user.php">Home</a><br/>
<a href="info_tambah.php">Back</a><br/>
<a href="perjalanan.php">Data Perjalanan</a><br/>

    <h2>Data Transportasi</h2>

    <table width='80%' border=1 style="text-align:center;">

    <tr>
        <th>Id Transportasi</th> <th>Jenis Kendaraan</th> <th>Id Perjalanan</th> <th>NIK</th> <th>Update</th>
    </tr>
    <?php  

    if(isset($_POST['query'])){
    $query = $_POST['query'];
    if($query != ''){
        $result = mysqli_query($mysqli, "SELECT * FROM transportasi WHERE id_transportasi LIKE '%".$query."%' OR jenis_kendaraan LIKE '%".$query."%' OR id_perjalanan LIKE '%".$query."%' OR nik LIKE '%".$query."%' ");
    }else{
        $result = mysqli_query($mysqli, "SELECT * FROM transportasi");
    }
    }
    if(mysqli_num_rows($result)){

    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id_transportasi']."</td>";
        echo "<td>".$user_data['jenis_kendaraan']."</td>";
        echo "<td>".$user_data['id_perjalanan']."</td>";
        echo "<td>".$user_data['nik']."</td>";
        echo "<td><a href='edit_transport.php?id_transportasi=$user_data[id_transportasi]'>Edit</a> | <a href='delete_transport.php?id_transportasi=$user_data[id_transportasi]'>Delete</a></td></tr>";        
    }
}else{
    echo '<tr><td colspan="5">Data Tidak Ditemukan</td></tr>';
}
    ?>
    </table>
    <a href="add_transport.php">Isi Data</a><br/><br/>
</body>
</html>