<?php
header("Access-Control-Allow-Methods: GET, OPTIONS, POST, PUT");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400');

include 'vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\GdEscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
try {
    $data_json = file_get_contents('php://input');
	$data_post = json_decode($data_json,true);
	$printername = "DotMatrix"; //"EPSON TM-U220 Receipt"; //"EPSON LX-310";
	// print_r($data_post);die;
	if(isset($data_post['printer']) && !empty($data_post['printer'])){
		$printername = $data_post['printer'];
	}
	if(isset($data_post['data'])){
		$connector = new WindowsPrintConnector($printername);
		$printer = new Printer($connector);
//		if(isset($data_post['gambar']) && $data_post['gambar']==true){
//			$tux = GdEscposImage::load("resource/logo.png",false,['native']);
//			$printer->setJustification(Printer::JUSTIFY_CENTER);
//			$printer->bitImageColumnFormat($tux,Printer::IMG_DOUBLE_WIDTH | Printer::IMG_DOUBLE_HEIGHT);
//			$printer->setJustification(Printer::JUSTIFY_LEFT);
//		}
		$printer->text($data_post['data']);
//		if(isset($data_post['autocut']) && $data_post['autocut']==true){
//			$printer->cut();
//		}
//		$printer->pulse(0);
		$printer->close();
	}
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}
