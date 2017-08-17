<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <!--Page Title-->
    <div class="page-title">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-6 col-xs-12 pull-left"><h1><?php the_title(); ?></h1></div>
                <div class="col-md-6 col-sm-6 col-xs-12 pull-right text-right path"><a href="#">Home</a>&ensp;<span class="fa fa-angle-right"></span>&ensp;<a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>
            </div>
        </div>
    </div>
    <!--Page Title Ends-->

    </section>
    <!--Page Banner Ends-->

<div class="main-content-area">

    <div class="auto-container">
        <div class="row clearfix">
            <section class="col-lg-12">
                <?php the_content(); ?>
            </section>
        </div>
    </div>

</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>