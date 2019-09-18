<?php

require 'lib/autoload.php';


$excel    = new PHPExcel();

$excel->excel_from_array([['nama' => 'Dani']], ['No', 'Nama']);