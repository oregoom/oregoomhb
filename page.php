<?php get_header();  

if(have_posts()){
    
    while(have_posts()) : the_post(); ?>

        <div class="container pb-5 pt-4 pt-lg-5">

            <h1 class="pb-3 text-center"><strong><?php the_title(); ?></strong></h1>
        
            <div class="row pt-2 pt-lg-4 ">
                
                <article class="col-xl-8 col-lg-8">                   
                    
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