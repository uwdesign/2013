<?php
/**
 * The template for displaying Author Archive pages
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ): ?>

  <h2><?php echo get_the_author(); ?></h2>
  
  <?php $user_id = $post->post_author; include(locate_template('parts/headshot.php')); ?>
  
  <?php $program = get_user_program($post->post_author); ?>
  
  <?php if( $program ): ?>
    <a href="<?php echo get_term_link( $program->slug, 'program' ); ?>"><?php echo $program->name; ?></a>
  <?php endif; ?>
  
    
  <?php while(have_posts()): the_post(); ?>
    
    <h2><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h2>    
    
    <?php the_content(); ?>
    
    <ul><?php coauthors_posts_links( '</li><li>', '</li><li>', '<li>', '</li>' ); ?></ul>
    
  <?php endwhile; ?>
  
<?php endif; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
