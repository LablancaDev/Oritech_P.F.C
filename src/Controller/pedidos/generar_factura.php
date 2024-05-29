<?php
session_start();

require_once('../../../TCPDF-main/tcpdf.php');


if(isset($_GET['pedidoId']) && isset($_GET['fecha']) && isset($_GET['cantidad']) && isset($_GET['detalles'])) {
    $pedidoId = $_GET['pedidoId'];
    $fecha = $_GET['fecha'];
    $cantidad = $_GET['cantidad'];
    $detalles = json_decode($_GET['detalles'], true);

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Factura de Pedido');
    $pdf->SetSubject('Factura de Pedido');
    $pdf->SetKeywords('TCPDF, PDF, factura, pedido');   

    $logoPath = '../../../public/img/logo.jpg'; 
    $pdf->SetHeaderData($logoPath, 20 , 'Factura de Pedido', 'Cliente: ' . $_SESSION['nombre_usuario'], array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128));

    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    $pdf->SetFont('helvetica', '', 12);

    $pdf->AddPage();

    $companyName = "Nombre de tu Empresa";
    $pdf->SetHeaderData($logoPath, 20 , 'Factura de Pedido', 'Cliente: ' . $_SESSION['nombre_usuario'], array(0,64,255), array(0,64,128), $companyName);

    $html = '<h1 style="text-align: center; margin-bottom: 20px;">Factura de Pedido</h1>';
    $html .= '<table border="1" cellspacing="0" cellpadding="5" style="width: 100%; border-collapse: collapse; margin-bottom: 20px; background-color: #f2f2f2;">';
    $html .= '<tr style="background-color: #cccccc;"><th style="padding: 10px; border: 1px solid #000;">ID del Pedido</th><th style="padding: 10px; border: 1px solid #000;">Fecha del Pedido</th><th style="padding: 10px; border: 1px solid #000;">Cantidad Total</th></tr>';
    $html .= '<tr><td style="padding: 10px; border: 1px solid #000;">' . $pedidoId . '</td>';
    $html .= '<td style="padding: 10px; border: 1px solid #000;">' . $fecha . '</td>';
    $html .= '<td style="padding: 10px; border: 1px solid #000;">' . $cantidad . ' €</td></tr>';
    $html .= '</table>';
    
    $html .= '<h2 style="text-align: center; margin-bottom: 20px;">Detalles del Pedido</h2>';
    $html .= '<table border="1" cellspacing="0" cellpadding="5" style="width: 100%; border-collapse: collapse; background-color: #f2f2f2;">';
    $html .= '<tr style="background-color: #cccccc;"><th style="padding: 10px; border: 1px solid #000;">ID</th><th style="padding: 10px; border: 1px solid #000;">Producto</th><th style="padding: 10px; border: 1px solid #000;">Precio</th><th style="padding: 10px; border: 1px solid #000;">Cantidad</th><th style="padding: 10px; border: 1px solid #000;">#</th></tr>';
    foreach ($detalles as $detalle) {
        $html .= '<tr>';
        $html .= '<td style="padding: 10px; border: 1px solid #000;">' . $detalle['id'] . '</td>';
        $html .= '<td style="padding: 10px; border: 1px solid #000;">' . $detalle['titulo'] . '</td>';
        $html .= '<td style="padding: 10px; border: 1px solid #000;">' . $detalle['precio'] . ' €</td>';
        $html .= '<td style="padding: 10px; border: 1px solid #000;">' . $detalle['cantidad'] . '</td>';
        
        $imagePath = '../productos' . $detalle['imagen_url']; 
        $pdf->Image($imagePath, $pdf->GetX(), $pdf->GetY(), 40, 0, '', '', '', false, 300, '', false, false, 0, false, false);
        
        $html .= '<td style="padding: 10px; border: 1px solid #000;"></td>';
        $html .= '</tr>';
    }
    
    $html .= '</table>';
    
    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->Output('factura_pedido.pdf', 'I');
} else {

    echo 'Error: Faltan parámetros en la URL.';
}
?>

