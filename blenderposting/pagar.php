<?php

include 'global\conexion.php';
include 'carrito.php';
include 'global\templates\cabecera.php';



$key = "dev";
$cod = "AES-128-ECB";

?>



<?php

if($_POST   ) 
{
    $total =0;
    $SID = session_id();
    $Correo = $_POST['email'];

foreach($_SESSION['CARRITO'] as $indice => $producto         ){

$total = $total + ($producto['PRECIO' ] *$producto['CANTIDAD']);

}

$sentencia = $conexion->prepare("insert into 
tblVentas(ClaveTransaccion,Fecha,Correo,Total,status) 
values
(:ClaveTransaccion ,NOW(),:Correo,:total,'pendiente');");

$sentencia -> bindParam(":ClaveTransaccion",$SID );
$sentencia -> bindParam(":Correo", $Correo );
$sentencia -> bindParam(":total",$total );

$sentencia -> execute();

$idVenta = $conexion -> lastInsertId();

foreach($_SESSION['CARRITO'] as $indice => $producto         ){

    $sentencia = $conexion->prepare(
   
       "insert into tbldetalleventa 
       (IDVENTA,id,preciounitario,cantidad,descargado) 
       values (:IDVENTA,:id,:preciounitario,:cantidad,0);"  );
   
       $sentencia -> bindParam(":IDVENTA", $idVenta      );
       $sentencia -> bindParam(":id", $producto['ID'] );
       $sentencia -> bindParam(":preciounitario",$producto['PRECIO' ] );
       $sentencia -> bindParam(":cantidad",$producto['CANTIDAD'] );
   
       $sentencia -> execute();
   
   
       }










echo "<h3>" .$total. "</h3>";

}


?>









<?php  

include 'global\templates\pie.php';

?>


