<?php 

get_header(); 


if(have_posts()){
    
    while(have_posts()) : the_post(); ?>  


<div class="bg-white">
    

    <div class="d-none d-lg-block pb-3 pt-3 mb-0 bg-white">

        <?php if(is_single()){ ?>
            <nav aria-label="breadcrumb" class="container d-none d-lg-block bg-white">
                <ol class="breadcrumb ps-0 pe-0 mb-0" style="font-size: 13px;">
                    
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
                    <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
                    
                </ol>
            </nav>
        <?php } ?> 

    </div>



    <div class="container bg-white">

        <div class="row">


            <!--<div class="col"></div>-->
            <div class="col col-2 d-xxl-block d-none">

                <!--//GOOGLE ADSENSE (160x600) -->
                <?php if(get_option('template_oregoom_adsense_160_600') != ''){ ?>                
                    <div class="pb-4 text-start">

                        <?php  echo get_option('template_oregoom_adsense_160_600'); ?>

                    </div>                
                <?php } ?>

            </div>

            <article class="col bg-white mb-4">

                <div class="container-fluid-lg">

                    <!-- Vídeo de YouTube (Escritorio) -->
                    <?php if(get_post_meta(get_the_ID(), 'hb_idyoutube_post', true)){ 

                        $ID_YouTube = get_post_meta(get_the_ID(), 'hb_idyoutube_post', true); ?>

                        <div class="pb-3 text-center">
                            <a href="<?php echo home_url().'/videos/?v='.$ID_YouTube; ?>"  target="_blank">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid">
                            </a>
                        </div>

                        <div class="text-center mb-4 d-grid gap-2">
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


                    <h1 class="pb-4 pt-4 h2 text-lg-left text-center"><strong> <?php the_title(); ?> </strong></h1>


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
                            <span class="ms-2 d-lg-none">
                                <amp-social-share class="rounded" type="system" width="36" height="36" aria-label="Compartir"></amp-social-share>
                            </span>

                            <span class="ms-2">
                                <amp-social-share class="rounded" type="facebook" data-param-app_id="216472885737679" width="36" height="36"></amp-social-share>
                            </span>

                            <span class="ms-2">
                                <amp-social-share class="rounded" type="twitter" width="36" height="36"></amp-social-share>
                            </span>

                            <span class="ms-2">
                                <amp-social-share class="rounded" type="whatsapp" width="36" height="36"></amp-social-share>
                            </span> 

                            <span class="ms-2">
                                <amp-social-share class="rounded"  aria-label="Share on LinkedIn"  type="linkedin"  width="36"  height="36"></amp-social-share>
                            </span>

                            <span class="ms-2">
                                <amp-social-share class="rounded"  aria-label="Share by email" type="email"  width="36" height="36"></amp-social-share>
                            </span>    
                        </div>
                    </div>



                </div>        

            </article>

            <aside class="col-12 col-xxl-3 col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <?php get_sidebar();?> 
            </aside>

        </div>

    </div>


    <div class="container bg-white pb-5 pt-5">    


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
                        'posts_per_page' => 4,
                        'post__not_in' => $NOT_post
                    ));   

                while ($hb_query_1->have_posts()) : $hb_query_1->the_post(); 

                    if(has_post_thumbnail()){ $NOT_post[] = get_the_ID(); ?>

                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 pb-3">
                        <a class="text-white" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?>
                            <h3 class="h6 pt-2 text-dark" style="font-family: Raleway, sans-serif;"><?php the_title(); ?></h3>
                        </a>
                    </div>

                    <?php }                    

                endwhile;

                wp_reset_postdata(); ?>

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

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-3">
                        <a class="text-dark" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?><h3 class="h6 pt-2" style="font-family: Raleway, sans-serif;"><strong><?php the_title(); ?></strong></h3></a>
                    </div>

                    <?php }                    

                endwhile;

                wp_reset_postdata(); ?>

        </div>

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


