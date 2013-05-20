
<div class="designer">
  
  <div class="designer__info">
    
    <a href="<?php echo get_author_permalink($user->ID); ?>" class="designer__headshot">
      <?php the_headshot($user->ID); ?>
    </a>
    
    <div class="designer__info-right">
    
      <h2 class="designer__name"><a href="<?php echo get_author_permalink($user->ID); ?>"><?php echo $user->display_name; ?></a></h2>
      
      <?php the_program_link($user->ID, 'description'); ?>
      
    </div>
    
  </div>
  
  <?php $designer_posts = get_posts( array('author' => $user->ID) ); ?>
  
  <div class="designer__posts">
    <div class="designer__posts-wrapper">
      <?php foreach($designer_posts as $designer_post): ?>
        <a href="<?php echo get_permalink($designer_post->ID); ?>">
          
          <?php the_small_post_thumb($designer_post->ID); ?>
          
        </a>
      <?php endforeach; ?>
    </div>
  </div>
  
</div>
