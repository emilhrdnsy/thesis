<?php
  session_start();
  
  echo($_SESSION['nama_siswa']);
  $act = $_GET['act'];
  switch($act){
    case "datagrid":
?>
<?php
include("../admin/leftbar.php");

?>
<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="adminmainapp.php?unit=dashboard">Beranda</a>
        </li>
        <li>Data Transaksi</li>
        <li>Data Konsultasi</li>
      </ul><!-- /.breadcrumb -->
    </div>

    <div class="page-content">
      <div class="page-header">
        <h1>Data Konsultasi</h1>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->
          <div class="row">
            <div class="box box-primary">
              <div class="box-body table-responsive padding">

                <table id="datatable" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th style="text-align: center; width: 6%">No.</th>
                      <th style="text-align: center; width: 15%">Tanggal</th>
                      <th style="text-align: center; width: 15%">Nama</th>
                      <th style="text-align: center; width: 8%">Kelas</th>
                      <th style="text-align: center; width: 12%">Jenis Kelamin</th>
                      <th style="text-align: center; width: 20%">Masalah</th>
                      <th style="text-align: center; width: 9%">Nilai CF</th>
                      <th style="text-align: center; width: 15%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $siswa = $_SESSION['nama_siswa'];
                     $qupdate2 = "SELECT * FROM t_user WHERE nama_siswa  = '$siswa'";
                     $rupdate2 = mysqli_query($mysqli, $qupdate2);
                     $dupdate2 = mysqli_fetch_assoc($rupdate2);
                      echo ($dupdate2);
                        $no=1; 
                        $qdatagrid ="SELECT t_hasil.kode_hasil, t_hasil.tanggal, t_hasil.nilai_cf, t_hasil.hasil_id,
                                  t_bidang_masalah.kode_bidang_masalah, t_bidang_masalah.nama_bidang_masalah,
                                  t_siswa.kode_siswa, t_siswa.nama_siswa, t_siswa.kelas, t_siswa.jenis_kelamin
                                FROM t_hasil
                                JOIN t_bidang_masalah ON t_hasil.hasil_id = t_bidang_masalah.kode_bidang_masalah
                                JOIN t_siswa ON t_hasil.kode_siswa = t_siswa.kode_siswa
                                WHERE t_siswa.nama_siswa = '$siswa'";

                        $rdatagrid = mysqli_query($mysqli, $qdatagrid);

                        print_r($ddatagrid2);
                        while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
                            echo "
                            <tr >
                              <td style= text-align:center;vertical-align:middle >$no</td>
                              <td style= text-align:center;vertical-align:middle>$ddatagrid[tanggal]</td>
                              <td style= text-align:left;vertical-align:middle>".ucwords("$ddatagrid[nama_siswa]")."</td>
                              <td style= text-align:center;vertical-align:middle>$ddatagrid[kelas]</td>
                              <td style= text-align:center;vertical-align:middle>$ddatagrid[jenis_kelamin]</td>
                              <td style= text-align:center;vertical-align:middle>$ddatagrid[nama_bidang_masalah]</td>
                              <td style= text-align:center;vertical-align:middle>$ddatagrid[nilai_cf]</td>
                              <td style=text-align:center;vertical-align:middle>
                                  <a href=?unit=konsultasi_unit&act=detail&kode_hasil=$ddatagrid[kode_hasil] class='btn btn-sm btn-info glyphicon glyphicon-eye-open'></a> 
                                  <a href=# class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='confirm($ddatagrid[kode_hasil])'></a> 
                              </td>                
                            </tr>
                            ";
                            $no++;
                          }
                      ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div><!-- /.row -->
          <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.page-content -->
  </div>
</div><!-- /.main-content -->

<?php
  include("../admin/footer.php");
?>
<!-- DATA TABLES SCRIPT -->
<script src="../css/backend/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="../css/backend/js/jquery.dataTables.bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
  function confirmDialog() {
    return confirm('Apakah anda yakin?')
  }
  $('#datatable').dataTable({
    "lengthMenu": [
      [10, 25, 50, 100, 500, 1000, -1],
      [10, 25, 50, 100, 500, 1000, "Semua"]
    ]
  });

  function confirm(id_user) {
		swal.fire({
			title: 'Hapus Data',
			text: "Yakin ingin menghapus?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Hapus',
			cancelButtonText: "Batal",
		}).then(function (result) {
			if (result.value) {
				Swal.fire({
					title: 'Berhasil',
					text: 'Data Bidang Masalah Berhasil Terhapus ',
					type: 'success',
					showConfirmButton: false,
				})
				setTimeout(function () {
					window.location.href = "?unit=konsultasi_unit&act=delete&kode_hasil=" +
						id_user
				}, 1200);
			} else {
				Swal.fire({
					title: 'Dibatalkan',
					text: 'Batal Menghapus Data Bidang Masalah',
					type: 'error',
				})
			}
		})
	}
