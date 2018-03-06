<?php require 'header.php'; ?>
<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo">Inicia sesion</h2>
            <form class="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="text" name="user" placeholder="Usuario">
                <input type="password" name="password" placeholder="Contraseña">
                <input type="submit" value="Iniciar Sesion">
            </form>
        </article>
    </div>
</div>
<?php require 'footer.php'; ?>