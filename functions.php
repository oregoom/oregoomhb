<?php


//ACTUALIZAR TEMA DESDE GITHUB
  // set_site_transient('update_themes', null);
  /*function geko_check_update( $transient ) {
      if ( empty( $transient->checked ) ) {
          return $transient;
      }
      $theme_data = wp_get_theme(wp_get_theme()->template);
      $theme_slug = $theme_data->get_template();
      //Delete '-master' from the end of slug
      $theme_uri_slug = preg_replace('/-master$/', '', $theme_slug);
     
     $remote_version = '0.0.0';
     $style_css = wp_remote_get("https://raw.githubusercontent.com/oregoom/".$theme_uri_slug."/master/style.css")['body'];
    if ( preg_match( '/^[ \t\/*#@]*' . preg_quote( 'Version', '/' ) . ':(.*)$/mi', $style_css, $match ) && $match[1] )
         $remote_version = _cleanup_header_comment( $match[1] );
    
     if (version_compare($theme_data->version, $remote_version, '<')) {
         $transient->response[$theme_slug] = array(
             'theme'       => $theme_slug,
             'new_version' => $remote_version,
             'url'         => 'https://github.com/oregoom/'.$theme_uri_slug,
             'package'     => 'https://github.com/oregoom/'.$theme_uri_slug.'/archive/master.zip',
         );
     }
     return $transient;
 }
 add_filter( 'pre_set_site_transient_update_themes', 'geko_check_update' );*/
 class Geko_Theme_Update_Checker {

    public function __construct() {
        // Engancha la función de comprobación de actualización al filtro de WordPress
        add_filter( 'pre_set_site_transient_update_themes', [ $this, 'check_for_update' ] );
    }

    public function check_for_update( $transient ) {
        // Verificamos si ya se ha consultado el estado de los temas
        if ( empty( $transient->checked ) ) {
            return $transient;
        }

        // Obtener los datos del tema actual
        $theme_data = wp_get_theme( wp_get_theme()->template );
        $theme_slug = sanitize_key( $theme_data->get_template() ); // Limpiar el slug del tema

        // Eliminar '-master' del slug si está presente
        $theme_uri_slug = untrailingslashit( str_replace( '-master', '', $theme_slug ) );

        // Intentamos obtener la versión remota desde la caché
        $remote_version = get_transient( 'geko_theme_remote_version' );
        
        // Si no hay versión en caché, obtenemos la versión desde GitHub
        if ( false === $remote_version ) {
            // Hacer una solicitud HTTP para obtener el archivo style.css desde GitHub
            $response = wp_remote_get( "https://raw.githubusercontent.com/oregoom/{$theme_uri_slug}/master/style.css" );

            // Verificar si hubo errores en la solicitud HTTP
            if ( is_wp_error( $response ) ) {
                return $transient; // Si hay un error, regresamos sin modificar el transitorio
            }

            // Obtener el contenido del archivo style.css
            $style_css = wp_remote_retrieve_body( $response );

            // Verificar que el contenido no esté vacío
            if ( empty( $style_css ) ) {
                return $transient; // Si el archivo está vacío, regresamos sin cambios
            }

            // Buscar la versión en el archivo style.css
            if ( preg_match( '/^[ \t\/*#@]*' . preg_quote( 'Version', '/' ) . ':(.*)$/mi', $style_css, $match ) && $match[1] ) {
                $remote_version = _cleanup_header_comment( $match[1] );
                
                // Guardar la versión remota en un transitorio para evitar consultas repetidas
                set_transient( 'geko_theme_remote_version', $remote_version, 12 * HOUR_IN_SECONDS ); // Caché por 12 horas
            } else {
                // Si no encontramos la versión en el archivo style.css, dejamos la versión remota en "0.0.0"
                $remote_version = '0.0.0';
            }
        }

        // Comparamos las versiones del tema local y la remota
        if ( version_compare( $theme_data->version, $remote_version, '<' ) ) {
            // Si la versión remota es mayor, se configura el transitorio para notificar la actualización
            $transient->response[ $theme_slug ] = array(
                'theme'       => $theme_slug,
                'new_version' => $remote_version,
                'url'         => "https://github.com/oregoom/{$theme_uri_slug}",
                'package'     => "https://github.com/oregoom/{$theme_uri_slug}/archive/master.zip",
            );
        }

        return $transient; // Devolver el transitorio actualizado
    }
}

// Instanciar la clase para activar la funcionalidad
new Geko_Theme_Update_Checker();

 
 
 



