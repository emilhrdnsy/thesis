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
                        <button type="submit" id="btn" class="btn btn-default">Masuk</button>
                        <script >
                            const tombol = document.querySelector('#btn');
                            tombol.addEventListener('click', function() {
                                
                            });  
                        </script>
                        
                    </form>
                </div><!--/login form-->
            </div>
			
        </div>
    </div>
</section><!--/form-->
   
    
    </body>


</html>