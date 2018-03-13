<?php require 'header.php'; ?>

<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo">Nuevo Articulo</h2>
            <form class="formulario" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <input type="text" name="title" placeholder="Ttitulo del articulo">
                <input type="text" name="extracto" placeholder="Extracto del articulo">
                <textarea name="text" placeholder="Contenido del articulo" ></textarea>
                <input type="file" name="thumb">
                <input type="submit" value="Crear articulo">
            </form>
        </article>
    </div>    
</div>
    
<?php require 'footer.php'; ?>