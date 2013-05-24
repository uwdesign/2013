<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
  
<?php if ( have_posts() ) the_post(); ?>

<div id="moment">
  <div data-img="0"></div>
  <div data-img="1"></div>
  <div data-img="2"></div>
  <div data-img="3"></div>
  <div data-img="U"></div>
  <div data-img="W"></div>
  <div data-img="D"></div>
  <div data-img="E"></div>
  <div data-img="S"></div>
  <div data-img="I"></div>
  <div data-img="G"></div>
  <div data-img="N"></div>
  <div data-img="shape1a"></div>
  <div data-img="shape1b"></div>
  <div data-img="shape2a"></div>
  <div data-img="shape2b"></div>
  <div data-img="shape3a"></div>
  <div data-img="shape4a"></div>
  <div data-img="shape4b"></div>
  <div data-img="shape4c"></div>
  <div data-img="shape4d"></div>
  <div data-img="shape5a"></div>
  <div data-img="shape5b"></div>
</div>

<div id="index-posts">
  <?php the_content(); ?>
  <hr/>
</div>

<?php rewind_posts(); query_posts('orderby=rand'); ?>

<h2>Work</h2>

<div id="posts">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part('parts/post') ?>
  <?php endwhile; ?>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>