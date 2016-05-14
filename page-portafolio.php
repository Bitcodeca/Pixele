<?php get_header(); ?>
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
<section class="margin">
    <div id="gallery">
		<?php $terms = get_terms('category');
         if ( !empty( $terms ) && !is_wp_error( $terms ) ){ 
         foreach ( $terms as $term ) {  
			 $categoria=$term->name; $cat=get_cat_ID($categoria);?>
			 <div class="album" data-jgallery-album-title=<?php echo $categoria ?>>
				 <?php $args=array( 'post_type'=> 'inicio', 'post_status' => 'publish', 'posts_per_page' => 100, 'order' => 'ASC', 'tax_query' => array( array(  'taxonomy' => 'category', 'field' => 'id', 'terms' => $cat ) ) ); $my_query = new WP_Query($args);
                 while ($my_query->have_posts()) : $my_query->the_post(); $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
                                <a href="<?php echo $url; ?>"><?php the_post_thumbnail( 'full', array('class' => '')); ?></a>
                 <?php  endwhile; wp_reset_query(); ?>
			 </div><?php } } ?>
    </div>
</section>
<!-- EL ID DE LA PAGINA ALBUM -->
<script>
jQuery(document).ready(function(){
	jQuery(".menu-item-11").addClass("current-menu-item active current_page_item");
});
</script>
<?php get_footer(); ?>