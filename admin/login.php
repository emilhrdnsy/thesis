
<?php
session_start();
 
if (!empty($_SESSION['nm_pengguna'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Form Login User</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
		
        <link href="../css/prettyPhoto.css" rel="stylesheet">
        <link href="../css/price-range.css" rel="stylesheet">
        <link href="../css/animate.css" rel="stylesheet">
	    <link href="../css/main.css" rel="stylesheet">
        <link href="../css/responsive.css" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
         -->
        <style>
           .swal2-popup { 
               font-size: 1.3rem !important; }
        </style>
		
         
	    	
    </head>
	
    <body>

    

    <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			alert("Login gagal! username dan password salah!");
		}else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman admin";
		}
	}
	?>
    
    <section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                <div class="login-form"><!--login form-->
                    <h2 class="text-center">MASUK</h2>
					
                    <form method="post" action="loginnaction.php" onsubmit="return validasi(this)">
                        <input type="text" name="nm_pengguna" id="nm_pengguna" placeholder="Nama Pengguna" autofocus="autofocus" />
                        <input type="password" name="password" id="password" placeholder="Kata Sandi" />
                        <button type="submit"class="btn btn-default">Masuk</button>
                    </form>
                </div><!--/login form-->
            </div>
			
        </div>
    </div>
</section><!--/form-->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
     -->
    
    
    <?php 
        if(isset($_SESSION['emptyfield']))
        {
    ?>
        <script>
            Swal.fire({
                type: 'error',
                title: 'Kesalahan',
                text: 'Nama Pengguna dan Kata Sandi Kosong',
                customClass: '.swal2-popup',
            });
        </script>
    <?php
            unset($_SESSION['emptyfield']); 
        }    
    ?>

    <?php 
        if(isset($_SESSION['usernmfield']))
        {
    ?>
        <script>
            Swal.fire({
                type: 'error',
                title: 'Kesalahan',
                text: 'Nama Pengguna Kosong!',
                customClass: '.swal2-popup',
            });
        </script>
    <?php
            unset($_SESSION['usernmfield']); 
        }    
    ?>

    <?php 
        if(isset($_SESSION['passfield']))
        {
    ?>
        <script>
            Swal.fire({
                type: 'error',
                title: 'Kesalahan',
                text: 'Kata Sandi Kosong!',
                customClass: '.swal2-popup',
            });
        </script>
    <?php
            unset($_SESSION['passfield']); 
        }    
    ?>
  
    <?php 
        if(isset($_SESSION['error']))
        {
    ?>
        <script>
            Swal.fire({
                type: 'error',
                title: 'Gagal!',
                text: 'Gagal',
                customClass: '.swal2-popup',
            });
        </script>
    <?php
            unset($_SESSION['error']); 
        }    
    ?>
</body>
</html>