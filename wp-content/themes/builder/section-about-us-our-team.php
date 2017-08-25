<?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <!--Our Team-->
        <div class="our-team">
            <div class="sec-icon fa fa-user img-circle"></div>
            <h2><?php the_title(); ?></h2>
            <div class="clearfix"></div>

            <?php do_action('have_lists'); ?>
            <!--<article class="member col-md-3 col-sm-6 col-xs-12">
                <figure class="image">
                    <img src="images/resource/team-member-1.jpg" alt="" title="">
                    <div class="overlay anim-5-all"><div class="link-icon"><a href="mailto:abc@mail.com" class="fa fa-envelope-o"></a></div></div>
                </figure>
                <h3>Muhibbur  Rashid</h3>
                <h4>CEO</h4>
                <div class="description">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.</div>
                <div class="social">
                    <a href="#" class="fa fa-facebook-f"></a> &ensp; <a href="#" class="fa fa-twitter"></a> &ensp; <a href="#" class="fa fa-google-plus"></a> &ensp; <a href="#" class="fa fa-linkedin"></a>
                </div>
            </article>-->

            <div class="clearfix"></div>

        </div>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>
<?php endif; ?>