


<div class="container pb-5 pt-2 pt-lg-0"><?php
                
    if (!isset($_GET['v'])) { ?>

        <!-- Vídeo de YouTube (Escritorio) -->
        <?php if(get_post_meta(get_the_ID(), 'hb_idyoutube_post', true)){ 
            
            $ID_YouTube = get_post_meta(get_the_ID(), 'hb_idyoutube_post', true); ?>
            
            <div class="mb-4 mb-lg-5">
            
                <div class="text-center">

                    <a href="<?php echo get_permalink().'?v='.$ID_YouTube; ?>"  target="_self">

                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid rounded shadow-sm ml-lg-5 mr-lg-5">

                    </a>
                    
                </div>

            </div>

        <?php } else {
            
            //IMG destacada de POST
            if( has_post_thumbnail() ) {

                the_post_thumbnail('full', array( 'class' => 'img-fluid mb-4 mb-lg-5 rounded shadow-sm ml-lg-5 mr-lg-5' )); 

            } 
            
        }

    } ?>


    <div class="row">
        
        <article class="col-xl-8 col-lg-8">                
            
            <h1 class="pb-3 text-center h2"><strong> <?php the_title(); ?> </strong></h1>

            
            <?php if (!isset($_GET['v'])) { ?>

                <div class="text-center mb-3">

                    <a target="_self" class="btn btn-warning rounded-pill shadow-sm pl-5 pr-5" href="<?php echo get_permalink().'?v='.$ID_YouTube; ?>">

                        Ver video

                    </a>

                </div>
            
            <?php } ?>

            
            <div class="pt-lg-3 pb-5">

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
            
        </article> 

        <aside class="col-xl-4 col-lg-4 d-none d-lg-block">    
            
            <?php get_sidebar();?> 
            
        </aside>
        
    </div>


    
    <div class="border-top pt-3 mb-5">
        
        <h3 class="pt-2 h4" style="font-family: Raleway, sans-serif;">

            <strong>Más historias</strong>

        </h3>

        <div class="row pt-3 pb-3">

                <?php 
                //Post que no deben de mostrar en la consulta
                $NOT_post[] = get_the_ID();

                if(is_single()){ //Si es Index de Post

                    //Consulta que pertenece a una categoria específica 
                    $hb_query_1 = new WP_Query( array( 
                            'cat' => $ID_cat,
                            'orderby' => 'rand',
                            'post_status' => 'publish',
                            'posts_per_page' => 4,
                            'post__not_in' => $NOT_post
                        ));   

                    while ($hb_query_1->have_posts()) : $hb_query_1->the_post(); 

                        if(has_post_thumbnail()){ $NOT_post[] = get_the_ID(); ?>

                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 pb-3"><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?><h3 class="h6 pt-2" style="font-family: Raleway, sans-serif;"><strong><?php the_title(); ?></strong></h3></a></div>

                        <?php }                    

                    endwhile;

                    wp_reset_postdata(); 
                    
                } ?>

                <?php 
                //Consulta general
                $hb_query_2 = new WP_Query( array( 
                        'orderby' => 'rand',
                        'post_status' => 'publish',
                        'posts_per_page' => 8,
                        'post__not_in' => $NOT_post
                    ));   

                while ($hb_query_2->have_posts()) : $hb_query_2->the_post(); 

                    if(has_post_thumbnail()){ ?>

                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 pb-3">
                        <a class="text-dark" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?><h3 class="h6 pt-2" style="font-family: Raleway, sans-serif;"><strong><?php the_title(); ?></strong></h3></a>
                    </div>

                    <?php }                    

                endwhile;

                wp_reset_postdata(); ?>

        </div>
        
    </div>
    
</div>