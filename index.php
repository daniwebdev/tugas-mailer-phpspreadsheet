<?php
/* 
| Author    : Muhamad Yusup Hamdani
| Mail      : me@dani.work
| 
| Collage   : STIKOM BINANIAGA
| NPM       : 14177063
|
| Filename  : index.php
| 
*/

require './lib/PHPEmail.php';
require './lib/PHPExcel.php';
require './config.php';
require './src/Siswa.php';

$siswa      = new Siswa();
$excel      = new PHPExcel();

$data       = [];
$header     = ['No', 'NIS', 'NAMA', 'ALAMAT'];   //Row Paling atas pasa file excel

$no         = 1;
foreach($siswa->get() as $item) {
    $data[]     = [$no, $item->nis, $item->nama, $item->alamat];      // total data harus sama dengan total pada header contoh disini 2 data
    $no++;
}


$excel->filename    = 'File-'.date('YmdHi');
$filename           = $excel->filename;

$send               = $excel->excel_from_array($data, $header);

if($send) {

    $email      = new PHPEmail($SMTP_USER, $SMTP_PASS);

    $email->from        = 'daniwebdev@gmail.com';
    $email->fromName    = 'Muhamad Yusup Hamdani';
    $email->to          = 'me@dani.work';

    $email->addAttachment(__DIR__.'/'.$filename.'.xlsx');
    $email->send('Tugas PL2 [SI/C/SMT4][14177063]', "
Assalamu'alaikum wr.wb.<br>
<br>
Selamat malam,<br>
<br>
Nama Saya <b>Muhamad Yusup Hamdani (14177063)</b>. Email ini dikirimkan sebagai tugas perkuliahan Programming Language 2 untuk kelas C Semester 4.
<br><br>
Dikirim melalu PHPMailer, dengan lampiran file excel yang di generate dengan PHPSpreadsheet.
<br><br>
PHPExcel sudah tidak support untuk php v7.1 keatas, sedangkan saya pake php v7.3 maka dari itu saya menggukan library PHPSpreadsheet bukan PHPExcel.
<br><br>
Terimakasih.
<br><br>
Wassalam,
<br>
<b>Muhamad Yusup Hamdani</b>
<br><br>
Refference:<br>
https://phpspreadsheet.readthedocs.io/en/latest<br>
https://github.com/PHPMailer/PHPMailer<br>
<br>
Source Code:<br>
https://github.com/daniwebdev/tugas-mailer-phpspreadsheet
    ", true);
}