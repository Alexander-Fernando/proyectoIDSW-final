<?php
    session_start();
    include 'carrito.php';
    include 'templates/cabecera.php';
?>

<br>
<h3 class="shadow-sm mb-3 text-center rounded py-3">TU CARRITO DE COMPRAS</h3>

<!-- VALIDANDO SI EXISTEN ELEMENTOS EN EL CARRITO DE COMPRAS-->
<?php           
    if(!empty($_SESSION['CARRITO'])){
?>


<table class="table table-light table-bordered">
    <tbody>
        <tr class="thead-dark">
            <th width=40% class="text-center">Descripcion</th>
            <th width=15% class="text-center">Cantidad</th>
            <th width=20% class="text-center">Precio</th>
            <th width=20% class="text-center">Total</th>
            <th width=5% class="text-center">--</th>
        </tr>

        <!--MOSTRANDO INFORMACIÓN DE LOS PRODUCTOS AÑADIDOS AL CARRITO-->
        <?php $total=0; ?>

        <?php  foreach($_SESSION['CARRITO'] as $indice=>$producto){     ?>
        <tr>
            <td width=40%><?php echo $producto['NOMBRE'] ?></td>
            <td width=15% class="text-center"><?php echo $producto['CANTIDAD'] ?></td>
            <td width=20% class="text-center">S/<?php echo $producto['PRECIO'] ?></td>
            <td width=20% class="text-center">S/<?php echo number_format($producto['CANTIDAD']*$producto['PRECIO'], 2); ?></td>
            

            <!--BOTÓN PARA BORRAR ELEMENTOS DEL CARRITO-->
            <form method="post">
                <td width=5%>
                <input type="hidden" name="id" value="<?php echo $producto['ID'];?>">
                <button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">ELIMINAR</button></td>
            </form>


        </tr>
        <?php $total= $total +$producto['CANTIDAD']*$producto['PRECIO']; ?>
        <?php } ?>




        <tr>
            <td colspan="3" align="right"><h3>TOTAL</h3></td>
            <td align="right"><h3>S/<?php  echo number_format($total,2); ?></h3></td>
            <td></td>
        </tr>


        <!-- AGREGANDO LO NECESARIO PARA LO INFORMACIÓN EN LA VENTA-->
        <tr>
            <td colspan="5">

                <form method="post" action="procesarPago.php">

                    <div class="alert alert-success">
                        <div class="form-group">
                            <label for="my-input">Nombres y Apellidos</label>
                            <input 
                            id="nombres"
                            name="nombres" 
                            class="form-control" 
                            type="text" 
                            placeholder="Ap1 Ap2, Nombres"
                            required
                            >
                        </div>
                      
                    </div>

                    <div class="alert alert-success">
                        <div class="form-group">
                            <label for="my-input">Dirección</label>
                            <input 
                            id="direccion"
                            name="direccion" 
                            class="form-control" 
                            type="text" 
                            placeholder="Ingrese su dirección"
                            required
                            >
                        </div>
                       
                    </div>

                    <div class="alert alert-success">
                        <div class="form-group">
                            <label for="my-input">DNI</label>
                            <input 
                            id="dni"
                            name="dni" 
                            class="form-control" 
                            type="text" 
                            placeholder="Ingrese su DNI"
                            required
                            >
                        </div>
                    </div>
                    
                    <div class="alert alert-success">
                        <div class="form-group">
                            <label for="my-input">Correo electrónico</label>
                            <input 
                            id="email"
                            name="email" 
                            class="form-control" 
                            type="email" 
                            placeholder="Ingrese su correo"
                            required
                            >
                        </div>
                    </div>



                    <button class="mt-3 btn btn-outline-success btn-lg btn-block" name="btnAccion" value="proceder" type="submit">PROCESAR EL PAGO</button>
                </form>

            </td>
        </tr>

    </tbody>
</table>
 
<?php }else{ ?>
    <div class="alert alert-info" role="alert">
        El carrito está vacío.....
    </div>

<?php } ?>

<?php
    include 'templates/pie.php';
?>