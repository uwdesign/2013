<?php $url = get_author_permalink($post->post_author) . '#post-' . get_the_ID(); ?>

<div class="post">
  <h4><a href="<?php echo $url; ?> "><?php the_title(); ?></a></h4>
    
  <a class="post__image-link" href="<?php echo $url; ?>">
    <?php the_medium_post_thumb( get_the_ID() ); ?>
  </a>
  
  <div class="post__media">
    <?php the_category(', '); ?>
  </div>
  
  <div class="post__author">
    <?php coauthors_posts_links(null, ', ', '', ''); ?>
  </div>
  
</div>