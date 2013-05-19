<?php
/**
 * Template name: List authors
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>


<?php $programs = get_terms('program', array( 'orderby' => 'id' ) ); ?>

<?php // ------- Box shots ------- ?>


<?php foreach( $programs as $program ): ?>
  <?php $users = get_objects_in_term($program->term_id, 'program' ); ?>
  <div class="box-shots">
    <?php foreach( $users as $user_id): ?>
      <div class="box-shot">
        <img src="<?php echo get_cimyFieldValue($user_id, 'boxshot'); ?>" />
      </div>
    <?php endforeach; ?>
  </div>
<?php endforeach; ?>


<?php // ------- List by program ------- ?>

<div id="programs-list">
  
<?php foreach( $programs as $program ): ?>

  <div class="program <?php echo $program->slug; ?>">
    
    <h2><a href="<?php echo get_term_link( $program->slug, 'program' ); ?>"><?php echo $program->description; ?></a></h2>

    <?php $users = get_objects_in_term($program->term_id, 'program' ); ?>
    
    <ul>
      <?php foreach( $users as $user_id): ?>
      
        <li><a href="<?php echo get_author_permalink($user_id); ?>"><?php the_author_meta( 'display_name', $user_id ); ?></a></li>

      <?php endforeach; ?>  
    </ul>
  </div>
  
<?php endforeach; ?>
</div>

<?php // ------- List designers with work ------- ?>


<?php $users = get_users( array() ); ?>
<div id="designers-list">
  <?php foreach( $users as $user ): ?>
    
    <div class="designer">
      
      <div class="designer__info">
        
        <a href="<?php echo get_author_permalink($user_id); ?>" class="designer__headshot">
          <?php the_headshot($user->ID); ?>
        </a>
        
        <div class="designer__info-right">
        
          <h2 class="designer__name"><a href="<?php echo get_author_permalink($user->ID); ?>"><?php echo $user->display_name; ?></a></h2>
      
          <?php the_program_link($user->ID, 'description'); ?>
        </div>
      </div>
      
      <?php $designer_posts = get_posts( array('author' => $user->ID) ); ?>
      
      <div class="designer__posts">
        <?php foreach($designer_posts as $designer_post): ?>
          <a href="<?php echo get_permalink($designer_post->ID); ?>"><?php echo get_the_post_thumbnail( $designer_post->ID, 'thumbnail' ); ?></a>
        <?php endforeach; ?>
      </div>
      
    </div>
    
  <?php endforeach; ?>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>