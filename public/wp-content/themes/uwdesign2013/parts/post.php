<div class="post">
  <h4><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h4>
  
  <?php if ( has_post_thumbnail() ): ?>
    
    <?php the_post_thumbnail('medium'); ?>
    
  <?php endif; ?>
  
  <div class="post__media">
    <?php the_category(', '); ?>
  </div>
  
  <div class="post__author">
    <?php coauthors_posts_links(null, ', ', '', ''); ?>
  </div>
  
</div>