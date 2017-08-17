<?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <!-- plugin section.php -->
        <!--Our History-->
        <section class="our-history parallax-section text-center" style="background-image:url(<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url() : ''; ?>);">
            <h3><?php the_title(); ?></h3>
            <?php the_content(); ?>
            <a href="#" class="theme-btn full-btn">Buy Now</a>
            <?php do_action('have_lists'); ?>
        </section>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <section>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    </section>
<?php endif; ?>