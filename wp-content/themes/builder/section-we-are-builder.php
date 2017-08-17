<?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <!--Featured Services-->
        <section class="featured-services">
            <div class="auto-container">

                <!--Box Container-->
                <div class="container-box anim-5-all">
                    <div class="bar bg-white"></div>
                    <header class="sec-title">
                        <span class="double-line"></span> &ensp; <h1><?php the_title(); ?></h1> &ensp; <span class="double-line"></span>
                        <?php the_content(); ?>
                    </header>
                    <?php do_action('have_lists'); ?>
                    <div class="clearfix"></div>
                </div>
                <!--Box Container End-->

            </div>
        </section>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <section>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    </section>
<?php endif; ?>