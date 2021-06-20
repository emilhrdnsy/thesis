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
        <li>Data Basis Pengetahuan</li>
      </ul><!-- /.breadcrumb -->
    </div>

    <div class="page-content">
      <div class="page-header">
        <h1>Data Basis Pengetahuan</h1>
      </div>
      <h1>
        <a href="?unit=dbp_unit&act=input">
          <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
        </a>
      </h1>
      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->
          <div class="row">
            <div class="box box-primary">
              <div class="box-body table-responsive padding">

                <table id="datatable" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th style="text-align: center; width: 7%">No.</th>
                      <th style="text-align: center; width: 10%">kode Bidang Masalah</th>
                      <th style="text-align: center; width: 15%">Bidang Masalah</th>
                      <th style="text-align: center; width: 10%">Kode Item Masalah</th>
                      <th style="text-align: center; width: 19%">Item Masalah</th>
                      <th style="text-align: center; width: 7%">MB</th>
                      <th style="text-align: center; width: 7%">MD</th>
                      <th style="text-align: center; width: 10%">CF (Pakar)</th>
                      <th style="text-align: center; width: 15%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; 
                        $qdatagrid ="  SELECT 
                        t_identifikasi.kode_identifikasi, 
                        t_identifikasi.mb, t_identifikasi.md, 
                        t_identifikasi.cf_bidang_masalah, 
                        t_bidang_masalah.kode_bidang_masalah, t_bidang_masalah.nama_bidang_masalah,
                        t_item_masalah.kode_item_masalah, t_item_masalah.nama_item_masalah
                          FROM 
                        t_identifikasi 
                        JOIN t_bidang_masalah ON t_identifikasi.kode_bidang_masalah = t_bidang_masalah.kode_bidang_masalah
									      JOIN t_item_masalah ON t_identifikasi.kode_item_masalah = t_item_masalah.kode_item_masalah";
                            $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                            while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
                                echo "
                                <tr>
                                  <td style= text-align:center;vertical-align:middle>$no</td>
                                  <td style= text-align:center;vertical-align:middle>$ddatagrid[kode_bidang_masalah]</td>
                                  <td style= text-align:left;vertical-align:middle>$ddatagrid[nama_bidang_masalah]</td>
                                  <td style= text-align:center;vertical-align:middle>$ddatagrid[kode_item_masalah]</td>
                                  <td style= text-align:justify;vertical-align:middle>$ddatagrid[nama_item_masalah]</td>
                                  <td style= text-align:center;vertical-align:middle>$ddatagrid[mb]</td>
                                  <td style= text-align:center;vertical-align:middle>$ddatagrid[md]</td>
                                   
                                  <td style= text-align:center;vertical-align:middle>$ddatagrid[cf_bidang_masalah]</td>
                                  <td style=text-align:center;vertical-align:middle>
                                    <a href=?unit=dbp_unit&act=update&kode_identifikasi=$ddatagrid[kode_identifikasi] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                    <a href=# class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='confirm($ddatagrid[kode_identifikasi])'></a>    
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
              title:'Berhasil',
              text: 'Data Item Masalah Berhasil Terhapus ',
              type: 'success',
              showConfirmButton: false ,
              })
              setTimeout(function()  {
                window.location.href = "?unit=dbp_unit&act=delete&kode_identifikasi=" + id_user
              }, 1000);  
              } else {               
              Swal.fire({
                title: 'Dibatalkan',
                text: 'Batal Menghapus Data Item Masalah',
                type: 'error',
              }
              )
            }
          })
        }
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
        <li>Tambah Data Basis Pengetahuan</li>
      </ul><!-- /.breadcrumb -->
    </div>

    <div class="page-content">
      <div class="page-header">
        <h1>Tambah Data Basis Pengetahuan</h1>
      </div>
      <div class="row">
        <div class="col-xs-12">


          <form class="form-horizontal" name="tambah_subkat" id="tambah_subkat" method="post"
            action="?unit=dbp_unit&act=inputact" enctype="multipart/form-data">



            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="kode_bidang_masalah">Bidang Masalah</label>
              <div class="col-sm-9">
                <select class="col-xs-10 col-sm-5" name="kode_bidang_masalah" id="kode_bidang_masalah" required>
                  <option selected="selected">--Pilih Bidang Masalah--</option>
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
                  <option selected="selected">--Pilih Item Masalah--</option>
                  <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_item_masalah
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($dcombo = mysqli_fetch_assoc($rcombo)) {
                            echo "
                            <option value=$dcombo[kode_item_masalah]>$dcombo[kode_item_masalah]</option> 
                            ";
                        }
                        ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="mb">MB</label>
              <div class="col-sm-9">
                <input class="col-xs-10 col-sm-5" type="text" name="mb" id="mb" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="md">MD</label>
              <div class="col-sm-9">
                <input class="col-xs-10 col-sm-5" type="text" name="md" id="md" required />
              </div>
            </div>

            <div class="clearfix form-actions">
              <div class="col-md-offset-3 col-md-9">
                <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                <button type="button" name="kembali" class="btn btn-info"
                  onclick="window.location='adminmainapp.php?unit=dbp_unit&act=datagrid'">kembali</button>
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
			
            $kode_bidang_masalah = $_POST['kode_bidang_masalah'];
            $kode_item_masalah = $_POST['kode_item_masalah'];
            $mb = $_POST['mb'];
            $md = $_POST['md'];
            $cf_bidang_masalah = $mb-$md;
            $qinput = "
          INSERT INTO t_identifikasi
          ( kode_bidang_masalah, kode_item_masalah, mb, md, cf_bidang_masalah)
          VALUES
          ('$kode_bidang_masalah', '$kode_item_masalah', '$mb', '$md', '$cf_bidang_masalah')";
       
         $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_identifikasi WHERE kode_bidang_masalah = '$kode_bidang_masalah' and kode_item_masalah = '$kode_item_masalah'"));
        
        if ($cek > 0) {
          echo "<script> 
            wal({
              title: 'Info',
              text: 'Item Masalah sudah ada',
              type: 'info'
            }).then(function() {
              document.location='adminmainapp.php?unit=dbp_unit&act=input';
            }); 
              
            </script>";
          } else {
          mysqli_query($mysqli,$qinput);
          echo "<script> 
          const inputOptions = new Promise((resolve) => {
            setTimeout(() => {
              document.location='adminmainapp.php?unit=dbp_unit&act=datagrid';
            }, 1500)
          })
          swal.fire({
              type: 'success',
              title: 'Berhasil',
              text: 'Berhasil Menambah Data Basis Pengetahuan',
              inputOptions: inputOptions,
              showConfirmButton: false,
            });
            </script>";
          exit();
         }
        break;
    
        case "update":
        $kode_identifikasi = $_GET['kode_identifikasi'];
        $qupdate = "SELECT * FROM t_identifikasi WHERE kode_identifikasi = '$kode_identifikasi'";
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
          <a href="#">Beranda</a>
        </li>
        <li>Data Transaksi</li>
        <li>Edit Data Basis Pengetahuan</li>
      </ul><!-- /.breadcrumb -->
    </div>

    <div class="page-content">
      <div class="page-header">
        <h1>Edit Data Basis Pengetahuan</h1>
      </div>
      <div class="row">
        <div class="col-xs-12">


          <form class="form-horizontal" name="tambah_subkat" id="tambah_subkat" method="post"
            action="?unit=dbp_unit&act=updateact" enctype="multipart/form-data">


            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right">Kode Data Basis Pengetahuan</label>
              <div class="col-sm-9">
                <input class="col-xs-10 col-sm-5" type="text" name="kode_identifikasi" id="kode_identifikasi" required="required"
                  value="<?php echo $dupdate['kode_identifikasi'] ?>" readonly="" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="kode_bidang_masalah">Bidang Masalah</label>
              <div class="col-sm-9">
                <select class="col-xs-10 col-sm-5" name="kode_bidang_masalah" id="kode_bidang_masalah" required>
                  <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_bidang_masalah
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($dcombo = mysqli_fetch_assoc($rcombo)) {
                            if($dcombo['kode_bidang_masalah'] == $dupdate['kode_bidang_masalah']) {
                                echo "
                                <option value=$dcombo[kode_bidang_masalah] selected=selected>$dcombo[nama_bidang_masalah]</option> 
                                ";                                
                            }
                            else {
                                echo "
                                <option value=$dcombo[kode_bidang_masalah]>$dcombo[nama_bidang_masalah]</option> 
                                ";                                
                            }

                        }
                        ?>
                </select>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="kode_item_masalah">Item Masalah</label>
              <div class="col-sm-9">
                <select class="col-xs-10 col-sm-5" name="kode_item_masalah" id="kode_item_masalah" required>
                  <?php
                        $qcombo = 
                        "
                        SELECT * FROM t_item_masalah
                        ";
                        $rcombo = mysqli_query($mysqli,$qcombo);
                        while($dcombo = mysqli_fetch_assoc($rcombo)) {
                            if($dcombo['kode_item_masalah'] == $dupdate['kode_item_masalah']) {
                                echo "
                                <option value=$dcombo[kode_item_masalah] selected=selected>$dcombo[nama_item_masalah]</option> 
                                ";                                
                            }
                            else {
                                echo "
                                <option value=$dcombo[kode_item_masalah]>$dcombo[nama_item_masalah]</option> 
                                ";                                
                            }

                        }
                        ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="mb">MB</label>
              <div class="col-sm-9">
                <input class="col-xs-10 col-sm-5" type="text" name="mb" id="mb" value="<?php echo $dupdate['mb'] ?>"
                  required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="md">MD</label>
              <div class="col-sm-9">
                <input class="col-xs-10 col-sm-5" type="text" name="md" id="md" value="<?php echo $dupdate['md'] ?>"
                  required />
              </div>
            </div>

            <div class="clearfix form-actions">
              <div class="col-md-offset-3 col-md-9">
                <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                <button type="button" name="kembali" class="btn btn-info"
                  onclick="window.location='adminmainapp.php?unit=dbp_unit&act=datagrid'">kembali</button>
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
</body>

