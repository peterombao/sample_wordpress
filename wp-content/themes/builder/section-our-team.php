<?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <section class="our-team home-page anim-5-all">
            <div class="auto-container">
                <div class="content-box">

                    <header class="sec-title">
                        <span class="double-line"></span> &ensp; <h1><?php the_title(); ?></h1> &ensp; <span class="double-line"></span>
                    </header>
                    <div class="clearfix"></div>
                    <?php the_content(); ?>
                    <?php do_action('have_lists'); ?>
                    <div class="clearfix"></div>
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