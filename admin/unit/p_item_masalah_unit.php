<?php
$act = $_GET['act'];
switch($act){
    case "datagrid":
	    $id_siswa = $_GET['id_siswa'];
      $qupdate = "SELECT * FROM t_siswa WHERE kode_siswa = '$id_siswa'";
      $rupdate = mysqli_query($mysqli, $qupdate);
      $dupdate = mysqli_fetch_assoc($rupdate);
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
        <li>Konsultasi</li>
      </ul><!-- /.breadcrumb -->
    </div>

    <div class="page-content">
      <div class="page-header">
        <h1>Konsultasi<small> Nama : <?php echo ucwords($dupdate['nama_siswa']); ?></h1>

      </div>
      <h6>Silahkan Pilih Kondisi Item Seusai Yang Dialami:</h6>
      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->
          <div class="row">

            <form name="p_gejala" id="p_gejala" method="post"
              action="?unit=p_item_masalah_unit&act=proses&id_siswa=<?php echo $dupdate['kode_siswa']; ?>"
              enctype="multipart/form-data">

              <div class="widget-box widget-color-red" id="widget-box-2">
                <div class="widget-header">
                  <h5 class="widget-title bigger lighter">
                    <i class=""></i>
                    Pilih Item
                  </h5>

                </div>

                <div class="widget-body">
                  <div class="widget-main no-padding">
                    <table class="table table-striped table-bordered table-hover">
                      <thead class="thin-border-bottom">
                        <tr>
                          <th style="width:100px; text-align: center;font-size:12px">No.</th>
                          <th style="width:100px; text-align: center;font-size:12px">Kode Item</th>
                          <th style="text-align: center; font-size: 12px">Nama Item</th>
                          <th style="width:300px; text-align: center; font-size: 12px">Pilih Kondisi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                    $qdatagrid ="  SELECT * FROM t_item_masalah ORDER by id_item_masalah ";
                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                            
							$i = 0;
                while($ddatagrid=mysqli_fetch_array($rdatagrid)) {
								$i++;
                ?>
                        <tr>
                          <td class=opsi style=text-align:center;vertical-align:middle;font-size:12px><?=$i?></td>
                          <td class=opsi style=text-align:center;vertical-align:middle;font-size:12px>
                            <?=$ddatagrid[kode_item_masalah]?></td>
                          <td class=gejala style=vertical-align:middle;font-size:12px;text-align:justify>
                            <?=$ddatagrid[nama_item_masalah]?></td>
                          <td class="opsi" style=vertical-align:middle;font-size:12px>
                            <select name="kondisi[]" id="sl<?= $i ?>" class="opsikondisi col-sm-12" required="required">
                              <option data-id="0" value="0" style="color:silver">--Pilih jika sesuai--</option>;

                              <?php
									$qdatagridk =' SELECT * FROM t_pilihan_pengguna ORDER by id_pilihan_pengguna ';
									$rdatagridk = mysqli_query($mysqli, $qdatagridk);
									while($ddatagridk=mysqli_fetch_array($rdatagridk)) {
									 ?>
                              <option data-id="<?php echo $ddatagridk['id_pilihan_pengguna']; ?>"
                                value="<?php echo $ddatagrid['kode_item_masalah'] . '_' . $ddatagridk['id_pilihan_pengguna']; ?>">
                                <?php echo $ddatagridk['kondisi']; ?></option>

                              <?php
									}
                     } 
                     ?>
                            </select>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="clearfix form-actions">
                <div class="">
                  <button type="submit" name="submit" class="btn btn-danger"
                    style="width: 20%; margin-left: auto">Proses</button>
                </div>
              </div>
            </form>


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
</script>
</body>

</html>
<?php
        
        break;
		
    case "proses":

     
	
      $arcolor = array('#ffffff', '#cc66ff', '#019AFF', '#00CBFD', '#00FEFE', '#A4F804', '#FFFC00', '#FDCD01', '#FD9A01', '#FB6700');
      date_default_timezone_set("Asia/Makassar");
      $inptanggal = date('Y-m-d H:i:s');

      $arbobot = array('0', '0', '0.3', '0.7', '0.9');
      $argejala = array();
      
      for ($i = 0; $i < count($_POST['kondisi']); $i++) {
        $arkondisi = explode("_", $_POST['kondisi'][$i]);
        if (strlen($_POST['kondisi'][$i]) > 1) {
          $argejala += array($arkondisi[0] => $arkondisi[1]);
        }
      }

	  
      $sqlkondisi =(" SELECT * FROM t_pilihan_pengguna ORDER by id_pilihan_pengguna+0");
      $rdatagridk = mysqli_query($mysqli, $sqlkondisi);
      while($rkondisi=mysqli_fetch_array($rdatagridk)) {
        $arkondisitext[$rkondisi['id_pilihan_pengguna']] = $rkondisi['kondisi'];
      }


      $sqlpkt =(" SELECT * FROM t_bidang_masalah ORDER by id_bidang_masalah+0");
      $rdatagridp = mysqli_query($mysqli, $sqlpkt);
      while($rpkt=mysqli_fetch_array($rdatagridp)) {
        $arpkt[$rpkt['kode_bidang_masalah']] = $rpkt['nama_bidang_masalah'];
       
      }

	  
	  $sqlp =(" SELECT * FROM t_bidang_masalah ORDER by id_bidang_masalah");
	  $sqlbidang = mysqli_query($mysqli, $sqlp);
      $arbidang = array();
      while ($rbidang = mysqli_fetch_array($sqlbidang)) {
        $cftotal_temp = 0;
        $cf = 0;
        $sqlg =(" SELECT * FROM t_identifikasi where kode_bidang_masalah = '$rbidang[kode_bidang_masalah]'");
        $sqlgejala = mysqli_query($mysqli, $sqlg);
        $cflama = 0;
        while ($rgejala = mysqli_fetch_array($sqlgejala)) {
          $arkondisi = explode("_", $_POST['kondisi'][0]);
          $gejala = $arkondisi[0];

          for ($i = 0; $i < count($_POST['kondisi']); $i++) {
            
            $arkondisi = explode("_", $_POST['kondisi'][$i]);

            $gejala = $arkondisi[0];
            if ($rgejala['kode_item_masalah'] == $gejala) {
              $cf = ($rgejala['mb'] - $rgejala['md']) * $arbobot[$arkondisi[1]];
              if (($cf >= 0) && ($cf * $cflama >= 0)) {
                $cflama = $cflama + ($cf * (1 - $cflama));
              }
              if ($cf * $cflama < 0) {
                $cflama = ($cflama + $cf) / (1 - Math . Min(Math . abs($cflama), Math . abs($cf)));
              }
              if (($cf < 0) && ($cf * $cflama >= 0)) {
                $cflama = $cflama + ($cf * (1 + $cflama));
              }
            }
          }
        }
        if ($cflama > 0) {
          $arbidang += array($rbidang['kode_bidang_masalah'] => number_format($cflama, 4));
        }
      }

      arsort($arbidang);

      $inpgejala = serialize($argejala);
      $inpbidang = serialize($arbidang);

      $np1 = 0;
      foreach ($arbidang as $key1 => $value1) {
        $np1++;
        $idpkt1[$np1] = $key1;
        $vlpkt1[$np1] = $value1;
      }

     
	    $kd_daftar = $_GET['id_siswa'];
      $results = array_unique($_POST['kondisi']);
      if(count($results) == 1)
      {
        echo"<script>
          alert('Tidak ada item yang tepilih');
          document.location='adminmainapp.php?unit=p_item_masalah_unit&act=datagrid&id_siswa=$kd_daftar';
        </script>";
      }
      else
      {
       

	  $qinput = "
          INSERT INTO t_hasil
          (
            tanggal,
            item_masalah,
            bidang_masalah,
            hasil_id,
            nilai_cf,
			      kode_siswa
          )
          VALUES
          (
            '$inptanggal',
            '$inpgejala',
            '$inpbidang',
            '$idpkt1[1]',
            '$vlpkt1[1]',
			      '$kd_daftar'
          )
        ";
        
        mysqli_query($mysqli,$qinput);
            echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=p_item_masalah_unit&act=update&id_siswa=$kd_daftar';
              </script>";
            exit();
      }
      break;
        case "input":
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
        <li>Konsultasi</li>
      </ul><!-- /.breadcrumb -->
    </div>

    <div class="page-content">
      <div class="page-header">
        <h1>Konsultasi<br><small>Untuk Memulai Konsultasi Silahkan Masukan Identitas Terlebih Dahulu</h1>


      </div>

      <div class="row">

        <div class="col-xs-12">

          <?php
				    $mysqli= mysqli_connect("localhost","root","","thesisDB");
            $qupdate = "SELECT max(id_siswa) as maxKode FROM t_siswa";
            $rupdate = mysqli_query($mysqli, $qupdate);
            $dupdate = mysqli_fetch_assoc($rupdate);
            $kd_daftar = $dupdate['maxKode'];
            $no_urut = $kd_daftar + 1;
            $char = "S";
            $newID = $char.sprintf("%01s",$no_urut);

            $check = "SELECT * FROM t_siswa WHERE nama_siswa LIKE "
          ?>
          <form class="form-horizontal" name="tambah_subkat" id="tambah_subkat" method="post"
            action="?unit=p_item_masalah_unit&act=inputact" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right">Kode Daftar</label>
              <div class="col-sm-9">
                <input class="col-xs-10 col-sm-5" type="text" name="id_siswa" id="id_siswa" required="required"
                  value="<?php echo "$newID"; ?>" readonly="" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="nama_siswa">Nama</label>
              <div class="col-sm-9">
                <input class="col-xs-10 col-sm-5" type="text" name="nama_siswa" id="nama_siswa" required />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="jenis_kelamin">Jenis Kelamin</label>
              <div class="col-sm-9">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki"
                    checked>
                  <label class="form-check-label" for="laki-laki">
                    Laki-laki
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                  <label class="form-check-label" for="perempuan">
                    Perempuan
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="kelas">Kelas</label>
              <div class="col-sm-9">
                <!-- <input class="col-xs-10 col-sm-5" type="text" name="usia" id="usia" required    /> -->
                <select class="form-select col-xs-10 col-sm-5" style="font-size: 12px" name="kelas" id="kelas"
                  aria-label="Default select example" required>
                  <option value="X IPA 1">X IPA 1</option>
                  <option value="X IPA 2">X IPA 2</option>
                  <option value="X IPA 3">X IPA 3</option>
                  <option value="X IPA 4">X IPA 4</option>
                  <option value="X IPA 5">X IPA 5</option>
                  <option value="X IPA 6">X IPA 6</option>
                  <option value="X IPS 1">X IPS 1</option>
                  <option value="X IPS 2">X IPS 2</option>
                  <option value="XI IPA 1">XI IPA 1</option>
                  <option value="XI IPA 2">XI IPA 2</option>
                  <option value="XI IPA 3">XI IPA 3</option>
                  <option value="XI IPA 4">XI IPA 4</option>
                  <option value="XI IPA 5">XI IPA 5</option>
                  <option value="XI IPA 6">XI IPA 6</option>
                  <option value="XI IPS 1">XI IPS 1</option>
                  <option value="XI IPS 2">XI IPS 2</option>
                  <option value="XII IPA 1">XII IPA 1</option>
                  <option value="XII IPA 2">XII IPA 2</option>
                  <option value="XII IPA 3">XII IPA 3</option>
                  <option value="XII IPA 4">XII IPA 4</option>
                  <option value="XII IPA 5">XII IPA 5</option>
                  <option value="XII IPA 6">XII IPA 6</option>
                  <option value="XII IPS 1">XII IPS 1</option>
                  <option value="XII IPS 2">XII IPS 2</option>
                </select>
              </div>
            </div>

            <div class="clearfix form-actions">
              <div class="col-md-offset-3 col-md-9">
                <button type="submit" name="submit" class="btn btn-success">Lanjutkan</button>
                <button type="reset" name="reset" class="btn btn-danger">Batal</button>
              </div>
            </div>

          </form>



        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.page-content -->
  </div>

</div><!-- /.main-content -->
<?php
            include("../admin/footer.php");
            ?>
<script type="text/javascript">
  var frmvalidator = new Validator("tambah_subkat");

  frmvalidator.addValidation("kode_bidang_masalah", "req", "Silakan Pilih kategori");
  frmvalidator.addValidation("namasubkategori", "req", "Silakan Masukkan Nama Subkategori");
  frmvalidator.addValidation("namasubkategori", "maxlen=35", "Maksimal Karakter Nama 35 digit");
  frmvalidator.addValidation("namasubkategori", "alpha_s", "Hanya Huruf Saja");
  frmvalidator.addValidation("namasubkategori", "simbol", "Hanya Huruf Saja");
</script>
</body>

</html>


<?php
        break;
    
       case "inputact":
      
       $id_siswa = $_POST['id_siswa'];
			 $nama_siswa = $_POST['nama_siswa'];
			 $jenis_kelamin = $_POST['jenis_kelamin'];
			 $kelas = $_POST['kelas'];
			
          $qinput = "
          INSERT INTO t_siswa
          (kode_siswa, nama_siswa, jenis_kelamin, kelas)
          VALUES
          ('$id_siswa', '$nama_siswa', '$jenis_kelamin', '$kelas')
        ";

        $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_siswa WHERE kode_siswa = '$id_siswa'"));
        
        if ($cek > 0) {
          echo "<script> alert('Kode Sudah Ada');
              document.location='adminmainapp.php?unit=p_item_masalah_unit&act=input';
              </script>";
          } else {
          mysqli_query($mysqli,$qinput);
          echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=p_item_masalah_unit&act=datagrid&id_siswa=$id_siswa';
              </script>";
          exit();
         }
        break;
    
        case "update":
        $id_siswa = $_GET['id_siswa'];
        $qupdate = "SELECT 
                t_hasil.kode_hasil, t_hasil.tanggal, t_hasil.nilai_cf, t_hasil.hasil_id,t_hasil.kode_siswa,
						    t_bidang_masalah.kode_bidang_masalah, t_bidang_masalah.nama_bidang_masalah, t_bidang_masalah.layanan,
                t_siswa.kode_siswa, t_siswa.nama_siswa 
                            FROM 
                                t_hasil JOIN t_bidang_masalah ON t_hasil.hasil_id = t_bidang_masalah.kode_bidang_masalah
									JOIN t_siswa ON t_hasil.kode_siswa = t_siswa.kode_siswa
									WHERE t_hasil.kode_siswa ='$id_siswa'";
        $rupdate = mysqli_query($mysqli, $qupdate);
        $dupdate = mysqli_fetch_assoc($rupdate);
		
  $arcolor = array('#ffffff', '#cc66ff', '#019AFF', '#00CBFD', '#00FEFE', '#A4F804', '#FFFC00', '#FDCD01', '#FD9A01', '#FB6700');
  date_default_timezone_set("Asia/Makassar");
  $inptanggal = date('Y-m-d H:i:s');

  $arbobot = array('0', '0', '0.3', '0.7', '0.9');
  $argejala = array();
 
 for ($i = 0; $i < count($_POST['kondisi']); $i++) {
        $arkondisi = explode("_", $_POST['kondisi'][$i]);
        if (strlen($_POST['kondisi'][$i]) > 1) {
          $argejala += array($arkondisi[0] => $arkondisi[1]);
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

	  $kd_daftar = $_GET['id_siswa'];
        $sqlhasil = "SELECT 
              t_hasil.kode_hasil, t_hasil.tanggal, t_hasil.nilai_cf, t_hasil.hasil_id, t_hasil.kode_siswa, t_hasil.bidang_masalah, t_hasil.item_masalah,
              t_bidang_masalah.kode_bidang_masalah, t_bidang_masalah.nama_bidang_masalah, t_bidang_masalah.layanan,
              t_siswa.kode_siswa, t_siswa.nama_siswa 
              FROM 
                t_hasil
              JOIN t_bidang_masalah ON t_hasil.hasil_id = t_bidang_masalah.kode_bidang_masalah
              JOIN t_siswa ON t_hasil.kode_siswa = t_siswa.kode_siswa
              WHERE t_hasil.kode_siswa = '$kd_daftar'";
	$rdatagridp = mysqli_query($mysqli, $sqlhasil);
  while ($rhasil = mysqli_fetch_array($rdatagridp)) {
    $arbidang = unserialize($rhasil['bidang_masalah']);
    $argejala = unserialize($rhasil['item_masalah']);
  }


  $np1 = 0;
  foreach ($arbidang as $key1 => $value1) {
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
        <h1>Data Hasil Konsultasi</h1>
      </div>
      <h7>Berikut adalah hasil Konsultasi <?php echo ucwords($dupdate['nama_siswa']); ?>, Pada Tanggal
        <?php echo $dupdate['tanggal']; ?></h7>
      <div class="row">
        <div class="col-xs-12">

          <div class="widget-box widget-color-red" id="widget-box-2">
            <div class="widget-header">
              <h5 class="widget-title bigger lighter">
                <i class=""></i>
                Item Masalah Yang Dipilih
              </h5>

            </div>
            <div class="widget-body">
              <div class="widget-main no-padding">
                <table class="table table-striped table-bordered table-hover">
                  <thead class="thin-border-bottom">

                    <tr>
                      <th style="text-align: center; width: 8%">No.</th>
                      <th style="text-align: center; width: 13%">Kode Item Masalah</th>
                      <th style="text-align: center; width: 60%">Item Masalah</th>
                      <th style="text-align: center; width: 20%">Kondisi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
						 
						$ig = 0;
						foreach ($argejala as $key => $value) {
						$kondisi = $value;
						$ig++;
						$gejala = $key;
                        $qdatagrid =" SELECT * FROM t_item_masalah where kode_item_masalah = '$key'";
                        $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                        $ddatagrid=mysqli_fetch_array($rdatagrid);
							echo '<tr><td style=text-align:center;vertical-align:middle>' . $ig . '</td>';
							echo "<td style=text-align:center;vertical-align:middle> $ddatagrid[kode_item_masalah]</td>";
							echo "<td style=text-align:justify;vertical-align:middle> $ddatagrid[nama_item_masalah]</td>";
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
                Hasil Konsultasi
              </h5>

            </div>
            <div class="widget-body">
              <div class="widget-main no-padding">
                <table class="table table-striped table-bordered table-hover">
                  <thead class="thin-border-bottom">
                    <tr>
                      <th style="text-align: center">No.</th>
                      <th style="text-align: center">Kode Bidang Masalah</th>
                      <th style="text-align: center">Bidang Masalah</th>
                      <th style="text-align: center">Nilai CF</th>
                      <th style="text-align: center">Persen</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
						 
						$np = 0;
						foreach ($arbidang as $key => $value) {
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
							echo "<td style=text-align:center> " . round($vlpkt[$ipl], 2) * 100 . "%</td></tr>";
							
						 }
						
                             ?>



                  </tbody>
                </table>
              </div>
            </div>
          </div>


          <div class="page-header"></div>
          <h5>IDENTIFIKASI</h5>
          <h6>Hasil Dari Identifikasi Bidang Masalah Yang Paling Mungkin adalah:
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
              <a href="adminmainapp.php?unit=l_konsultasi&kd_daftar=<?php echo $kd_daftar; ?>"
                class='btn btn-sm btn-danger glyphicon glyphicon-print'> Print</a>
              <a href="adminmainapp.php?unit=p_item_masalah_unit&act=datagrid&kd_daftar=<?php echo $kd_daftar; ?>"
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
    
           
}
            
            