<?php if ( $query->have_posts() ) : ?>
        <?php $categoryCounter = 1; ?>
        <?php $categoryTemplate = 2; ?>
        <?php while ( $query->have_posts() ) : ?>
            <?php $query->the_post(); ?>
            <?php
            if($categoryCounter % 2 != 0){
                if($categoryTemplate == 2){
                    $categoryTemplate = $categoryTemplate - 1;
                }else{
                    $categoryTemplate = $categoryTemplate + 1;
                }
            }
            ?>
            <div class="col-lg-6 single-what-we-do clearfix <?php echo $categoryTemplate == 1 ? '' : 'content-left'; ?>">
                <div class="img-wrap ">
                    <?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail();
                    }
                    ?>
                    <div class="overlay">
                        <div class="link">
                            <a href="#" class="fa fa-link"></a>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <h3><?php the_title(); ?></h3>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>">Read More</a>
                </div>
            </div>
            <?php $categoryCounter++; ?>
        <?php endwhile; ?>
<?php endif; ?>