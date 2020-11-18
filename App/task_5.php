<?php

namespace App;

require_once('../vendor/autoload.php');
require_once('Third Party/PDF_MC_Table.php');

use PDF_MC_Table;

class ExportTable{

    public static function pdfFormat()
    {
        $filename = 'dump-'. date('d-m-Y') .'.pdf';
        $tr = array(
            'ID',
            'Author',
            'Title',
            'Description',
            'Lang',
            'Pages',
            'Image',
        );

        $data = Book::getAllBooks();

        $pdf = new PDF_MC_Table();
        $pdf->AddPage();
        $pdf->SetFont('Arial','',14);

        $pdf->SetWidths(array(10,20,25,60,20,20,40));

        $pdf->SetFont('','B');

        $pdf->Row($tr);

        $pdf->SetFont('');
        foreach ($data as $value){
            $pdf->Row(
                array(
                    $value['id'],
                    $value['author'],
                    $value['title'],
                    $value['description'],
                    $value['lang'],
                    $value['pages'],
                    $value['image'],
                    )
            );
        }

        $pdf->Output('D', $filename);
    }
}

if(isset($_POST['export'])){
    ExportTable::pdfFormat();
}

$content_view = 'views/task_5.php';
$title = 'Task 5';
include 'views/main.php';