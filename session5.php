<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="session.css">
</head>
<body>
    <div class="wrapper">
    <h2>MASUKAN DATA SISWA</h2>
    <form action="" method="post">
    <div class= "nama">
        <label for="nama">NAMA : <br></label>
        <input type="text" id="nama" name="nama"><br></br>
    </div>
    <div class="nis">
        <label for="nama">NIS : <br></label>
        <input type="number" id="nis" name="nis"><br></br>
    </div>
    <div class="rayon">
        <label for="nama">RAYON : <br></label>
        <input type="text" id="rayon" name="rayon"><br></br>
    </div> 
    <div class="kirim">
    <button class="btn btn-primary" type="submit">TAMBAH</button>
        <button type="submit" name="kirim" value="cetak" ><a href="session6.php">CETAK</a></button>
    </div>
    </form>
        
    
    <!-- <table border="3">
            <tr>
                <th>NAMA</th>
                <th>NIS</th>
                <th>RAYON</th>
                <th>HAPUS</th>
            </tr>
    </table>                     -->
<?php
session_start();

if(!isset($_SESSION['dataSiswa'])){
    $_SESSION['dataSiswa']= array ();
}

if(isset($_POST['nama']) && isset($_POST['nis']) && isset($_POST['rayon'])){
    $data = array(
        'nama' => $_POST['nama'],
        'nis' => $_POST['nis'],
        'rayon' => $_POST['rayon'],
    );
    array_push($_SESSION['dataSiswa'], $data);
};

if(isset($_GET['hapus'])){
    $index = $_GET['hapus'];
    unset($_SESSION['dataSiswa'][$index]);
    header('Location:http://localhost/session/session5.php');
    exit;
}

// var_dump($_SESSION['dataSiswa']);

echo '<table border="1" class=tabel>';
echo '<tr>';
echo '<th>NAMA</th>';
echo '<th>NIS</th>';
echo '<th>RAYON</th>';
echo '<th>HAPUS</th>';
echo '</tr>';

foreach($_SESSION['dataSiswa']  as $index => $value){
    echo '<tr>';
    echo '<td>' . $value['nama'] . '</td>';
    echo '<td>' . $value['nis'] . '</td>';
    echo '<td>' . $value['rayon'] . '</td>';
    echo '<td><a href="?hapus='.$index. '" class="btn btn-danger"">hapus</a></td>';
    echo '</tr>';
}

echo '</table>';

// $data = [
//     ['nama' => 'ranny', 'nis' => 20],
//     ['nama' => 'duma', 'nis' => 21],
//     ['nama' => 'bakti', 'nis' => 22],
// ];

// foreach($data as $key => $value ){
//     echo $key . ":" .$value['nama'] . "<br>";
//     echo $key . ":" .$value['nis'] . "<br>";
//     echo $key . ":" .$value['rayon'] . "<br>";
// }
?>
</body>
</html>
</body>
</html>