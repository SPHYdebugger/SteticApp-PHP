<?php
require("includes/header.php");
?>

<main>



    <hr class="featurette-divider" style="margin-top: 150px">
    <h2 style="text-align: center;">REGISTRO DE PRODUCTO</h2>


    <div class="container col-6">
        <form action="resources/db/Product/addProduct.php" method="post" enctype= "multipart/form-data">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">NOMBRE</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">DESCRIPCIÓN</label>
                <input type="text" class="form-control" id="description" name="description">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">PRECIO</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>

            <div class="container  d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Confirmar el registro</button>
            </div>
        </form>

        <div class="container  d-flex justify-content-center">
            <a href="clients.php" type="button" class="btn btn-primary col-4" style="margin-top: 20px;">Volver a la lista de productos</a>
        </div>
    </div>
</main>

<?php
include("includes/footer.php");
?>


