<div id="work-menu-wrapper">
  <div id="work-menu-title">
    <h2>Work</h2>
  </div>

  <ul class="categories">
    <li class="all"><a href="<?php echo get_permalink( get_page_by_path( 'work' ) ); ?>">View All</a></li>
    <?php wp_list_categories( array(
      'title_li' => '',
      'hide_empty' => 0
    ) ); ?>
  </ul>
</div>