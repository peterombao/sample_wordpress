<?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <!-- plugin section.php -->
        <section>
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
            <?php do_action('have_lists'); ?>
        </section>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <section>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    </section>
<?php endif; ?>