<?php

include 'Sheet.php';

$file = "../sheet.csv";

$sheet = new Sheet($file);
//$sheet->setDelimiter(",");
$sheet->readFile();

