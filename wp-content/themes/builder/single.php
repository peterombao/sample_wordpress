<?php get_header(); ?>
    <!--Page Title-->
    <div class="page-title">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-6 col-xs-12 pull-left"><h1>Blog Details</h1></div>
                <div class="col-md-6 col-sm-6 col-xs-12 pull-right text-right path"><a href="#">Home</a>&ensp;<span class="fa fa-angle-right"></span>&ensp;<a href="#">Blog</a>&ensp;<span class="fa fa-angle-right"></span>&ensp;<a href="#">Blog Details</a></div>
            </div>
        </div>
    </div>
    <!--Page Title Ends-->

    </section>
    <!--Page Banner Ends-->

<div class="main-content-area bg-grey">

    <div class="auto-container">
        <div class="row clearfix">

        <!--Blog-->
        <section class="blog-area col-xs-12">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <!--Blog Details-->
                <article class="blog-details">
                    <div class="post-inner anim-5-all">

                        <figure class="image"><img src="images/resource/blog-post-image-4.jpg" alt="" title=""></figure>
                        <div class="content">
                            <h3><?php the_title(); ?> </h3>
                            <div class="data-content">
                                <?php the_content(); ?>
                            </div>

                            <div class="info clearfix">
                                <div class="date pull-left">posted on <span class="theme-color">21 Feb</span>, 2015</div>
                                <div class="share pull-right text-right"><a href="#" class="fa fb fa-facebook-f"></a> &ensp; <a href="#" class="fa fa-twitter twitter"></a> &ensp; <a href="#" class="fa fa-google-plus google-plus"></a> &ensp; <a href="#" class="fa fa-linkedin linkedin"></a></div>
                            </div>
                        </div>

                    </div>
                </article>
                <!--Blog Details End-->

            <?php endwhile; else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
        </section>
            <!--Blog End-->

            <!-- Side Bar -->
            <aside class="sidebar col-xs-12 pull-right anim-5-all">

                <!-- Search Form -->
                <div class="widget search-form">

                    <form method="post" action="blog.html">
                        <div class="form-group">
                            <input type="search" name="search" value="" placeholder="Search">
                            <input type="submit" name="submit" value="">
                        </div>
                    </form>

                </div>

                <!-- Categories -->
                <nav class="widget link-list">
                    <h2>Categories</h2>

                    <ul>
                        <li><a href="#"><span class="fa fa-angle-right"></span>&ensp; Business</a></li>
                        <li><a href="#"><span class="fa fa-angle-right"></span>&ensp; Fashion</a></li>
                        <li><a href="#"><span class="fa fa-angle-right"></span>&ensp; Media</a></li>
                        <li><a href="#"><span class="fa fa-angle-right"></span>&ensp; Region</a></li>
                        <li><a href="#"><span class="fa fa-angle-right"></span>&ensp; Sports</a></li>
                        <li><a href="#"><span class="fa fa-angle-right"></span>&ensp; Photographs</a></li>
                        <li><a href="#"><span class="fa fa-angle-right"></span>&ensp; Kids</a></li>
                    </ul>

                </nav>

                <!-- Archives -->
                <nav class="widget link-list">
                    <h2>Archives</h2>
                    <ul>
                        <li><a href="#"><span class="fa fa-angle-right"></span>&ensp;&ensp; December 2013</a></li>
                        <li><a href="#"><span class="fa fa-angle-right"></span>&ensp;&ensp; November 2013</a></li>
                        <li><a href="#"><span class="fa fa-angle-right"></span>&ensp;&ensp; October 2013</a></li>
                        <li><a href="#"><span class="fa fa-angle-right"></span>&ensp;&ensp; September 2013</a></li>
                        <li><a href="#"><span class="fa fa-angle-right"></span>&ensp;&ensp; August 2013</a></li>
                        <li><a href="#"><span class="fa fa-angle-right"></span>&ensp;&ensp; Photographs</a></li>
                        <li><a href="#"><span class="fa fa-angle-right"></span>&ensp;&ensp; July 2013</a></li>
                    </ul>

                </nav>



            </aside>

        </div>
    </div>

</div>
<?php get_footer(); ?>