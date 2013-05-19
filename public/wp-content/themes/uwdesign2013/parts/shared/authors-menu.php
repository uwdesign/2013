<?php $programs = get_terms('program', array(
  'order' => 'ASC',
  'orderby' => 'id'
) ); ?>

<div id="programs">
  
  <div id="programs-info">
    
  </div>
  
  <?php foreach($programs as $program): ?>
  
    <div class="program <?php echo $program->slug; ?>">
      
      <h2><a href="<?php echo get_term_link( $program->slug, 'program' ); ?>"><?php echo $program->name; ?></a></h2>
      
    </div>
    
  <?php endforeach; ?>
  
</div>