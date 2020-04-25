<div class="topics-shortcut">

    <?php 
        $categories = get_categories([
            "orderby" => "name",
            "order" => "desc"
        ]); 

        foreach($categories as $category):
            $permalink = get_category_link( $category );
            ?>

                <div class="topics-item">
                    <h3><a href="<?php echo $permalink ?>"><?php echo $category->name ?></a></h3>
                    <!-- <p><?php echo $category->description ?></p> -->
                    <p><a href="<?php echo $permalink ?>"><?php echo $category->description ?> &rarr;</a></p>
                </div>

            <?php
        endforeach;
    ?>

</div>