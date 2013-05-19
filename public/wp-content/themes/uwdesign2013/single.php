<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package   WordPress
 * @subpackage   Starkers
 * @since     Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div id="post-single">
  
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div class="post-single">
      <h2><?php the_title(); ?></h2>
      <?php the_content(); ?>      
      <?php coauthors_posts_links(); ?>
    </div>
    
    <div class="post-single__images">
      <?php $images = get_the_remaining_post_images($post->ID); ?>
      
      <?php foreach( $images as $image ): ?>
        
        <?php printf( '<img src="%1s" width="%2s" height="%3s" />', $image[0], $image[1], $image[2] ); ?>
        
      <?php endforeach; ?>
      
    </div>
    
  <?php endwhile; ?>
  
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>