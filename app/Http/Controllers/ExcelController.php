<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelController extends Controller
{
    public function index()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan data ke sel
        $sheet->setCellValue('A1', 'Hello');
        $sheet->setCellValue('B1', 'World!');

        // Simpan file spreadsheet
        $writer = new Xlsx($spreadsheet);
        $writer->save('coba.xlsx');

        return 'Spreadsheet berhasil dibuat di public/spreadsheet.xlsx';
    }
}