add_theme_support( 'post-thumbnails' ); 

add_post_type_support( 'page', 'excerpt' );

add_theme_support( 'custom-logo', array(
		'height'      => 42,
		'width'       => 140,
		'flex-width' => false,
	) );




// Incluir Bootstrap JS y dependencia popper
function bootstrap_js() {
                  
    // Incluir Bootstrap CSS 4.6.0    
    wp_enqueue_style( 'bootstrap_css', 
        'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css', 
        array(), 
        '4.6.0'
        );

}
add_action( 'wp_enqueue_scripts', 'bootstrap_js');





//Agregar clase a <p> de the_content()
add_filter( 'the_content', 'hb_add_style_the_content', 10, 1 );
function hb_add_style_the_content( $content = null ){

    if( null === $content )
        return $content;

    $search = array('<p>');
    $replace = array('<p style="line-height: 1.5; margin-bottom: 1.5rem; font-size: 1.125rem; color: #333;">');

//    if(is_page_template('templates/template-curso.php')){
          return str_replace( $search, $replace, $content );  
//    } else {
//        return $content;
//    }       
}




















// Register Navigation Menus
function hb_register_menus() {

	$locations = array(
		'menu-principal' => __( 'Menú Principal', 'oregoom_domain' )
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'hb_register_menus' );

function oregoom_navegation_menus(){
    
    $oregoom_menu_name = 'menu-principal';
    $oregoom_locations = get_nav_menu_locations();
    
    if( $oregoom_locations ){ //Si ya tiene menú asignado o creado
        
        $oregoom_menu = wp_get_nav_menu_object( $oregoom_locations[ $oregoom_menu_name ] );
    
        $oregoomMenus = wp_get_nav_menu_items( $oregoom_menu->term_id);

        $menuPrincipal = '';
        $subMenu = '';


//    echo '<div class="p-3 mb-2 bg-white text-dark"><pre>'; print_r($oregoomMenus); echo '</pre></div>';//imprimir el array 

        if( ! empty($oregoomMenus) ){

            foreach ($oregoomMenus as $oregoomMenu) {

                $subMenuExist = false;

                $idMenu = $oregoomMenu->ID;

                if($oregoomMenu->menu_item_parent == 0){
                    ?>
                    <li class="nav-item active dropdown">                    
                        <?php

                        //target para AMP tiene que tener un valor
                        if($oregoomMenu->target == ""){
                            $target = "_self";
                        } else {
                            $target = $oregoomMenu->target;
                        }
                        
                        $menuPrincipal = '<a class="nav-link" href="'.esc_url($oregoomMenu->url).'" target="'.$target.'"><small>'.$oregoomMenu->title.'</small></a>';

                        foreach ($oregoomMenus as $oregoomSubMenu) {
                            if($idMenu == $oregoomSubMenu->menu_item_parent){

                                $subMenuExist = true;

                                $inicioSubMenu = '<div class="dropdown-menu border-0 shadow-sm" style="border-top: 2px #8B3D88 solid!important;" aria-labelledby="navbarDropdown'.$oregoomSubMenu->menu_item_parent.'">';
                                $finSubMenu = '</div>';
                                $subMenu = $subMenu . '<a class="dropdown-item" href="'.esc_url($oregoomSubMenu->url).'" target="'.$oregoomSubMenu->target.'">'.$oregoomSubMenu->title.'</a>';

                            }
                        }

                        if($subMenuExist == false){

                            echo $menuPrincipal;

                        } else {

                            echo '<a class="nav-link dropdown-toggle" href="'.esc_url($oregoomMenu->url).'" id="navbarDropdown'.$idMenu.'" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" target="'.$oregoomMenu->target.'">'.$oregoomMenu->title.'</a>'.$inicioSubMenu.$subMenu.$finSubMenu;

                            $inicioSubMenu = '';
                            $finSubMenu = '';
                            $subMenu = '';
                        }             
                        ?>
                    </li>
                    <?php            
                }
            }                    
        }
    }
}
























/* =================================================================
 * Function para agregar un Menú y Página del Template Oregoom
 * en Admin de WordPress
 */


function theme_hb_add_admin_menu_page(){
    
    //PD: https://codex.wordpress.org/Adding_Administration_Menus
    
    $page_title = 'Theme HB';     //Título de la página
    $menu_title = 'Theme HB';                            //Título para Menú
    $capability = 'manage_options';                         //Capacidad - manage_option => Adminsitrar opción
    $menu_slug = 'theme_hb';                  //El nombre del slug para referirse a este menú
    $function = 'theme_hb_content_page_menu';         //La función que muestra el contenido de la página del menú.
    $icon_url = 'dashicons-carrot';                         //La url del icono que se utilizará para este menú.
    
    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url);
    add_submenu_page( $menu_slug, 'Ads Theme HB', 'Ads Theme HB', 'manage_options', 'ads-theme-bg', 'ads_theme_hb_content_page_menu');
    
}
add_action('admin_menu','theme_hb_add_admin_menu_page');



