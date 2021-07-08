<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    
  	 $this->Image('../imgZ/logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);

    // Movernos a la derecha
    $this->Cell(80);

    // Título

    $this->Cell(30,10,'Reporte de apartado(Liquidado)',0,1,'C');
	$this->Ln(5);
     $this->Cell(100, 5,date("d-m-Y"),0,1);

    // Salto de línea
    $this->Ln(20);
    
    
   

    $this->SetFont('Arial','B',10);
	$this->Cell(25,10,utf8_decode('No. Apartado'),1,0,'c',0);
	$this->Cell(25,10,utf8_decode('ID de cliente'),1,0,'c',0);
	$this->Cell(60,10,utf8_decode('Nombre del cliente'),1,0,'c',0);
	$this->Cell(25,10,utf8_decode('Codigo'),1,0,'c',0);
	$this->Cell(30,10,utf8_decode('Modelo'),1,0,'c',0);
	$this->Cell(25,10,utf8_decode('Precio'),1,1,'c',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//include "conexion.php";
require_once "../modelo/Data.php";

//$query =mysqli_query($conectar,"SELECT a.id_apartado,c.id_cliente,c.nombre_cliente,z.codigo,z.modelo,a.Precio_p,a.saldo_restante FROM apartado a INNER JOIN cliente c ON a.id_cliente = c.id_cliente INNER JOIN zapato z ON a.codigo = z.codigo WHERE a.estatus = 'Liquidado' order by id_apartado" );
$d = new Data();
$query =mysqli_query(($d->getConexion()->getCon()),"SELECT a.id_apartado,c.id_cliente,c.nombre_cliente,z.codigo,z.modelo,z.precio_venta,a.saldo_restante FROM apartado a INNER JOIN cliente c ON a.id_cliente = c.id_cliente INNER JOIN zapato z ON a.codigo = z.codigo WHERE a.estatus = 'Liquidado' order by id_apartado" );
$result = mysqli_num_rows($query);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','',12);
while ($data = mysqli_fetch_array($query) ) {

	$pdf->Cell(25,10,$data['id_apartado'],1,0,'c',0);
	$pdf->Cell(25,10,$data['id_cliente'],1,0,'c',0); 
	$pdf->Cell(60,10,$data['nombre_cliente'],1,0,'c',0); 
	$pdf->Cell(25,10,$data['codigo'],1,0,'c',0); 
	$pdf->Cell(30,10,$data['modelo'],1,0,'c',0); 
	$pdf->Cell(25,10,$data['precio_venta'],1,1,'c',0);  
}
$pdf->Cell(165,10,utf8_decode('Total de apartados liquidados'),1,0,'c',0);
$queryC =mysqli_query(($d->getConexion()->getCon()),"SELECT count(id_apartado) AS Total FROM `apartado` WHERE estatus = 'Liquidado'" );
      $resultC = mysqli_num_rows($query);
                         
      while ($data = mysqli_fetch_array($queryC) ) {
      	
		$pdf->Cell(25,10,$data['Total'],1,1,'c',0);
         }

                                        
  $pdf->Cell(165,10,utf8_decode('Total generado en precios'),1,0,'c',0);
  $queryC =mysqli_query(($d->getConexion()->getCon()),"SELECT sum(precio_venta) AS Total FROM `apartado` inner join zapato on apartado.codigo=zapato.codigo WHERE estatus = 'Liquidado'" );
      $resultC = mysqli_num_rows($query);
                         
      while ($data = mysqli_fetch_array($queryC) ) {
      	
		$pdf->Cell(25,10,$data['Total'],1,1,'c',0);
         }                                 

$pdf->Output('Rep_Liquidados.pdf','I');
?>