<?php get_header();  

if(have_posts()){
    
    while(have_posts()) : the_post(); ?>

        <div class="container pb-5 pt-4 pt-lg-5">

            <h1 class="pb-3 text-center" style="font-family: 'Salsa';"><strong><?php the_title(); ?></strong></h1>
        
            <div class="row pt-0 pt-lg-4 ">
                
                <article class="col-xl-8 col-lg-8"><?php    
    
                    //IMG destacada de POST
                    if( has_post_thumbnail() ) {

                        the_post_thumbnail('full', array( 'class' => 'img-fluid mb-4 rounded shadow-sm' )); 

                    } ?>
                    
                    <div class="pb-5">   

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

}

/*
 * ===============================
 * Pie de página 
 */
get_footer();