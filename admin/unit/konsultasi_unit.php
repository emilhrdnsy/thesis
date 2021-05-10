<?php
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
                            <th style="text-align: center">No.</th>
                            <th style="text-align: center">Tanggal</th>
                            <th style="text-align: center">Nama</th>
                            <th style="text-align: center">Kelas</th>
                            <th style="text-align: center">Jenis Kelamin</th>
                            <th style="text-align: center">Masalah</th>
                            <th style="text-align: center">Nilai CF</th>
                            <th style="text-align: center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php $no=1; 
                          $qdatagrid ="  SELECT 
                            t_hasil.kode_hasil, t_hasil.tanggal, t_hasil.nilai_cf, t_hasil.hasil_id,
                            t_bidang_masalah.kode_bidang_masalah, t_bidang_masalah.nama_bidang_masalah,
                            t_siswa.kode_siswa, t_siswa.nama_siswa, t_siswa.kelas, t_siswa.jenis_kelamin
                            FROM 
                              t_hasil
                            JOIN t_bidang_masalah ON t_hasil.hasil_id = t_bidang_masalah.kode_bidang_masalah
									          JOIN t_siswa ON t_hasil.kode_siswa = t_siswa.kode_siswa";
                            $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                            while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
                                echo "
                                <tr>
                                     <td style= text-align:center>$no</td>
                                     <td style= text-align:center>$ddatagrid[tanggal]</td>
                                     <td style= text-align:center>".ucwords("$ddatagrid[nama_siswa]")."</td>
                                     <td style= text-align:center>$ddatagrid[kelas]</td>
                                     <td style= text-align:center>$ddatagrid[jenis_kelamin]</td>
                                     <td style= text-align:left>$ddatagrid[nama_bidang_masalah]</td>
                                     <td style= text-align:center>$ddatagrid[nilai_cf]</td>
                                     <td style=text-align:center>
                                         <a href=?unit=konsultasi_unit&act=update&kode_hasil=$ddatagrid[kode_hasil] class='btn btn-sm btn-info glyphicon glyphicon-eye-open' > Detail</a> 
                                         <a href=?unit=konsultasi_unit&act=delete&kode_hasil=$ddatagrid[kode_hasil] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'> Hapus</a>    
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
          "lengthMenu": [[10, 25, 50, 100, 500, 1000, -1], [10, 25, 50, 100, 500, 1000, "Semua"]]
        });
      </script>
	</body>
</html>
 <?php
        
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
							<li>Tambah Data Konsultasi</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Tambah Data Konsultasi</h1></div>
						<div class="row">
							<div class="col-xs-12">
                              
                                           
             <form class="form-horizontal" name="tambah_subkat" id="tambah_subkat" method="post" action="?unit=konsultasi_unit&act=inputact" enctype="multipart/form-data">
                 


				  <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="kode_bidang_masalah">Bidang Masalah</label>
                     <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="kode_bidang_masalah" id="kode_bidang_masalah" required>
                        <option selected="selected">-Pilih Bidang Masalah-</option>
                      <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_bidang_masalah
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($dcombo = mysqli_fetch_assoc($rcombo)) {
                            echo "
                            <option value=$dcombo[kode_bidang_masalah]>$dcombo[nama_bidang_masalah]</option> 
                            ";
                        }
                        ?>
                    </select>
                       </div>
                       </div>
                
              
				  <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="kode_item_masalah">Item Masalah</label>
                     <div class="col-sm-9">
                        <select class="col-xs-10 col-sm-5" name="kode_item_masalah" id="kode_item_masalah" required>
                        <option selected="selected">-Pilih Item-</option>
                       <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_item_masalah
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($dcombo = mysqli_fetch_assoc($rcombo)) {
                            echo "
                            <option value=$dcombo[kode_item_masalah]>$dcombo[nama_item_masalah]</option> 
                            ";
                        }
                        ?>
                    </select>
                       </div>
                       </div>
                                                           
                        <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="mb">MB</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="mb" id="mb" required    />
                       </div>
                       </div>
					   
					    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="md">MD</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="md" id="md" required    />
                       </div>
                       </div>
					   
                  <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                         <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=konsultasi_unit&act=datagrid'">kembali</button>
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
 <script  type="text/javascript">
 var frmvalidator = new Validator("tambah_subkat");
 
 frmvalidator.addValidation("kode_bidang_masalah","req","Silakan Pilih kategori");
 frmvalidator.addValidation("namasubkategori","req","Silakan Masukkan Nama Subkategori");
 frmvalidator.addValidation("namasubkategori","maxlen=35","Maksimal Karakter Nama 35 digit");
 frmvalidator.addValidation("namasubkategori","alpha_s","Hanya Huruf Saja");
 frmvalidator.addValidation("namasubkategori","simbol","Hanya Huruf Saja");
</script>
	</body>