/*
 * Function para agregar contenido HTML en la página The HB
 */
function theme_hb_content_page_menu(){
    ?>

        <div class="wrap">        
        <h1>Agregar Contenidos en Home</h1>        
        
        <?php settings_errors();//Muestra los mensajes de éxito o de error cuando se envía el formulario ?>
        
        <h2>Bloque de Historias de la Biblia</h2>
        <form method="post" action="<?php echo esc_url(admin_url('options.php') ); ?>">
        
            <?php 
            //Para proteger formularios
            wp_nonce_field(basename(__FILE__), 'theme_hb_home_form_nonce'); 
            ?>
            
            <?php settings_fields( 'theme_hb_home_custom_admin_settings_group' ); ?>
            <?php do_settings_sections( 'theme_hb_home_custom_admin_settings_group' ); ?>
            
            <table class="form-table" role="presentation">
                <tbody>   
                    
                    <!--Historias Bíblicas desde Creación a Diluvio = AT-->
                    <tr>
                        <th scope="row">
                            <label for="theme_hb_home_01">Historias de Creación a Diluvio</label>
                        </th>
                        <td>
                            <p class="description">Descripción de historias de Creación a Diluvio</p>
                            <?php  wp_editor( get_option('theme_hb_home_text_01'), 'theme_hb_home_text_01', array('media_buttons' => false,'textarea_rows' => 10,)); ?>
                            <br>                            
                            <p class="description">ID de Historias de la Biblia. <strong>Ejemplo: </strong>12,25,16</p>
                            <input style="width: 100%" type="text" name="theme_hb_home_id_historias_post_01" value="<?php echo esc_html(get_option('theme_hb_home_id_historias_post_01')); ?>">
                            <br>                            
                            <p class="description">Pegar este shortcode en Página Home <strong>[hb-home-creacion-diluvio]</strong></p>
                        </td>                        
                    </tr>   
                    
                    <!--Historias Bíblicas desde Torre de Babel a Moisés = AT-->
                    <tr>
                        <th scope="row">
                            <label for="theme_hb_home_01">Historias de Torre de Babel a Moisés</label>
                        </th>
                        <td>
                            <p class="description">Descripción de historias de Torre de Babel a Moisés</p>
                            <?php  wp_editor( get_option('theme_hb_home_text_02'), 'theme_hb_home_text_02', array('media_buttons' => false,'textarea_rows' => 10,)); ?>
                            <br>                            
                            <p class="description">ID de Historias de la Biblia. <strong>Ejemplo: </strong>12,25,16</p>
                            <input style="width: 100%" type="text" name="theme_hb_home_id_historias_post_02" value="<?php echo esc_html(get_option('theme_hb_home_id_historias_post_02')); ?>">
                            <br>                            
                            <p class="description">Pegar este shortcode en Página Home <strong>[hb-home-torre-de-babel-moises]</strong></p>
                        </td>                        
                    </tr> 
                    
                </tbody>
            </table>   
            
            <?php submit_button(); ?>
            
        </form>    
    </div> <?php
}
function theme_hb_home_register_options_admin_page() {
    
    register_setting( 'theme_hb_home_custom_admin_settings_group', 'theme_hb_home_text_01');
    register_setting( 'theme_hb_home_custom_admin_settings_group', 'theme_hb_home_id_historias_post_01');
    register_setting( 'theme_hb_home_custom_admin_settings_group', 'theme_hb_home_text_02');
    register_setting( 'theme_hb_home_custom_admin_settings_group', 'theme_hb_home_id_historias_post_02');
    
}
add_action('admin_init','theme_hb_home_register_options_admin_page');







/*
 * Function para agregar contenido HTML en la página Ads Theme HB
 */
