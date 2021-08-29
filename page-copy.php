<?php get_header() ?>

<?php 

if(have_posts()){
    
    while(have_posts()) : the_post(); ?>   

<div class="d-none d-lg-block pb-0 mb-0">

        <nav aria-label="breadcrumb" class="container d-none d-lg-block">
            <ol class="breadcrumb pl-0 pr-0 mb-0" style="background: #ffffff; font-size: 13px;">
                <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url()); ?>">Inicio</a></li>
                <li class="breadcrumb-item active text-dark" aria-current="page"><?php the_title(); ?></li>
            </ol>
        </nav>
    
</div>


<div class="container bg-white pb-5 pt-2 pt-lg-0"><?php    
    
    //IMG destacada de POST
    if( has_post_thumbnail() ) {

        the_post_thumbnail('full', array( 'class' => 'img-fluid mb-4 mb-lg-5 rounded shadow-sm ml-lg-5 mr-lg-5' )); 

    } ?>
    
        <div class="row">
            
            <article class="col-xl-8 col-lg-8">            
                
                <h1 class="pb-4 text-center"><strong> <?php the_title(); ?> </strong></h1>
                
                <?php $ID_post = get_the_ID(); ?>                
                
                <div class="pt-1 pt-lg-3 pb-5">        
                    <?php the_content(); ?>                    
                </div>     

            </article>  

            <aside class="col-xl-4 col-lg-4">      

                <?php get_sidebar();?>  
            
            </aside>
            
        </div> 
    
</div>

    <?php
    
    endwhile;
    wp_reset_postdata();    
} ?>



<?php

/*
 * ===============================
 * Pie de página 
 */
get_footer();