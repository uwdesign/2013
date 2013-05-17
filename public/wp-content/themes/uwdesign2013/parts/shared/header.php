<div id="header">
  <div id="header-inner">
    <h1 id="site-title"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
    <?php wp_nav_menu(); ?>
  </div>  
</div>

<div id="designers-menu" class="sub-menu-wrapper">
  <div class="sub-menu">
    <div class="sub-menu-inner">
      <?php get_template_part('parts/shared/authors-menu'); ?>
    </div>
  </div>
</div>

<div id="work-menu" class="sub-menu-wrapper">
  <div class="sub-menu">
    <div class="sub-menu-inner">
      <?php get_template_part('parts/shared/work-menu'); ?>
    </div>
  </div>
</div>

<div id="main">