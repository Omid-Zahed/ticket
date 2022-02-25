<?php
require_once "./vendor/autoload.php";

$generator=new \Omidzahed\Certificate\generatePdf(__DIR__."/export/",__DIR__."/assets");
$html=file_get_contents(__DIR__."/template/certificate.html");

$generator->creatPdfFromHtml($html,"omid");

      function streamPdfFromPath($path){
        $data = file_get_contents($path);
        header("Content-type: application/pdf");
        echo $data;
    }

    streamPdfFromPath("./export/omid.pdf");