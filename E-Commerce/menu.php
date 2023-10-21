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
    <title>ECommerce-ShoppingCart | Korsat X Parmaga</title>

    <!-- box icons  -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- styles  -->
    <link rel="stylesheet" href="assets/css/menu.css">
    <link rel="stylesheet" href="index.js">
</head>

<body>
    <!-- HEADER  -->
    <header>
        <!-- NAV  -->
        <nav>
            <div class="nav container">
                <a href="#" class="logo"><span>CODE</span>BREW</a>
                <button><a href="login.php" class="logo">Logout</a></button>
                <!-- CART ICON  -->
                <i class='bx bx-shopping-bag' id="cart-icon"></i>
    
                
                <!-- CART  -->
                <div class="cart" id="cart">
                    <h2 class="cart-title">Your Cart</h2> 
                    
                    <!-- Form mengisi data -->
                    <input type="text" name="nama" class="box" placeholder="Masukkan nama anda" required>
                    <input type="text" name="kelas" class="box" placeholder="Masukkan kelas anda" required>
                    <input type="tel" name="no_tlp" class="box" placeholder="Masukkan nomor telepon anda" required>
                    <input type="submit" value="register now" class="btn" name="submit">

                    <!-- CONTENT -->
                    <div class="cart-content">
                        <!-- Your cart content here -->
                    </div>
                
                    <!-- TOTAL   -->
                    <div class="total">
                        <div class="total-title">Total</div>
                        <div class="total-price">$0</div>
                    </div>
                    <!-- BUY BUTTON  -->
                    <a href="order_loading.php">
                        <button type="button" class="btn-buy">Buy Now</button>
                    </a>
                    <!-- CART CLOSE  -->
                    <i class='bx bx-x' id="cart-close"></i>
                </div>
            </div>
        </nav>
    </header>


    <!-- SHOP SECTION  -->
    <section class="shop container">
<!-- 
        <h1 class="section-title">Selamat datang <?php echo $_SESSION['nama'];?>, silahkan memesan menu kami</h1>
        <h1 class="section-title">Anda kelas <?php echo $_SESSION['kelas'];?></h1>
        <h1 class="section-title">Ini nomor telepon anda <?php echo $_SESSION['no_tlp'];?></h1>
        <h1 class="section-title">Nomor <? echo $_SESSION['id_pelanggan'];?></h1> -->
        <h2 class="section-title">Shop Products</h2>

        <div>
            <button></button>
        </div>

        <!-- CONTENT  -->
        <div class="shop-content">
            <!-- BOX 1 -->
            <div class="product-box" name="makanan1">
                <img src="assets/img/product1.jpg" alt="" class="product-img">
                <h2 class="product-title">Nike Shoes</h2>
                <span class="product-price">$79.5</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 2 -->
            <div class="product-box" name="makanan">
                <img src="assets/img/product2.jpg" alt="" class="product-img">
                <h2 class="product-title">BACKPACK</h2>
                <span class="product-price">$59.5</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 3 -->
            <div class="product-box" name="makanan3">
                <img src="assets/img/product3.jpg" alt="" class="product-img">
                <h2 class="product-title">METAL BOTTLE</h2>
                <span class="product-price">$29.5</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 4 -->
            <div class="product-box" name="makanan4">
                <img src="assets/img/product4.jpg" alt="" class="product-img">
                <h2 class="product-title">METAL SUNGLASSES</h2>
                <span class="product-price">$105</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 5 -->
            <div class="product-box" name="minuman1">
                <img src="assets/img/product5.jpg" alt="" class="product-img">
                <h2 class="product-title">PS5 Controller</h2>
                <span class="product-price">$95</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 6 -->
            <div class="product-box" name="minuman2">
                <img src="assets/img/product6.jpg" alt="" class="product-img">
                <h2 class="product-title">Galaxy Z Fold</h2>
                <span class="product-price">$1400</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 7 -->
            <div class="product-box" name="minuman3">
                <img src="assets/img/product7.jpg" alt="" class="product-img">
                <h2 class="product-title">Nokon Camera</h2>
                <span class="product-price">$1700</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- BOX 8 -->
            <div class="product-box" name="minuman4">
                <img src="assets/img/product8.jpg" alt="" class="product-img">
                <h2 class="product-title">Apple Watch</h2>
                <span class="product-price">$110.5</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
        </div>
        </div>
    </section>

    <!-- link js  -->
    <script src="assets/js/main.js"></script>
</body>
</html>