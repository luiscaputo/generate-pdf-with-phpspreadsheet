<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_GET['getXlsx'])) {
  $name = $_GET['name'];
  $year = $_GET['year'];
  $sex = $_GET['sex'];

  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();
  $sheet->setCellValue('A1', 'Testando Xlsx');

  $arrayData = [
    ['Nomes', 'Idades', 'Sexo'],
    [$name, $year, $sex]
  ];

  $sheet->fromArray($arrayData, NULL, 'C3');
  $random = random_int(10000, 99999);

  $writer = new Xlsx($spreadsheet);
  $writer->save('xlsxFiles/' . $random . '.xlsx');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Gerando Xlsx</h1>
  <form action="" method="get">
    <input type="text" name="name" id="" placeholder=" informe um texto">
    <input type="text" name="year" id="" placeholder=" informe um texto">
    <input type="text" name="sex" id="" placeholder=" informe um texto">
    <button type="submit" name="getXlsx">GERAR</button>
  </form>
</body>

</html>