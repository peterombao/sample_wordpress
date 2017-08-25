<?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <section class="our-services style-three">
            <div class="auto-container">
                <div class="container-box anim-5-all clearfix">
                    <div class="col-lg-4">
                        <?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail();
                        }
                        ?>
                    </div>
                    <div class="col-lg-8">
                        <header class="sec-title text-left style-two">
                            <h1>OUR <br> SERVICE</h1> &ensp; &ensp; <span class="double-line"></span> &ensp; &ensp;
                            <?php the_content(); ?>
                        </header>
                        <?php do_action('have_lists'); ?>
        </section>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <section>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    </section>
<?php endif; ?>