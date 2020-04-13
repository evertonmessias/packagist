<?php
namespace api;

include './vendor/autoload.php';

use League\Csv\Writer;

$csv = Writer::createFromString("");

$csv->insertOne(["Nome","Telefone","E-Mail"]);

foreach(Pessoas::consultar() as $dado){
    $csv->insertOne([$dado[1],$dado[2],$dado[3]]);
}

$csv->output('saida.csv');
