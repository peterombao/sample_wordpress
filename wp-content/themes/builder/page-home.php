<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <!-- Main Slider -->
    <article class="main-slider">
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                    <li data-transition="fade" data-slotamount="10" data-masterspeed="1500">

                        <div class="caption lfb stb"
                             data-x="left"
                             data-y="top"
                             data-hoffset="0"
                             data-voffset="110"
                             data-speed="700"
                             data-start="500"
                             data-easing="easeOutExpo">
                            <h2><span class="bg">Make your</span><br><span class="bg">Dream TRUE With us</span></h2>
                        </div>
                        <div class="caption lfb stb"
                             data-x="left"
                             data-y="top"
                             data-hoffset="0"
                             data-voffset="245"
                             data-speed="700"
                             data-start="1000"
                             data-easing="easeOutExpo">
                            <h4>There are many variations of passages of Lorem Ipsum<br> available, but the majority have suffered alteration in some <br>form, by injected humour.</h4>
                        </div>
                        <div class="caption lfb stb"
                             data-x="left"
                             data-y="top"
                             data-hoffset="0"
                             data-voffset="340"
                             data-speed="700"
                             data-start="1500"
                             data-easing="easeOutExpo">
                            <a href="#" class="theme-btn theme-color">BUY NOW</a> &ensp; <a href="#" class="theme-btn dark-btn">LEARN MORE</a>
                        </div>
                        <div class="caption fade image right"
                             data-x="right"
                             data-y="bottom"
                             data-hoffset="0"
                             data-voffset="0"
                             data-speed="700"
                             data-start="2000"
                             data-easing="easeOutBack">
                            <img src="images/resource/main-slider-image-1.png" alt="">
                        </div>
                    </li>

                    <li data-transition="fade" data-slotamount="10" data-masterspeed="1500">

                        <div class="caption lfb stb"
                             data-x="center"
                             data-y="top"
                             data-hoffset="0"
                             data-voffset="110"
                             data-speed="700"
                             data-start="500"
                             data-easing="easeOutExpo">
                            <h2 class="text-center theme-color">Make your <br><span>Dream</span> TRUE With us</h2>
                        </div>
                        <div class="caption lfb stb"
                             data-x="center"
                             data-y="top"
                             data-hoffset="0"
                             data-voffset="240"
                             data-speed="700"
                             data-start="1000"
                             data-easing="easeOutExpo">
                            <h4 class="text-center">There are many variations of passages of Lorem Ipsum<br> available, but the majority have suffered alteration in some <br>form, by injected humour.</h4>
                        </div>
                        <div class="caption lfb stb"
                             data-x="center"
                             data-y="top"
                             data-hoffset="0"
                             data-voffset="340"
                             data-speed="700"
                             data-start="1500"
                             data-easing="easeOutExpo">
                            <a href="#" class="theme-btn theme-color">BUY NOW</a> &ensp; <a href="#" class="theme-btn dark-btn">LEARN MORE</a>
                        </div>
                    </li>

                    <li data-transition="fade" data-slotamount="10" data-masterspeed="1500">

                        <div class="caption lfb stb"
                             data-x="right"
                             data-y="top"
                             data-hoffset="0"
                             data-voffset="110"
                             data-speed="700"
                             data-start="500"
                             data-easing="easeOutExpo">
                            <h2 class="text-right theme-color-bg"><span>Make your</span><br><span>Dream TRUE With us</span></h2>
                        </div>
                        <div class="caption lfb stb"
                             data-x="right"
                             data-y="top"
                             data-hoffset="0"
                             data-voffset="240"
                             data-speed="700"
                             data-start="1000"
                             data-easing="easeOutExpo">
                            <h4 class="text-right">There are many variations of passages of Lorem Ipsum<br> available, but the majority have suffered alteration in some <br>form, by injected humour.</h4>
                        </div>
                        <div class="caption lfb stb"
                             data-x="right"
                             data-y="top"
                             data-hoffset="0"
                             data-voffset="340"
                             data-speed="700"
                             data-start="1500"
                             data-easing="easeOutExpo">
                            <a href="#" class="theme-btn theme-color">BUY NOW</a> &ensp; <a href="#" class="theme-btn dark-btn">LEARN MORE</a>
                        </div>
                        <div class="caption fade image left"
                             data-x="left"
                             data-y="bottom"
                             data-hoffset="0"
                             data-voffset="0"
                             data-speed="700"
                             data-start="2000"
                             data-easing="easeOutBack">
                            <img src="images/resource/main-slider-image-1.png" alt="">
                        </div>
                    </li>

                </ul><!-- end ul -->
            </div><!-- end tp-banner -->
        </div><!-- end banner-container -->
    </article>
    </section>
    <!--Page Banner Ends-->

    <?php the_content(); ?>

<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>