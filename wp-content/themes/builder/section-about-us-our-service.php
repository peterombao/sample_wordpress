<?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <!--Our Services-->
        <div class="our-services about clearfix">
            <div class="sec-icon fa fa-user img-circle"></div>
            <h2><?php the_title(); ?></h2>
            <div class="clearfix"></div>
            <?php do_action('have_lists'); ?>
            <!--<article class="service-box col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <figure class="icon img-circle"><span class="fa fa-pause"></span></figure>
                <div class="description">
                    <h3><a href="#">Construction</a></h3>
                    <div class="content">
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </article>-->

            <div class="clearfix"></div>
        </div>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>
<?php endif; ?>