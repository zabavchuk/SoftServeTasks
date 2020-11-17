<?php
namespace App;

use FPDF;
use PDO;

require_once ('../vendor/autoload.php');

class PDF extends FPDF
{
    private $widths;
    private $aligns;

    public function Header()
    {
        // Title
        $this->SetFont('Arial','',18);
        $this->Cell(0,6,'Books',0,1,'C');
        $this->Ln(10);
        // Ensure table header is printed
        parent::Header();
    }

    public function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths=$w;
    }

    public function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns=$a;
    }

    public function Row($data)
    {
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h);
            //Print the text
            $this->MultiCell($w,5,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    public function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    public function NbLines($w,$txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }
}

class ExportPdf{

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

        $query = "SELECT * FROM books";
        $result = Database::getInstance()->pdo->prepare($query);
        $result->execute(array(':books' => 'query'));
        $data = $result->fetchAll(PDO::FETCH_ASSOC);

        $pdf=new PDF();
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
    ExportPdf::pdfFormat();
}

$content_view = 'views/task_5.php';
$title = 'Task 5';
include 'views/main.php';