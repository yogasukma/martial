<div class="post">
    <header>
        <!-- <span><?php the_category(", ") ?></span> -->
        <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
    </header>

    <div class="content">
        <?php the_excerpt() ?>
    </div>
</div>