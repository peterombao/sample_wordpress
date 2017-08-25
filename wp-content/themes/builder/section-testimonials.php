<?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <!--Testimonials-->
        <section class="testimonials">
            <div class="auto-container">
                <div class="row clearfix">
                    <!--Section Title-->
                    <header class="sec-title clearfix">
                        <span class="double-line"></span> &ensp; <h1><?php the_title(); ?></h1> &ensp; <span class="double-line"></span>
                    </header>
                    <div class="quote-icon theme-color"><span class="fa fa-quote-left"></span></div>
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