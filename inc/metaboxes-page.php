<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hb_cat_agregar_metaboxes(){
  // Agrega el Metabox en el Post Type de Quizes
  // 7 parametros:
  // id para identificar el metabox
  // Titulo del Metabox
  // Callback con el Cntenido
  // Pantalla donde se mostrará o Post Type
  // contexto es donde se mostrará (normal, aside, advanced)
  // Prioridad en la que se mostrarán
  // Argumentos con callback
   
  add_meta_box( 'hb_cat_meta_box', 'Selecionar categoría', 'hb_cat_metaboxes', 'page', 'normal', 'high', null );
}
add_action( 'add_meta_boxes', 'hb_cat_agregar_metaboxes' );


function hb_cat_metaboxes($post) { ?>

<div>
    <p class="post-attributes-label-wrapper page-template-label-wrapper">
        <label class="post-attributes-label" for="hb_cat_page">* Categorías</label>
    </p>
    <select name="hb_cat_page" id="hb_cat_page" class="components-select-control__input">
        <option value="">Elige una categoria</option>
        <?php        
        $select_cat_page = get_post_meta($post->ID, 'hb_cat_page', true);
        
        $term_query = new WP_Term_Query( array( 'taxonomy' => 'category' ) );
        $count_cat = 1;
        foreach ( $term_query ->terms as $term ) { ?>
            
            <option <?php selected($select_cat_page, $term->term_id); ?> value="<?php echo $term->term_id; ?>"><?php echo $count_cat++.'. '.$term->name; ?></option>

        <?php } ?>
    </select>
</div>

<div>
    <p class="post-attributes-label-wrapper page-template-label-wrapper">
        <label class="post-attributes-label" for="hb_atnt_page">* Antiguo Testamento & Nuevo Testamento</label>
    </p>
    <select name="hb_atnt_page" id="hb_atnt_page" class="components-select-control__input">
        <option value="">Elige antiguo testamento o nuevo testamento</option>
        <?php $hb_atnt_page = get_post_meta($post->ID, 'hb_atnt_page', true); ?>
            
            <option <?php selected($hb_atnt_page, 'AT'); ?> value="AT">1. Antiguo Testamento</option>
            <option <?php selected($hb_atnt_page, 'NT'); ?> value="NT">2. Nuevo Testamento</option>
    </select>
</div>

<!-- ID de YouTube -->
<div>
    <p class="post-attributes-label-wrapper page-template-label-wrapper">
        <label class="post-attributes-label" for="hb_idyoutube_page">* ID de YouTube (Historias de la Biblia)</label>
    </p>
    <p><input type="text" maxlength="12" id="hb_idyoutube_page" name="hb_idyoutube_page" value="<?php echo get_post_meta($post->ID, 'hb_idyoutube_page', true); ?>"></p>
</div>

<?php
}


//function para GUARDAR LOS METABOXES
function hb_cat_guardar_metaboxes($post_id, $post, $update){
    
    $hb_cat_page = $hb_atnt_page = $oc_creado_por = $hb_idyoutube_page = '';
    
    /*
     * Comprobar si el campo tiene valor
     */
    if(isset($_POST['hb_cat_page'])){
        /*
         * Sanitizar el valor de algún ataque con la función => sanitize_text_field();
         */
        $hb_cat_page = sanitize_text_field($_POST['hb_cat_page']);
    }
    /*
     * Guardamos los valores de los campos
     * $post_id => el ID del post
     * 'oc_subtitle' => nombre del campo
     * $oc_subtitle => El valor del campo
     */
    update_post_meta($post_id, 'hb_cat_page', $hb_cat_page);
    
    if(isset($_POST['hb_atnt_page'])){
        $hb_atnt_page = sanitize_text_field($_POST['hb_atnt_page']);
    }
    update_post_meta($post_id, 'hb_atnt_page', $hb_atnt_page);
    
    /*
     * ID de YouTube
     */
    if(isset($_POST['hb_idyoutube_page'])){
        $hb_idyoutube_page = sanitize_text_field($_POST['hb_idyoutube_page']);
    }
    update_post_meta($post_id, 'hb_idyoutube_page', $hb_idyoutube_page);
    
    
}
add_action('save_post', 'hb_cat_guardar_metaboxes',10,3);









/*
 * Metaboxes Post
 */
function hb_agregar_metaboxes_post(){
   
  add_meta_box( 'hb_meta_box_post', 'ID de YouTube', 'hb_metaboxes_post', 'post', 'normal', 'high', null );
}
add_action( 'add_meta_boxes', 'hb_agregar_metaboxes_post' );


function hb_metaboxes_post($post) { ?>

<!-- ID de YouTube -->
<div>
    <p class="post-attributes-label-wrapper page-template-label-wrapper">
        <label class="post-attributes-label" for="hb_idyoutube_post">* ID de YouTube (Historias de la Biblia)</label>
    </p>
    <p><input type="text" maxlength="12" id="hb_idyoutube_post" name="hb_idyoutube_post" value="<?php echo get_post_meta($post->ID, 'hb_idyoutube_post', true); ?>"></p>
</div>

<?php
}


//function para GUARDAR LOS METABOXES
function hb_guardar_metaboxes_post($post_id, $post, $update){
    
    $hb_idyoutube_post = '';
    
    /*
     * ID de YouTube
     */
    if(isset($_POST['hb_idyoutube_post'])){
        $hb_idyoutube_post = sanitize_text_field($_POST['hb_idyoutube_post']);
    }
    update_post_meta($post_id, 'hb_idyoutube_post', $hb_idyoutube_post);
    
    
}
add_action('save_post', 'hb_guardar_metaboxes_post',10,3);