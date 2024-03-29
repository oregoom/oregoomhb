<?php
/*
 * Template name: Antiguo & Nuevo Testamento
 * Template Post Type: page
 */

get_header();

if(have_posts()){
    
    while(have_posts()) : the_post(); ?>   
    
        <article class="container pb-5 pt-4 pt-lg-5">
                    
            <h1 class="text-center px-xl-5" id="hb-title-at-nt"><?php the_title(); ?></h1>
            
            <div class="pt-2 pt-lg-4 pb-5">
                
                <?php the_content(); ?>
                
            </div>  

        </article> <?php
    
    endwhile;
    wp_reset_postdata();

} 

/*
 * ===============================
 * Pie de página 
 */
get_footer(); ?>