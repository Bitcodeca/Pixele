<?php get_header(); ?>
<section class="margin">
    <div class="container">
    	<div class="row">
        	<div class="text-right col-md-5">
                
					  <?php
            $page = get_page_by_path( 'galeria-privada');
            $thumb=$page->ID;
					  $terms = get_terms('tipo');
					  if ( !empty( $terms ) && !is_wp_error( $terms ) ){
              foreach ( $terms as $term ) { 
                $categoria=$term->name; 
                if($categoria=='privado'){
                  $taxpriv=$term->term_id;
                }else{
                  $taxpub=$term->term_id;
                }
              }
            }

            $args=array( 'post_type'=> 'album', 'post_status' => 'publish', 'posts_per_page' => 1, 'order' => 'ASC', 'tax_query' => array( array(  'taxonomy' => 'tipo', 'field' => 'slug', 'terms' => 'privado' ) ) );
            $my_query = new WP_Query($args);
            while ($my_query->have_posts()) :
              $my_query->the_post(); 
              $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
              ?>
              <a href="index.php/?p=<?php echo $thumb; ?>"><?php the_post_thumbnail( 'full', array('class' => 'img-responsive')); ?></a>
              <h3><?php the_title(); ?></h3>
             <?php
            endwhile;
            wp_reset_query(); ?>
          </div>
          <div class="text-left col-md-offset-2 col-md-5">
                
           	<?php
            $page = get_page_by_path( 'portafolio');
            $thumb=$page->ID;
					  $args=array( 'post_type'=> 'album', 'post_status' => 'publish', 'posts_per_page' => 1, 'order' => 'ASC', 'tax_query' => array( array(  'taxonomy' => 'tipo', 'field' => 'slug', 'terms' => 'publico' ) ) );
            $my_query = new WP_Query($args);
					  while ($my_query->have_posts()) :
              $my_query->the_post();
              $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
              ?>
							<a href="index.php/?p=<?php echo $thumb; ?>"><?php the_post_thumbnail( 'full', array('class' => 'img-responsive')); ?></a>
              <h3><?php the_title(); ?></h3>
					    <?php
            endwhile;
            wp_reset_query(); ?>
                  
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>