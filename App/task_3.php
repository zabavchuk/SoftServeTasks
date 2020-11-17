<?php
namespace App;

use PDO;
use App\Database;
use Configs\ConfigDB;
use PhpOffice\PhpSpreadsheet\{IOFactory, Spreadsheet};

require_once ('../vendor/autoload.php');

class Export{

    public static function xlsxFormat(string $filetype){

        $query = "SELECT * FROM books";
        $result = Database::getInstance()->pdo->prepare($query);
        $result->execute(array(':books' => 'query'));

        //Retrieve the data from our table.
        $data = $result->fetchAll(PDO::FETCH_ASSOC);

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

        exec('mysqldump --user='. ConfigDB::DB_USER .' --password='. ConfigDB::DB_PASSWORD .' --host='. ConfigDB::DB_HOST .' '. ConfigDB::DB_NAME .' --result-file='. $dir .' 2>&1', $output);

        header("Location: /dump/$filename");
    }
}

class Import{

    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function xlsxFormat(){

        $input_file_type = IOFactory::identify($this->filename);

        try {

            $reader = IOFactory::createReader($input_file_type);
            $spreadsheet = $reader->load($this->filename);
            $data = $spreadsheet->getActiveSheet()->toArray();


            if(count($data) < 0){
                Exit ('There is no data in the Excel table');
            }

            foreach ($data as $key => $val){
                if($key > 0){

                    $insert_data = array(
                        'author' => $val[1],
                        'title' => $val[2],
                        'description' => $val[3],
                        'lang' => $val[4],
                        'pages' => $val[5],
                        'image' => $val[6],
                    );

                    $query = "INSERT INTO books (author, title, description, lang, pages, image)
                              VALUES (:author, :title, :description, :lang, :pages, :image)";


                    $result = Database::getInstance()->pdo->prepare($query);
                    $result->execute($insert_data);
                }
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function sqlImport(){

        $output = '';
        $file_data = file($this->filename);

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

    $array = explode(".", $_FILES["import"]["name"]);
    $extension = end($array);

    if($extension == 'sql'){

        $import = new Import($_FILES['import']['tmp_name']);
//        $import = new Import("D:\OPEN SERVER\OSPanel\domains\softserve.local\dump\dump-16-11-2020.sql");

        $import->sqlImport();
        $massage = 'Import successful';
    }
    elseif(in_array($extension, $allow_excel)){
        $import = new Import($_FILES['import']['tmp_name']);
    //    $import = new Import("C:\Users\Данило\Downloads\dump-16-11-2020.xlsx");

        $import->xlsxFormat();
        $massage = 'Import successful';
    }
}

$content_view = 'views/task_3.php';
$title = 'Task 3';
include 'views/main.php';