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

<hr />


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


<hr />


<?php // ------- List designers with work ------- ?>

<div id="designers-list-wrapper">

  <?php foreach( $programs as $program ): ?>
    <?php include( locate_template('parts/program.php') ); ?>
  <?php endforeach; ?>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>