<?php get_header() ?>

<?php the_post() ?>

    <header>
        <span><?php the_category(", ") ?></span>
        <h1><?php the_title() ?></h1>
        <em>dipublikasi pada tanggal: <?php the_date('d/n/Y') ?></em>
    </header>

<div class="wrapper">
        <div class="content">
            <article>
                <?php the_content() ?>
            </article>

            <aside>
                <h3>Topik</h3>
                <?php get_template_part( "components/topics", "shortcut" ) ?>
            </aside>
        </div>

</div>

<?php get_footer() ?>