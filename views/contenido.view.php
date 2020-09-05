<?php
    include 'carrito.php';
    include 'templates/cabecera.php';
?>



        <br>

        <?php if($mensaje != ''){  ?>  

            <div class="alert alert-success "> 
                <?php  echo $mensaje; ?>
                <a href="mostrarCarrito.php" class="ml-3 badge badge-success">VER CARRITO </a>
            </div>
       
        <?php };?>


        <!--SECCIÓN DE LOS PRODUCTOS-->
        <div class="row">


            <!-- REALIZANDO PETICIÓN PARA OBTENER INFORMACIÓN DE LOS PRODUCTOS DE LA BD-->
            <?php 
                $conexion = new PDO('mysql:host=localhost; dbname=proyectoidsw','root', '' ); 
                $info = $conexion->prepare("SELECT * FROM tblproductos ");
                $info->execute();
                $listaProductos=$info->fetchAll(PDO::FETCH_ASSOC);
                //print_r($listaProductos);
            ?>


            <?php  foreach($listaProductos as $producto){ ?>

                <!-- PRIMER PRODUCTO-->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card">

                        <img 
                            title="<?php echo $producto['Nombre'];?>"
                            alt="<?php echo $producto['Nombre'];?>"
                            src="<?php echo $producto['Imagen'];?>" 
                            class="card-img-top"
                            data-toggle="popover"
                            data-trigger="hover"
                            data-content="<?php echo $producto['Descripcion'];?>" 
                            height="317px";

                        >

                        <!--SECCIÓN PARA LA INFORMACIÓN DEL PRODUCTO-->
                        <div class="card-body">
                            <span><?php echo $producto['Nombre'];?></span>
                            <h5 class="card-title">S/<?php echo $producto['Precio'];?></h5>
                            <p class="card-text"><img src="imagenes/estrellas.png" alt=""></p>

                            <!-- FROMULARIO PARA OBTENER LOS VALORES E INSERTARLOS EN EL CARRITO DE COMRPAS-->
                            <form action="" method="post">
                                <input type="hidden" name="id" id="id" value="<?php echo  $producto['ID'];?>">
                                <input type="hidden" name="nombre" id="nombre" value="<?php echo $producto['Nombre'];?>">
                                <input type="hidden" name="precio" id="precio" Value="<?php echo $producto['Precio'];?>">
                                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo  1;?>">
                                <button name="btnAccion" value="Agregar" class="btn btn-outline-dark" type="submit">AGREGAR AL CARRITO</button>
                            </form>


                        </div>

                    </div>
                </div>

            <?php }?>



            
        </div>

    </div>
    
    <!-- SCRIPT PARA EL EFECTO POPOVER-->
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        });
    </script>
           
<?php
    include 'templates/pie.php';
?>