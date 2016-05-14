<?php
/*
	==========================================
	 Include scripts
	==========================================
*/
function awesome_script_enqueue() {
	//css
	wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css', array(), '3.3.4', 'all');
	wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css', array(), '1.0.0', 'all');
	wp_enqueue_style('jgallery', get_template_directory_uri() . '/css/jgallery.css', array(), '1.0.0', 'all');
	wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '1.0.0', 'all');
	wp_enqueue_style('demo', get_template_directory_uri() . '/css/demo.css', array(), '1.0.0', 'all');
	wp_enqueue_style('set2', get_template_directory_uri() . '/css/set2.css', array(), '1.0.0', 'all');
	wp_enqueue_style('jgallerymin', get_template_directory_uri() . '/css/jgallery.min.css', array(), '1.0.0', 'all');
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/awesome.css', array(), '1.0.0', 'all');
	wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array(), '1.0.0', 'all');
	wp_enqueue_style('fancyboxcss', get_template_directory_uri() . '/css/jquery.fancybox.css', array(), '1.0.0', 'all');
	wp_enqueue_style('fancyboxthumbnailcss', get_template_directory_uri() . '/css/jquery.fancybox-thumbs.css', array(), '1.0.0', 'all');
	wp_enqueue_style('fancyboxbuttonscss', get_template_directory_uri() . '/css/jquery.fancybox-buttons.css', array(), '1.0.0', 'all');
	
	//js
	wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '3.3.4', true);
	wp_enqueue_script('bootstrapjs', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array(), '1.0.0', true);
	wp_enqueue_script('isotopejs', 'http://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js', array(), '1.0.0', true);
	wp_enqueue_script('isotopeimgjs', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/3.2.0/imagesloaded.pkgd.min.js', array(), '1.0.0', true);
	wp_enqueue_script('awesomejs', get_template_directory_uri() . '/js/awesome.js', array(), '1.0.0', true);
	wp_enqueue_script('wowjs', get_template_directory_uri() . '/js/wow.min.js', array(), '1.0.0', true);
	wp_enqueue_script('jgalleryminjs', get_template_directory_uri() . '/js/jgallery.min.js', array(), '1.0.0', true);
	wp_enqueue_script('touchswipejs', get_template_directory_uri() . '/js/touchswipe.min.js', array(), '1.0.0', true);
	wp_enqueue_script('fancyboxjs', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array(), '1.0.0', true);
	wp_enqueue_script('fancybox1js', get_template_directory_uri() . '/js/jquery.fancybox.js', array(), '1.0.0', true);
	wp_enqueue_script('fancybox2js', get_template_directory_uri() . '/js/jquery.fancybox-thumbs.js', array(), '1.0.0', true);
	wp_enqueue_script('fancybox3js', get_template_directory_uri() . '/js/jquery.fancybox-media.js', array(), '1.0.0', true);
	wp_enqueue_script('fancybox4js', get_template_directory_uri() . '/js/jquery.fancybox-buttons.js', array(), '1.0.0', true);
	wp_enqueue_script('classiejs', get_template_directory_uri() . '/js/classie.js', array(), '1.0.0', true);
}

add_action( 'wp_enqueue_scripts', 'awesome_script_enqueue');

/*
	==========================================
	 Activate menus
	==========================================
*/
function awesome_theme_setup() {
	
	add_theme_support('menus');
	
	register_nav_menu('primary', 'Nav principal');
	
}

add_action('init', 'awesome_theme_setup');

/*
	==========================================
	 Theme support function
	==========================================
*/
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');


///////////////////////////////////////////////////////////////////////////////////////////////////////////TAXONOMIAS

add_action( 'init', 'portada_taxonomy', 0 );

function portada_taxonomy() {

// Labels part for the GUI

  $labels = array(
    'name' => _x( 'Portadas', 'taxonomy general name' ),
    'singular_name' => _x( 'Portada', 'taxonomy singular name' ),
    'search_items' =>  __( 'Buscar Portada' ),
    'popular_items' => __( 'Portadas populares' ),
    'all_items' => __( 'Todas las Portadas' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Editar Portada' ), 
    'update_item' => __( 'Actualizar Portada' ),
    'add_new_item' => __( 'Agregar nueva Portada' ),
    'new_item_name' => __( 'Nombre de nueva Portada' ),
    'separate_items_with_commas' => __( 'Separa las portadas con coma' ),
    'add_or_remove_items' => __( 'Agregar o Quitar Portadas' ),
    'choose_from_most_used' => __( 'Escoger de las Portadas utilizadas' ),
    'menu_name' => __( 'Portada' ),
  ); 

// Now register the non-hierarchical taxonomy like tag

  register_taxonomy('portada','post',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'portadas' ),
  ));
}
//////////////////////////////////////////////////
add_action( 'init', 'tipo_taxonomy', 0 );

function tipo_taxonomy() {

// Labels part for the GUI

  $labels = array(
    'name' => _x( 'Tipos', 'taxonomy general name' ),
    'singular_name' => _x( 'Tipo', 'taxonomy singular name' ),
    'search_items' =>  __( 'Buscar Tipo' ),
    'popular_items' => __( 'Tipos populares' ),
    'all_items' => __( 'Todas las Tipos' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Editar Tipo' ), 
    'update_item' => __( 'Actualizar Tipo' ),
    'add_new_item' => __( 'Agregar nueva Tipo' ),
    'new_item_name' => __( 'Nombre de nueva Tipo' ),
    'separate_items_with_commas' => __( 'Separa las tipos con coma' ),
    'add_or_remove_items' => __( 'Agregar o Quitar Tipos' ),
    'choose_from_most_used' => __( 'Escoger de las Tipos utilizadas' ),
    'menu_name' => __( 'Tipo' ),
  ); 

// Now register the non-hierarchical taxonomy like tag

  register_taxonomy('tipo','post',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tipos' ),
  ));
}
/////////////////////////////////////////////
add_action( 'init', 'usuario_taxonomy', 0 );

