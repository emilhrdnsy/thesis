<?php
session_start();
require_once '../lib/koneksi.php';
$nm_pengguna = $_POST['nm_pengguna'];
// $password = md5($_POST['password']);
$password = $_POST['password'];



$qlogin =
"
   SELECT * FROM t_admin WHERE nama_pengguna = '$nm_pengguna' AND kata_sandi = '$password'
";
$rlogin = mysqli_query($mysqli, $qlogin);
$jumlahbaris = mysqli_num_rows($rlogin);

$qlogin2 =
"
  SELECT * FROM t_user WHERE nama_pengguna = '$nm_pengguna' AND kata_sandi = '$password'
";
$rlogin2 = mysqli_query($mysqli, $qlogin2);
$jumlahbaris2 = mysqli_num_rows($rlogin2);

if ($jumlahbaris > 0){
    $dlogin = mysqli_fetch_assoc($rlogin);
    $_SESSION['katasandi'] = $dlogin ['kata_sandi'];
    $_SESSION['nm_pengguna'] = $dlogin ['nama_pengguna'];
    $_SESSION['status'] = "Admin";
      date_default_timezone_set("Asia/Makassar");
      $tanggalsekarang = date("Y-m-d H:i:s");
      $zupdate = 
        "
        UPDATE t_login SET
        jammasuk ='$tanggalsekarang'
        WHERE
        katasandi = '".$_SESSION['katasandi']."'
        ";  
      $rupdate = mysqli_query($mysqli,$zupdate);

      
      echo "<script type='text/javascript'>";
      echo "swal('WOW!','Message!','success');";
      echo "</script>";
    
      
      header('location:adminmainapp.php?unit=dashboard');
    // header('location:tes.php');
}

 else if ($jumlahbaris2 >0 ) {
  $dlogin2 = mysqli_fetch_assoc($rlogin2);
    $_SESSION['katasandi'] = $dlogin2 ['kata_sandi'];
    $_SESSION['nm_pengguna'] = $dlogin2 ['nama_pengguna'];
    $_SESSION['status'] = "Pengguna";
      date_default_timezone_set("Asia/Makassar");
      $tanggalsekarang = date("Y-m-d H:i:s");
      $zupdate2 = 
        "
        UPDATE t_login SET
        jammasuk ='$tanggalsekarang'
        WHERE
        katasandi = '".$_SESSION['katasandi']."'
        ";  
      $rupdate2 = mysqli_query($mysqli,$zupdate2);
      echo "<script>
      alert('berhasil login')
      window.location.href='adminmainapp.php?unit=dashboard';
      </script>";
    // header('location:adminmainapp.php?unit=dashboard');
 }
        
else if ($nm_pengguna == '' && $password == '') {
  echo"
    <script>
    alert('Silakan Masukan Nama Pengguna Dan Password Anda');
    window.location.href = 'login.php';
    </script>
  ";
}

else if ($nm_pengguna == '') {
  echo"
    <script>
    alert('Silakan Masukan Nama Pengguna');
    window.location.href = 'login.php';
    </script>
  ";
}

else if ($password == '') {
  echo"
    <script>
    alert('Silakan Password Anda');
    window.location.href = 'login.php';
    </script>
  ";
}     

else {
  echo "<script>
    alert('Nama Pengguna Atau Kata Sandi Salah');
    window.location.href='./'
    </script>";
}

// else {
//   $dlogin = mysqli_fetch_assoc($rlogin);
//   $_SESSION['nm_pengguna'] != $dlogin ['nama_pengguna'];
//   $_SESSION['katasandi'] != $dlogin ['kata_sandi'];
//   echo"
//     <script>
//       alert('Salahh');
//       window.location.href = 'login.php';
//     </script>
//   ";
// }
       
  
  // else if {
  //   echo"<script>
  //     alert('username dan password salah')
  //   </script>";
  //   header("location:login.php");
  // }


//  else {
//       $qdatagrid =" UPDATE t_login SET bataslogin = bataslogin + 1 where nama_pengguna='$nm_pengguna' ";
//                             $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                
          
//             $c =" SELECT bataslogin from t_login where nama_pengguna = '$nm_pengguna' ";
//                             $r = mysqli_query($mysqli, $c);
//                             $a = mysqli_fetch_assoc($r);



//         $b = $a['bataslogin'];
//         if ($b > 100000) {

//         $mdatagrid =" UPDATE t_login SET blokir = 'Y' where nama_pengguna='$nm_pengguna' ";
//                             $zdatagrid = mysqli_query($mysqli, $mdatagrid);

//             echo "<alert type=text/javascript>
//               alert('nama pengguna $nm_pengguna Telah Di Blokir, Silahkan kirim Pesan Email ke admin@gmail.com untuk proses lebih lanjut');
//               window.location = './'
//               </alert>";

//         } 
// }
?>