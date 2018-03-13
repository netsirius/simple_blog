<?php require 'header.php'; ?>

<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo">Editar Articulo</h2>
            <form class="formulario" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                <input type="text" name="title" value="<?php echo $post['titulo']; ?>">
                <input type="text" name="extracto" value="<?php echo $post['extracto']; ?>">
                <textarea name="text"><?php echo $post['texto']; ?></textarea>
                <input type="file" name="thumb">
                <input type="hidden" name="saved-thumb" value="<?php echo $post['thumb']; ?>">
                <input type="submit" value="Modificar articulo">
            </form>
        </article>
    </div>    
</div>
    
<?php require 'footer.php'; ?>