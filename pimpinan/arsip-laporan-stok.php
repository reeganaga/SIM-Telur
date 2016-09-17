<?php
extract($_GET);
include"formatdate.php";

if($tgl=="all" && $id=='')
{
   $server = "localhost";
   $user    = "root";
   $pass   = "";
   $db     = "inv";
 
   $database = new mysqli($server, $user, $pass, $db);
include "../excel/Classes/PHPExcel.php";

date_default_timezone_set("Asia/Jakarta");

$excelku=new PHPExcel();

//Set Properties
$excelku->getProperties()->setCreator("Laporan")->setLastModifiedBy("Laporan");

//Set lebar kolom
$excelku->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$excelku->getActiveSheet()->getColumnDimension('B')->setWidth(15);


// Mergecell, menyatukan beberapa kolom
$excelku->getActiveSheet()->mergeCells('A1:C1');





// Buat Kolom judul tabel
$SI = $excelku->setActiveSheetIndex(0);
$SI->setCellValue('A1', 'Laporan Stok'); //Judul laporan
$SI->setCellValue('A2', 'No'); //Judul laporan
$SI->setCellValue('B2', 'Jumlah Stok'); //field


//Mengeset Syle nya
$headerStylenya = new PHPExcel_Style();
$bodyStylenya   = new PHPExcel_Style();

$headerStylenya->applyFromArray(
    array('fill'    => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID,
          'color'   => array('argb' => 'FFFFFFFF')),
          'borders' => array('bottom'=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        'right'     => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        'left'      => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        'top'       => array('style' => PHPExcel_Style_Border::BORDER_THIN)            
          )
    ));
    
$bodyStylenya->applyFromArray(
    array('fill'    => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID,
          'color'   => array('argb' => 'FFFFFFFF')),
          'borders' => array(
                        'bottom'    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        'right'     => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        'left'      => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        'top'       => array('style' => PHPExcel_Style_Border::BORDER_THIN)
          )
    ));

//Menggunakan HeaderStylenya
$excelku->getActiveSheet()->setSharedStyle($headerStylenya, "A2:B2");

// Mengambil data dari tabel
$strsql = "select ((select sum(jml_terima) from produksi) - (select sum(jml_penjualan) from penjualan)) as Persediaan";
$res    = $database->query($strsql);
$baris  = 3; //Ini untuk dimulai baris datanya, karena di baris 9 itu digunakan untuk header tabel
$no     = 1;

while ($row = $res->fetch_assoc()) {
  $SI->setCellValue("A".$baris,$no++); //mengisi data untuk nomor urut
  $SI->setCellValue("B".$baris,$row['Persediaan']); //mengisi data untuk alamat
  $baris++; //looping untuk barisnya
}
//Membuat garis di body tabel (isi data)
$excelku->getActiveSheet()->setSharedStyle($bodyStylenya, "A3:B$baris");

//Memberi nama sheet
$excelku->getActiveSheet()->setTitle('Data Stok');

$excelku->setActiveSheetIndex(0);

// untuk excel 2007 atau yang berekstensi .xlsx
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename=Data Stok.xlsx');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($excelku, 'Excel2007');
$objWriter->save('php://output');
exit;


}
else
{
   
$server = "localhost";
   $user    = "root";
   $pass   = "";
   $db     = "inv";
 
   $database = new mysqli($server, $user, $pass, $db);
  include "../excel/Classes/PHPExcel.php";

date_default_timezone_set("Asia/Jakarta");

$excelku=new PHPExcel();

//Set Properties
$excelku->getProperties()->setCreator("Laporan")->setLastModifiedBy("Laporan");

//Set lebar kolom
$excelku->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$excelku->getActiveSheet()->getColumnDimension('B')->setWidth(15);

// Mergecell, menyatukan beberapa kolom
$excelku->getActiveSheet()->mergeCells('A1:B1');




// Buat Kolom judul tabel
$SI = $excelku->setActiveSheetIndex(0);
$SI->setCellValue('A1', 'Laporan Stok '.(BulanIndo($tgl))); //Judul laporan
$SI->setCellValue('A2', 'No'); //Judul laporan
$SI->setCellValue('B2', 'Jumlah Stok'); //field


//Mengeset Syle nya
$headerStylenya = new PHPExcel_Style();
$bodyStylenya   = new PHPExcel_Style();

$headerStylenya->applyFromArray(
    array('fill'    => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID,
          'color'   => array('argb' => 'FFFFFFFF')),
          'borders' => array('bottom'=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        'right'     => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        'left'      => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        'top'       => array('style' => PHPExcel_Style_Border::BORDER_THIN)            
          )
    ));
    
$bodyStylenya->applyFromArray(
    array('fill'    => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID,
          'color'   => array('argb' => 'FFFFFFFF')),
          'borders' => array(
                        'bottom'    => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        'right'     => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        'left'      => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        'top'       => array('style' => PHPExcel_Style_Border::BORDER_THIN)
          )
    ));

//Menggunakan HeaderStylenya
$excelku->getActiveSheet()->setSharedStyle($headerStylenya, "A2:B2");

// Mengambil data dari tabel
$strsql = "select ((select sum(jml_terima) from produksi) - (select sum(jml_penjualan) from penjualan)) as Persediaan ";
$res    = $database->query($strsql);
$baris  = 3; //Ini untuk dimulai baris datanya, karena di baris 9 itu digunakan untuk header tabel
$no     = 1;

while ($row = $res->fetch_assoc()) {
  $SI->setCellValue("A".$baris,$no++); //mengisi data untuk nomor urut
  $SI->setCellValue("B".$baris,$row['Persediaan']); //mengisi data untuk alamat
  $baris++; //looping untuk barisnya
}
//Membuat garis di body tabel (isi data)
$excelku->getActiveSheet()->setSharedStyle($bodyStylenya, "A3:B$baris");

//Memberi nama sheet
$excelku->getActiveSheet()->setTitle('Data Stok');

$excelku->setActiveSheetIndex(0);

// untuk excel 2007 atau yang berekstensi .xlsx
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Data Stok '.$tgl.'.xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($excelku, 'Excel2007');
$objWriter->save('php://output');
exit;   

}

?>
