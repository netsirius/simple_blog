<?php require '../views/header.php'; ?>

<div class="contenedor">
    <h2>Panel de conttrol</h2>
    <a href="new_post.php" class="btn">Nuevo Post</a>
    <a href="close.php" class="btn">Cerrar Sesion</a>
    <?php foreach($posts as $post): ?>
        <div class="post">
            <article>
                <h2 class="titulo"><?php echo $post['id'] . '.-' . $post['titulo']; ?></h2>
                <a href="editar.php?id=<?php echo $post['id']; ?>">Editar</a>
                <a href="../single.php?id=<?php echo $post['id']; ?>">Ver</a>
                <a href="delete.php?id=<?php echo $post['id']; ?>">Borrar</a>
            </article>
        </div>
    <?php endforeach; ?>
    <?php require '../pagination.php'; ?>
</div>
<?php require '../views/footer.php'; ?>
</body>
</html>