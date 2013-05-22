<?php
/**
 * The template for displaying Author Archive pages
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ): ?>
  
  <div class="designer-single">
    
    <div class="designer-single__info">
      
      <div class="designer-single__info-wrapper">
        
        <div class="designer-single__name">
          <h2><?php echo get_the_author(); ?></h2>
          <?php the_program_link($post->post_author, 'description'); ?>
        </div>
        
        <div class="designer-single__posts-list">
          <h5>Projects</h5>
          <?php while(have_posts()): the_post(); ?>
            <a href="#post-<?php the_ID(); ?>"><?php the_title(); ?></a>
          <?php endwhile; rewind_posts(); ?>
        </div>
        
        <?php $userdata = get_userdata($post->post_author); ?>
        
        <?php $portfolio_link = $userdata->user_url; ?>
        <?php $email_link = $userdata->user_email; ?>
        
        <div class="designer-single__portfolio">
          <?php if( $portfolio_link != '' || $email_link != '' ): ?>
            <h5>Learn More</h5>
            <?php if( $portfolio_link != '' ): ?>
            <a href="<?php echo $portfolio_link; ?>">View Portfolio</a>
            <?php endif; ?>
            <?php if( $email_link != '' ): ?>
            <a href="mailto:<?php echo $email_link; ?>">Email</a>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      
        <div class="designer-single__headshot">
          <?php the_headshot($post->post_author); ?>
        </div>
      
      </div>
      
    </div>
    
    <div class="designer-single__posts">
      <?php while(have_posts()): the_post(); ?>
        <?php get_template_part('parts/post-single'); ?>
      <?php endwhile; ?>
    </div>
    
  </div>
<?php endif; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
