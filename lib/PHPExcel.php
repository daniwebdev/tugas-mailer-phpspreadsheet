<?php

/* 
| Author    : Muhamad Yusup Hamdani
| Mail      : me@dani.work
| 
| Collage   : STIKOM BINANIAGA
| NPM       : 14177063
|
| Filename  : PHPExcel.php
| 
*/

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

Class PHPExcel {

    public $filename='filename';

    function excel_from_array($data=[], $header=[]) {
        $spreadsheet = new Spreadsheet();
        $writer      = new Xlsx($spreadsheet);

        $spreadsheet->setActiveSheetIndex(0);

        $activeSheet        = $spreadsheet->getActiveSheet();

        $alphabetic             = range('A', 'Z');
        $headerRowDimension     = 1;

        $cHeader = count($header);


        for ($h = 1; $h <= $cHeader; $h++) {
            $key = $h-1;
            $activeSheet->setCellValue($alphabetic[$key] . $headerRowDimension, $header[$key]);
        }

        $activeSheet->getRowDimension($headerRowDimension)->setOutlineLevel(1);

        // for ($i = 1; $i <= 10; $i++) {
        //     $rowDimension = $headerRowDimension+$i;

        //     $activeSheet->setCellValue('A' . $i, "FName $i");
        //     $activeSheet->setCellValue('B' . $i, "LName $i");
        //     $activeSheet->setCellValue('C' . $i, "PhoneNo $i");
        //     $activeSheet->setCellValue('D' . $i, "FaxNo $i");
        //     $activeSheet->setCellValue('E' . $i, true);
        //     $activeSheet->getRowDimension($rowDimension)->setOutlineLevel(1);
        //     $activeSheet->getRowDimension($rowDimension)->setVisible(true);
        // }

        // for($i = 1; $i <= 10; $i++) {

        // }

        foreach($data as $key => $item) {
            $row = $headerRowDimension+$key+1;

            foreach($item as $k => $v) {

                $activeSheet->setCellValue($alphabetic[$k] . $row, $v);
            }
            
        }

        $writer->save($this->filename.'.xlsx');
        
        return true;
    }


}