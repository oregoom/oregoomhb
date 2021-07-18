<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>


<!-- Google AdSense 300x250 --->
<?php if(get_option('template_oregoom_adsense_300_250') != ''){ ?>
    <div class="card shadow pb-4 pt-4 mb-4 d-none d-lg-block text-center bg-dark" style="border: none; border-top: 3px solid #FA6002; background: rgba(250, 96, 2, 0.04);">

        <?php echo get_option('template_oregoom_adsense_300_250'); ?>

    </div>
<?php } ?>


        

<div class="card shadow-sm pb-3 pt-1 mb-5" style="border: none; border-top: 3px solid #FA6002; background: rgba(250, 96, 2, 0.04);">
    <div class="card-body">
        <h5 class="card-title text-center" style="font-family: Raleway, sans-serif;"><strong>Historias del<br>Antiguo Testamento</strong></h5>
        <ul class="list-group list-group-flush mb-4">
        <?php $AT_query = new WP_Query( array(
                    'meta_value' => 'AT',
                    'post_type'  => 'page',
                    'order'   => 'DESC',
                    'posts_per_page' => 10,
                    'post_status' => 'publish',
                    ));
        if($AT_query->have_posts()){
            while($AT_query->have_posts()) : $AT_query->the_post(); ?>

                <li class="list-group-item list-group-item-action bg-transparent">
                    <a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a>
                </li>

            <?php endwhile;;
        }
        $AT_query->reset_postdata(); ?>
        </ul>
        <div class="text-center">
            <a href="<?php echo esc_url(home_url().'/antiguo-testamento/'); ?>" class="btn rounded-pill text-white" style="padding-left: 30px; padding-right: 30px; background-color: #FA6002;">Más historias aquí</a>
        </div>                    
    </div>
</div>

<div class="card shadow-sm pb-3 pt-1 mb-5" style="border: none; border-top: 3px solid #FA6002; background: rgba(250, 96, 2, 0.04);">
    <div class="card-body">
        <h5 class="card-title text-center" style="font-family: Raleway, sans-serif;"><strong>Historias del<br>Nuevo Testamento</strong></h5>
        <ul class="list-group list-group-flush mb-4">
        <?php $NT_query = new WP_Query( array(
                    'meta_value' => 'NT',
                    'post_type'  => 'page',
                    'order'   => 'DESC',
                    'posts_per_page' => 10,
                    'post_status' => 'publish',
                    ));
        if($NT_query->have_posts()){
            while($NT_query->have_posts()) : $NT_query->the_post(); ?>

                <li class="list-group-item list-group-item-action bg-transparent">
                    <a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a>
                </li>

            <?php endwhile;;
        }
        $NT_query->reset_postdata(); ?>
        </ul>
        <div class="text-center">
            <a href="<?php echo esc_url(home_url().'/nuevo-testamento/'); ?>" class="btn rounded-pill text-white" style="padding-left: 30px; padding-right: 30px; background-color: #FA6002;">Más historias aquí</a>
        </div>                    
    </div>
</div>

<!--//GOOGLE ADSENSE (PC) -->
<?php if(get_option('template_oregoom_adsense_300_600') != ''){ ?>
    <div class="card shadow pb-4 pt-4 mb-4 d-none d-lg-block text-center bg-dark sticky-top" style="border: none; border-top: 3px solid #FA6002; background: rgba(250, 96, 2, 0.04);">

        <?php echo get_option('template_oregoom_adsense_300_600'); ?>

    </div>
<?php } ?>
