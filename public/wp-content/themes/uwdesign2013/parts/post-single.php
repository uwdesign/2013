<div class="post-single">
  <a name="post-<?php the_ID(); ?>"></a>
  <div class="post-single__info">
    
    <h2><?php the_title(); ?></h2>
    
    <?php the_content(); ?>
    
    <hr />
    
    <?php $coauthors = get_the_other_coauthors($post->post_author); ?>
	  
    <?php if( count($coauthors) ): ?>
      <div class="post-single__info-section">
        <h5>Team Members</h5>
        <ul>
          <?php foreach($coauthors as $coauthor): ?>
            <li><a href="<?php echo get_author_permalink($coauthor->ID); ?>"><?php echo $coauthor->display_name; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
    
    <div class="post-single__info-section">
      <h5>Media</h5>
      <?php the_category(); ?>
    </div>
    
    <hr />
    
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