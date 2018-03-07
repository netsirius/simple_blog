<?php require '../views/header.php'; ?>
<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo">Crear nuevo post:</h2>
            <form class="formulario" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="text" name="title" placeholder="Titulo">
                <label for="texto">Descripción:</label>
                <textarea name="texto" id="texto" placeholder="Introduce una descripción"></textarea>
                
                <label for="texto">Contenido:</label>
                <textarea name="texto" id="texto" placeholder="Introduce el contenido del articulo"></textarea>

                <label for="foto">Seleccionar imagen...</label>
                <input type="file" id="foto" name="foto">
                <input type="submit" value="Publicar">
            </form>
        </article>
    </div>
</div>
<?php require '../views/footer.php'; ?>