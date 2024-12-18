<?php include "../includes/header.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca de</title>

</head>
<style>
    .title {
        font-size: 2rem;
        margin-bottom: 20px;
    }

    .subtitle {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .content {
        margin-bottom: 20px;
        text-align: justify;
    }

    .link {
        color: blue;
        text-decoration: underline;
    }

    .link:hover {
        color: darkblue;
        text-decoration: none;
    }
</style>

<body>
    <div class="container">
        <br>
        <div class="row">
            <h1 class="title"><b>Acerca de</b></h1>
        </div>
        <div class="row">
            <div class="content">
                <p>Realizado como trabajo de Maria</p>
            </div>
        </div>
        <div class="row">
            <div class="content">
                <h2 class="subtitle">Características</h2>
                <p>El sistema cuenta con los siguientes módulos: Login, Registro, Usuarios, Roles, Inventario, Compras & Tienda Online. Está
                    desarrollado utilizando tecnologías como PHP, JavaScript, AJAX y MySQL.</p>
            
            </div>
        </div>

    
        </div>
    </div>

    <?php include "../includes/footer.php"; ?>
</body>

</html>