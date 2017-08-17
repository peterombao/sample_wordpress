<?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : ?>
        <?php $query->the_post(); ?>
        <?php $meta = get_post_meta( get_the_ID() ); ?>
        <article class="member col-md-3 col-sm-6 col-xs-12">
            <figure class="image">
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail();
                }
                ?>
                <div class="overlay anim-5-all"><div class="link-icon"><a href="mailto:abc@mail.com" class="fa fa-envelope-o"></a></div></div>
            </figure>
            <h3><?php the_title(); ?></h3>
            <h4><?php echo $meta['position'][0]; ?></h4>
            <div class="description"><?php the_excerpt(); ?></div>
            <div class="social">
                <a href="#" class="fa fa-facebook-f"></a> &ensp; <a href="#" class="fa fa-twitter"></a> &ensp; <a href="#" class="fa fa-google-plus"></a> &ensp; <a href="#" class="fa fa-linkedin"></a>
            </div>
        </article>
    <?php endwhile; ?>
<?php endif; ?>