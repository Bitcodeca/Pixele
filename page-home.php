<?php get_header(); ?>
<div class="grid">
	<div class="grid-sizer"></div>
    <!-- EL ID DEL VALOR PORTADA DENTRO DE LA TAXONOMIA PORTADA -->
                <?php $args=array( 'post_type'=> 'inicio', 'post_status' => 'publish', 'posts_per_page' => 1000, 'order' => 'DESC', 'tax_query' => array( array(  'taxonomy' => 'portada', 'field' => 'slug', 'terms' => 'portada' ) ) ); $my_query = new WP_Query($args);
                if( $my_query->have_posts() ) {
                  while ($my_query->have_posts()) : $my_query->the_post();
				  $categories = get_the_category(); $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
				  $page = get_page_by_path( 'portafolio'); $thumb=$page->ID; ?>
                          <div class="grid-item wow fadeIn" data-wow-delay="<?php echo $x; $x=100+$x; ?>ms" >
                                <a class="fancybox"  href="<?php echo $url; ?>" data-fancybox-group="thumb" title="<a href='index.php/?p=<?php echo $thumb; ?>#<?php echo $url; ?>' style='color:white;'>Ver Album</a>"><img src="<?php echo $url; ?>" class="img-responsive ongray" alt=""></a>
                          </div>
                  		<?php endwhile; }  wp_reset_query(); ?>
</div>
<script>
jQuery(document).ready(function ($) {
    jQuery('.fancybox').attr('rel', 'media-gallery').fancybox({
        prevEffect: 'none',
        nextEffect: 'none',
        closeBtn: true,
        arrows: true,
        nextClick: true,
        helpers: {
           title	: {
				type: 'float'
			},
			thumbs	: {
				width	: 100,
				height	: 100
			}
		}
    });
});
</script>
<script>
jQuery(document).ready( function() {
  // init Isotope
  var $grid = jQuery('.grid').isotope({
    itemSelector: '.grid-item',
    percentPosition: true,
    masonry: {
      columnWidth: '.grid-sizer'
    }
  });
  // layout Isotope after each image loads
  $grid.imagesLoaded().progress( function() {
    $grid.isotope('layout');
  });  

});
</script>
<script>
jQuery(document).ready(function(){
    jQuery(".ongray").hover(
        function(){
        jQuery(this).addClass("g")
        },
        function(){
        jQuery(this).removeClass("g");
        }
    );
});
</script>
<?php get_footer(); ?>