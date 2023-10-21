<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $no_tlp = $_POST['no_tlp'];

    // Persiapkan koneksi ke database (asumsi koneksi sudah ada)
    $conn = new mysqli("localhost", "root", "", "penjualan_codebrew");

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }else{
      echo "benar";
    }

    // Persiapkan query menggunakan prepared statement
    $sql = $conn->prepare("INSERT INTO pelanggan (nama, kelas, no_tlp) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $nama, $kelas, $no_tlp);

    // Jalankan query
    if ($sql->execute()) {
        // Jika query berhasil, redirect ke halaman menu
        header('Location: login.php');
        exit();
    } else {
        // Jika query gagal, tampilkan pesan error
        echo "Error: " . $sql->error;
    }

    // Tutup koneksi
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/components.css">

</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>
   
<section class="form-container">

   <form action="" enctype="multipart/form-data" method="POST">
      <h3>Registrasi sekarang</h3>
      <input type="text" name="nama" class="box" placeholder="Masukkan nama anda" required>
      <input type="text" name="kelas" class="box" placeholder="Masukkan kelas anda" required>
      <input type="tel" name="no_tlp" class="box" placeholder="Masukkan nomor telepon anda" required>
      <input type="submit" value="register now" class="btn" name="submit">
      <p>Sudah punya akun? <a href="login.php">silahkan login</a></p>
   </form>

</section>


</body>
</html>