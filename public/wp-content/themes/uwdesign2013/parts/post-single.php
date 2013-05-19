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
    <?php else: ?>
      <div class="post-single__info-section">
        <h5>Designer</h5>
        <a href="<?php echo get_author_permalink($post->post_author); ?>"><?php the_author(); ?></a>
      </div>
    <?php endif; ?>
    
    <div class="post-single__info-section">
      <h5>Media</h5>
      <?php the_category(); ?>
    </div>
    
    <hr />
    
  </div>

  <div class="post-single__images">
    
    <?php $vimeo_meta = get_post_meta($post->ID, 'vimeo'); ?>
    <?php if( count($vimeo_meta) > 0 ): ?>
      <?php $vimeo_ids = explode(',', $vimeo_meta[0] ); ?>
    
      <?php foreach( $vimeo_ids as $vimeo_id ): ?>
        <div class="post-single__video">
          <iframe src="http://player.vimeo.com/video/<?php echo $vimeo_id; ?>?title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;color=ffffff" width="681" height="383" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
    
    
    <?php $images = get_the_remaining_post_images($post->ID); ?>
  
    <?php foreach( $images as $image ): ?>
    
      <div class="post-single__image">
        <?php printf( '<img src="%1s" width="%2s" height="%3s" />', $image[0], $image[1], $image[2] ); ?>
      </div>
    
    <?php endforeach; ?>
  
  </div>

</div>