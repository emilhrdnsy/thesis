<?php
session_start();
date_default_timezone_set("Asia/Makassar");
if(!isset ($_SESSION['nm_pengguna'])){
    header("location:login.php");
}
?>
<?php error_reporting(0);
$page=$_REQUEST['unit'];
$act1=$_REQUEST['act'];
$active='class="active"';
$open='class="active open"';
?>
<!DOCTYPE html>
<html lang="en">
    <head>    
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Index</title>
        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="../css/backend/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/backend/font-awesome/4.5.0/css/font-awesome.min.css" />
        <!-- page specific plugin styles -->
        <!-- text fonts -->
        <link rel="stylesheet" href="../css/backend/css/fonts.googleapis.com.css" />
        <!-- ace styles -->
        
        <link rel="stylesheet" href="../css/backend/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
        <link rel="stylesheet" href="../css/backend/css/ace-skins.min.css" />
        <link rel="stylesheet" href="../css/backend/css/ace-rtl.min.css" />
		<link rel='stylesheet prefetch' href='../css/tentang/style.css'>
        <!-- ace settings handler -->
        <script src="../css/backend/js/ace-extra.min.js"></script>
        <script src="../css/backend/js/gen_validatorv4.js" type="text/javascript"></script>
        
<script src="../css/backend/js/jquery-1.11.3.min.js"></script>
        <!-- Favicon -->
        <link rel="shortcut icon" href="../gambar/backend/" />
        <style>
           .swal2-popup { 
               font-size: 1.3rem !important; }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

    </head>