</html>


 <?php
        break;
    
        case "inputact":
       $qupdate = "SELECT max(kode_hasil) as maxKode FROM t_identifikasi";
                $rupdate = mysqli_query($mysqli, $qupdate);
                $dupdate = mysqli_fetch_assoc($rupdate);
                $subkode_kategori = $dupdate['maxKode'];
                $no_urut = (int) substr($subkode_kategori, 3, 3);
                $no_urut++;
                $newID = $char.sprintf("%03s",$no_urut);  
                $new = $_POST['kode_bidang_masalah'].sprintf($newID);
            $namasubkategori = $_POST['namasubkategori'];
            $kd_bidang_masalah = $_POST['kode_bidang_masalah'];
             $qinput = 
        "
        INSERT INTO t_identifikasi
        (kode_hasil,kode_bidang_masalah,namasubkategori)
        VALUES ('$new','$kd_bidang_masalah','$namasubkategori')";
         	
         $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_identifikasi WHERE namasubkategori = '$namasubkategori'"));
        
        if ($cek > 0) {
          echo "<script> alert('Data SubKategori Sudah Ada');
              document.location='adminmainapp.php?unit=konsultasi_unit&act=input';
              </script>";
          } else {
          mysqli_query($mysqli,$qinput);
          echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=konsultasi_unit&act=datagrid';
              </script>";
          exit();
         }
        break;
    
        case "update":
        $kd_hasil = $_GET['kode_hasil'];
        $qupdate = "SELECT 
                          t_hasil.kode_hasil, t_hasil.tanggal, t_hasil.nilai_cf, t_hasil.hasil_id,
                          t_bidang_masalah.kode_bidang_masalah, t_bidang_masalah.nama_bidang_masalah, 
                          t_bidang_masalah.layanan,
                          t_siswa.kode_siswa, t_siswa.nama_siswa t_siswa.kelas t_siswa.jenis_kelamin
                            FROM 
                                t_hasil JOIN t_bidang_masalah ON t_hasil.hasil_id = t_bidang_masalah.kode_bidang_masalah
									JOIN t_siswa ON t_hasil.kode_siswa = t_siswa.kode_siswa
									WHERE t_hasil.kode_hasil = '$kd_hasil'";
        $rupdate = mysqli_query($mysqli, $qupdate);
        $dupdate = mysqli_fetch_assoc($rupdate);
		
		$arcolor = array('#ffffff', '#cc66ff', '#019AFF', '#00CBFD', '#00FEFE', '#A4F804', '#FFFC00', '#FDCD01', '#FD9A01', '#FB6700');
  date_default_timezone_set("Asia/Makassar");
  $inptanggal = date('Y-m-d H:i:s');

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
                            FROM 
                                t_hasil
                                    JOIN t_bidang_masalah ON t_hasil.hasil_id = t_bidang_masalah.kode_bidang_masalah
									JOIN t_siswa ON t_hasil.kode_siswa = t_siswa.kode_siswa
									WHERE t_hasil.kode_hasil = '$kd_hasil'";
	$rdatagridp = mysqli_query($mysqli, $sqlhasil);
  while ($rhasil = mysqli_fetch_array($rdatagridp)) {
    $arpenyakit = unserialize($rhasil['bidang_masalah']);
    $ar_item_masalah = unserialize($rhasil['item_masalah']);
  }

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
						<div class="page-header"><h1>Data Hasil Konsultasi<small> <?php echo $dupdate['nama_siswa']; ?> Pada Tanggal <?php echo $dupdate['tanggal']; ?></h1>
						</div>
						
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
                            <th style="text-align: center">No.</th>
                            <th style="text-align: center">Kode Item Masalah</th>
                            <th style="text-align: center">Nama Item Masalah</th>
                            <th style="text-align: center">Nilai CF (Kondisi)</th>
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
						foreach ($arpenyakit as $key => $value) {
						$np++;
						$idpkt[$np] = $key;
						$nmpkt[$np] = $arpkt[$key];
						$vlpkt[$np] = $value;
						
                        $qdatagrid =" SELECT * FROM t_bidang_masalah where kode_bidang_masalah = '$key'";
                        $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                        $ddatagrid=mysqli_fetch_array($rdatagrid);
						for ($ipl = 1; $ipl < count($idpkt); $ipl++) ;
							echo '<tr><td >' . $np . '</td>';
              echo "<td class=opsi > $ddatagrid[kode_bidang_masalah]</td>";
              echo "<td class=opsi > $ddatagrid[nama_bidang_masalah]</td>";
							echo '<td>' . $vlpkt[$ipl] . '</td>';
							echo "<td> " . round($vlpkt[$ipl], 2) . " %</td></tr>";
							
						 }
						
                             ?>
							             
                                
								
                        </tbody>
														</table>
													</div>
												</div>
											</div>
											
											
											<div class="page-header"></div>
											<h5>Hasil Diagnosa</h5>
											<h6>Hasil Dari Diagnosa Bidang Masalah Yang Paling Mungkin adalah : <b><?php echo $dupdate['nama_bidang_masalah']; ?></b></h6>
													
												<div class="widget-body">
													<div class="widget-main">
														
														<p class="alert alert-danger">
															Layanan	: <?php echo $dupdate['layanan']; ?>
														</p>
													
														
													</div>
												</div>
											<div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                         <a href="adminmainapp.php?unit=l_konsultasi_d&kode_hasil=<?php echo $kd_hasil; ?>" class='btn btn-sm btn-danger glyphicon glyphicon-print' > Print</a> 
						 <a href="adminmainapp.php?unit=konsultasi_unit&act=datagrid" class='btn btn-sm btn-info glyphicon' >Kembali</a> <br><br><br>
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
    
            case "updateact":
                $kd_hasil = $_POST['kode_hasil'];
                $kd_bidang_masalah = $_POST['kode_bidang_masalah'];
                $namasubkategori = $_POST['namasubkategori'];
             $qinput = 
        
       "
                UPDATE t_identifikasi SET
                namasubkategori= '$namasubkategori',			
                kode_bidang_masalah = '$kd_bidang_masalah'
               
                WHERE
                kode_hasil = '$kd_hasil'";			
         $rinput = mysqli_query($mysqli,$qinput);
         	
        header("location:?unit=konsultasi_unit&act=datagrid");     
                 break;
    
        case "delete":
               $kd_hasil = $_GET['kode_hasil'];
        $qdelete = "
          DELETE  FROM t_identifikasi
       
          WHERE
            kode_hasil = '$kd_hasil'
        ";

        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=konsultasi_unit&act=datagrid");
             break;
}
            
            