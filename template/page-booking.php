<?php
/**
 * Template Name: Booking
 */
get_header();
if( have_posts() ) :
    while ( have_posts() ) :
        the_post();
        ?>
        <main id="main" class="site-main" role="main">
           <?php the_content(); ?>
           <div id="total1"></div>
        </main>
        <?php
    endwhile; 
endif;
get_footer();