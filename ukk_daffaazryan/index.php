<?php
    include 'db.php';
    
    // Count the number of photos
    $count_foto = mysqli_query($conn, "SELECT COUNT(*) AS total FROM tb_foto WHERE image_status = 1");
    $total_foto = mysqli_fetch_assoc($count_foto)['total'];
   
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WEB Galeri Foto</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="index.php">WEB GALERI FOTO</a></h1>
            <ul>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="registrasi.php">Registrasi</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </header>
    
    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="galeri.php">
                <input type="text" name="search" placeholder="Cari Foto" />
                <input type="submit" name="cari" value="Cari Foto" />
            </form>
        </div>
    </div>
    
    <!-- Display the number of photos and categories -->
    <div class="section">
        <div class="container">
            <h3>Statistik Galeri</h3>
            <p>Jumlah Foto: <?php echo $total_foto; ?></p>
            
    </div>
    
    <!-- new product -->
    <div class="section">
        <div class="container">
            <h3>Foto Terbaru</h3>
            <div class="box">
                <?php
                    $foto = mysqli_query($conn, "SELECT * FROM tb_foto WHERE image_status = 1 ORDER BY image_id DESC LIMIT 8");
                    if(mysqli_num_rows($foto) > 0){
                        while($p = mysqli_fetch_array($foto)){
                ?>
                <a href="detail-image.php?id=<?php echo $p['image_id'] ?>">
                    <div class="col-4">
                        <img src="foto/<?php echo $p['image'] ?>" height="150px" />
                        <p class="nama"><?php echo substr($p['image_name'], 0, 30)  ?></p>
                        <p class="admin">Nama User : <?php echo $p['admin_name'] ?></p>
                        <p class="nama"><?php echo $p['date_created']  ?></p>
                    </div>
                </a>
                <?php }}else{ ?>
                    <p>Foto tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>
    
    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Web Galeri Foto.</small>
        </div>
    </footer>
</body>
</html>