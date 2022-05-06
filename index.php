<?php
    require 'vendor/autoload.php';

    
    class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter{
        //read title row and rows 20 - 30

        public function readCell($colum, $row, $worksheetName =''){
          if($row>2){
            return true;
        }
        return false;
        }  
    }


    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls()<
    $inputFileName = 'producto.xlsx';

    /**Identify the  type of $inputFileName */

    $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::indentify($inputFileName);

    /**Create a new reader of the type that has been indentified */

    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
    //LEO LA FUNCION PARA OBTENER LOS DATOS  DE UNA CELDA ESPECIFICA MAYORES AL NUMERO COLOCADO\\
    //Numero colocado en la funcion 
    $reader ->setReaderFilter( new MyReaderFilter() );
    /**load $inputFileName to a Spreadsheet Object */
    $spreadsheet = $reader -> load($inputFileName);
    $cantidad = $spreadsheet ->getActiveSheet()->toArray();
    foreach($cantidad as $row){
        if($row[0] != ''){
            print_r($row[0].'-');
            print_r($row[1].'-');
    }
}

?>