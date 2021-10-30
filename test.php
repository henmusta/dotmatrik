<?php
include 'vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\GdEscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

/**
 * Install the printer using USB printing support, and the "Generic / Text Only" driver,
 * then share it (you can use a firewall so that it can only be seen locally).
 *
 * Use a WindowsPrintConnector with the share name to print.
 *
 * Troubleshooting: Fire up a command prompt, and ensure that (if your printer is shared as
 * "Receipt Printer), the following commands work:
 *
 *  echo "Hello World" > testfile
 *  copy testfile "\\%COMPUTERNAME%\Receipt Printer"
 *  del testfile
 */
 ?>
<form>
    <input type="text" name="driver" value="<?=isset($_GET['driver']) ? $_GET['driver'] : ''?>"
        placeholder="Masukkan nama driver printer" />
    <button type="submit">Test</button>
</form>
<a href="rawbt:<?php echo "test print";  ?>"> click </a>
<?php
$driver = isset($_GET['driver']) ? $_GET['driver'] : '';
if(empty($driver)) die;
try {
    $connector = new WindowsPrintConnector($driver);
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
	
	echo "Test selesai...";
	
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}
