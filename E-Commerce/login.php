<?php
session_start();

// Fungsi untuk membuat koneksi ke database
function createConnection() {
    $servername = "localhost";  // Ganti dengan alamat server MySQL Anda
    $username = "root";     // Ganti dengan username MySQL Anda
    $password = "";     // Ganti dengan password MySQL Anda
    $dbname = "penjualan_codebrew";  // Ganti dengan nama database Anda

    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    return $conn;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    // Membuat koneksi
    $conn = createConnection();

    // Persiapkan query untuk memeriksa data
    $sql = $conn->prepare("SELECT * FROM pelanggan WHERE nama=? AND kelas=?");
    $sql->bind_param("ss", $nama, $kelas);

    // Jalankan query
    $sql->execute();
    $result = $sql->get_result();

    // Periksa hasil query
    if ($result->num_rows > 0) {
        // Data sesuai, set session dan arahkan ke halaman selanjutnya
        $_SESSION['logged_in'] = true;
        $_SESSION['nama'] = $nama;
        $_SESSION['kelas'] = $kelas;
        header('Location: menu.php');
        exit();
    } else {
        echo "Login gagal. Silakan coba lagi.";
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
   <title>Login</title>

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

   <form action="" method="POST">
      <h3 class="title">login dahulu</h3>
      <input type="text" name="nama" class="box" placeholder="Masukkan Nama Anda" required>
      <input type="text" name="kelas" class="box" placeholder="Masukkan Kelas Anda" required>
      <input type="submit" value="Login" class="btn" name="submit">
      <p>Tidak punya akun? <a href="register.php">registasi sekarang</a></p>
   </form>

</section>


</body>
</html>