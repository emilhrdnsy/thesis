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
                <li>Data Master</li>
		<li>Data Item Masalah</li>
            </ul><!-- /.breadcrumb -->
	</div>
        <div class="page-content">
            <div class="page-header">
                <h1>Data Item Masalah 
                </h1>
            </div>
                <h1>
                    <a href="?unit=gejala_unit&act=input">
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
                                        <th style="text-align: center; width: 15%">Kode Item Masalah</th>
                                        <th style="text-align: center; width: 60%">Nama Item Masalah</th>
                                        <th style="text-align: center; width: 18%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
                                    $qdatagrid =" SELECT * FROM t_item_masalah ";
                                    $rdatagrid = mysqli_query($mysqli, $qdatagrid);
                                    while($ddatagrid=mysqli_fetch_assoc($rdatagrid)) {
                                        echo "
                                        <tr>
                                             <td style= text-align:center>$no</td>
                                             <td style= text-align:center >$ddatagrid[kode_item_masalah]</td>
                                             <td style= text-align:left >$ddatagrid[nama_item_masalah]</td>
                                             <td style=text-align:center>
                                                 <a href=?unit=gejala_unit&act=update&kode_item_masalah=$ddatagrid[kode_item_masalah] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                                 <a href=?unit=gejala_unit&act=delete&kode_item_masalah=$ddatagrid[kode_item_masalah] class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='return confirm(\"Yakin Akan Menghapus Data?\")'></a>    
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
                            <li>Data Master</li>
							<li>Tambah Data Item Masalah</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Tambah Data Item Masalah</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 <?php
				$mysqli= mysqli_connect("localhost","root","","thesisDB");
                $qupdate = "SELECT max(id_item_masalah) as maxKode FROM t_item_masalah";

                $rupdate = mysqli_query($mysqli, $qupdate);
                $dupdate = mysqli_fetch_assoc($rupdate);
                $kode_item_masalah = $dupdate['maxKode'];
                $no_urut = $kode_item_masalah + 1;
                $char = "IM";
                $newID = $char.sprintf("%01s",$no_urut);
                    ?>
                                  
                  <form class="form-horizontal" id="tambah_brand" name="tambah_brand" method="post" action="?unit=gejala_unit&act=inputact" enctype="multipart/form-data"  >                         
						<div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Kode Item Masalah</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="kode_item_masalah" id="kode_item_masalah" required="required" value="<?php echo "$newID"; ?>" readonly="" />
                            </div>
                       </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Nama Item Masalah</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="nama_item_masalah" id="nama_item_masalah" required="required" autofocus="autofocus" />
                            </div>
                       </div>                   
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=gejala_unit&act=datagrid'">kembali</button>
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
    
        case "inputact":
			 $kode_item_masalah = $_POST['kode_item_masalah'];
             $nama_item_masalah = $_POST['nama_item_masalah'];
             $qinput = "
          INSERT INTO t_item_masalah
          (kode_item_masalah, nama_item_masalah)
          VALUES
          ('$kode_item_masalah', '$nama_item_masalah')
        ";
       
         $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_item_masalah WHERE nama_item_masalah = '$nama_item_masalah'"));
        
        if ($cek > 0) {
          echo "<script> alert('Data Item Masalah Sudah Ada');
              document.location='adminmainapp.php?unit=gejala_unit&act=input';
              </script>";
          } else {
          mysqli_query($mysqli,$qinput);
          echo "<script> alert('Data Tersimpan');
              document.location='adminmainapp.php?unit=gejala_unit&act=datagrid';
              </script>";
          exit();
         }
        break;
    
        case "update":
        $kode_item_masalah = $_GET['kode_item_masalah'];
        $qupdate = "SELECT * FROM t_item_masalah WHERE kode_item_masalah = '$kode_item_masalah'";
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
							<li>Edit Data Item Masalah</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Data Item Masalah</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
                 <form class="form-horizontal" id="tambah_brand" nama="tambah_brand"  method="post" action="adminmainapp.php?unit=gejala_unit&act=updateact" enctype="multipart/form-data"  >    
                      
                       
						<div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Kode Item Masalah</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-5" type="text" name="kode_item_masalah" id="kode_item_masalah" required="required" value="<?php echo $dupdate['kode_item_masalah'] ?>"  readonly="" />
                            </div>
                       </div>
                      <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right">Nama Item Masalah</label>
                            <div class="col-sm-9">
                                <input class="col-xs-10 col-sm-10" type="text" name="nama_item_masalah" id="nama_item_masalah" required="required" value="<?php echo $dupdate['nama_item_masalah'] ?>" autofocus="autofocus" />
                            </div>
                       </div>
					   
                     
                      <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                        <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=gejala_unit&act=datagrid'">kembali</button>
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
 var frmvalidator = new Validator("tambah_brand");
 frmvalidator.addValidation("nm_gejala","req","Silakan Masukkan Nama Kategori");
 frmvalidator.addValidation("nm_gejala","maxlen=35","Maksimal Karakter Nama 35 digit");
 frmvalidator.addValidation("nm_gejala","alpha_s","Hanya Huruf Saja");
 frmvalidator.addValidation("nm_gejala","simbol","Hanya Huruf Saja");
</script>
	</body>
</html>
 <?php
        break;
    
            case "updateact":
                $kode_item_masalah = $_POST['kode_item_masalah'];
                $nama_item_masalah = $_POST['nama_item_masalah'];
        $qupdate = "
          UPDATE t_item_masalah SET
          nama_item_masalah = '$nama_item_masalah'
          WHERE
          kode_item_masalah = '$kode_item_masalah'
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=gejala_unit&act=datagrid");
                 break;
    
        case "delete":
              $kode_item_masalah = $_GET['kode_item_masalah'];
        $qdelete = "
          DELETE  FROM t_item_masalah
       
          WHERE
            kode_item_masalah = '$kode_item_masalah'
        ";

        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=gejala_unit&act=datagrid");
        break;
}