
<article>

    <div class="container text-center pt-md-3 pt-lg-0 mb-md-5 container-hb-movil">

        <!-- Vídeo de YouTube -->
        <?php if(isset($ID_YouTube)){ ?>

            <div class="mb-4 mx-xl-5" on="tap:hb-video-yt-lb" style="position: relative;" id="hb-img-destacada">
                
                <div aria-label="Botón de reproducción" id="hb-btn-yt"><svg height="100%" version="1.1" viewBox="0 0 68 48" width="100%"><path class="hb-ytp-large-play-button-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path><path d="M 45,24 27,14 27,34" fill="#fff"></path></svg></div>
                
                <?php 

            } else { ?>

            <div class="mb-4 mx-xl-5">

            <?php }
                    
            //IMG destacada de POST
            if( has_post_thumbnail() ) {

                the_post_thumbnail('full', array( 'class' => 'img-fluid shadow hb-movil' )); 

            } ?>
                
            </div>

        </div>

    </div>

    <div class="container">

        <div class="px-lg-5">

            <div class="px-xl-5 mx-xl-5 h1-hb-movil">

                <h1 class="mb-lg-5 mb-4 text-center"><strong> <?php the_title(); ?> </strong></h1>

                <div class="pb-4">

                    <?php the_content(); ?>                    

                </div>

                <!-- COMPARTIR en Redes Sociales -->
                <div class="pb-5">

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

                    <div class="py-3 my-4 d-flex align-items-center border-light border-top border-bottom">

                        <div class="btn btn-light mr-auto">

                            <?php previous_post_link('<span class="text-white">%link</span>', '<< Historia anterior'); ?> 

                        </div>

                        <div class="btn btn-light text-right">

                            <?php next_post_link('<span class="text-white">%link</span>', 'Siguiente historia >>'); ?> 

                        </div>
                    
                    </div>

                </div>

            </div>
            
        </div>

    </div>

</article>


<div class="container">

    <div class="mb-4">
        
        <h3 class="h4" style="font-family: Raleway, sans-serif;">

            Más historias

        </h3>

        <div class="row pt-3">

                <?php 
                //Post que no deben de mostrar en la consulta
                $NOT_post[] = get_the_ID();

                if(is_single()){ //Si es Index de Post

                    //Consulta que pertenece a una categoria específica 
                    $hb_query_1 = new WP_Query( array( 
                            'cat' => $ID_cat,
                            'orderby' => 'rand',
                            'post_status' => 'publish',
                            'posts_per_page' => 2,
                            'post__not_in' => $NOT_post
                        ));   

                    while ($hb_query_1->have_posts()) : $hb_query_1->the_post(); 

                        if(has_post_thumbnail()){ $NOT_post[] = get_the_ID(); ?>

                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 mb-4">

                                <div class="mb-3 card border-0 shadow-sm text-center h-100">
                
                                    <a href="<?php echo the_permalink(); ?>"><img src="<?php the_post_thumbnail_url();?>" class="rounded-top"></a>
                
                                    <div class="card-body pt-lg-3 pt-2 pb-0">
                                        <h4 class="card-title h6 mb-2" style="line-height: 1.3em; font-family: Raleway, sans-serif; font-weight: 700; color: #2a3b47;">
                                            <a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a>
                                        </h4>
                                        
                                        <?php //Funcion para extraer 100 caracteres
                                            // hb_excerpt_100_caracteres(get_the_excerpt()); ?>
                                        
                                    </div>
                
                                </div>

                            </div>

                        <!--<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 pb-3"><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?><h3 class="h6 pt-2" style="font-family: Raleway, sans-serif;"><strong><?php the_title(); ?></strong></h3></a></div>-->

                        <?php }                    

                    endwhile;

                    wp_reset_postdata(); 
                    
                } ?>

                <?php 
                //Consulta general
                $hb_query_2 = new WP_Query( array( 
                        'orderby' => 'rand',
                        'post_status' => 'publish',
                        'posts_per_page' => 2,
                        'post__not_in' => $NOT_post
                    ));   

                while ($hb_query_2->have_posts()) : $hb_query_2->the_post(); 

                    if(has_post_thumbnail()){ ?>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 mb-4">

                            <div class="mb-3 card border-0 shadow-sm text-center h-100">

                                <a href="<?php echo the_permalink(); ?>"><img src="<?php the_post_thumbnail_url();?>" class="rounded-top"></a>

                                <div class="card-body pt-lg-3 pt-2 pb-0">
                                    <h4 class="card-title h6 mb-2" style="line-height: 1.3em; font-family: Raleway, sans-serif; font-weight: 700; color: #2a3b47;">
                                        <a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a>
                                    </h4>
                                    
                                    <?php //Funcion para extraer 100 caracteres
                                        //hb_excerpt_100_caracteres(get_the_excerpt()); ?>
                                    
                                </div>

                            </div>

                        </div>

                    <!--<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 pb-3">
                        <a class="text-dark" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?><h3 class="h6 pt-2" style="font-family: Raleway, sans-serif;"><strong><?php the_title(); ?></strong></h3></a>
                    </div>-->

                    <?php }                    

                endwhile;

                wp_reset_postdata(); ?>

        </div>
        
    </div>


    <div class="mb-5 pb-5">
        
        <h3 class="h4" style="font-family: Raleway, sans-serif;">

            Historias del Antiguo Testamento

        </h3>

        <div class="row pt-3 pb-2"><?php 


                    //Consulta que pertenece a una categoria específica 
                    $hb_query_at = new WP_Query( array( 
                            'meta_value' => 'AT',
                            'post_type' => 'page',
                            'orderby' => 'rand',
                            'post_status' => 'publish',
                            'posts_per_page' => 4,
                        ));   

                    while ($hb_query_at->have_posts()) : $hb_query_at->the_post(); 

                        if(has_post_thumbnail()){ ?>

                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 mb-4">

                                <div class="mb-3 card border-0 shadow-sm text-center h-100">
                
                                    <a href="<?php echo the_permalink(); ?>"><img src="<?php the_post_thumbnail_url();?>" class="rounded-top"></a>
                
                                    <div class="card-body pt-lg-3 pt-2 pb-0">
                                        <h4 class="card-title h6 mb-2" style="line-height: 1.3em; font-family: Raleway, sans-serif; font-weight: 700; color: #2a3b47;">
                                            <a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a>
                                        </h4>
                                        
                                        <?php //Funcion para extraer 100 caracteres
                                            //hb_excerpt_100_caracteres(get_the_excerpt()); ?>
                                        
                                    </div>
                
                                </div>

                            </div>

                        <?php }                    

                    endwhile;

                    wp_reset_postdata(); ?>

        </div>

        <div class="text-center mb-2">

            <a href="<?php echo esc_url(home_url().'/antiguo-testamento/'); ?>" class="btn rounded-pill text-white" style="padding-left: 30px; padding-right: 30px; background-color: #FA6002;">Más historias aquí</a>
                
        </div>
        
    </div>



</div>

<amp-lightbox id="hb-video-yt-lb" layout="nodisplay" scrollable style="background: rgba(0,0,0,.9);">

    <div class="lightbox" tabindex="0">

        <!-- Vídeo de YouTube -->
        <div class="container px-lg-5">

            <div class="px-xl-5">

                <div class="d-flex justify-content-end mb-3">
                    <img src="<?php echo get_template_directory_uri().'/img/og-close-video-yt.png'; ?>" alt="close" width="32" height="32" class="rounded-circle" on="tap:hb-video-yt-lb.close">
                </div>

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