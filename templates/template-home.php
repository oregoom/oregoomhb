<?php
/*
 * Template name: Página de Inicio
 * Template Post Type: page
 */

get_header();

if(have_posts()){
    
    while(have_posts()) : the_post(); 
        
//        echo esc_html__(get_the_content());
    
//        $Content_home_page = get_the_content(); ?>

<main>
    <article>
        
        
        
        
        <section class="container pt-0 mt-0 mb-0 pb-2 pt-lg-4 mt-lg-4 pb-lg-5">
            
            <h1 class="pt-4 pb-2 text-center" style="font-family: 'Salsa'; font-weight: 600; font-size: 56px;"><span style="color: #f76300;">Historias</span> de la Biblia<?php // the_title(); ?></h1>
            
            <div class="ml-auto mr-auto" id="get_search" style="max-width: 60%;">
                <?php get_search_form(); ?>            
            </div>
            
            <div class="mt-3 mb-5 text-center">
                <a href="https://historiasdelabiblia.org/antiguo-testamento/" target="_self" class="btn btn-dark shadow-sm mr-2">Antiguo Testamento</a>
                <a href="https://historiasdelabiblia.org/nuevo-testamento/" target="_self" class="btn btn btn-dark shadow-sm ml-2">Nuevo Testamento</a>
            </div>
            
            <!--//GOOGLE ADSENSE (728x90) -->
            <?php if(get_option('template_oregoom_adsense_728_90') != ''){ ?>                
                <div class="pt-4 mt-2 pb-2 text-center d-none d-lg-block">

                    <?php  echo get_option('template_oregoom_adsense_728_90'); ?>

                </div>                
            <?php } ?>
            
            <div class="text-center mt-md-0 pt-4 mb-5">
                
                <p><strong>Bienvenido</strong> a nuestro sitio web <strong>historiasdelabiblia.org</strong>, que está repleta de historias que todos hemos escuchado alguna vez. Y es por eso que en este sitio web podrás encontrar las mejores y grandes  <strong>HISTORIAS de la BIBLIA</strong>, tanto para adultos, jóvenes y niños completamente ilustradas para que puedas disfrutar de la lectura.</p>
            
            </div>

            <div class="mb-5 text-center">

                <h2 class="mb-4">Las mejores historias de la Biblia para leer</h2> 
                
                <div class="row">

                    <?php            
                    $query_home_hb = new WP_Query( array (
                            'post_type' => 'page',
                            'post_status' => 'publish',
                            'orderby' => 'rand',
                            'meta_key'  => 'hb_atnt_page',
                            'meta_query' => array(
                                                array(
                                                    'key'     => 'hb_atnt_page',
                                                    'value'   => array( 'AT', 'NT' ),
                                                ),
                                            ),
                            'posts_per_page' => 4
                            ));     

                    if($query_home_hb->have_posts()) {

                        $post_home_destacado = 1;

                        while($query_home_hb->have_posts()) : $query_home_hb->the_post(); ?>

                            <div class="col-xl-3 col-lg-4 col-md-6 mb-4 <?php if($post_home_destacado == 3){ echo "d-none d-lg-block"; } if($post_home_destacado == 4){ echo "d-none d-xl-block"; } ?>">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid rounded shadow']); ?>
                                    <!--<img class="rounded-top img-fluid" src="https://historiasdelabiblia.org/wp-content/uploads/2021/04/historias-de-lot.jpg">-->
                                </a>

                                <div class="pt-2 pb-3 text-center" style="line-height: 1em; font-family: Raleway, sans-serif;">
                                    <a href="<?php the_permalink(); ?>" class="h4 text-dark">
                                        <small><?php the_title(); ?></small>
                                    </a>
                                </div>
                            </div> <?php 

                            $post_home_destacado++;
                            
                        endwhile;

                        wp_reset_postdata();     

                    } ?>

                </div>
                
            </div>
            
        </section>


        <section class="container pb-4">
            
            <h2 class="h4 pb-2 mb-3 text-center" style="color: #FD6003; border-bottom: 1px solid #FD6003; font-weight: 400!important; font-size: 24px!important; font-family: 'Lobster',cursive!important;">Comparte con tus amigos</h2>
            
            <div class="pb-4 text-center">    
                <span class="mr-2">
                    <amp-social-share class="rounded" type="facebook" data-param-app_id="216472885737679" width="36" height="36"></amp-social-share>
                </span>

                <span class="mr-2">
                    <amp-social-share class="rounded" type="twitter" width="36" height="36"></amp-social-share>
                </span>

                <span class="mr-2">
                    <amp-social-share class="rounded" type="whatsapp" width="36" height="36"></amp-social-share>
                </span>    
            </div>
            
        </section> 
                
        <section class="container pt-5 pb-4">
            
                        
            <h2 class="text-center pb-2">Historias Bíblicas</h2>

            <p class="mb-4">Primero quiero que sepas, que en este sitio web las <strong>Historias Bíblicas</strong> están bien organizadas para que puedas encontrar de forma fácil la historia que estás buscando. </p>
            <p class="mb-4"><strong>A continuación, podrás encontrar dos opciones como:</strong> Historias Bíblicas del Antiguo Testamento e Historias Bíblicas del Nuevo Testamento. Simplemente elige una de esas opciones sabiendo en cuál de los dos se encuentra la historia que estás buscando.</p>
            <p class="mb-4">Tal vez no estás buscando una historia específica o a lo mejor llegaste a este sitio por curiosidad, entonces te invito a explorar con toda la libertad dentro de esas dos opciones.</p>

        
            <div class="row justify-content-center mt-4">
                
                
                <div class="col-xl-4 col-lg-4 col-md-6 mb-5 text-center">
                    <div class="shadow-sm pb-5">

                        <a href="https://historiasdelabiblia.org/antiguo-testamento/">
                            <img class="rounded-top img-fluid" src="https://historiasdelabiblia.org/wp-content/uploads/2021/04/historias-biblicas-del-antiguo-testamento.jpg">
                        </a>

                        <div class="pt-3 pb-3 text-center">
                            <h4 class="h5" style="line-height: 1.3em; font-family: Raleway, sans-serif; font-weight: 700;">
                                <a href="https://historiasdelabiblia.org/antiguo-testamento/" class="text-dark">Historias Bíblicas del Antiguo Testamento</a>
                            </h4>
                        </div>

                        <a href="https://historiasdelabiblia.org/antiguo-testamento/" class="btn btn-outline-secondary rounded-pill pl-5 pr-5">Ver más</a>

                    </div>
                    
                </div>
                
                <div class="col-xl-4 col-lg-4 col-md-6 mb-5 text-center">
                    <div class="shadow-sm pb-5">
                        <a href="https://historiasdelabiblia.org/nuevo-testamento/">
                            <img class="rounded-top img-fluid" src="https://historiasdelabiblia.org/wp-content/uploads/2021/04/historias-biblicas-del-nuevo-testamento.jpg">
                        </a>

                        <div class="pt-3 pb-3 text-center">
                            <h4 class="h5" style="line-height: 1.3em; font-family: Raleway, sans-serif; font-weight: 700;">
                                <a href="https://historiasdelabiblia.org/nuevo-testamento/" class="text-dark">Historias Bíblicas del Nuevo Testamento</a>
                            </h4>
                        </div>

                        <a href="https://historiasdelabiblia.org/nuevo-testamento/" class="btn btn-outline-secondary rounded-pill pl-5 pr-5">Ver más</a>
                    </div>
                    
                </div>

            </div>
                        
            
        </section>
            
        <section class="container pt-4">
            
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