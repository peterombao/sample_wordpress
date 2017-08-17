<?php if ( $query->have_posts() ) : ?>
    <div class="client-carsoule">
        <?php while ( $query->have_posts() ) : ?>
            <?php $query->the_post(); ?>
            <div class="slide-item">
                <a href="<?php the_permalink(); ?>">
                    <?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail();
                    }
                    ?>
                </a>
            </div>
        <?php endwhile; ?>
    </div>
    <!--logos-->
<?php endif; ?>