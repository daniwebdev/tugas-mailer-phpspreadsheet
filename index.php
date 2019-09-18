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

require './lib/PHPEmail_lib.php';
require './lib/PHPExcel_lib.php';

$excel      = new PHPExcel();

$data       = [];
$data[]     = [1, 'Dani'];

$excel->filename = 'File-'.date('YmdHi');
$filename        = $excel->filename;

$send = $excel->excel_from_array($data, ['No', 'Nama']);

if($send) {

    $email      = new PHPEmail();
    
    $email->from        = 'daniwebdev@gmail.com';
    $email->fromName    = 'Muhamad Yusup Hamdani';
    $email->to          = 'target';

    $email->addAttachment(__DIR__.'/'.$filename.'.xlsx');
    $email->send('Kirim Email', 'Test');
}