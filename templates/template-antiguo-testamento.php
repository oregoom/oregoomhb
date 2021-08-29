<?php
/*
 * Template name: Antiguo & Nuevo Testamento
 * Template Post Type: page
 */

get_header();

if(have_posts()){
    
    while(have_posts()) : the_post(); ?>   

<div class="d-none d-lg-block container-fluid pb-0 mb-0">
    
    <nav aria-label="breadcrumb" class="container d-none d-lg-block">

        <ol class="breadcrumb pl-0 pr-0 mb-0" style="background: #ffffff; font-size: 13px;">
            <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url()); ?>">Inicio</a></li>                                
            <li class="breadcrumb-item active text-dark" aria-current="page"><?php the_title(); ?></li>
        </ol>
        
    </nav>
    
</div>
    
<article class="container bg-white pb-5"><?php

    //IMG destacada de POST
    if( has_post_thumbnail() ) {

        the_post_thumbnail('full', array( 'class' => 'img-fluid mb-4 mb-lg-5 ml-lg-5 mr-lg-5' )); 

    } ?>
            
    <h1 class="pb-4 text-center" style="font-family: 'Salsa'; font-size: 40px;"><strong><?php the_title(); ?></strong></h1>
    
    <div class="pt-1 pt-lg-3 pb-5">
        
        <?php the_content(); ?>
        
    </div>  

</article> <?php
    
    endwhile;
    wp_reset_postdata();

} ?>



<?php

/*
 * ===============================
 * Pie de página 
 */
get_footer(); ?>