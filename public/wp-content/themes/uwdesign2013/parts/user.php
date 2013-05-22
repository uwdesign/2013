
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
  <?php $coauthor_posts = get_coauthor_posts($user->user_login, $coauthors_plus, $wp_query); ?>  
  
  <div class="designer__posts">
    <div class="designer__posts-wrapper">
      <?php while( $coauthor_posts->have_posts() ): ?>
        
        <?php $coauthor_posts->the_post(); ?>
        
        <a href="<?php echo get_permalink( get_the_ID() ); ?>">
          
          <?php the_small_post_thumb( get_the_ID() ); ?>
          
        </a>
        
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
  
</div>
