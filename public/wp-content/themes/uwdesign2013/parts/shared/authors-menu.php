<?php $programs = get_terms('program', array(
  'order' => 'ASC',
  'orderby' => 'id'
) ); ?>

<div id="programs-menu">
  
  <div id="programs-menu-wrapper">
    
    <div id="programs-info">
      <h2>Designers</h2>
    </div>
  
    <div id="programs-menu-list">
      
      <div class="program all">
        <a class="program__link" href="<?php echo get_permalink( get_page_by_path('designers') ); ?>">
          <span class="program__name">Everyone</span>
          <span class="program__description">At a glance</span>
        </a>
      </div>
      
      <?php foreach($programs as $program): ?>
  
        <div class="program <?php echo $program->slug; ?>">
      
          <a class="program__link" href="<?php echo get_term_link( $program->slug, 'program' ); ?>">
            <span class="program__name">
              <?php echo $program->name; ?>
            </span>
            <span class="program__description">
              <?php echo $program->description; ?>
            </span>
          </a>
      
        </div>
    
      <?php endforeach; ?>
  
    </div>
    
  </div>
  
</div>