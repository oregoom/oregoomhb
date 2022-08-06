<?php get_header();  

if(have_posts()){
    
    while(have_posts()) : the_post(); ?>

        <div class="container pb-5 pt-3 pt-lg-5">

            <h1 class="pb-lg-3 pb-2 text-center" id="hb-title-historias"><strong><?php the_title(); ?></strong></h1>
        
            <div class="row pt-0 pt-lg-4 ">
                
                <article class="col-xl-8 col-lg-8"><?php    
    
                    //IMG destacada de POST
                    if( has_post_thumbnail() ) {

                        the_post_thumbnail('full', ['class' => 'img-fluid mb-4 rounded shadow-sm', 'alt' => get_the_title() ] ); 

                    } ?>
                    
                    <div class="pb-5">

                        <p id="hb-desc-historias" class="pb-md-3 border-bottom">Aquí tienes la <strong><?php the_title(); ?></strong> completamente ilustrada y además cada relato viene acompañado con un video para que puedas ver y disfrutar mucho mejor la lectura.</p>

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