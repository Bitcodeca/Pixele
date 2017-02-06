<?php
/*
	==========================================
	 Include scripts
	==========================================
*/
function awesome_script_enqueue() {
	//css
	wp_enqueue_style('animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css', array(), '1.0.0', 'all');
  wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), '1.0.0', 'all');
  if(is_page('portafolio')){
    wp_enqueue_style('jgallery', get_template_directory_uri() . '/css/jgallery.css', array(), '1.0.0', 'all');
    wp_enqueue_style('jgallerymin', get_template_directory_uri() . '/css/jgallery.min.css', array(), '1.0.0', 'all');
  }
  if(is_page('home')){
    wp_enqueue_style('fancyboxcss', get_template_directory_uri() . '/css/jquery.fancybox.css', array(), '1.0.0', 'all');
    wp_enqueue_style('fancyboxthumbnailcss', get_template_directory_uri() . '/css/jquery.fancybox-thumbs.css', array(), '1.0.0', 'all');
  }
	wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '1.0.0', 'all');
  wp_enqueue_style('Materializecss', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css', array(), '0.98.0', 'all');
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all');
  wp_enqueue_style('css', get_template_directory_uri() . '/css/awesome.css', array(), '1.0.4', 'all');
	
	//js
	wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js', array(), '3.1.0', true);
  wp_enqueue_script('Materialize js', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js', array(), '0.98.0', true);
  if(is_page('portafolio')){
    wp_enqueue_script('jgalleryminjs', get_template_directory_uri() . '/js/jgallery.min.js', array(), '1.0.0', true);
    wp_enqueue_script('touchswipejs', get_template_directory_uri() . '/js/touchswipe.min.js', array(), '1.0.0', true);
    //wp_enqueue_script('classiejs', 'https://cdnjs.cloudflare.com/ajax/libs/classie/1.0.1/classie.min.js', array(), '1.0.0', true);
  }
  if(is_page('home')){
    wp_enqueue_script('isotopejs', 'http://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js', array(), '1.0.0', true);
    wp_enqueue_script('isotopeimgjs', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/3.2.0/imagesloaded.pkgd.min.js', array(), '1.0.0', true);
    wp_enqueue_script('wowjs', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array(), '1.0.0', true);
    wp_enqueue_script('fancyboxjs', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js', array(), '1.0.0', true);
    wp_enqueue_script('fancybox Thumb', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.js', array(), '1.0.0', true);
  }
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
  register_taxonomy('portada','post',array(
    'hierarchical' => true,
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
    'hierarchical' => true,
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
if( ! class_exists( 'Materialize_Walker_Desktop_Nav_Menu' ) ) :

    class Materialize_Walker_Desktop_Nav_Menu extends Walker_Nav_Menu {

        private $curItem;

        /**
         * Starts the list before the elements are added.
         *
         * Adds classes to the unordered list sub-menus.
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   An array of arguments. @see wp_nav_menu()
         */
        function start_lvl( &$output, $depth = 0, $args = array() ) {

            // Depth-dependent classes.
            $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
            $display_depth = ( $depth + 1); // because it counts the first submenu as 0
            $classes = array(
                'sub-menu',
                ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
                ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
                'menu-depth-' . $display_depth
            );
            $class_names = implode( ' ', $classes );

            // Build HTML for output.
            $output .= "\n" . $indent . '<ul id="' . $this->curItem->post_name . '" class="' . $class_names . ' dropdown-content">' . "\n";
        }

        /**
         * Start the element output.
         *
         * Adds main/sub-classes to the list items and links.
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param object $item   Menu item data object.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   An array of arguments. @see wp_nav_menu()
         * @param int    $id     Current item ID.
         */
        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            global $wp_query;
            $this->curItem = $item;
            $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

            // Depth-dependent classes.
            $depth_classes = array(
                ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
                ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
                ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
                'menu-item-depth-' . $depth
            );

            $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

            // Passed classes.
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

            // Build HTML.
            $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
            if( in_array( 'menu-item-has-children', $item->classes ) ) {$dropdown='dropdown-button ';}else{$dropdown='';}
            // Link attributes.
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
            $attributes .= ' class="menu-link ' .$dropdown. ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

            if( in_array( 'menu-item-has-children', $item->classes ) ) 
                $attributes .= ' data-activates="' . $item->post_name . '"';

            // Build HTML output and pass through the proper filter.
            $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
                $args->before,
                $attributes,
                $args->link_before,
                apply_filters( 'the_title', $item->title, $item->ID ),
                $args->link_after,
                $args->after
            );
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }

endif;