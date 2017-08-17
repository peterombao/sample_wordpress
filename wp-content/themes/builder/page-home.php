<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php do_action( 'pagesection', array('name' => 'home-main-slider')); ?>
    </section>
    <!--Page Banner Ends-->

    <?php the_content(); ?>

<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>