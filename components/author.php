<div class="author">

    <p>
        <?php 
            // @TODO: it should be dynamic, can be configured by admin 
            $page = get_post(182); 

            echo $page->post_content;
        ?>
    </p>

</div>