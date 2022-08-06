<?php
/*
 * Template name: Single Page
 * Template Post Type: page
 */

get_header() ?>

<?php 

if(have_posts()){
    
    while(have_posts()) : the_post(); 
    
        /*
        * Para mostrar videos en PC y Movil
        * ID Vídeo de YouTube
        */

        if(get_post_meta(get_the_ID(), 'hb_idyoutube_page', true)){ 
                    
            $ID_YouTube = get_post_meta(get_the_ID(), 'hb_idyoutube_page', true);

         } ?>



        <div class="d-none d-lg-block container-fluid pb-0 mb-0">
            
            <nav aria-label="breadcrumb" class="container d-none d-lg-block">
                <ol class="breadcrumb pl-0 pr-0 mb-0" style="background: #ffffff; font-size: 13px;">
                    <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url()); ?>">Inicio</a></li>                                
                    <li class="breadcrumb-item active text-dark" aria-current="page"><?php the_title(); ?></li>
                </ol>
            </nav>
            
        </div> <?php 

        //(Artículo) >> page-post-include
        include get_theme_file_path('page-post-include/page-post-index.php');

    
    endwhile;

    wp_reset_postdata(); 

}


/*
 * ===============================
 * Pie de página 
 */
get_footer();