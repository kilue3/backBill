<?php namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Storemodel;

class ExcelExport extends Controller
{
 
 
  public function index() {
    $model = new Storemodel();
    $characters = '0123456789';
    $length = 8;
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    $users  = $model->findAll();
     
    
       $fileName = "store".$randomString.".xlsx";  
      $spreadsheet = new Spreadsheet();
 
      $sheet = $spreadsheet->getActiveSheet();
      $sheet->setCellValue('A1', 'Store_id');
      $sheet->setCellValue('B1', 'Store_name');
      $sheet->setCellValue('C1', 'Store_email');
      $sheet->setCellValue('D1', 'Contact_name');
      $sheet->setCellValue('E1', 'Tel');
      $sheet->setCellValue('F1', 'Store_username');       
      $rows = 2;
 
      foreach ($users as $val){
          $sheet->setCellValue('A' . $rows, $val['Store_id']);
          $sheet->setCellValue('B' . $rows, $val['Store_name']);
          $sheet->setCellValue('C' . $rows, $val['Store_email']);
          $sheet->setCellValue('D' . $rows, $val['Contact_name']);
          $sheet->setCellValue('E' . $rows, $val['Tel']);
          $sheet->setCellValue('F' . $rows, $val['Store_username']);
          $rows++;
      } 
     $writer = new Xlsx($spreadsheet);
      $writer->save("upload/".$fileName);
      header("Content-Type: application/vnd.ms-excel");
      redirect(base_url()."/upload/".$fileName); 
  }
 
}