<?php get_header();

if(have_posts()){
    
    while(have_posts()) : the_post(); 
        
        /*
        * Para mostrar videos en PC y Movil
        */

        if (isset($_GET['v'])) {
            
            $ID_YouTube = $_GET['v']; ?>

            <div class="bg-dark mb-3 mb-lg-0">
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



<?php include get_theme_file_path('page-post-include/page-post-index.php'); ?>

    <?php
    
    endwhile;
    wp_reset_postdata();    
} 


/*
 * ===============================
 * Pie de página 
 */
get_footer();

?>