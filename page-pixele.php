<?php get_header(); ?>
<section class="margin">
    <div class="container">
    <?php $args=array( 'post_type'=> 'nosotros', 'post_status' => 'publish', 'posts_per_page' => 100, 'order' => 'ASC' ); $my_query = new WP_Query($args); while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <div class="row">
                        <div class="col-md-12">
                        <h2 class="text-center"><?php the_title(); ?></h2>
                            <div class="col-md-4">
                           		<?php the_post_thumbnail( 'full', array('class' => 'nosotrosimg')); ?>
                            </div>
                            <?php the_content(); ?>
                         </div>
                     </div>
				<?php endwhile; ?>
    </div>
</section>
<?php get_footer(); ?>