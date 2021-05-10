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
      <h6>Silahkan Pilih Kondisi Gejala Seusai Yang Dialami:</h6>
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
                          <th style="width:100px; center">No.</th>
                          <th style="width:100px; text-align:center">Kode Item</th>
                          <th style="text-align: center">Nama Item</th>
                          <th style="width:300px; text-align:center">Pilih Kondisi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $qdatagrid ="  SELECT * FROM t_item_masalah ORDER by id_item_masalah ";
                            $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                            
							$i = 0;
                while($ddatagrid=mysqli_fetch_array($rdatagrid)) {
								$i++;
								echo "<tr><td class=opsi>$i</td>";
                echo "<td class=opsi > $ddatagrid[kode_item_masalah]</td>";
								echo "<td class=gejala >$ddatagrid[nama_item_masalah]</td>";
								echo '<td class="opsi" >
                  <select name="kondisi[]" id="sl' . $i . '" class="opsikondisi col-sm-12"/>
                  <option data-id="0" value="0">Pilih jika sesuai</option>';

									$qdatagridk =' SELECT * FROM t_pilihan_pengguna ORDER by id_pilihan_pengguna ';
									$rdatagridk = mysqli_query($mysqli, $qdatagridk);
									while($ddatagridk=mysqli_fetch_array($rdatagridk)) {
									 ?>
                        <option data-id="<?php echo $ddatagridk['id_pilihan_pengguna']; ?>"
                          value="<?php echo $ddatagrid['kode_item_masalah'] . '_' . $ddatagridk['id_pilihan_pengguna']; ?>">
                          <?php echo $ddatagridk['kondisi']; ?></option>
                        <?php
									}
									echo '</select></td>';
									
                             }
                             ?>

                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                  <button type="submit" name="submit" class="btn btn-danger">Proses</button>
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

      $arbobot = array('0', '0.3', '0.7', '1.0');
      $argejala = array();

      // print_r($_POST['kondisi']);

      for ($i = 0; $i < count($_POST['kondisi']); $i++) {
        $arkondisi = explode("_", $_POST['kondisi'][$i]);
        if (strlen($_POST['kondisi'][$i]) > 1) {
          $argejala += array($arkondisi[0] => $arkondisi[1]);
        }
      }

      // print_r($argejala);
	  
      $sqlkondisi =(" SELECT * FROM t_pilihan_pengguna ORDER by id_pilihan_pengguna+0");
      $rdatagridk = mysqli_query($mysqli, $sqlkondisi);
      while($rkondisi=mysqli_fetch_array($rdatagridk)) {
        $arkondisitext[$rkondisi['id_pilihan_pengguna']] = $rkondisi['kondisi'];
      }

      // print_r($arkondisitext);

      $sqlpkt =(" SELECT * FROM t_bidang_masalah ORDER by id_bidang_masalah+0");
      $rdatagridp = mysqli_query($mysqli, $sqlpkt);
      while($rpkt=mysqli_fetch_array($rdatagridp)) {
        $arpkt[$rpkt['kode_bidang_masalah']] = $rpkt['nama_bidang_masalah'];
        // $ardpkt[$rpkt['kode_bidang_masalah']] = $rpkt['penyebab'];
        // $arspkt[$rpkt['kode_bidang_masalah']] = $rpkt['pencegahan'];
        // $argpkt[$rpkt['kode_bidang_masalah']] = $rpkt['penanganan'];
      }

      // print_r($arpkt);
	  
	  $sqlp =(" SELECT * FROM t_bidang_masalah ORDER by id_bidang_masalah");
	  $sqlpenyakit = mysqli_query($mysqli, $sqlp);
      $arpenyakit = array();
      while ($rpenyakit = mysqli_fetch_array($sqlpenyakit)) {
        $cftotal_temp = 0;
        $cf = 0;
        // print_r($rpenyakit);
        $sqlg =(" SELECT * FROM t_identifikasi where kode_bidang_masalah = '$rpenyakit[kode_bidang_masalah]'");
        $sqlgejala = mysqli_query($mysqli, $sqlg);
        $cflama = 0;
        while ($rgejala = mysqli_fetch_array($sqlgejala)) {
          // print_r($rgejala);
          $arkondisi = explode("_", $_POST['kondisi'][0]);
          $gejala = $arkondisi[0];

          // print_r($arkondisi);
          // print_r($_POST['kondisi']);
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
          $arpenyakit += array($rpenyakit['kode_bidang_masalah'] => number_format($cflama, 4));
        }
      }
      // print_r($arpenyakit);

      arsort($arpenyakit);

      $inpgejala = serialize($argejala);
      $inppenyakit = serialize($arpenyakit);

      $np1 = 0;
      foreach ($arpenyakit as $key1 => $value1) {
        $np1++;
        $idpkt1[$np1] = $key1;
        $vlpkt1[$np1] = $value1;
      }

      // print_r($idpkt1[1]);
      // print_r($vlpkt1);

	    $kd_daftar = $_GET['id_siswa'];
      // echo $kd_daftar;
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
            '$inppenyakit',
            '$idpkt1[1]',
            '$vlpkt1[1]',
			      '$kd_daftar'
          )
        ";
        
         $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_hasil WHERE nilai_cf ='0'"));
        
       if ($cek > 0) {
          echo "<script> alert('Anda Belum Memilh Gejala');
              document.location='adminmainapp.php?unit=p_item_masalah_unit&act=datagrid&id_siswa=$kd_daftar';
              </script>";
          } else {
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
        <h1>Konsultasi<br><small> Untuk Memulai Konsultasi Silahkan Masukan Identitas Terlebih Dahulu</h1>


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

                    ?>
          <form class="form-horizontal" name="tambah_subkat" id="tambah_subkat" method="post"
            action="?unit=p_item_masalah_unit&act=inputact" enctype="multipart/form-data">



            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right">Kode Daftar</label>
              <div class="col-sm-9">
                <input class="col-xs-10 col-sm-5" type="text" name="id_siswa" id="kd_daftar" required="required"
                  value="<?php echo "$newID"; ?>" readonly="" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="nm_pasien">Nama</label>
              <div class="col-sm-9">
                <input class="col-xs-10 col-sm-5" type="text" name="nama_siswa" id="nama_siswa" required />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="jk">Jenis Kelamin</label>
              <div class="col-sm-9">
                <!-- <select class="col-xs-10 col-sm-5" name="jk" id="jk" required>
                        <option value=""></option>
                        <option value="laki-laki">Laki-Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select> -->

                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki"
                    checked>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Laki-laki
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin"
                    value="Perempuan">
                  <label class="form-check-label" for="flexRadioDefault2">
                    Perempuan
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="kelas">Kelas</label>
              <div class="col-sm-9">
                <!-- <input class="col-xs-10 col-sm-5" type="text" name="usia" id="usia" required    /> -->
                <select class="form-select col-xs-10 col-sm-5 " name="kelas" id="kelas"
                  aria-label="Default select example" required>
                  <option value="X IPA 1">X IPA 1</option>
                  <option value="X IPA 2">X IPA 2</option>
                  <option value="X IPA 3">X IPA 3</option>
                 
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

  frmvalidator.addValidation("kd_penyakit", "req", "Silakan Pilih kategori");
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
						   t_bidang_masalah.kode_bidang_masalah, t_bidang_masalah.nama_bidang_masalah,
               t_bidang_masalah.layanan,
              --  t_penyakit.penyebab, t_penyakit.pencegahan, t_penyakit.penanganan,
						   t_siswa.kode_siswa, t_siswa.nama_siswa
                            FROM 
                                t_hasil JOIN t_bidang_masalah ON t_hasil.hasil_id = t_bidang_masalah.kode_bidang_masalah
									JOIN t_siswa ON t_hasil.kode_siswa = t_siswa.kode_siswa
									WHERE t_hasil.kode_siswa ='$id_siswa'";
        $rupdate = mysqli_query($mysqli, $qupdate);
        $dupdate = mysqli_fetch_assoc($rupdate);
		
  $arcolor = array('#ffffff', '#cc66ff', '#019AFF', '#00CBFD', '#00FEFE', '#A4F804', '#FFFC00', '#FDCD01', '#FD9A01', '#FB6700');
  date_default_timezone_set("Asia/Jakarta");
  $inptanggal = date('Y-m-d H:i:s');

  $arbobot = array('0', '0.3', '0.7', '1.0');
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
        // $ardpkt[$rpkt['kode_penyakit']] = $rpkt['penyebab'];
        // $arspkt[$rpkt['kode_penyakit']] = $rpkt['pencegahan'];
        // $argpkt[$rpkt['kode_penyakit']] = $rpkt['penanganan'];
      }

	  $kd_daftar = $_GET['id_siswa'];
        $sqlhasil = "SELECT 
              t_hasil.kode_hasil, t_hasil.tanggal, t_hasil.nilai_cf, t_hasil.hasil_id,t_hasil.kode_siswa,
              t_hasil.bidang_masalah, t_hasil.item_masalah,
              t_bidang_masalah.kode_bidang_masalah, t_bidang_masalah.nama_bidang_masalah, 
              t_bidang_masalah.layanan,
              t_siswa.kode_siswa, t_siswa.nama_siswa
              FROM 
                                t_hasil
                                    JOIN t_bidang_masalah ON t_hasil.hasil_id = t_bidang_masalah.kode_bidang_masalah
									JOIN t_siswa ON t_hasil.kode_siswa = t_siswa.kode_siswa
									WHERE t_hasil.kode_siswa = '$kd_daftar'";
	$rdatagridp = mysqli_query($mysqli, $sqlhasil);
  while ($rhasil = mysqli_fetch_array($rdatagridp)) {
    $arpenyakit = unserialize($rhasil['bidang_masalah']);
    $argejala = unserialize($rhasil['item_masalah']);
  }

  // print_r($argejala);

  $np1 = 0;
  foreach ($arpenyakit as $key1 => $value1) {
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
      <h7>Berikut adalah hasil Konsultasi <?php echo $dupdate['nama_siswa']; ?>, Pada Tanggal
        <?php echo $dupdate['tanggal']; ?></h7>
      <div class="row">
        <div class="col-xs-12">

          <div class="widget-box widget-color-red" id="widget-box-2">
            <div class="widget-header">
              <h5 class="widget-title bigger lighter">
                <i class=""></i>
                Gejala Yang Dipilih
              </h5>

            </div>
            <div class="widget-body">
              <div class="widget-main no-padding">
                <table class="table table-striped table-bordered table-hover">
                  <thead class="thin-border-bottom">

                    <tr>
                      <th style="text-align: center">No.</th>
                      <th style="text-align: center">Kode Item Masalah</th>
                      <th style="text-align: center">Nama Item Masalah</th>
                      <th style="text-align: center">Kondisi</th>
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
							echo '<tr><td>' . $ig . '</td>';
							echo "<td> $ddatagrid[kode_item_masalah]</td>";
							echo "<td> $ddatagrid[nama_item_masalah]</td>";
              echo '<td><span class="kondisipilih">' . $arkondisitext[$kondisi] . "</span></td>";
  
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
                      <th style="text-align: center">Kode</th>
                      <th style="text-align: center">Bidang Masalah</th>
                      <th style="text-align: center">Nilai CF</th>
                      <th style="text-align: center">Persen</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
						 
						$np = 0;
						foreach ($arpenyakit as $key => $value) {
						$np++;
						$idpkt[$np] = $key;
						$nmpkt[$np] = $arpkt[$key];
						$vlpkt[$np] = $value;
						
                        $qdatagrid =" SELECT * FROM t_bidang_masalah where kode_bidang_masalah = '$key'";
                        $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                        $ddatagrid=mysqli_fetch_array($rdatagrid);
						for ($ipl = 1; $ipl < count($idpkt); $ipl++) ;
							echo '<tr><td>' . $np . '</td>';
                            echo "<td class=opsi > $ddatagrid[kode_bidang_masalah]</td>";
                            echo "<td class=opsi > $ddatagrid[nama_bidang_masalah]</td>";
							echo '<td>' . $vlpkt[$ipl] . '</td>';
							echo "<td> " . round($vlpkt[$ipl], 2) * 100 . "%</td></tr>";
							
						 }
						
                             ?>



                  </tbody>
                </table>
              </div>
            </div>
          </div>


          <div class="page-header"></div>
          <h5>DIAGNOSA</h5>
          <h6>Hasil Dari Diagnosa Penyakit Yang Paling Mungkin adalah : <b><?php echo $dupdate['nama_bidang_masalah']; ?></b></h6>

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
            
            