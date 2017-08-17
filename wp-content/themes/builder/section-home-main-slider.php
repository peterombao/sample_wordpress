<?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <!-- Main Slider -->
        <article class="main-slider">
            <div class="tp-banner-container">
                <div class="tp-banner">
                    <?php do_action('have_lists'); ?>
                </div><!-- end tp-banner -->
            </div><!-- end banner-container -->
        </article>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <section>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    </section>
<?php endif; ?>