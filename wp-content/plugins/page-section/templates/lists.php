<?php if ( $query->have_posts() ) : ?>
    <!-- plugin lists.php -->
    <ul>
    <?php while ( $query->have_posts() ) : ?>
        <?php $query->the_post(); ?>
        <li>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php the_excerpt(); ?>
        </li>
    <?php endwhile; ?>
    </ul>
<?php endif; ?>