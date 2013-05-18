<?php $programs = get_terms('program', array(
  'order' => 'ASC',
  'orderby' => 'id'
) ); ?>

<div id="programs">
  
  <div id="programs-info">
    
  </div>
  
  <?php foreach($programs as $program): ?>
  
    <div class="program <?php echo $program->slug; ?>">
      
      <h2><a href="<?php echo get_term_link( $program->slug, 'program' ); ?>"><?php echo $program->description; ?></a></h2>
      
      <?php $users = get_objects_in_term($program->term_id, 'program' ); ?>
      
      <ul>
        
        <?php foreach( $users as $user_id): ?>
          <li><a href="<?php echo esc_url( get_author_posts_url( $user_id,  get_the_author_meta( 'user_login', $user_id ) ) ); ?>"><?php the_author_meta( 'display_name', $user_id ); ?></a></li>
        <?php endforeach; ?>
        
      </ul>
    </div>
    
  <?php endforeach; ?>
  
</div>