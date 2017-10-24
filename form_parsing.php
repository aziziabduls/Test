<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <center>
<form action="submit_form.php" method="post">
  <br>
  Input :<br><br>
  <input type="text" name="data" value="" id="data" style="width:500px;">
  <input type="submit" value="Ok" name="kirim">
</form>
</center>

<?php
  session_start();


  if(isset($_SESSION['nama']))
  {
    echo "<p> Nama : " . ucfirst($_SESSION['nama']) . "</p>";
    echo "<p> Alamat : " . $_SESSION['alamat'] . "</p>";
    echo "<p> Kode Pos : " . $_SESSION['kodepos'] . "</p>";
    echo "<p> Telpon : " . $_SESSION['telp'] . "</p>";
    session_destroy();
  }
 ?>

</body>
</html>
