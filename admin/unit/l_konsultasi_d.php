<?php
  //Mengaktifkan output buffering

  include "../lib/koneksi.php";
	require_once __DIR__ . '/../../vendor/autoload.php';
	$mpdf = new \Mpdf\Mpdf();

	$kd_hasil = $_GET['kode_hasil'];
  $qupdate = "SELECT t_hasil.kode_hasil, t_hasil.tanggal, t_hasil.nilai_cf, t_hasil.hasil_id,
            t_bidang_masalah.kode_bidang_masalah, t_bidang_masalah.nama_bidang_masalah, t_bidang_masalah.layanan,
            t_siswa.kode_siswa, t_siswa.nama_siswa, t_siswa.kelas, t_siswa.jenis_kelamin
            FROM t_hasil 
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
	$sqlhasil = " SELECT t_hasil.kode_hasil, t_hasil.tanggal, t_hasil.nilai_cf, t_hasil.hasil_id,
								t_hasil.bidang_masalah, t_hasil.item_masalah,
								t_bidang_masalah.kode_bidang_masalah, t_bidang_masalah.nama_bidang_masalah, 
								t_bidang_masalah.layanan,	t_siswa.kode_siswa, t_siswa.nama_siswa
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
	
	
	$html = '
	<h4 align="center">DATA HASIL KONSULTASI</h4>
	<br>
	<table border="0" style="font-size: 16px; border-collapse: collapse; width: 100%;">
	<tr>
		<td style="font-size: 14px; width: 92%;"> Kode : '. ucwords($dupdate["kode_siswa"]) .'</td>
	</tr>
	<tr>
		<td style="font-size: 14px; width: 92%;"> Nama : '. $dupdate["nama_siswa"] .'</td>
	</tr>
	</table>

	<br>
	<h5>Item Masalah Yang Dipilih :</h5>
	<table border="1" style="font-size:12px; border-collapse:collapse; width:100%; ">
	<thead>
	<tr>
		<td style="background-color:silver;" align="center">No</td>
		<td style="background-color:silver;" align="center">Kode Item Masalah</td>
		<td style="background-color:silver;" align="center">Nama Item Masalah</td>
		<td style="background-color:silver;" align="center">Kondisi</td>
	</tr>
	</thead>';
	
	$ig = 0;
	foreach ($ar_item_masalah as $key => $value) {
		$kondisi = $value;
		$ig++;
		$ar_item_masalah = $key;
		$qdatagrid =" SELECT * FROM t_item_masalah where kode_item_masalah = '$key'";
		$rdatagrid = mysqli_query($mysqli, $qdatagrid);
		$ddatagrid = mysqli_fetch_array($rdatagrid);

		$html .= '
		<tr>
			<td style="width:7%;  font-size:12px;" align="center"> '. $ig .' </td>;
			<td style="width:15%; font-size:12px;" align="center"> '. $ddatagrid[kode_item_masalah] .' </td>;
			<td style="width:70%; font-size:12px; padding:5px;" align="justify"> '. $ddatagrid[nama_item_masalah].' </td>;
			<td style="width:10%; font-size:12px;" align="center"><span class="kondisipilih">'. $arkondisitext[$kondisi] . '</span></td>;
		</tr>';
	}
	
	
	$html .= '
	</table>

	<h5>Hasil konsultasi :</h5>
	<table border="1" style="font-size: 12px; border-collapse:collapse; width: 100%;">
	<thead>
		<tr>
			<td style="background-color: silver;" align="center"> No </td>
			<td style="background-color: silver;" align="center"> Kode Bidang Masalah </td>
			<td style="background-color: silver;" align="center"> Nama Bidang Masalah </td>
			<td style="background-color: silver;" align="center"> Nilai cf </td>
			<td style="background-color: silver;" align="center"> Persen </td>
		</tr>
	</thead>';

	$np = 0;
	foreach ($arbidangmasalah as $key => $value) {
		$np++;
		$idpkt[$np] = $key;
		$nmpkt[$np] = $arpkt[$key];
		$vlpkt[$np] = $value;
		$qdatagrid =" SELECT * FROM t_bidang_masalah where kode_bidang_masalah = '$key'";
		$rdatagrid = mysqli_query($mysqli, $qdatagrid);
		$ddatagrid=mysqli_fetch_array($rdatagrid);
		
		for ($ipl = 1; $ipl < count($idpkt); $ipl++);
		$html .= '
			<tr>
				<td style="width:5%; font-size: 12px;" align="center"> '. $np .'</td>
				<td style="width:20%; font-size: 12px;" align="center"> '. $ddatagrid["kode_bidang_masalah"] .'&nbsp;</td>
				<td style="width:20%; font-size: 12px; padding:5px;"> '. $ddatagrid["nama_bidang_masalah"] .'</td>
				<td style="width:10%; font-size: 12px;" align="center"> '. $vlpkt[$ipl] .'</td>
				<td style="width:auto; font-size: 12px;" align="center"> '. round($vlpkt[$ipl], 2) * 100 .'%</td>
			</tr>';
		} 
			
	$html .= '
	</table>
	<br>
	<h5>Hasil Diagnosa :</h5>		
		<table border="0" style="width: 100%;">
			<tr>
				<td style="font-size: 12px; width: 90%;">Hasil Dari Diagnosa Masalah Yang Paling Mungkin adalah :
					<b>'. $dupdate["nama_bidang_masalah"] .'</b>
				</td>
			</tr>
			<tr>
				<td style="font-size: 12px; width: 92%;">Layanan : <b>'. $dupdate["layanan"] .'</b></td>
			</tr>
		</table>
	</table>';
	$mpdf->AddPage("P","","","","","20","20","20","20","","","","","","","","","","","","A4");
	$mpdf->WriteHTML($html);
	ob_clean();
	//Membuat output file
	$mpdf->Output('daftar-konsultasi.pdf', \Mpdf\Output\Destination::INLINE);