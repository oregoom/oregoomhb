<?php
/*
 * Template name: Antiguo & Nuevo Testamento
 * Template Post Type: page
 */

get_header();

if(have_posts()){
    
    while(have_posts()) : the_post(); ?>   

<!--<div class="d-none d-lg-block container-fluid pb-0 mb-0">
    
    <nav aria-label="breadcrumb" class="container d-none d-lg-block">

        <ol class="breadcrumb pl-0 pr-0 mb-0" style="background: #ffffff; font-size: 13px;">
            <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url()); ?>">Inicio</a></li>                                
            <li class="breadcrumb-item active text-dark" aria-current="page"><?php the_title(); ?></li>
        </ol>

    </nav>
    
</div>-->
    
<article class="container pb-5 pt-4 pt-lg-5"><?php

    //IMG destacada de POST
    //if( has_post_thumbnail() ) {

      //  the_post_thumbnail('full', array( 'class' => 'img-fluid rounded mb-4 mb-lg-5 ml-lg-5 mr-lg-5' )); 

    //} ?>
            
    <h1 class="text-center h2 border-bottom pb-3" style="font-family: 'Salsa'; font-size: 40px;"><strong><?php the_title(); ?></strong></h1>

    <!--//GOOGLE ADSENSE 728x90 (PC) -->
    <?php if(get_option('template_oregoom_adsense_728_90') != ''){ ?>                
        <div class="pt-2 text-center d-none d-lg-block">                        
            <?php echo get_option('template_oregoom_adsense_728_90'); ?>                        
        </div>                
    <?php } ?>
    
    <div class="pt-3 pt-lg-4 pb-5">
        
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