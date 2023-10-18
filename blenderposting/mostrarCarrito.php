




<?php

include 'carrito.php';
include 'global\templates\cabecera.php';


$key = "dev";
$cod = "AES-128-ECB";

?>

<br>
<h3> Lista del carrito </h3>


<?php
if(!empty($_SESSION['CARRITO'])){ ?>


<table class = "table table-light table-bordered">
<tbody>
<tr>
    <th width = "20%">  Articulo </th>
    
    <th width = "20%"> imagen</th>
    <th width = "15%" class = "text-center"> Cantidad</th>
    <th width = "20%" class = "text-center"> Precio</th>
    <th width = "20%" class = "text-center"> Subtotal </th>
    <th width = "5%" class = "text-center"> Remover </th>

</tr>


<?PHP $total = 0;?>

<?php 

foreach($_SESSION['CARRITO'] as $indice=>$producto){?>

    <tr>
        

 
    <td width = "15%" class = "text-center"> <?php echo $producto['NOMBRE']?> </td>

    <td width="15%" class="text-center">

    <img src = "productos/<?= $producto['IMAGEN'] ?>" style = 'height: 150px; width: 150px; text-align: center;'   height="400px"   >

  
<!-- 
    <td width = "15%" class = "text-center"> <?php echo $producto['CANTIDAD']?> </td>     -->
    <td width="15%" class="text-center">
    <input type="number" name="cantidad" value="<?php echo $producto['CANTIDAD']; ?>" />
</td>



   

    <td width = "20%" class = "text-center">  <?php echo NUMBER_FORMAT(  $producto['PRECIO']    ,2)?>    </td>

    <td width = "20%" class = "text-center">  <?php echo NUMBER_FORMAT(  $producto['PRECIO'] *   $producto['CANTIDAD']   ,2)?> </td>
    <td width = "5%">      


    <form action="" method = "post"> 

    <input type = "hidden"     name  ="id"     id = "id"    value = "<?php echo openssl_encrypt($producto ['ID'], $cod,$key);?>" >

    <button 
    class = "btn btn-danger"
    type ="submit"
    name = "btnAccion"
    value = "Eliminar"
    >Eliminar  </button>

    <button 
    class = "btn btn-primary"
    type ="submit"
    name = "btnAccion"
    value = "Actualizar"
    >Actualizar  </button>

    </form>

    </td>

</tr>

<?php  $total = $total+($producto['PRECIO'] *   $producto['CANTIDAD']);  ?>

<?php }?>






<tr>
<td colspan = "3" align="right"> <h3>Total</h3>            </td>
<td align = "right"> <h3>  $<?php echo number_format(   $total      ,2)?>         </h3></td>
<td></td>
</tr>



<tr> 

   <td  colspan = "5">

   <form action="pagar.php" method="post">

    <div class = "alert alert-success">

    <div class ="form-group">
        <label for "my-input"> Correo de contacto </label>
        <input id ="email" name  = "email"
        class ="form-control"
        type "text"
        placeholder = "escribe correo electronico"
        requiered>

     </div>
     <small id = "emailHelp"
     class = "form-text text-muted"
     >
     Los productos se enviaran a este correo

     </small>
    
</div>

    <button class="btn btn-primary btn-lg btn-block" 
    type="submit"
    name = "btnAccion"
    value ="proceder">
     Proceder el pago
    </button>
  

   </form>

   
    </td> 
</tr>


</tbody>
</table>
<?php } 

else{  ?>

<div class = "alert alert-success">

No hay productos

</div>

    <?php }?>




<?php  

include 'global\templates\pie.php';

?> 