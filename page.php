<?php get_header() ?>

<?php the_post() ?>

<div class="wrapper">

    <header>
        <h1><?php the_title() ?></h1>
    </header>

    <div class="content">
        <?php the_content() ?>
    </div>

</div>

<?php get_footer( "page" ) ?>