</html>

<?php
        break;
    
            case "updateact":
			      $kode_identifikasi = $_POST['kode_identifikasi'];
            $kode_bidang_masalah = $_POST['kode_bidang_masalah'];
            $kode_item_masalah = $_POST['kode_item_masalah'];
            $mb = $_POST['mb'];
            $md = $_POST['md'];
			      $cf_bidang_masalah = $mb-$md;
            $qinput = 
            "
            UPDATE t_identifikasi SET
              kode_bidang_masalah= '$kode_bidang_masalah',			
              kode_item_masalah = '$kode_item_masalah',
              mb = '$mb',
              md = '$md',
              cf_bidang_masalah = '$cf_bidang_masalah'
              WHERE
              kode_identifikasi = '$kode_identifikasi'";
              if($qinput)
              {
                  $rinput = mysqli_query($mysqli,$qinput);
                  
                  echo "<script>
                  swal({
                      title:'Berhasil',
                      text: 'Data Berhasil Diubah',
                      type: 'success',
                      
                  }).then(function() {
                      document.location = '?unit=dbp_unit&act=datagrid';
                      exit;
                  });
                  </script>";
              }
              else
              {
                  echo mysqli_error();
              }  	
         	
                 break;
    
        case "delete":
          $kode_identifikasi = $_GET['kode_identifikasi'];
          $qdelete = "
          DELETE  FROM t_identifikasi
          WHERE
            kode_identifikasi = '$kode_identifikasi'
        ";

        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=dbp_unit&act=datagrid");
             break;
}
            
            