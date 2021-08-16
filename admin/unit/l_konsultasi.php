<?php
  //Mengaktifkan output buffering
  ob_start();
  include "../../lib/koneksi.php";
  $hasil_konsultasi = mysqli_query($mysqli, "select * from hasil");
?>

<!DOCTYPE html>
<html>
<head>
	<title>HASIL KONSULTASI</title>
	<style type="text/css">
		td{
			padding: 3px 3px;
		}
	</style>
</head>
<body>
<h3 align="center">Data Konsultasi Siswa</h3>
<table style="border-collapse:collapse;border-spacing:0;" align="center" border="1">
	<thead>
		<tr>
      <th style="text-align: center; width: 7%">No.</th>
      <th style="text-align: center; width: 15%">Kode Item Masalah</th>
      <th style="text-align: center; width: 60%">Nama Item Masalah</th>
      <th style="text-align: center; width: 18%">Nilai CF (Kondisi)</th>
		</tr>
	</thead>
	<tbody>';
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
	</tbody>
</table>
</body>
</html>


<?php 
	//Meload library mPDF
	require_once __DIR__ . '/../../vendor/autoload.php';

	//Membuat inisialisasi objek mPDF
	$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4','margin_top' => 25, 'margin_bottom' => 25, 'margin_left' => 25, 'margin_right' => 25]);

	//Memasukkan output yang diambil dari output buffering ke variabel html
	$html = ob_get_contents();

	//Menghapus isi output buffering
	ob_end_clean();

	$mpdf->WriteHTML(utf8_encode($html));

	//Membuat output file
	$content = $mpdf->Output("CETAK.pdf", "D");

?>
	<?php  
		require_once __DIR__ . '/../../vendor/autoload.php';
		$mpdf = new \Mpdf\Mpdf();
		$mpdf->AddPage("L","","","","","15","15","15","15","","","","","","","","","","","","A4");
		$mpdf->WriteHTML($content);
		ob_clean();
		$mpdf->Output('daftar-konsultasi.pdf', \Mpdf\Output\Destination::INLINE);
	?>
