<?php
/**
 * Template name: List authors
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>


<?php $programs = get_terms('program', array( 'orderby' => 'id' ) ); ?>

<?php // ------- Box shots ------- ?>


<div id="boxshots">
  <?php foreach( $programs as $program ): ?>
    <?php $users = get_objects_in_term($program->term_id, 'program' ); ?>
      <?php foreach( $users as $user_id): ?>
        
        <?php 
          $max = 0;
          $x = get_cimyFieldValue($user_id, 'box_x'); 
          $y = get_cimyFieldValue($user_id, 'box_y'); 
          $z = get_cimyFieldValue($user_id, 'box_z'); 
        ?>
        
        <a href="<?php echo get_author_permalink($user_id); ?>"><img data-userid="<?php echo $user_id; ?>" src="<?php echo get_cimyFieldValue($user_id, 'boxshot'); ?>" style="left: <?php echo $x; ?>px; top:<?php echo $y; ?>px; z-index:<?php echo $z; ?>" /></a>
        
        <?php if( $y > $max ) { $max = $y; } ?>
        
      <?php endforeach; ?>
      
  <?php endforeach; ?>
  
  <div id="boxshot-inner" style="height:<?php echo $max + 250; ?>px"></div>
  
</div>


<hr />


<?php // ------- List by program ------- ?>

<div id="programs-list">  
  <?php foreach( $programs as $program ): ?>

    <div class="program <?php echo $program->slug; ?>">
    
      <h2><a href="<?php echo get_term_link( $program->slug, 'program' ); ?>"><?php echo $program->description; ?></a></h2>

      <?php $users = get_objects_in_term($program->term_id, 'program' ); ?>
    
      <ul>
        <?php foreach( $users as $user_id): ?>
      
          <li><a href="<?php echo get_author_permalink($user_id); ?>" data-userid="<?php echo $user_id; ?>"><?php the_author_meta( 'display_name', $user_id ); ?></a></li>

        <?php endforeach; ?>  
      </ul>
    </div>
  
  <?php endforeach; ?>
</div>


<hr />


<?php // ------- List designers with work ------- ?>

<div id="designers-list-wrapper">

  <?php foreach( $programs as $program ): ?>
    <?php include( locate_template('parts/program.php') ); ?>
  <?php endforeach; ?>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>