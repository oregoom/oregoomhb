

<div class="container">

    <article class="mx-lg-5"><?php
                
        if (!isset($_GET['v'])) { ?>
    
            <!-- ID Vídeo de YouTube -->
    
            <?php if(is_single()){ ?>
    
                <?php if(get_post_meta(get_the_ID(), 'hb_idyoutube_post', true)){ 
                    
                    $ID_YouTube = get_post_meta(get_the_ID(), 'hb_idyoutube_post', true); ?>
                    
                    <div class="mb-4 mb-lg-5">
                    
                        <div class="text-center">
    
                            <a href="<?php echo get_permalink().'?v='.$ID_YouTube; ?>"  target="_self">
    
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid rounded shadow-sm">
    
                            </a>
                            
                        </div>
    
                    </div>
    
                <?php } else {
                    
                    //IMG destacada de POST
                    if( has_post_thumbnail() ) { ?>
    
                        <div class="text-center"><?php
    
                            the_post_thumbnail('full', array( 'class' => 'img-fluid mb-4 mb-lg-5 rounded shadow-sm' )); ?>

                        </div><?php
    
                    } 
                }
                
            } else {
    
                if(get_post_meta(get_the_ID(), 'hb_idyoutube_page', true)){ 
                    
                    $ID_YouTube = get_post_meta(get_the_ID(), 'hb_idyoutube_page', true); ?>
                    
                    <div class="mb-4 mb-lg-5">
                    
                        <div class="text-center">
    
                            <a href="<?php echo get_permalink().'?v='.$ID_YouTube; ?>"  target="_self">
    
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid rounded shadow-sm">
    
                            </a>
                            
                        </div>
    
                    </div>
    
                <?php } else {
                    
                    //IMG destacada de POST
                    if( has_post_thumbnail() ) { ?>

                        <div class="text-center"><?php
    
                            the_post_thumbnail('full', array( 'class' => 'img-fluid mb-4 mb-lg-5 rounded shadow-sm' )); ?>

                        </div><?php
    
                    } 
                }
    
            }
    
        } ?>


        <div class="row">

            <div class="col-1 text-center d-none d-lg-block" style="position: -webkit-sticky; position: sticky;  top: 200px; height: 100vh; max-height: calc(100vh - 200px);">

                <?php previous_post_link( '%link', '<img width="53" height="100" src="'. get_template_directory_uri() . '/img/btn-previous.png">' ); ?>

            </div>

            <div class="col px-xl-4">

                <h1 class="pb-3 text-center h2"><strong> <?php the_title(); ?> </strong></h1>

                <?php if (!isset($_GET['v'])) { 
                    
                    if(isset($ID_YouTube)){ ?>

                        <div class="text-center mb-3">

                            <a target="_self" class="btn btn-warning rounded-pill shadow-sm pl-5 pr-5" href="<?php echo get_permalink().'?v='.$ID_YouTube; ?>">

                                Ver video

                            </a>

                        </div><?php 

                    }
                    
                } ?>

                
                <div class="pt-lg-3 pb-4">

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
                    
                </div>

            </div>

            <div class="col-1 text-center d-none d-lg-block" style="position: -webkit-sticky; position: sticky;  top: 200px; height: 100vh; max-height: calc(100vh - 200px);">

                <?php next_post_link( '%link', '<img width="53" height="100" src="'. get_template_directory_uri() . '/img/btn-next.png">' ); ?>
                    
            </div>

        </div>

    </article>


    <div class="border-top pt-3 mb-4">
        
        <h3 class="pt-2 h4" style="font-family: Raleway, sans-serif;">

            Más historias

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
                            'posts_per_page' => 3,
                            'post__not_in' => $NOT_post
                        ));   

                    while ($hb_query_1->have_posts()) : $hb_query_1->the_post(); 

                        if(has_post_thumbnail()){ $NOT_post[] = get_the_ID(); ?>

                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">

                                <div class="mb-3 card border-0 shadow-sm text-center">
                
                                    <a href="<?php echo the_permalink(); ?>"><img src="<?php the_post_thumbnail_url();?>" class="rounded-top"></a>
                
                                    <div class="card-body pt-lg-3 pt-2">
                                        <h4 class="card-title h5 mb-2" style="line-height: 1.3em; font-family: Raleway, sans-serif; font-weight: 700; color: #2a3b47;">
                                            <a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a>
                                        </h4>
                                        
                                        <?php //Funcion para extraer 100 caracteres
                                            hb_excerpt_100_caracteres(get_the_excerpt()); ?>
                                        
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
                        'posts_per_page' => 6,
                        'post__not_in' => $NOT_post
                    ));   

                while ($hb_query_2->have_posts()) : $hb_query_2->the_post(); 

                    if(has_post_thumbnail()){ ?>

                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">

                            <div class="mb-3 card border-0 shadow-sm text-center">

                                <a href="<?php echo the_permalink(); ?>"><img src="<?php the_post_thumbnail_url();?>" class="rounded-top"></a>

                                <div class="card-body pt-lg-3 pt-2">
                                    <h4 class="card-title h5 mb-2" style="line-height: 1.3em; font-family: Raleway, sans-serif; font-weight: 700; color: #2a3b47;">
                                        <a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a>
                                    </h4>
                                    
                                    <?php //Funcion para extraer 100 caracteres
                                        hb_excerpt_100_caracteres(get_the_excerpt()); ?>
                                    
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


    <div class="border-top pt-3 mb-5 pb-5">
        
        <h3 class="pt-2 h4" style="font-family: Raleway, sans-serif;">

            Historias del Antiguo Testamento

        </h3>

        <div class="row pt-3 pb-2"><?php 


                    //Consulta que pertenece a una categoria específica 
                    $hb_query_at = new WP_Query( array( 
                            'meta_value' => 'AT',
                            'post_type' => 'page',
                            'orderby' => 'rand',
                            'post_status' => 'publish',
                            'posts_per_page' => 6,
                        ));   

                    while ($hb_query_at->have_posts()) : $hb_query_at->the_post(); 

                        if(has_post_thumbnail()){ ?>

                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-3">

                                <div class="mb-3 card border-0 shadow-sm text-center">
                
                                    <a href="<?php echo the_permalink(); ?>"><img src="<?php the_post_thumbnail_url();?>" class="rounded-top"></a>
                
                                    <div class="card-body pt-lg-3 pt-2">
                                        <h4 class="card-title h5 mb-2" style="line-height: 1.3em; font-family: Raleway, sans-serif; font-weight: 700; color: #2a3b47;">
                                            <a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a>
                                        </h4>
                                        
                                        <?php //Funcion para extraer 100 caracteres
                                            hb_excerpt_100_caracteres(get_the_excerpt()); ?>
                                        
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