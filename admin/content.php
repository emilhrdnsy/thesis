<?php
error_reporting(E_ALL^(E_NOTICE | E_WARNING));
$unit = $_GET['unit'];
if($unit == "produk_unit") {
    require_once 'unit/produk_unit.php';
}
else if($unit == "dashboard") {
    require_once 'unit/dashboard.php';
}
else if($unit == "tentangbidangmasalah_unit") {
    require_once 'unit/tentangbidangmasalah_unit.php';
}
else if($unit == "p_dashboard") {
    require_once 'unit/p_dashboard.php';
}
else if($unit == "p_bidang_masalah_unit") {
    require_once 'unit/p_bidang_masalah_unit.php';
}
else if($unit == "p_cf_unit") {
    require_once 'unit/p_cf_unit.php';
}
else if($unit == "bidang_masalah_unit") {
    require_once 'unit/bidang_masalah_unit.php';
}
else if($unit == "item_masalah_unit") {
    require_once 'unit/item_masalah_unit.php';
}
else if($unit == "dbp_unit") {
    require_once 'unit/dbp_unit.php';
}
else if($unit == "admin_unit") {
    require_once 'unit/admin_unit.php';
}
else if($unit == "pengguna_unit") {
    require_once 'unit/pengguna_unit.php';
}

else if($unit == "konsultasi_unit") {
    require_once 'unit/konsultasi_unit.php';
}
else if($unit == "p_item_masalah_unit") {
    require_once 'unit/p_item_masalah_unit.php';
}

