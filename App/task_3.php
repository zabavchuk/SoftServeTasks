<?php

namespace App;

require_once('../vendor/autoload.php');

use Configs\DB;
use PhpOffice\PhpSpreadsheet\{IOFactory, Spreadsheet};

/**
 * Class Export
 * @package App
 */
class Export{

    /**
     * @param string $filetype
     */
    public static function xlsxFormat(string $filetype){

        //Retrieve the data from our table.
        $data = Book::getAllBooks();

        $file = new Spreadsheet();

        $active_sheet = $file->getActiveSheet();

        $active_sheet->setCellValue('A1', 'id');
        $active_sheet->setCellValue('B1', 'author');
        $active_sheet->setCellValue('C1', 'title');
        $active_sheet->setCellValue('D1', 'description');
        $active_sheet->setCellValue('E1', 'lang');
        $active_sheet->setCellValue('F1', 'pages');
        $active_sheet->setCellValue('G1', 'image');

        $count = 2;

        foreach($data as $row)
        {
            $active_sheet->setCellValue('A' . $count, $row["id"]);
            $active_sheet->setCellValue('B' . $count, $row["author"]);
            $active_sheet->setCellValue('C' . $count, $row["title"]);
            $active_sheet->setCellValue('D' . $count, $row["description"]);
            $active_sheet->setCellValue('E' . $count, $row["lang"]);
            $active_sheet->setCellValue('F' . $count, $row["pages"]);
            $active_sheet->setCellValue('G' . $count, $row["image"]);

            $count++;
        }

        $writer = IOFactory::createWriter($file, $filetype);

        $file_name = 'dump-'. date('d-m-Y') . '.' . strtolower($filetype);

        $writer->save($file_name);

        header('Content-Type: application/x-www-form-urlencoded');

        header('Content-Transfer-Encoding: Binary');

        header("Content-disposition: attachment; filename=\"".$file_name."\"");

        readfile($file_name);

        unlink($file_name);

        exit();
    }

    public static function sqlFormat(){


        $filename = 'dump-'. date('d-m-Y').'.sql';
        $dir = realpath(dirname(__FILE__) . '/../dump') . '\\'.$filename;

        exec('mysqldump --user='. DB::DB_USER .' --password='. DB::DB_PASSWORD .' --host='. DB::DB_HOST .' '. DB::DB_NAME .' --result-file='. $dir .' 2>&1', $output);

        header("Location: /dump/$filename");
    }
}

/**
 * Class Import
 * @package App
 */
class Import{

    /**
     * @param string $filename
     */
    public static function xlsxFormat(string $filename){

        $input_file_type = IOFactory::identify($filename);

        try {

            $reader = IOFactory::createReader($input_file_type);
            $spreadsheet = $reader->load($filename);
            $data = $spreadsheet->getActiveSheet()->toArray();


            if(count($data) < 0){
                Exit ('There is no data in the Excel table');
            }

            foreach ($data as $key => $val){
                if($key > 0){

                    Book::insertBook(
                        $val[1],
                        $val[2],
                        $val[3],
                        $val[4],
                        $val[5],
                        $val[6]
                    );
                }
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param string $filename
     */
    public static function sqlFormat(string $filename){

        $output = '';
        $file_data = file($filename);

        try{
            foreach($file_data as $row) {
                $start_character = substr(trim($row), 0, 2);
                if($start_character != '--' || $start_character != '/*' || $start_character != '//' || $row != '')
                {
                    $output = $output . $row;
                    $end_character = substr(trim($row), -1, 1);
                    if($end_character == ';')
                    {
                        Database::getInstance()->pdo->query($output);
                        $output = '';
                    }
                }
            }
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

if(isset($_POST['type']) && $_POST['type'] === 'Xlsx'){
    Export::xlsxFormat($_POST['type']);
}


if(isset($_POST['type']) && $_POST['type'] === 'sql'){
    Export::sqlFormat();
}



if(isset($_POST['submit']) && $_POST['submit'] === 'import'){

    $allow_excel = array('xlsx');

    $array = explode(".", $_FILES['import']['tmp_name']);
    $extension = end($array);

    if($extension == 'sql'){

        Import::sqlFormat($_FILES['import']['tmp_name']);

        $import_massage = 'Import successful';
    }
    elseif(in_array($extension, $allow_excel)){

        Import::xlsxFormat($_FILES['import']['tmp_name']);

        $import_massage = 'Import successful';
    }
}

$content_view = 'views/task_3.php';
$title = 'Task 3';
include 'views/main.php';