function ads_theme_hb_content_page_menu(){
    ?>

        <div class="wrap">        
        <h1>Agregar códigos de Google AdSense en Plantilla Oregoom</h1>        
        
        <?php settings_errors();//Muestra los mensajes de éxito o de error cuando se envía el formulario ?>
        
        <h2>Bloque de anuncios</h2>
        <form method="post" action="<?php echo esc_url(admin_url('options.php') ); ?>">
        
            <?php 
            //Para proteger formularios
            wp_nonce_field(basename(__FILE__), 'template_oregoom_form_nonce'); 
            ?>
            
            <?php settings_fields( 'template_oregoom_custom_admin_settings_group' ); ?>
            <?php do_settings_sections( 'template_oregoom_custom_admin_settings_group' ); ?>
            
            <table class="form-table" role="presentation">
                <tbody>   
                    
                    <!--CODE ADSENSE (300x250)-->
                    <tr>
                        <th scope="row">
                            <label for="template_oregoom_adsense_300_250">Code AdSense (300x250)</label>
                        </th>
                        <td>
                            
                            <textarea name="template_oregoom_adsense_300_250" id="template-oregoom-adsense-300-250" style="min-height: 124px; width: 100%;"><?php echo esc_textarea(get_option('template_oregoom_adsense_300_250')); ?></textarea>
                            <p class="description">Este formato, también denominado "rectángulo mediano", suele ofrecer un 
                                mayor inventario de anuncios de anunciantes, lo que puede aumentar los ingresos si se 
                                habilitan tanto los anuncios de texto como los anuncios de imagen.</p>
                            <p class="description">Ofrece un buen rendimiento cuando se inserta en contenido de 
                                texto o al final de los artículos.</p>
                            <p class="description"><strong>NOTA:</strong> Opción recomendada para móviles</p>
                        </td>                        
                    </tr>  
                    
                    <!--CODE ADSENSE (728x90)-->
                    <tr>
                        <th scope="row">
                            <label for="template_oregoom_adsense_728_90">Code AdSense (728x90)</label>
                        </th>
                        <td>
                            
                            <textarea name="template_oregoom_adsense_728_90" id="template-oregoom-adsense-728-90" style="min-height: 124px; width: 100%;"><?php echo esc_textarea(get_option('template_oregoom_adsense_728_90')); ?></textarea>
                            <p class="description">Este formato, también denominado "rectángulo mediano", suele ofrecer un 
                                mayor inventario de anuncios de anunciantes, lo que puede aumentar los ingresos si se 
                                habilitan tanto los anuncios de texto como los anuncios de imagen.</p>
                            <p class="description">Ofrece un buen rendimiento cuando se inserta en contenido de 
                                texto o al final de los artículos.</p>
                            <p class="description"><strong>NOTA:</strong> Opción recomendada para móviles</p>
                        </td>                        
                    </tr>  
                    
                    <!--CODE ADSENSE (300x600)-->
                    <tr>
                        <th scope="row">
                            <label for="template_oregoom_adsense_300_600">Code AdSense (300x600)</label>
                        </th>
                        <td>
                            
                            <textarea name="template_oregoom_adsense_300_600" id="template-oregoom-adsense-300-600" style="min-height: 124px; width: 100%;"><?php echo esc_textarea(get_option('template_oregoom_adsense_300_600')); ?></textarea>
                            <p class="description">Este formato, también denominado "rectángulo mediano", suele ofrecer un 
                                mayor inventario de anuncios de anunciantes, lo que puede aumentar los ingresos si se 
                                habilitan tanto los anuncios de texto como los anuncios de imagen.</p>
                            <p class="description">Ofrece un buen rendimiento cuando se inserta en contenido de 
                                texto o al final de los artículos.</p>
                            <p class="description"><strong>NOTA:</strong> Opción recomendada para móviles</p>
                        </td>                        
                    </tr> 
                    
                    
                    
                    <!--CODE ADSENSE (300x600)-->
                    <tr>
                        <th scope="row">
                            <label for="template_oregoom_adsense_160_600">Code AdSense (160x600)</label>
                        </th>
                        <td>
                            
                            <textarea name="template_oregoom_adsense_160_600" id="template-oregoom-adsense-160-600" style="min-height: 124px; width: 100%;"><?php echo esc_textarea(get_option('template_oregoom_adsense_160_600')); ?></textarea>
                            <p class="description">Este formato, también denominado "rectángulo mediano", suele ofrecer un 
                                mayor inventario de anuncios de anunciantes, lo que puede aumentar los ingresos si se 
                                habilitan tanto los anuncios de texto como los anuncios de imagen.</p>
                            <p class="description">Ofrece un buen rendimiento cuando se inserta en contenido de 
                                texto o al final de los artículos.</p>
                            <p class="description"><strong>NOTA:</strong> Opción recomendada para móviles</p>
                        </td>                        
                    </tr> 
                                        
                    
                    
                    <!--CODE ADSENSE (300x600)-->
                    <tr>
                        <th scope="row">
                            <label for="template_oregoom_adsense_970_250">Code AdSense (970x250)</label>
                        </th>
                        <td>
                            
                            <textarea name="template_oregoom_adsense_970_250" id="template-oregoom-adsense-970-250" style="min-height: 124px; width: 100%;"><?php echo esc_textarea(get_option('template_oregoom_adsense_970_250')); ?></textarea>
                            <p class="description">Este formato, también denominado "rectángulo mediano", suele ofrecer un 
                                mayor inventario de anuncios de anunciantes, lo que puede aumentar los ingresos si se 
                                habilitan tanto los anuncios de texto como los anuncios de imagen.</p>
                            <p class="description">Ofrece un buen rendimiento cuando se inserta en contenido de 
                                texto o al final de los artículos.</p>
                            <p class="description"><strong>NOTA:</strong> Opción recomendada para móviles</p>
                        </td>                        
                    </tr>
                    
                    
                    
                    
                    <!--CODE ADSENSE (Google AMP Auto)-->
                    <tr>
                        <th scope="row">
                            <label for="template_oregoom_adsense_google_amp_auto">Code AdSense (Google AMP Auto)</label>
                        </th>
                        <td>
                            
                            <textarea name="template_oregoom_adsense_google_amp_auto" id="template_oregoom_adsense_google_amp_auto" style="min-height: 124px; width: 100%;"><?php echo esc_textarea(get_option('template_oregoom_adsense_google_amp_auto')); ?></textarea>
                            <p class="description">Permita que Google coloque anuncios gráficos en sus sitios de AMP</p>
                            <p class="description">Active los anuncios automáticos para AMP y Google mostrará automáticamente anuncios en todos los sitios de AMP en su cuenta. Solo debe agregar 2 fragmentos de código a cada sitio de AMP en los que desea publicar anuncios.</p>
                            <p class="description"><strong>NOTA:</strong> Opción recomendada</p>
                            
                        </td>                        
                    </tr>
                    
                    
                    
                    <!--CODE Google Analytics-->
                    <tr>
                        <th scope="row">
                            <label for="template_oregoom_google_analytics">Code Google Analytics</label>
                        </th>
                        <td>         
                            <input type="text" name="template_oregoom_google_analytics" id="template_oregoom_google_analytics" style="width: 30%;" value="<?php echo esc_textarea(get_option('template_oregoom_google_analytics')); ?>">
                            <p class="description">Google Analytics.</p>
                        </td>                        
                    </tr>   
                                        
                    
                    
                    <!--CODE Google Analytics 4-->
                    <tr>
                        <th scope="row">
                            <label for="template_oregoom_google_analytics_4">Code Google Analytics 4</label>
                        </th>
                        <td>         
                            <input type="text" name="template_oregoom_google_analytics_4" id="template_oregoom_google_analytics_4" style="width: 30%;" value="<?php echo esc_textarea(get_option('template_oregoom_google_analytics_4')); ?>">
                            <p class="description">Google Analytics 4.</p>
                        </td>                        
                    </tr> 

                    
                </tbody>
            </table>   
            
            <?php submit_button(); ?>
            
        </form>    
    </div>
    <?php
}





function template_oregoom_register_options_admin_page() {
    
    register_setting( 'template_oregoom_custom_admin_settings_group', 'template_oregoom_adsense_300_250');
    register_setting( 'template_oregoom_custom_admin_settings_group', 'template_oregoom_adsense_728_90');
    register_setting( 'template_oregoom_custom_admin_settings_group', 'template_oregoom_adsense_300_600');
    register_setting( 'template_oregoom_custom_admin_settings_group', 'template_oregoom_adsense_160_600');
    register_setting( 'template_oregoom_custom_admin_settings_group', 'template_oregoom_adsense_970_250');
    register_setting( 'template_oregoom_custom_admin_settings_group', 'template_oregoom_adsense_google_amp_auto');
    register_setting( 'template_oregoom_custom_admin_settings_group', 'template_oregoom_google_analytics');
    register_setting( 'template_oregoom_custom_admin_settings_group', 'template_oregoom_google_analytics_4');
    
}
add_action('admin_init','template_oregoom_register_options_admin_page');



include_once 'inc/shortcode.php';
include_once 'inc/metaboxes-page.php';



