<?php get_header(); ?>
<section class="margin">
<?php global $current_user; get_currentuserinfo();
$username=$current_user->user_login;      $email=$current_user->user_email;      $level=$current_user->user_level;      $nombre=$current_user->user_firstname;      $apellido=$current_user->user_lastname;      $nickname=$current_user->display_name;      $id=$current_user->ID;
if (empty($username)) {
	echo do_shortcode("[ultimatemember form_id=28]");
} else { ?>
	<script type="text/javascript">
	jQuery( function() {
   		 jQuery( '#gallery' ).jGallery({
			"transition":"scaleDown_moveFromRight",
			"transitionCols":"1",
			"transitionRows":"1",
			"thumbnailsPosition":"left",
			"thumbType":"image",
			"backgroundColor":"FFFFFF",
			"textColor":"000000",
			"draggableZoom":"true",
			"mode":"standard"});
	} );
    </script>
		<div id="gallery">
			<?php $terms = get_terms('category');
			 if ( !empty( $terms ) && !is_wp_error( $terms ) ){ 
			 foreach ( $terms as $term ) {  
				 $categoria=$term->name; $cat=get_cat_ID($categoria); ?>
				 <div class="album" data-jgallery-album-title=<?php echo $categoria ?>>
					 <?php $args=array( 'post_type'=> 'sesion', 'post_status' => 'publish', 'posts_per_page' => 100, 'order' => 'ASC', 'tax_query' => array( 'relation' => 'AND', 
					 array(  'taxonomy' => 'category', 'field' => 'id', 'terms' => array($cat) ), 
					 array(  'taxonomy' => 'usuarios', 'field' => 'slug', 'terms' => $username ) ) ); $my_query = new WP_Query($args);
					 while ($my_query->have_posts()) : $my_query->the_post(); $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
									<a href="<?php echo $url; ?>"><?php the_post_thumbnail( 'full', array('class' => '')); ?></a>
					 <?php  endwhile; wp_reset_query(); ?>
				 </div><?php } } ?>
		</div>
		<?php echo do_shortcode("[ultimatemember form_id=29]"); 
} ?>
</section>

<!-- EL ID DE LA PAGINA ALBUM -->
<script>
jQuery(document).ready(function(){
	jQuery(".menu-item-11").addClass("current-menu-item active current_page_item");
});
</script>
<?php get_footer(); ?>