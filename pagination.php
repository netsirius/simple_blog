<?php $num_pages = get_num_pages($blog_config['posts_per_page'], $connection); ?>
<section class="paginacion">
    <ul>
        <?php if(actual_page() === 1): ?>
            <li class="disabled">&laquo;</li>
        <?php else: ?>
            <li class="enabled"><a href="index.php?page=<?php echo actual_page() - 1 ?>">&laquo;</a></li>
        <?php endif; ?>

        <?php for($i = 1; $i <= $num_pages; $i++): ?>
            <?php if(actual_page() === $i): ?>
                <li class="active">
                    <?php echo $i; ?>
                </li>
            <?php else: ?>
                <li><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if(actual_page() == $num_pages): ?>
            <li class="disabled">&raquo;</li>
        <?php else: ?>
            <li class="enabled"><a href="index.php?page=<?php echo actual_page() + 1 ?>">&raquo;</a></li>
        <?php endif; ?>

    </ul>
</section>