function usuario_taxonomy() {

// Labels part for the GUI

  $labels = array(
    'name' => _x( 'Usuarios', 'taxonomy general name' ),
    'singular_name' => _x( 'Usuario', 'taxonomy singular name' ),
    'search_items' =>  __( 'Buscar usuarios' ),
    'popular_items' => __( 'Usuarios populares' ),
    'all_items' => __( 'Todas los Usuarios' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Editar Usuario' ), 
    'update_item' => __( 'Actualizar Usuario' ),
    'add_new_item' => __( 'Agregar nuevo Usuario' ),
    'new_item_name' => __( 'Nombre de nueva Usuario' ),
    'separate_items_with_commas' => __( 'Separa los Usuarios con coma' ),
    'add_or_remove_items' => __( 'Agregar o Quitar Usuarios' ),
    'choose_from_most_used' => __( 'Escoger de las Usuarios utilizadas' ),
    'menu_name' => __( 'Usuario' ),
  ); 

// Now register the non-hierarchical taxonomy like tag

  register_taxonomy('usuarios','post',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'usuarios' ),
  ));
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////TIPOS DE POST
function paginainicio(){
   $args = array(
   'labels'=> array( 'name'=>'inicio',
       'singular_name'=> 'inicio',
       'menu_name'=>'Inicio',
       'name_admin_bar'=> 'inicio',
       'all_items' =>'Ver todas las publicaciones',
       'add_new'=> 'Añadir nueva publicación' ),
   'description' =>"Este tipo de post es para el inicio",
   'public' => true,
   'exclude_from_search'=>false,
   'publicly_queryable'=> true,
   'show_ui' => true,
   'show_in_menu'=> true,
   'show_in_admin_bar'=> true,
   'menu_position'=>6,
   'capability_type'=> 'page',
   'supports'=> array( 'title', 'author', 'thumbnail' ),
  'taxonomies' => array('category', 'portada'),
   'query_var'=>true,
  );
  register_post_type( "inicio", $args );
 }
 add_action("init","paginainicio");
 
function paginanosotros(){
   $args = array(
   'labels'=> array( 'name'=>'nosotros',
       'singular_name'=> 'nosotros',
       'menu_name'=>'Nosotros',
       'name_admin_bar'=> 'nosotros',
       'all_items' =>'Ver todas las publicaciones',
       'add_new'=> 'Añadir nueva publicación' ),
   'description' =>"Este tipo de post es para el Nosotros",
   'public' => true,
   'exclude_from_search'=>false,
   'publicly_queryable'=> true,
   'show_ui' => true,
   'show_in_menu'=> true,
   'show_in_admin_bar'=> true,
   'menu_position'=>6,
   'capability_type'=> 'page',
   'supports'=> array( 'title', 'editor', 'author', 'thumbnail' ),
  'taxonomies' => array('category'),
   'query_var'=>true,
  );
  register_post_type( "nosotros", $args );
 }
 add_action("init","paginanosotros");
 
 
 function paginaalbum(){
   $args = array(
   'labels'=> array( 'name'=>'album',
       'singular_name'=> 'album',
       'menu_name'=>'Album',
       'name_admin_bar'=> 'album',
       'all_items' =>'Ver todas las publicaciones',
       'add_new'=> 'Añadir nueva publicación' ),
   'description' =>"Este tipo de post es para el Nosotros",
   'public' => true,
   'exclude_from_search'=>false,
   'publicly_queryable'=> true,
   'show_ui' => true,
   'show_in_menu'=> true,
   'show_in_admin_bar'=> true,
   'menu_position'=>6,
   'capability_type'=> 'page',
   'supports'=> array( 'title', 'editor', 'author', 'thumbnail' ),
  'taxonomies' => array('category', 'tipo'),
   'query_var'=>true,
  );
  register_post_type( "album", $args );
 }
 add_action("init","paginaalbum");
  
 
 function paginasesion(){
   $args = array(
   'labels'=> array( 'name'=>'sesion',
       'singular_name'=> 'sesion',
       'menu_name'=>'Sesión',
       'name_admin_bar'=> 'sesion',
       'all_items' =>'Ver todas las publicaciones',
       'add_new'=> 'Añadir nueva publicación' ),
   'description' =>"Este tipo de post es para el Nosotros",
   'public' => true,
   'exclude_from_search'=>false,
   'publicly_queryable'=> true,
   'show_ui' => true,
   'show_in_menu'=> true,
   'show_in_admin_bar'=> true,
   'menu_position'=>6,
   'capability_type'=> 'page',
   'supports'=> array( 'title', 'editor', 'author', 'thumbnail' ),
  'taxonomies' => array('category', 'usuarios'),
   'query_var'=>true,
  );
  register_post_type( "sesion", $args );
 }
 add_action("init","paginasesion");

 ///////////////////////////////////////////////////////////////////////////////////////////////////////////BARRA DE NAVEGACION
class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() )
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu dropdown-menu\">\n";
    }

    function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {
        $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);

        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        if($item->current || $item->current_item_ancestor || $item->current_item_parent){
            $class_names .= ' active';
        }
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
        $output .= $indent . '<li' . $id . $class_names .'>';
        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
        $atts['class']  = ($item->hasChildren)         ? 'dropdown-toggle' : '';
        $atts['data-toggle']  = ($item->hasChildren)   ? 'dropdown'        : '';
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        if( $item->hasChildren) {
            $item_output .= ' <b class="caret"></b>';
        }
        $item_output .= '</a>';
        $item_output .= $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}
update_option('image_default_link_type','none');
