<?php
/**
 * The template for displaying Author Archive pages
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ): the_post(); ?>

  <h2><?php echo get_the_author(); ?></h2>
  
  <?php $program = wp_get_object_terms( $post->ID, 'program' ); ?>
  
  <?php rewind_posts(); while ( have_posts() ) : the_post(); ?>
    
    <h2><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h2>
    
    <?php the_content(); ?>
    
    <?php query_posts( array('author' => get_the_ID() ) ); ?>

    <div id="posts">
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="post">
          <h2><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h2>
          <?php the_content(); ?>
        </div>
      <?php endwhile; ?>
    </div>

    <?php wp_reset_query(); ?>
    
  <?php endwhile; ?>
  
<?php endif; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>