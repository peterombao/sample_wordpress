<?php if ( $query->have_posts() ) : ?>
    <div class="service-style-three-wrap">
        <?php while ( $query->have_posts() ) : ?>
            <?php $query->the_post(); ?>
            <?php $meta = get_post_meta( get_the_ID() ); ?>
            <div class="col-lg-6 single-service-style-three skew-right-one">
                <div class="border">
                    <i class="flaticon <?php echo $meta['icon'][0]; ?>"></i>
                    <div class="content">
                        <h4><?php the_title(); ?></h4>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>">Read More</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>