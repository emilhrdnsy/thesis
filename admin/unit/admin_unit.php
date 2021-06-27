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
        <li>Admin</li>
        <li>Data Admin</li>
      </ul><!-- /.breadcrumb -->
    </div>

    <div class="page-content">
      <div class="page-header">
        <h1>Data Admin
        </h1>
      </div>
      <h1>
        <a href="?unit=admin_unit&act=input">
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
                      <th style="text-align: center; width: 10%">No</th>
                      <th style="text-align: center; width: 20%">Nama</th>
                      <th style="text-align: center;width: 30%">Nama Pengguna</th>
                      <th style="text-align: center;width: 20%">Kata Sandi</th>
                      <th style="text-align: center;width: 20%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; 
                          $qdatagrid =" SELECT * FROM t_admin";
                            $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                            while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
                              $st="";
                            if($ddatagrid['blokir']=='N')
                            {
                                    $st= '<span class="label label-info">Aktif</span>';
                            }
                            else if ($ddatagrid['blokir']=='Y')
                            {
                                    $st= '<span class="label label-danger">Blokir</span>';
                            }
                            else if($ddatagrid['blokir']=='A')
                            {
                                    $st='<span class="label label-warning">Menunggu</span>';
                            }
                                echo "
                                <tr>
                                    <td style= text-align:center;vertical-align:middle>$no</td>
                                    <td style= text-align:center;vertical-align:middle>".ucwords("$ddatagrid[nama]")."</td>
                                    <td style= text-align:center;vertical-align:middle>$ddatagrid[nama_pengguna]</td>
                                    <td style= text-align:center;vertical-align:middle>$ddatagrid[kata_sandi]</td>	
                                                                      
                                    <td style=text-align:center;vertical-align:middle>
                                        <a href=?unit=admin_unit&act=update&id_admin=$ddatagrid[id_admin] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                        <a href=# class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='confirm($ddatagrid[id_admin])'></a>    
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
          text: 'Data Admin Berhasil Terhapus ',
          type: 'success',
          showConfirmButton: false,
        })
        setTimeout(function () {
          window.location.href = "?unit=admin_unit&act=delete&id_admin=" + id_user
        }, 1000);
      } else {
        Swal.fire({
          title: 'Dibatalkan',
          text: 'Batal Menghapus Data Admin',
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
        <li>Admin</li>
        <li>Tambah Data Admin</li>
      </ul><!-- /.breadcrumb -->
    </div>

    <div class="page-content">
      <div class="page-header">
        <h1>Tambah Data Admin</h1>
      </div>
      <div class="row">
        <div class="col-xs-12">

          <?php
            $mysqli= mysqli_connect("localhost","root","","thesisDB");
            $qupdate = "SELECT max(id_admin) as maxKode FROM t_admin";
            $rupdate = mysqli_query($mysqli, $qupdate);
            $dupdate = mysqli_fetch_assoc($rupdate);
            $kode_admin = $dupdate['maxKode'];
            $no_urut = $kode_admin + 1;
            $char = "ADM-G";
            $newID = $char.sprintf("%01s",$no_urut);
          ?>
          <form class="form-horizontal" method="post" action="?unit=admin_unit&act=inputact"
            enctype="multipart/form-data">
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="nama">Kode Admin</label>
              <div class="col-sm-9">
                <input class="col-xs-10 col-sm-5" type="text" name="kode_admin" id="kode_admin"
                  value="<?php echo "$newID"; ?>" readonly="" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="nama">Nama</label>
              <div class="col-sm-9">
                <input class="col-xs-10 col-sm-5" type="text" name="nama" id="nama" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="nama_pengguna">Nama Pengguna</label>
              <div class="col-sm-9">
                <input class="col-xs-10 col-sm-5" type="text" name="nama_pengguna" id="nama_pengguna" required />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="kata_sandi">Kata Sandi</label>
              <div class="col-sm-9">
                <input class="col-xs-10 col-sm-5" type="text" name="kata_sandi" id="kata_sandi" required />
              </div>
            </div>
            <div class="form-group">
              <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                  <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                  <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                  <button type="button" name="kembali" class="btn btn-info"
                    onclick="window.location='adminmainapp.php?unit=admin_unit&act=datagrid'">kembali</button>
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
<script src="../css/backend/js/jquery.validate.min.js"></script>
</body>
</html>
<?php
  break;
  
  case "inputact":
  $nama_pengguna = $_POST['nama_pengguna'];
  // $kata_sandi = md5($_POST['kata_sandi']);
  $kode_admin = $_POST['kode_admin'];
  $kata_sandi = $_POST['kata_sandi'];
  $nama = $_POST['nama'];
  $qinput = " INSERT INTO t_admin (kode_admin, nama, nama_pengguna,  kata_sandi)
              VALUES ('$kode_admin', '$nama_pengguna', '$kata_sandi', '$nama') ";
        
	$cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_admin WHERE nama_pengguna = '$nama_pengguna'"));
  mysqli_query($mysqli,$qinput); 
  echo "<script> 
  const inputOptions = new Promise((resolve) => {
    setTimeout(() => {
      document.location='adminmainapp.php?unit=admin_unit&act=datagrid';
    }, 1500)
  })
  swal.fire({
      type: 'success',
      title: 'Berhasil',
      text: 'Berhasil Menambah Data Admin',
      inputOptions: inputOptions,
      showConfirmButton: false,
    });
  </script>";
  exit();
  break;    
    
  case "update":
  $id_admin = $_GET['id_admin'];
  $qupdate = "SELECT * FROM t_admin WHERE id_admin = '$id_admin'";
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
        <li>Admin</li>
        <li>Ubah Data Admin</li>
      </ul><!-- /.breadcrumb -->
    </div>
    <div class="page-content">
      <div class="page-header">
        <h1>Ubah Data Admin</h1>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <form class="form-horizontal" method="post" action="?unit=admin_unit&act=updateact"
            enctype="multipart/form-data">
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="id_admin">Kode Admin</label>
              <div class="col-sm-9">
                <input class="col-xs-10 col-sm-5" type="text" name="kode_admin" id="kode_admin" readonly="readonly"
                  value="<?php echo $dupdate['kode_admin'] ?>" required />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="nama">Nama</label>
              <div class="col-sm-9">
                <input class="col-xs-10 col-sm-5" type="text" name="nama" id="nama"
                  value="<?php echo $dupdate['nama'] ?>" required />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="nama_pengguna">Nama Pengguna</label>
              <div class="col-sm-9">
                <input class="col-xs-10 col-sm-5" type="text" name="nama_pengguna" id="nama_pengguna"
                  value="<?php echo $dupdate['nama_pengguna'] ?>" required />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="kata_sandi">Kata Sandi</label>
              <div class="col-sm-9">
                <input class="col-xs-10 col-sm-5" type="text" name="kata_sandi" id="kata_sandi"
                  value="<?php echo $dupdate['kata_sandi'] ?>" required />
              </div>
            </div>
            <div class="clearfix form-actions">
              <div class="col-md-offset-3 col-md-9">
                <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                <button type="button" name="kembali" class="btn btn-info"
                  onclick="window.location='adminmainapp.php?unit=admin_unit&act=datagrid'">kembali</button>
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
<script src="../css/backend/js/jquery.validate.min.js"></script>
</body>
</html>

<?php
  break;
    
  case "updateact":
    $kode_admin = $_POST['kode_admin'];
    $nama = $_POST['nama'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $kata_sandi = $_POST['kata_sandi'];
    
    $qupdate = "";
    if($kata_sandi == "") {
        $qupdate = "UPDATE t_admin SET nama_pengguna = '$nama_pengguna', nama = '$nama', kode_admin = '$kode_admin'       
                    WHERE kode_admin = '$kode_admin' ";            
    }
    else {
        $qupdate = "UPDATE t_admin SET nama_pengguna = '$nama_pengguna', nama = '$nama', kata_sandi = '$kata_sandi'       
                    WHERE kode_admin = '$kode_admin'";                        
    }
    if($qupdate)
    {
        $rupdate = mysqli_query($mysqli,$qupdate);
        echo "<script>
        swal({
            title:'Berhasil',
            text: 'Data Berhasil Diubah',
            type: 'success',
            
        }).then(function() {
            document.location = '?unit=admin_unit&act=datagrid';
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
    $id_admin = $_GET['id_admin'];
    $qdelete = " DELETE  FROM t_admin WHERE id_admin = '$id_admin' ";
    $rdelete = mysqli_query($mysqli,$qdelete);
    header("location:?unit=admin_unit&act=datagrid");       
  break;

  case "aktif":
    $id_admin = $_GET['id_admin'];
    $blokir = $_POST['blokir'];
    $qupdate = " UPDATE t_admin SET blokir = 'N', batas_login = '0'  WHERE id_admin = '$id_admin' ";
    $rupdate = mysqli_query($mysqli,$qupdate);
    header("location:?unit=admin_unit&act=datagrid");
  break;

  case "blokir":
    $id_admin = $_GET['id_admin'];
    $blokir = $_POST['blokir'];
    $qupdate = " UPDATE t_admin SET blokir = 'Y'  WHERE id_admin = '$id_admin'  ";
    $rupdate = mysqli_query($mysqli,$qupdate);
    header("location:?unit=admin_unit&act=datagrid");
  break;
}