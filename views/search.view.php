<?php require 'header.php'; ?>

<div class="contenedor">
    <h2><?php echo $title ?></h2>
    <?php foreach($results as $result): ?>
        <div class="post">
            <article>
                <h2 class="titulo"><a href="<?php echo RUTA; ?>single.php?id=<?php echo $result['id']; ?>"><?php echo $result['titulo']; ?></a></h2>
                <p class="fecha"><?php echo set_date_format($result['fecha']); ?></p>
                <div class="thumb">
                    <a href="#">
                        <img src="<?php echo RUTA; ?>/images/<?php echo $result['thumb']; ?>" alt="">
                    </a>
                </div>
                <p class="extracto"><?php echo $result['extracto']; ?></p>
                <a href="<?php echo RUTA; ?>single.php?id=<?php echo $result['id']; ?>" class="continuar">Leer <i class="fa fa-arrow-right"></i></a>
            </article>
        </div>
    <?php endforeach; ?>
</div>
<?php require 'footer.php'; ?>
</body>
</html>