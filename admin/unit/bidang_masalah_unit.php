<?php
session_start();
require_once '../lib/koneksi.php';

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
                    <a href="adminmainapp.php?unit=dashboard">Dashboard</a>
                </li>
                <li>Data Master</li>
                <li>Data Bidang Masalah</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>Data Bidang Masalah
                </h1>
            </div>
            <h1>
                <a href="?unit=bidang_masalah_unit&act=input">
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
                                            <th style="text-align: center; width: 6%">No.</th>
                                            <th style="text-align: center; width: 10%">Kode Bidang Masalah</th>
                                            <th style="text-align: center; width: 20%">Nama Bidang Masalah</th>
                                            <th style="text-align: center; width: 34%">Detail</th>
                                            <th style="text-align: center; width: 15%">Layanan</th>

                                            <th style="text-align: center; width: 15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; 
                                    $qdatagrid =" SELECT * FROM t_bidang_masalah ";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {   
										
                                        echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:center>$ddatagrid[kode_bidang_masalah]</td>
                                             <td style= text-align:left>$ddatagrid[nama_bidang_masalah]</td>
                                             <td style= text-align:justify>$ddatagrid[detail_bidang_masalah]</td>
                                             <td style= text-align:justify>$ddatagrid[layanan]</td>
                                             <td style=text-align:center>
                                                 <a href=?unit=bidang_masalah_unit&act=update&kode_bidang_masalah=$ddatagrid[kode_bidang_masalah] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                                 <a href=?unit=bidang_masalah_unit&act=delete&kode_bidang_masalah=$ddatagrid[kode_bidang_masalah] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'></a>    
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
                <li>Data Master</li>
                <li>Tambah Data Bidang Masalah</li>
            </ul><!-- /.breadcrumb -->
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>Tambah Data Bidang Masalah</h1>
            </div>
            <div class="row">
                <div class="col-xs-12">

                    <?php
				$mysqli= mysqli_connect("localhost","root","","thesisDB");
                $qupdate = "SELECT max(id_bidang_masalah) as maxKode FROM t_bidang_masalah";
                $rupdate = mysqli_query($mysqli, $qupdate);
                $dupdate = mysqli_fetch_assoc($rupdate);
                $id_bidang_masalah = $dupdate['maxKode'];
                $no_urut = $id_bidang_masalah + 1;
                $char = "BM";
                $newID = $char.sprintf("%01s",$no_urut);

                    ?>

                    <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post"
                        action="?unit=bidang_masalah_unit&act=inputact" enctype="multipart/form-data">


                        <div class="form-group">
                          <label class="col-sm-3 control-label">Kode Bidang Masalah :</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="kode_bidang_masalah" id="kode_bidang_masalah" required="required" autofocus="autofocus" value="<?php echo "$newID"; ?>" readonly=""/>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nama Bidang Masalah :</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="nama_bidang_masalah" id="nama_bidang_masalah" required="required" autofocus="autofocus" />
                            </div>
                        </div>
							   
					   
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Detail :</label>	
                            <div class="col-sm-7">
                                <textarea class="form-control limited" name="detail_bidang_masalah" id="detail_bidang_masalah"> </textarea>	
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="layanan">Layanan :</label>
                            <div class="col-sm-9">
                                <select class="form-select col-xs-10 col-sm-5 " name="layanan" id="layanan"
                                aria-label="Default select example" required>
                                    <option value="">--Pilih Layanan--</option>
                                    <option value="Layanan Pembelajaran" >Layanan Pembelajaran</option>
                                    <option value="Layanan Konseling Perorangan" >Layanan Konseling Perorangan</option>
                                    

                                </select>
                            </div>
                        </div>

                        
                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                                <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                                <button type="button" name="kembali" class="btn btn-info"
                                    onclick="window.location='adminmainapp.php?unit=bidang_masalah_unit&act=datagrid'">kembali</button>
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
    var frmvalidator = new Validator("tambah_kat");
    frmvalidator.addValidation("nama_bidang_masalah", "req", "Silakan Masukkan Nama Bidang Masalah");
    frmvalidator.addValidation("nama_bidang_masalah", "maxlen=50", "Maksimal Karakter Nama 50 digit");
    frmvalidator.addValidation("nama_bidang_masalah", "alpha_s", "Nama Bidang Masalah Terdiri dari huruf Saja");
    frmvalidator.addValidation("nama_bidang_masalah", "simbol", "Nama Bidang Masalah Terdiri dari huruf Saja");
</script>
</body>

</html>
<?php
        break;
    
        case "inputact":
      
            $kode_bidang_masalah = $_POST['kode_bidang_masalah'];
            $nama_bidang_masalah = $_POST['nama_bidang_masalah'];
            $detail_bidang_masalah = $_POST['detail_bidang_masalah'];
            $layanan = $_POST['layanan'];
            
            $qinput = "
                INSERT INTO t_bidang_masalah
                (kode_bidang_masalah, nama_bidang_masalah, detail_bidang_masalah, layanan)
                VALUES
                ('$kode_bidang_masalah', '$nama_bidang_masalah', '$detail_bidang_masalah', '$layanan')
            ";

        $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_bidang_masalah WHERE nama_bidang_masalah = '$nama_bidang_masalah'"));
        
        if ($cek > 0) {
          echo "<script> alert('Nama Bidang Masalah Sudah Ada');
              document.location='adminmainapp.php?unit=bidang_masalah_unit&act=input';
              </script>";
          } else {
          mysqli_query($mysqli,$qinput);
          echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=bidang_masalah_unit&act=datagrid';
              </script>";
          exit();
         }
        break;
    
        case "update":
        $kode_bidang_masalah = $_GET['kode_bidang_masalah'];
        $qupdate = "SELECT * FROM t_bidang_masalah WHERE kode_bidang_masalah = '$kode_bidang_masalah'";
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
                <li>Data Master</li>
                <li>Edit Data Bidang Masalah</li>
            </ul><!-- /.breadcrumb -->
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>Edit Data Bidang Masalah</h1>
            </div>
            <div class="row">
                <div class="col-xs-12">

                    <form class="form-horizontal" id="tambah_kat" name="tambah_kat" method="post"
                        action="adminmainapp.php?unit=bidang_masalah_unit&act=updateact">

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right">Kode Bidang Masalah</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="kode_bidang_masalah" id="kode_bidang_masalah"
                                    required="required" value="<?php echo $dupdate['kode_bidang_masalah'] ?>"
                                    readonly="readonly" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right">Nama Bidang Masalah: </label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="nama_bidang_masalah" id="nama_bidang_masalah"
                                    required="required" value="<?php echo $dupdate['nama_bidang_masalah'] ?>"
                                    autofocus="autofocus" />
                            </div>
                        </div>
                       

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="detail_bidang_masalah">Detail :</label>	
                            <div class="col-sm-9">
                                <textarea class="form-control limited" name="detail_bidang_masalah" id="detail_bidang_masalah" 
                                required="required"  autofocus="autofocus"><?php echo $dupdate['detail_bidang_masalah'] ?>  
                                </textarea>	
                            </div>
                        </div>   

                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="layanan">Layanan :</label>
                            <div class="col-sm-9">
                                <!-- <input class="col-xs-10 col-sm-5" type="text" name="usia" id="usia" required    /> -->
                                <select class="form-select col-xs-10 col-sm-5 " name="layanan" id="layanan"
                                aria-label="Default select example">
                                    <option value="">--Pilih Layanan--</option>
                                    <option value="Layanan Pembelajaran">Layanan Pembelajaran</option>
                                    <option value="Layanan Konseling Perorangan">Layanan Konseling Perorangan</option>
                                </select>
                            </div>
                        </div>


                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                                <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                                <button type="button" name="kembali" class="btn btn-info"
                                    onclick="window.location='adminmainapp.php?unit=bidang_masalah_unit&act=datagrid'">kembali</button>
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
    var frmvalidator = new Validator("tambah_kat");
    frmvalidator.addValidation("nama_bidang_masalah", "req", "Silakan Masukkan Nama Bidang Masalah");
    frmvalidator.addValidation("nama_bidang_masalah", "maxlen=35", "Maksimal Karakter Nama 35 digit");
    frmvalidator.addValidation("nama_bidang_masalah", "alpha_s", "Hanya Huruf Saja");
    frmvalidator.addValidation("nama_bidang_masalah", "simbol", "Hanya Huruf Saja");
</script>
</body>

</html>
<?php
        break;
    
            case "updateact":
            $kode_bidang_masalah = $_POST['kode_bidang_masalah'];
            $nama_bidang_masalah = $_POST['nama_bidang_masalah'];
            $detail_bidang_masalah = $_POST['detail_bidang_masalah'];
            $layanan = $_POST['layanan'];
            $qupdate = "
            UPDATE t_bidang_masalah SET
                nama_bidang_masalah = '$nama_bidang_masalah',
                detail_bidang_masalah = '$detail_bidang_masalah',
                layanan = '$layanan'
                WHERE
                kode_bidang_masalah = '$kode_bidang_masalah'
            ";
            $rupdate = mysqli_query($mysqli,$qupdate);
            header("location:?unit=bidang_masalah_unit&act=datagrid");
                    break;
    
        case "delete":
              $kode_bidang_masalah = $_GET['kode_bidang_masalah'];
        $qdelete = "
          DELETE  FROM t_bidang_masalah       
          WHERE
          kode_bidang_masalah = '$kode_bidang_masalah'
        ";

        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=bidang_masalah_unit&act=datagrid");
        break;
}