</script>
</body>
</html>

<?php
  break;

  case "detail":
  $kd_hasil = $_GET['kode_hasil'];
  $qupdate = "SELECT 
            t_hasil.kode_hasil, t_hasil.tanggal, t_hasil.nilai_cf, t_hasil.hasil_id,
            t_bidang_masalah.kode_bidang_masalah, t_bidang_masalah.nama_bidang_masalah, t_bidang_masalah.layanan,
            t_siswa.kode_siswa, t_siswa.nama_siswa, t_siswa.kelas, t_siswa.jenis_kelamin
            FROM 
            t_hasil 
            JOIN t_bidang_masalah ON t_hasil.hasil_id = t_bidang_masalah.kode_bidang_masalah
            JOIN t_siswa ON t_hasil.kode_siswa = t_siswa.kode_siswa
            WHERE t_hasil.kode_hasil = '$kd_hasil'";
  $rupdate = mysqli_query($mysqli, $qupdate);
  $dupdate = mysqli_fetch_assoc($rupdate);
		
  $arcolor = array('#ffffff', '#cc66ff', '#019AFF', '#00CBFD', '#00FEFE', '#A4F804', '#FFFC00', '#FDCD01', '#FD9A01', '#FB6700');
  date_default_timezone_set("Asia/Makassar");
  $inptanggal = date("Y-m-d H:i:s");

  $arbobot = array('0', '0.3', '0.7', '1.0');
  $ar_item_masalah = array();
 
  for ($i = 0; $i < count($_POST['kondisi']); $i++) {
        $arkondisi = explode("_", $_POST['kondisi'][$i]);
        if (strlen($_POST['kondisi'][$i]) > 1) {
          $ar_item_masalah += array($arkondisi[0] => $arkondisi[1]);
        }
  }

	  $sqlkondisi =(" SELECT * FROM t_pilihan_pengguna ORDER by id_pilihan_pengguna+0");
	  $rdatagridk = mysqli_query($mysqli, $sqlkondisi);
    while($rkondisi=mysqli_fetch_array($rdatagridk)) {
          $arkondisitext[$rkondisi['id_pilihan_pengguna']] = $rkondisi['kondisi'];
    }
    $sqlpkt =(" SELECT * FROM t_bidang_masalah ORDER by kode_bidang_masalah+0");
    $rdatagridp = mysqli_query($mysqli, $sqlpkt);
    while($rpkt=mysqli_fetch_array($rdatagridp)) {
          $arpkt[$rpkt['kode_bidang_masalah']] = $rpkt['nama_bidang_masalah'];

    }

	  $kd_hasil = $_GET['kode_hasil'];
    $sqlhasil = "SELECT 
                  t_hasil.kode_hasil, t_hasil.tanggal, t_hasil.nilai_cf, t_hasil.hasil_id,
                  t_hasil.bidang_masalah, t_hasil.item_masalah,
                  t_bidang_masalah.kode_bidang_masalah, t_bidang_masalah.nama_bidang_masalah, 
                  t_bidang_masalah.layanan,
                  t_siswa.kode_siswa, t_siswa.nama_siswa t_siswa
                  FROM t_hasil
                  JOIN t_bidang_masalah ON t_hasil.hasil_id = t_bidang_masalah.kode_bidang_masalah
									JOIN t_siswa ON t_hasil.kode_siswa = t_siswa.kode_siswa
									WHERE t_hasil.kode_hasil = '$kd_hasil'";
    $rdatagridp = mysqli_query($mysqli, $sqlhasil);
    while ($rhasil = mysqli_fetch_array($rdatagridp)) {
      $arbidangmasalah = unserialize($rhasil['bidang_masalah']);
      $ar_item_masalah = unserialize($rhasil['item_masalah']);
    }

  $np1 = 0;
  foreach ($arbidangmasalah as $key1 => $value1) {
    $np1++;
    $idpkt1[$np1] = $key1;
    $vlpkt1[$np1] = $value1;
  }
?>

