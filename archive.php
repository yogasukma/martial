<?php get_header() ?>

    <header>
        <h1><?php the_archive_title() ?></h1>
        <?php the_archive_description("<em>", "</em>") ?>
    </header>

<div class="wrapper">

    <div class="content">

        <?php if (have_posts()): ?>
            <div class="post-summary">

                <?php
                    while(have_posts()) {
                        the_post();
                        get_template_part( "components/post", "summary" );
                    }
                ?>

            </div>

            <?php the_posts_navigation( ["prev_text" => "selanjutnya &raquo;", "next_text" => "&laquo; sebelumnya"] ) ?>
        <?php endif; ?>

    </div>
</div>

<?php get_footer("page") ?>