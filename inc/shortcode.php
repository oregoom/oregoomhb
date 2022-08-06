<?php
if( ! defined('ABSPATH')) exit;









/*
 * Crea un Shortcode [Historias más leidas]
 */

function hb_shortcode_history_home_leidas(){
    
    ob_start ();
    
    ?>

    <h2 class="h4 mb-4 pb-2 pt-4 border-bottom" style="line-height: 1em; font-family: Raleway, sans-serif; font-weight: 700;">Historias Biblicas mas leidas</h2>
    <div class="row mb-4"><?php    
        
        $shortcode_query = new WP_Query( array(
                            'post_type' => 'post',
                            'order'   => 'DESC',
                            'posts_per_page' => 4,
                            'post_status' => 'publish'
                            ));

        if($shortcode_query->have_posts()){

            while($shortcode_query->have_posts()) : $shortcode_query->the_post();

                if(has_post_thumbnail()){ ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-2">
                
                <div class="mb-3 card border-0 bg-white">

                    <a href="<?php echo the_permalink(); ?>"><img src="<?php the_post_thumbnail_url();?>" class="rounded-top"></a>

                    <div class="card-body pt-lg-2 pt-2 p-0">
                        <h5 class="card-title h5 pt-0" style="line-height: 1em; font-family: Raleway, sans-serif; font-weight: 700;">
                            <a href="<?php the_permalink(); ?>" class="text-dark"><small><strong><?php the_title(); ?></strong></small></a>
                        </h5>                        
                    </div>

                </div>
            </div><?php }

            endwhile;
            $shortcode_query->reset_postdata();                 
        }
    ?></div><?php
    
    return ob_get_clean ();
    
}
add_shortcode('hb-shortcode-history-home-leidas', 'hb_shortcode_history_home_leidas');







/*
 * XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
 * Shortcode de Historias Bíblicas desde Creación a Diluvio = AT
 */

function hb_home_creacion_diluvio(){
    
    ob_start ();

    if(get_option('theme_hb_home_text_01') && get_option('theme_hb_home_id_historias_post_01') ){

        $desc_home_text_01 = get_option('theme_hb_home_text_01');
        $id_historias_post = esc_html(get_option('theme_hb_home_id_historias_post_01'));

        /*FUNCTION  de Periodo*/
        hb_home_periodo_at_nt($desc_home_text_01, $id_historias_post);

    }
    
    return ob_get_clean ();

}
add_shortcode('hb-home-creacion-diluvio', 'hb_home_creacion_diluvio');


/*
 * XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
 * Shortcode de Historias Bíblicas desde Torre de Babel a Moisés = AT
 */

function hb_home_torre_de_babel_moises(){
    
    ob_start ();

    if(get_option('theme_hb_home_text_02') && get_option('theme_hb_home_id_historias_post_02') ){

        $desc_home_text_01 = get_option('theme_hb_home_text_02');
        $id_historias_post = esc_html(get_option('theme_hb_home_id_historias_post_02'));

        /*FUNCTION  de Periodo*/
        hb_home_periodo_at_nt($desc_home_text_01, $id_historias_post);

    }
    
    return ob_get_clean ();

}
add_shortcode('hb-home-torre-de-babel-moises', 'hb_home_torre_de_babel_moises');


/*
*XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
* FUNCTION para Historías por Periodos AT y NT
*XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
*/
function hb_home_periodo_at_nt($text, $ids_post){

    $desc_home_text_01 = $text;
    $id_historias_post = $ids_post;

    $id_pages = explode(",", $id_historias_post); ?>

    <div class="pt-4 mt-2 mb-5 border-top">

        <div class="row">

            <div class="col-lg-4">
                <div ><!--class="sticky-top"-->
                    <?php echo $desc_home_text_01; ?>
                </div>
            </div>

            <div class="col-lg-8"> <?php

                $count_historias_page = 1;

                for($i=0;$i<count($id_pages);$i++){

                    
                    $shortcode_query = new WP_Query( array(
                                                    'page_id' => $id_pages[$i]
                    ));

                    if($shortcode_query->have_posts()){ ?>

                        <div class="p-sm-2 mb-3 shadow-sm rounded"><?php

                            while($shortcode_query->have_posts()) : $shortcode_query->the_post();

                                if(has_post_thumbnail()){ ?>

                                    <div class="card border-0">
                                        <div class="row no-gutters">
                                            <div class="col-lg-4 col-sm-4">

                                                <a href="<?php echo the_permalink(); ?>">
                                                    <img src="<?php the_post_thumbnail_url();?>" class="card-img">
                                                </a>

                                            </div>
                                            <div class="col-lg-8 col-sm-8 p-sm-0 p-3">
                                                <div class="card-body pt-0 pb-0 pl-sm-4 pl-0 pr-0">
                                                    <p class="pt-0 text-muted m-0"><small>HISTORIA <?php echo $count_historias_page++; ?></small></p>
                                                    <h5 class="card-title h5 mb-1" style="line-height: 1.3em; font-family: Raleway, sans-serif; font-weight: 700; color: #2a3b47;"><a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a></h5>
                                                    <?php //Funcion para extraer 100 caracteres
                                                            hb_excerpt_100_caracteres(get_the_excerpt()); ?>
                                                    <a class="mt-0" style="color: #FD6003;" href="<?php the_permalink(); ?>" target="_self"><small>Seguir leyendo</small></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><?php 
                                }

                            endwhile;
                            $shortcode_query->reset_postdata(); ?>
                            
                        </div> <?php
                    }
                } ?>
            </div>

        </div>
    </div> <?php   

}





