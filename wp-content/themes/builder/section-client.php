<?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <!--Client Logos-->
        <section class="client-logos">
            <div class="auto-container">
                <div class="row anim-5-all clearfix">
                    <?php the_content(); ?>
                    <?php do_action('have_lists'); ?>
                </div>
            </div>
        </section>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <section>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    </section>
<?php endif; ?>