<?php
include("../admin/leftbar.php");
?>
<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="#">Beranda</a>
        </li>
        <li>Data Transaksi</li>
        <li>Data Hasil Konsultasi</li>
      </ul><!-- /.breadcrumb -->
    </div>

    <div class="page-content">
      <div class="page-header">
        <h1>
          Data Hasil Konsultasi
        </h1>
      </div>
      <h7>Berikut adalah hasil Konsultasi <?php echo ucwords($dupdate['nama_siswa']); ?>, Pada Tanggal
      <?php echo $dupdate['tanggal']; ?></h7>
      <div class="row">
        <div class="col-xs-12">

          <div class="widget-box widget-color-red" id="widget-box-2">
            <div class="widget-header">
              <h5 class="widget-title bigger lighter"> <i class=""></i>
                Item Masalah Yang Dipilih
              </h5>

            </div>
            <div class="widget-body">
              <div class="widget-main no-padding">
                <table class="table table-striped table-bordered table-hover">
                  <thead class="thin-border-bottom">
                    <tr>
                      <th style="text-align: center; width: 7%">No.</th>
                      <th style="text-align: center; width: 15%">Kode Item Masalah</th>
                      <th style="text-align: center; width: 60%">Nama Item Masalah</th>
                      <th style="text-align: center; width: 18%">Nilai CF (Kondisi)</th>
                    </tr>
                  </thead>
                  <tbody>
      <?php  
						 
        $ig = 0;
        foreach ($ar_item_masalah as $key => $value) {
          $kondisi = $value;
          $ig++;
          $item_masalah = $key;
          $qdatagrid =" SELECT * FROM t_item_masalah where kode_item_masalah = '$key'";
          $rdatagrid = mysqli_query($mysqli, $qdatagrid);
          $ddatagrid=mysqli_fetch_array($rdatagrid);
            echo '<tr><td style=text-align:center;vertical-align:middle>' .$ig. '</td>';
            echo "<td style=text-align:center;vertical-align:middle> $ddatagrid[kode_item_masalah]</td>";
            echo "<td > $ddatagrid[nama_item_masalah]</td>";
            echo '<td style=text-align:left;vertical-align:middle><span class="kondisipilih">' . $arkondisitext[$kondisi] . "</span></td>";
        }
      ?>

              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="page-header"></div>
    <div class="widget-box widget-color-red" id="widget-box-2">
      <div class="widget-header">
        <h5 class="widget-title bigger lighter">
          <i class=""></i>
          Hasil Konsultasi Bidang Masalah
        </h5>
      </div>
      <div class="widget-body">
        <div class="widget-main no-padding">
          <table class="table table-striped table-bordered table-hover">
            <thead class="thin-border-bottom">
              <tr>
                <th style="text-align: center">No.</th>
                <th style="text-align: center">Kode</th>
                <th style="text-align: center">Bidang Masalah</th>
                <th style="text-align: center">Nilai CF</th>
                <th style="text-align: center">Persen</th>
              </tr>
            </thead>
            <tbody>
      <?php  
      $np = 0;
      foreach ($arbidangmasalah as $key => $value) {
        $np++;
        $idpkt[$np] = $key;
        $nmpkt[$np] = $arpkt[$key];
        $vlpkt[$np] = $value;
						
        $qdatagrid =" SELECT * FROM t_bidang_masalah where kode_bidang_masalah = '$key'";
        $rdatagrid = mysqli_query($mysqli, $qdatagrid);
        $ddatagrid=mysqli_fetch_array($rdatagrid);
        for ($ipl = 1; $ipl < count($idpkt); $ipl++) ;
          echo '<tr><td style=text-align:center>' . $np . '</td>';
          echo "<td class=opsi style=text-align:center> $ddatagrid[kode_bidang_masalah]</td>";
          echo "<td class=opsi > $ddatagrid[nama_bidang_masalah]</td>";
          echo '<td style=text-align:center>' . $vlpkt[$ipl] . '</td>';
          echo "<td style=text-align:center> " . round($vlpkt[$ipl], 2) * 100 . " %</td></tr>";
      }				
    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="page-header"></div>
          <h5>Hasil Diagnosa</h5>
          <h6>Hasil Dari Diagnosa Bidang Masalah Yang Paling Mungkin adalah :
            <b><?php echo $dupdate['nama_bidang_masalah']; ?></b></h6>
          <div class="widget-body">
            <div class="widget-main">
              <p class="alert alert-danger">
                Layanan : <?php echo $dupdate['layanan']; ?>
              </p>
            </div>
          </div>
          <div class="clearfix form-actions">
            <div class="col-md-offset-3 col-md-9">
              <a href="adminmainapp.php?unit=l_konsultasi_d&kode_hasil=<?php echo $kd_hasil; ?> "
                class='btn btn-sm btn-danger glyphicon glyphicon-print' target="_blank"> Print</a>
              <a href="adminmainapp.php?unit=konsultasi_unit&act=datagrid"
                class='btn btn-sm btn-info glyphicon'>Kembali</a> <br><br><br>
            </div>
          </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.page-content -->
  </div>

</div><!-- /.main-content -->
<?php
  include("../admin/footer.php");
?>
</body>

</html>

<?php
  break;
   
  case "delete":
    $kd_hasil = $_GET['kode_hasil'];
    $qdelete = " DELETE  FROM t_hasil WHERE kode_hasil = '$kd_hasil' ";

    $rdelete = mysqli_query($mysqli,$qdelete);
    header("location:?unit=konsultasi_unit&act=datagrid");
  break;
}            