/*
 * Crea un Shortcode para Gistorias por épocas AT y NT
 */

function hb_shortcode_history_home( $history ){
    
    ob_start ();
    
    $history = $history['id_page'];
    
    $id_pages = explode(",", $history); ?>

    <div class="row"><?php
    
    for($i=0;$i<count($id_pages);$i++){
        
        $shortcode_query = new WP_Query( array(
                                        'page_id' => $id_pages[$i]
        ));

        if($shortcode_query->have_posts()){

            while($shortcode_query->have_posts()) : $shortcode_query->the_post();

                if(has_post_thumbnail()){ ?>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-4">
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
            </div><?php }

            endwhile;
            $shortcode_query->reset_postdata();                 
        }
    }
    ?></div><?php
    
    return ob_get_clean ();
    
}
add_shortcode('hb-shortcode-history-home', 'hb_shortcode_history_home');




/*
 * ==================================================================================
 * Shortcode para mostrar historias del Antiguo Testamento(AT) y Nuevo Testamento(NT)
 */
function hb_shortcode_at_nt( $atnt ){ 
    
    ob_start ();
	
    $shortcode_query = new WP_Query( array(
                                    'meta_value' => $atnt['atnt'],
                                    'post_type'  => 'page',
                                    'order'   => 'DESC',
                                    'posts_per_page' => 400,
                                    'post_status' => 'publish',
                            ));
    
        if($shortcode_query->have_posts()){ ?>
        
            <div class="row pt-lg-3 mb-lg-5 mb-4"><?php
                
                while($shortcode_query->have_posts()) : $shortcode_query->the_post();

                    if(has_post_thumbnail()){ ?>
                        <div class="col-xl-4 col-lg-4 col-md-6">

                            <div class="card bg-light mb-4 border-0 shadow-sm">

                                <a href="<?php echo the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('medium_large');?>" class="rounded-top"></a>

                                <div class="card-body rounded-bottom">
                                    
                                    <h4 class="card-title h5 py-0" style="line-height: 1.3em; font-family: Raleway, sans-serif; font-weight: 700;">
                                        <a href="<?php the_permalink(); ?>" class="text-dark" target="_self"><?php the_title(); ?></a>
                                    </h4>
                                    
                                    <?php //Funcion para extraer 100 caracteres
                                            hb_excerpt_100_caracteres(get_the_excerpt()); ?>
                                </div>
                            </div>
                        </div>

                    <?php }

                endwhile;

                $shortcode_query->reset_postdata(); ?>

            </div><?php

        }
    
    return ob_get_clean ();
    
}
add_shortcode('hb-shortcode-at-nt', 'hb_shortcode_at_nt');


/*
 * =================================================================================
 * Shortcode para mostrar historias de Cada Personajes Bíblico del AT
 */
function id_hb_shortcode_per_at($ID_Cat){ 
    
    ob_start ();


    $count_historias_page = 1;

        $shortcode_query = new WP_Query( array(
                                        'cat' => $ID_Cat['id_cat'],
                                        'order'   => 'ASC',
                                        'posts_per_page' => 200
        ));

        if($shortcode_query->have_posts()){ ?>

    <div class="pt-5 border-top"><?php

        while($shortcode_query->have_posts()) : $shortcode_query->the_post();

            if(has_post_thumbnail()){ ?>

                <div class="mb-4 card border-0">
                  <div class="row no-gutters">
                    <div class="col-lg-4 col-sm-4">
                        <a href="<?php echo the_permalink(); ?>"><img src="<?php the_post_thumbnail_url();?>" class="card-img"></a>
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <div class="card-body pt-sm-0 pl-sm-4 pt-3 pl-0 pr-0">
                            <p class="text-muted m-0">HISTORIA <?php echo $count_historias_page++; ?></p>
                            <h5 class="card-title h5 mb-1" style="line-height: 1.3em; font-family: Raleway, sans-serif; font-weight: 700; color: #2a3b47;"><a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a></h5>
                            <?php //Funcion para extraer 100 caracteres
                                    hb_excerpt_100_caracteres(get_the_excerpt()); ?>
                            <a class="mt-0" href="<?php the_permalink(); ?>"><small>Seguir leyendo</small></a>
                        </div>
                    </div>
                  </div>
                </div><?php                    
            }

        endwhile;
        $shortcode_query->reset_postdata();?>

    </div><?php

        }
    
    return ob_get_clean ();
    
}
add_shortcode('id_hb_shortcode_per_at', 'id_hb_shortcode_per_at');