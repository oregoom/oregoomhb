<?php
/*
 * Template name: Página de Videos
 * Template Post Type: page
 */

get_header();

if(have_posts()){
    
    while(have_posts()) : the_post(); 
    
        $URL_page = get_permalink();
       
    if (isset($_GET['v'])) {
        
        $ID_YouTube = $_GET['v']; ?>

        <div class="bg-dark d-none d-sm-block">
            <div class="container-lg container-fluid pl-lg-5 pr-lg-5 pt-lg-3 pb-lg-3 p-0">
                <amp-youtube
                data-videoid="<?php echo $ID_YouTube; ?>"
                layout="responsive"
                width="480"
                height="270"
                ></amp-youtube>
            </div>
        </div>

        <div class="bg-dark sticky-top d-sm-none">
            <div class="container-lg container-fluid pl-lg-5 pr-lg-5 pt-lg-3 pb-lg-3 p-0">
                <amp-youtube
                data-videoid="<?php echo $ID_YouTube; ?>"
                layout="responsive"
                width="480"
                height="270"
                ></amp-youtube>
            </div>
        </div><?php

    } ?>



<main>
    <article>
        
        <section class="container pt-5">
            
            <h1 class="pb-2 text-center" style="font-family: 'Salsa'; font-weight: 600; font-size: 50px;"><span style="color: #f76300;">Buscar</span> videos<?php // the_title(); ?></h1>
            
            <div class="ml-auto mr-auto" id="get_search" style="max-width: 60%;">
                <?php get_search_form(); ?>            
            </div>
            
            <div class="mt-3 text-center d-none d-md-block">
                <a href="https://historiasdelabiblia.org/antiguo-testamento/" class="btn btn-light shadow-sm mr-2">Antiguo Testamento</a>
                <a href="https://historiasdelabiblia.org/nuevo-testamento/" class="btn btn-light shadow-sm ml-2">Nuevo Testamento</a>
            </div>
            
            <div class="mt-3 mb-5 text-center">
                
                <!--//GOOGLE ADSENSE 728x90 (PC) -->
                <?php if(get_option('template_oregoom_adsense_728_90') != ''){ ?>                
                    <div class="text-center d-none d-lg-block">                        
                        <?php echo get_option('template_oregoom_adsense_728_90'); ?>                        
                    </div>                
                <?php } ?>
                
                <!--//GOOGLE ADSENSE 300x250 (Movil) -->
                <?php if(get_option('template_oregoom_adsense_300_250') != ''){ ?>                
                    <div class="text-center d-lg-none">                        
                        <?php  echo get_option('template_oregoom_adsense_300_250'); ?>                        
                    </div>                
                <?php } ?>
                
            </div>
            
        </section>
        
        
        <section class="pb-lg-5 pt-2">
            
            <div class="container mt-4">

                <div class="row">

                    <?php            
                    $query_videos_hb = new WP_Query( array (
                            'post_type' => array( 'post', 'page' ),
                            'post_status' => 'publish',
                            'orderby' => 'rand',
                            'posts_per_page' => 64
                            ));            
                    ?>

                    <?php if($query_videos_hb->have_posts()){ ?>

                    <?php while($query_videos_hb->have_posts()) : $query_videos_hb->the_post();
                    
                        if(get_post_type() == "page"){
                            
                            $ID_YouTube_video = get_post_meta(get_the_ID(), 'hb_idyoutube_page', true);
                            
                        } elseif(get_post_type() == "post" ){
                            
                            $ID_YouTube_video = get_post_meta(get_the_ID(), 'hb_idyoutube_post', true);
                            
                        }
                        
                        if( $ID_YouTube_video != "" ){ ?>
                            
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-3">
                                <a href="<?php echo $URL_page; ?>?v=<?php echo $ID_YouTube_video; ?>">
                                    <?php the_post_thumbnail('post-thumbnail', array( 'class' => "img-fluid" )); ?>
                                </a>

                                <div class="pt-2 m-0 pb-3" style="font-family: Raleway, sans-serif;">
                                    <a href="<?php echo $URL_page; ?>?v=<?php echo $ID_YouTube_video; ?>" class="text-dark">
                                        <h2 class="p-0 m-0" style="line-height: 0.5em;">
                                            <span class="h6" style="font-weight: 600;"><?php the_title(); ?></span>
                                        </h2>
                                    </a>
                                </div>
                            </div> <?php
                            
                        }
                        
                    endwhile; ?> 

                    <?php wp_reset_postdata(); ?>      

                    <?php } ?>

                </div>
            
            </div>
                        
        </section>
            
        <section class="container pt-5 pb-5">
            
            <?php the_content(); ?>  
            
        </section>
            
        
        
    </article>    
    
</main><?php
    
    endwhile;
    wp_reset_postdata();    
} ?>



<?php

/*
 * ===============================
 * Pie de página 
 */
get_footer();