<?php

  session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// echo "<p>" . $_POST['data'] . "</p>";
$data = $_POST['data'];

preg_match('/\b[A-Z ]+\b/', $data, $nama);
// print_r($nama);

preg_match('/\b[A-Za-z0-9. ]+\b(?=.*Tel)/',
substr($data, strlen($nama[0])-1), $alamat);
// print_r($alamat);

preg_match('/\d{5}/', $data, $kodepos);
// print_r($kodepos);

preg_match('/\+?\d+\-?\d{2}\-?\d{4}/', $data, $telp);
// print_r($telp);


$_SESSION['nama'] = $nama[0];
$_SESSION['alamat'] = str_replace($kodepos, '', $alamat[0]);
$_SESSION['kodepos'] = $kodepos[0];
$_SESSION['telp'] = $telp[0];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO data(nama, alamat, kode_pos, telp)
VALUES ('" . $_SESSION['nama'] . "','" . $_SESSION['alamat'] . "','"
 . $_SESSION['kodepos'] . "','"
  . $_SESSION['telp'] . "')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header('Location:form_parsing.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



?>
