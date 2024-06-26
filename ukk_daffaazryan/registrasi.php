<?php
	include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
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
    
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Registrasi Akun</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama User" class="input-control" required>
                    <input type="text" name="user" placeholder="Username" class="input-control" required>
                    <input type="password" name="pass" placeholder="Password" class="input-control" required>
                    <input type="number" name="tlp" placeholder="Nomor Telpon" class="input-control" required>
                    <input type="email" name="email" placeholder="E-mail" class="input-control" required>
                    <input type="text" name="almt" placeholder="Alamat" class="input-control" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        $nama = ucwords($_POST['nama']);
                        $username = $_POST['user'];
                        $password = md5($_POST['pass']);
                        $telpon = $_POST['tlp'];
                        $mail = $_POST['email'];
                        $alamat = ucwords($_POST['almt']);
                        
                        // Query untuk memeriksa apakah username atau email sudah ada di database
                        $check_query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR admin_email = '$mail'");
                        if(mysqli_num_rows($check_query) > 0){
                            echo '<script>alert("Username atau email sudah digunakan. Silakan gunakan yang lain.")</script>';
                        } else {
                            // Jika username atau email belum ada, lakukan operasi INSERT
                            $insert = mysqli_query($conn, "INSERT INTO tb_user (admin_name, username, password, admin_telp, admin_email, admin_address) VALUES (
                                            '$nama', '$username', '$password', '$telpon', '$mail', '$alamat')");
                            if($insert){
                                echo '<script>alert("Registrasi berhasil")</script>';
                                echo '<script>window.location="login.php"</script>';
                            } else {
                                echo 'gagal '.mysqli_error($conn);
                            }
                        }
                    }
                ?>
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