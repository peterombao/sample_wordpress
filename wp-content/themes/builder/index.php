<?php get_header(); ?>
    <!--Page Title-->
    <div class="page-title">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-6 col-xs-12 pull-left"><h1>Blog</h1></div>
                <div class="col-md-6 col-sm-6 col-xs-12 pull-right text-right path"><a href="#">Home</a>&ensp;<span class="fa fa-angle-right"></span>&ensp;<a href="#">Blog Default</a></div>
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
                    <!--Blog Post-->
                    <article class="blog-post">
                        <div class="post-inner anim-5-all">

                            <figure class="image">
                                <img src="images/resource/blog-post-image-4.jpg" alt="" title="">
                                <div class="overlay anim-5-all"><div class="link-icon"><a href="blog-detail.html" class="fa fa-anchor"></a></div></div>
                            </figure>
                            <div class="content">
                                <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?> </a></h3>
                                <div class="description"><?php the_excerpt(); ?></div>
                                <div class="info clearfix">
                                    <p class="more pull-right text-right"><a href="<?php the_permalink() ?>">Read More</a></p>
                                    <p class="date pull-left">posted on <span class="theme-color"><?php the_date('d M, Y'); ?></span></p>
                                </div>
                            </div>

                        </div>
                    </article>

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
						<?php 
						wp_list_categories(
							array(
								'title_li' => ''
							)
						); 
						?>
                        <!--<li><a href="#"><span class="fa fa-angle-right"></span>&ensp; Business</a></li>-->
                    </ul>

                </nav>

                <!-- Archives -->
                <nav class="widget link-list">
                    <h2>Archives</h2>
                    <ul>
						<?php wp_get_archives(); ?>
                        <!--<li><a href="#"><span class="fa fa-angle-right"></span>&ensp;&ensp; December 2013</a></li>-->
                    </ul>

                </nav>



            </aside>

        </div>
    </div>

</div>
<?php get_footer(); ?>