<?php get_header() ?>

<?php 

if(have_posts()){
    
    while(have_posts()) : the_post(); ?>  

<div class="d-none d-lg-block pb-0 mb-0">
    
    <?php if(is_single()){ ?>
        <nav aria-label="breadcrumb" class="container d-none d-lg-block">
            <ol class="breadcrumb pl-0 pr-0 mb-0" style="background: #ffffff; font-size: 13px;">
                <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url()); ?>">Inicio</a></li>
                <?php 
                if ( is_single() ) { //Si es single, pertenece a una CATEGORÍA. y mostrar el "slug" de la categoría
                    foreach((get_the_category()) as $category)
                    {
                        $ID_cat = $category->term_id
                    ?>    
                <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url().'/'.$category->slug.'/'); ?>"><?php echo $category->name; ?></a></li>
                    <?php
                    }	
                } ?> 
                <li class="breadcrumb-item active text-dark" aria-current="page"><?php the_title(); ?></li>
            </ol>
        </nav>
    <?php } ?> 
    
</div>


<div class="container bg-white pb-5">     
    
        <div class="row">
            
            <article class="col-xl-8 col-lg-7">
                
                
                <!-- Vídeo de YouTube (Escritorio) -->
                <?php if(get_post_meta(get_the_ID(), 'hb_idyoutube_post', true)){ 
                    
                    $ID_YouTube = get_post_meta(get_the_ID(), 'hb_idyoutube_post', true); ?>
                
                    <amp-lightbox id="my-lightbox-<?php echo $ID_YouTube; ?>" layout="nodisplay">
                        <div class="lightbox-youtube" tabindex="0">

                             <!-- Vídeo de YouTube -->
                             <div class="container">
                                 <div class="overflow-hidden">
                                    <!--<h5 class="text-light float-left">Alejandro Bullón</h5>-->
                                    <span role="button" class="text-light h2 float-right" on="tap:my-lightbox-<?php echo $ID_YouTube; ?>.close">&times;</span>
                                  </div>

                                  <div class="">
                                    <amp-youtube
                                    data-videoid="<?php echo $ID_YouTube; ?>"
                                    layout="responsive"
                                    width="480"
                                    height="270"
                                    ></amp-youtube>
                                  </div>
                            </div>

                        </div>
                    </amp-lightbox>
                
                    <!--AMP-->
<!--                    <div class="pb-3 text-center">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid" on="tap:my-lightbox-<?php echo $ID_YouTube; ?>">
                    </div>
                
                    <div class="text-center mb-4">
                        <button type="button" class="btn btn btn-block rounded-pill text-light" on="tap:my-lightbox-<?php echo $ID_YouTube; ?>" style="background-color: #FA6002;">
                            Ver video
                        </button>
                    </div>-->
                
                    <div class="pb-3 text-center">
                        <a href="<?php echo home_url().'/videos/?v='.$ID_YouTube; ?>"  target="_blank">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid">
                        </a>
                    </div>
                
                    <div class="text-center mb-4">
                        <a target="_blank" class="btn btn-block rounded-pill text-light" href="<?php echo home_url().'/videos/?v='.$ID_YouTube; ?>" style="background-color: #FA6002;">
                            Ver video
                        </a>
                    </div>

                <?php } else {
                    
                    //IMG destacada de POST
                    if( has_post_thumbnail() ) {

                        the_post_thumbnail('full', array( 'class' => 'img-fluid mb-4' )); 

                    } 
                    
                } ?>
                
                
                <h1 class="pb-4 mt-lg-5 mt-4 h2 text-lg-left text-center"><strong> <?php the_title(); ?> </strong></h1>
                
                
                <!--//GOOGLE ADSENSE (Movil) -->
                <?php if(get_option('template_oregoom_adsense_300_250') != ''){ ?>                
                    <div class="pb-4 text-center d-lg-none">
                        
                        <?php  echo get_option('template_oregoom_adsense_300_250'); ?>
                        
                    </div>                
                <?php } ?>

                
                <div class="pb-4">
                    <?php the_content(); ?> 
                </div>
                              
                
                
                <!-- COMPARTIR en Redes Sociales -->
                <div class="pb-4">
                    <div class="mb-2">
                        <span>
                            <strong>Comparte con tus amigos</strong>
                        </span>
                    </div>
                    
                    <div class="pb-1 d-flex align-items-center">
                        <span class="mr-2 d-lg-none">
                            <amp-social-share class="rounded" type="system" width="36" height="36" aria-label="Compartir"></amp-social-share>
                        </span>
                        
                        <span class="mr-2">
                            <amp-social-share class="rounded" type="facebook" data-param-app_id="216472885737679" width="36" height="36"></amp-social-share>
                        </span>

                        <span class="mr-2">
                            <amp-social-share class="rounded" type="twitter" width="36" height="36"></amp-social-share>
                        </span>

                        <span class="mr-2">
                            <amp-social-share class="rounded" type="whatsapp" width="36" height="36"></amp-social-share>
                        </span> 

                        <span class="mr-2">
                            <amp-social-share class="rounded"  aria-label="Share on LinkedIn"  type="linkedin"  width="36"  height="36"></amp-social-share>
                        </span>

                        <span class="mr-2">
                            <amp-social-share class="rounded"  aria-label="Share by email" type="email"  width="36" height="36"></amp-social-share>
                        </span>    
                    </div>
                </div>
                
                
                <h3 class="pt-2 h4" style="font-family: Raleway, sans-serif;">
                    <strong>Más historias</strong>
                </h3>
                
                <div class="row pt-3 pb-3">

                        <?php 
                        //Post que no deben de mostrar en la consulta
                        $NOT_post[] = get_the_ID();

                        //Consulta que pertenece a una categoria específica 
                        $hb_query_1 = new WP_Query( array( 
                                'cat' => $ID_cat,
                                'orderby' => 'rand',
                                'post_status' => 'publish',
                                'posts_per_page' => 3,
                                'post__not_in' => $NOT_post
                            ));   

                        while ($hb_query_1->have_posts()) : $hb_query_1->the_post(); 

                            if(has_post_thumbnail()){ $NOT_post[] = get_the_ID(); ?>

                            <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-3"><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?><h3 class="h6 pt-2" style="font-family: Raleway, sans-serif;"><strong><?php the_title(); ?></strong></h3></a></div>

                            <?php }                    

                        endwhile;

                        wp_reset_postdata(); ?>

                        <?php 
                        //Consulta general
                        $hb_query_2 = new WP_Query( array( 
                                'orderby' => 'rand',
                                'post_status' => 'publish',
                                'posts_per_page' => 3,
                                'post__not_in' => $NOT_post
                            ));   

                        while ($hb_query_2->have_posts()) : $hb_query_2->the_post(); 

                            if(has_post_thumbnail()){ ?>

                            <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-3">
                                <a class="text-dark" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?><h3 class="h6 pt-2" style="font-family: Raleway, sans-serif;"><strong><?php the_title(); ?></strong></h3></a>
                            </div>

                            <?php }                    

                        endwhile;

                        wp_reset_postdata(); ?>

                </div>
                
            </article> 
            
            <aside class="col-xl-4 col-lg-5">    
                
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


