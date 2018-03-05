    <?php require 'header.php'; ?>

    <div class="contenedor">
        <?php foreach($posts as $post): ?>
            <div class="post">
                <article>
                    <h2 class="titulo"><a href="<?php echo RUTA; ?>single.php?id=<?php echo $post['id']; ?>"><?php echo $post['titulo']; ?></a></h2>
                    <p class="fecha"><?php echo set_date_format($post['fecha']); ?></p>
                    <div class="thumb">
                        <a href="#">
                            <img src="<?php echo RUTA; ?>/images/<?php echo $post['thumb']; ?>" alt="">
                        </a>
                    </div>
                    <p class="extracto"><?php echo $post['extracto']; ?></p>
                    <a href="<?php echo RUTA; ?>single.php?id=<?php echo $post['id']; ?>" class="continuar">Leer <i class="fa fa-arrow-right"></i></a>
                </article>
            </div>
        <?php endforeach; ?>
        
        <?php require 'pagination.php'; ?>
    </div>
    <?php require 'footer.php'; ?>
</body>
</html>