<?php if ( $query->have_posts() ) : ?>
    <!--Slider-->
    <div class="slider clearfix">
        <?php while ( $query->have_posts() ) : ?>
            <?php $query->the_post(); ?>
            <?php $meta = get_post_meta( get_the_ID() ); ?>
            <!--Slide Item-->
            <article class="slide-item anim-5-all">
                <figure class="avatar">
                    <?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail();
                    }
                    ?>
                </figure>
                <div class="content">
                    <span class="curve"></span>
                    <div class="quote-text"><?php the_excerpt(); ?></div>
                    <div class="quote-author"><strong class="theme-color"><?php the_title(); ?>,</strong> <?php echo $meta['position'][0]; ?></div>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
    <!--Slider End-->
<?php endif; ?>