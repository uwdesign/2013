<div id="work-menu-wrapper">
  <div id="work-menu-title">
    <h2>Work</h2>
    <p><a href="<?php echo get_permalink( get_page_by_path( 'work' ) ); ?>">View All</a></p>
  </div>

  <ul class="categories">
    <?php wp_list_categories( array(
      'title_li' => '',
      'hide_empty' => 0
    ) ); ?>
  </ul>
</div>