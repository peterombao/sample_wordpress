<?php if ( $query->have_posts() ) : ?>
    <!-- plugin lists.php -->
    <ul>
        <?php while ( $query->have_posts() ) : ?>
            <?php $query->the_post(); ?>
            <li data-transition="fade" data-slotamount="10" data-masterspeed="1500">

                <div class="caption lfb stb"
                     data-x="center"
                     data-y="top"
                     data-hoffset="0"
                     data-voffset="110"
                     data-speed="700"
                     data-start="500"
                     data-easing="easeOutExpo">
                    <h2 class="text-center theme-color"><span><?php the_title(); ?></span></h2>
                </div>
                <div class="caption lfb stb"
                     data-x="center"
                     data-y="top"
                     data-hoffset="0"
                     data-voffset="240"
                     data-speed="700"
                     data-start="1000"
                     data-easing="easeOutExpo">
                    <h4 class="text-center"><?php the_excerpt(); ?></h4>
                </div>
                <div class="caption lfb stb"
                     data-x="center"
                     data-y="top"
                     data-hoffset="0"
                     data-voffset="340"
                     data-speed="700"
                     data-start="1500"
                     data-easing="easeOutExpo">
                    <a href="#" class="theme-btn theme-color">BUY NOW</a> &ensp; <a href="<?php the_permalink(); ?>" class="theme-btn dark-btn">LEARN MORE</a>
                </div>
            </li>
        <?php endwhile; ?>
    </ul><!-- end ul -->
<?php endif; ?>