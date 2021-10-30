<?php
include 'vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\DummyPrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\GdEscposImage;


use Mike42\Escpos\CapabilityProfile;

$connector = new DummyPrintConnector();
	$tux = GdEscposImage::load("resource/tux.png",false,['native']);
    $printer = new Printer($connector);
    
	
	
	$printer->setJustification(Printer::JUSTIFY_CENTER);
	$printer->bitImageColumnFormat($tux,Printer::IMG_DOUBLE_WIDTH | Printer::IMG_DOUBLE_HEIGHT);
	$printer->setJustification(Printer::JUSTIFY_LEFT);
	$printer->setFont(0);
	
	
	
    $printer->text("Helloo... world...\n");
	$printer->setFont(1);
	$printer->text("Helloo... world...\n");
	$printer->setPrintLeftMargin(0);
	$printer ->text("Thank you for shopping at ExampleMart\n");
	$printer->setUnderline();
	$printer ->text("For trading hours, please visit example.com\n");
	
    $printer->cut();
    
    /* Close printer */
    $printer -> close();

// $connector = new DummyPrintConnector();
// $profile = CapabilityProfile::load("simple");
// $printer = new Printer($connector);
// $printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);;
// $printer -> text("Title!\n");
// $printer -> selectPrintMode();
// $printer -> text("Item 1\n");
// $printer -> text("Item 2\n");
// $printer -> feed();
// $printer -> cut();
//  $printer -> close();
?>

<a href="rawbt:base64,<?php echo base64_encode($connector -> getData());
?>"> click(with Android app(base64)) </a> <br> <br>

<a href="rawbt:<?php echo ($connector -> getData()); ?>"> click2(with
    Android app without base64) </a> <br> <br>

<script type="text/plain" class="language-javascript">onclick="BtPrint(document.getElementById('pre_print').innerText)"
</script>

<p><button class="btn btn-green" onclick="BtPrint(document.getElementById('pre_print').innerText)">Print
        text from pre block</button></p>
