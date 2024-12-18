<?php include "./views/encabezado.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MARI STORE</title>
    <link rel="stylesheet" href="./css/cards.css">
</head>

<body>
    <div class="container">
        <br>
        <h1 class="text-center"><b>Tienda Online</b></h1>

        <?php echo $mensaje; ?>

        <div class="row">
            <?php
            include "./includes/db.php";
            $consult = "SELECT * FROM inventario ORDER BY id DESC";
            $result = mysqli_query($conexion, $consult);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($fila = mysqli_fetch_assoc($result)) {

            ?>
                    <div class="col-md-4">
                        <br>
                        <div class="card">
                            <img src="./img/compras.png" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title text-center"><b><?php echo $fila['descripcion']; ?></b></h5>
                                <p class="card-text text-center stock">Stock: <?php echo $fila['stock']; ?></p>
                                <p class="card-text text-center status">Status: <?php echo $fila['status']; ?></p>
                                <p class="card-text text-center">Precio: <?php echo '$' . $fila['precioVenta']; ?></p>
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                  

                                        <input type="hidden" class="precioVenta" value="<?php echo $fila['precioVenta']; ?>">
                                        <button class="btn btn-primary agregar-carrito" style="width: 100%;"
                                            data-id="<?php echo $fila['id']; ?>"
                                            data-descripcion="<?php echo $fila['descripcion']; ?>"
                                            data-precioVenta="<?php echo $fila['precioVenta']; ?>"
                                            data-status="<?php echo $fila['status']; ?>"
                                            data-stock="<?php echo $fila['stock']; ?>">
                                            <b>Añadir al carrito</b> <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <br>
    <br>
    <?php include "./views/pie.php"; ?>







</body>

</html>