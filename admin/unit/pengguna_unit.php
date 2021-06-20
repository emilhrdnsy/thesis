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
              <li>Pengguna</li>
							<li>Data Pengguna</li>
						</ul><!-- /.breadcrumb -->
					</div>
					<div class="page-content">
						<div class="page-header"> 
              <h1>Data Pengguna
              </h1>
            </div>
                <h1>
                <a href="?unit=pengguna_unit&act=input">
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
                          $qdatagrid =" SELECT * FROM t_user";
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
                                      <a href=?unit=pengguna_unit&act=update&id_login=$ddatagrid[id_login] class='btn btn-sm btn-warning glyphicon glyphicon-pencil' ></a> 
                                      <a href=# class='btn btn-sm btn-danger glyphicon glyphicon-trash' onclick='confirm($ddatagrid[id_login])'></a>  
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

        function confirm(id_user) {
          swal.fire({
            title: 'Are you sure?',
            text: "You will not be able to recover this imaginary file!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: "Batal",
          }).then(function (result) {
            if (result.value) {  
            Swal.fire({
              title:'Berhasil',
              text: 'Data Data Pengguna Berhasil Terhapus',
              type: 'success',
              showConfirmButton  : false ,
              })
              setTimeout(function()  {
                window.location.href = "?unit=pengguna_unit&act=delete&id_login=" + id_user
              }, 1000);  
              } else {               
              Swal.fire({
                title: 'Dibatalkan',
                text: 'Batal Menghapus Data Pengguna',
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
              <li>Pengguna</li>
							<li>Tambah Data Pengguna</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Tambah Data Pengguna</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
<form class="form-horizontal" method="post" action="?unit=pengguna_unit&act=inputact" enctype="multipart/form-data" >
                  
                                                                             
              <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="nama">Nama</label>
                        <div class="col-sm-9">
                        <input class="col-xs-10 col-sm-5" type="text" name="nama" id="nama" required    />
                        </div>
                       </div>
					    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="nama_pengguna">Nama Pengguna</label>
                        <div class="col-sm-9">
                        <input class="col-xs-10 col-sm-5" type="text" name="nama_pengguna" id="nama_pengguna" required    />
                        </div>
                       </div>
					    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="kata_sandi">Kata Sandi</label>
                        <div class="col-sm-9">
                        <input class="col-xs-10 col-sm-5" type="text" name="kata_sandi" id="kata_sandi" required    />
                        </div>
                       </div>
					   <div class="form-group">
		
                       </div>
					    <div class="form-group">
                      <div class="col-sm-9">
                       
                  <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                  <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=pengguna_unit&act=datagrid'">kembali</button>
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
          $nama = $_POST['nama'];
          // $kata_sandi = md5($_POST['kata_sandi']);
          $kata_sandi = $_POST['kata_sandi'];
          $qinput = "
          INSERT INTO t_user
            (
              nama_pengguna,
              nama,
              kata_sandi
            )
          VALUES
            (
              '$nama_pengguna',
              '$nama',
              '$kata_sandi'
            )
        ";
        
         $cek = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM t_user WHERE nama_pengguna = '$nama_pengguna'"));
        
        
          mysqli_query($mysqli,$qinput);
          echo "<script> 
          const inputOptions = new Promise((resolve) => {
            setTimeout(() => {
              document.location='adminmainapp.php?unit=pengguna_unit&act=datagrid';
            }, 1500)
          })
          swal.fire({
              type: 'success',
              title: 'Berhasil',
              text: 'Berhasil Menambah Data Pengguna',
              inputOptions: inputOptions,
              showConfirmButton: false,
            });
            
              </script>";
         
          exit();
         
        break;    
    
        case "update":
          $id_login = $_GET['id_login'];
          $qupdate = "SELECT * FROM  t_user WHERE id_login = '$id_login'";
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
              <li>Pengguna</li>
							<li>Edit Data Pengguna</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header"><h1>Edit Data Pengguna</h1></div>
						<div class="row">
							<div class="col-xs-12">
                                                            
<form class="form-horizontal" method="post" action="?unit=pengguna_unit&act=updateact" enctype="multipart/form-data" >
                   <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="id_login">ID Pengguna</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="id_login" id="id_login" readonly="readonly" value="<?php echo $dupdate['id_login'] ?>"  required    />
                       </div>
                       </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="nama">Nama</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="nama" id="nama" value="<?php echo $dupdate['nama'] ?>"  required    />
                       </div>
                       </div>
					   
					    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="nama_pengguna">Nama Pengguna</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="nama_pengguna" id="nama_pengguna" value="<?php echo $dupdate['nama_pengguna'] ?>" required    />
                       </div>
                       </div>
					    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right"for="kata_sandi">Kata Sandi</label>
                      <div class="col-sm-9">
                       <input class="col-xs-10 col-sm-5" type="text" name="kata_sandi" id="kata_sandi" value="<?php echo $dupdate['kata_sandi'] ?>"  required    />
                       </div>
                       </div>
					  
					   
					  
                    
                 <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Batal</button>
                  <button type="button" name="kembali" class="btn btn-info" onclick="window.location='adminmainapp.php?unit=pengguna_unit&act=datagrid'">kembali</button>
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
        $id_login = $_POST['id_login'];
        $nama_pengguna = $_POST['nama_pengguna'];
        $nama = $_POST['nama'];
        // $kata_sandi = md5($_POST['kata_sandi']);
        $kata_sandi = $_POST['kata_sandi'];
        
        $qupdate = "";
        if($kata_sandi == "") {
            $qupdate = "
              UPDATE t_user SET
                nama_pengguna = '$nama_pengguna',
                nama = '$nama'       
              WHERE
                id_login = '$id_login'
            ";            
        }
        else {
            $qupdate = "
              UPDATE t_user SET
                nama_pengguna = '$nama_pengguna',
                 nama = '$nama',
                kata_sandi = '$kata_sandi'       
              WHERE
                id_login = '$id_login'
            ";                        
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
                document.location = '?unit=pengguna_unit&act=datagrid';
                exit;
            });
            </script>";
        }
        else
        {
            echo mysqli_error();
        }  

        //echo $qupdate . '<br />';
        // header("location:?unit=pengguna_unit&act=datagrid");      
        break;  
    
        case "delete":
        $id_login = $_GET['id_login'];
        $qdelete = "
          DELETE  FROM t_user
       
          WHERE
            id_login = '$id_login'
        ";
        $rdelete = mysqli_query($mysqli,$qdelete);
        header("location:?unit=pengguna_unit&act=datagrid");
            break;

case "aktif":
      $id_login = $_GET['id_login'];
                $blokir = $_POST['blokir'];
        $qupdate = "
          UPDATE t_user SET
            blokir = 'N',
            bataslogin = '0' 
     
          WHERE
            id_login = '$id_login' 
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=pengguna_unit&act=datagrid");


        break;
    case "blokir":
      $id_login = $_GET['id_login'];
                $blokir = $_POST['blokir'];
        $qupdate = "
          UPDATE t_user SET
            blokir = 'Y' 
     
          WHERE
            id_login = '$id_login' 
        ";
        $rupdate = mysqli_query($mysqli,$qupdate);
        header("location:?unit=pengguna_unit&act=datagrid");


        break;
}