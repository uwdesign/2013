<div class="post-single">
  <a name="post-<?php the_ID(); ?>"></a>
  <div class="post-single__info">
    
    <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>      
    
    <?php $coauthors = get_the_other_coauthors($post->post_author); ?>
	  
    <?php if( count($coauthors) ): ?>
      
      <h5>Team Members</h5>
      
      <?php foreach($coauthors as $coauthor): ?>
        <a href="<?php echo get_author_permalink($coauthor->ID); ?>"><?php echo $coauthor->display_name; ?></a>
      <?php endforeach; ?>
    
    <?php endif; ?>
    
  </div>

  <div class="post-single__images">
    <?php $images = get_the_remaining_post_images($post->ID); ?>
  
    <?php foreach( $images as $image ): ?>
    
      <div class="post-single__image">
        <?php printf( '<img src="%1s" width="%2s" height="%3s" />', $image[0], $image[1], $image[2] ); ?>
      </div>
    
    <?php endforeach; ?>
  
  </div>

</div>