<?php

require_once('../models/reporte.class.php');

require_once('../../protected/config.php');
require ('../../vendor/autoload.php');

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;


$id_evento = null;
$accion = null;
if (isset($_GET['accion'])) {
    $id_evento = isset($_GET['id_evento']) ? $_GET['id_evento'] : null;
    $accion = $_GET['accion'];
}
if (isset($_GET['accion'])) {
    $id_taller = isset($_GET['id_taller']) ? $_GET['id_taller'] : null;
    $accion = $_GET['accion'];
}


switch ($accion) {
    case 'listaEvento':
        $reporte -> listaEvento($id_evento);
        $content = ob_get_contents();
        break;

        case 'listaTaller':
            $reporte -> listaTaller($id_taller);
            $content = ob_get_contents();
        break;

    default:
        $content = "nada";
        
}
$html2pdf = new Html2Pdf('P', 'A4', 'fr');
$html2pdf->setDefaultFont('Arial');
$html2pdf->writeHTML($content);
ob_end_clean();
$html2pdf->output('example00.pdf');

?>