<?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <!--About Us-->
        <section class="about-us anim-5-all clearfix">

            <!--Who we are-->
            <div class="who-we-are clearfix">
                <div class="sec-icon fa fa-user img-circle"></div>
                <h2><?php the_title(); ?></h2>
                <div class="clearfix"></div>
                <div class="col-md-6 col-sm-6 col-xs-12 image">
                    <?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail();
                    }
                    ?>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text">
                    <?php the_content(); ?>
                    <?php do_action('have_lists'); ?>
                </div>
            <div class="clearfix"></div>
        </div>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <section>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    </section>
<?php endif; ?>