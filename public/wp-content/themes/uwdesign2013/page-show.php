<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
  
<?php if ( have_posts() ) the_post(); ?>

<div id="moment">
  
  <div data-img="U" data-0="top:-100px" data-300="top:400px"></div>
  <div data-img="W" data-0="top:0px" data-200="top:400px"></div>
  
  <div data-img="D" data-0="top:800px" data-300="top:400px"></div>
  <div data-img="E" data-300="top:600px" data-600="top:400px"></div>
  <div data-img="S" data-0="top:1000px" data-300="top:400px"></div>
  <div data-img="I" data-0="top:-600px" data-300="top:400px"></div>
  <div data-img="G" data-0="top:400px" data-600="top:400px"></div>
  <div data-img="N" data-0="top:-600px" data-600="top:400px"></div>
  
  <!-- <div data-img="2" data-0="top:400px" data-300="top:400px"></div>
  <div data-img="0" data-0="top:400px" data-300="top:400px"></div>
  <div data-img="1" data-0="top:-200px" data-700="top:400px"></div>
  <div data-img="3" data-0="top:-300px" data-700="top:400px"></div> -->
  
  <div data-img="shape1a" data-0="top:200px" data-1000="top:600px"></div>
  <div data-img="shape1b" data-0="top:500px" data-1000="top:400px"></div>
  
  <div data-img="shape2b" data-0="left:-15px;top:600px" data-400="left:-10px;top:350px"></div>
  <div data-img="shape2a" data-0="top:-200px" data-300="top:350px"></div>
  
  <div data-img="shape3a" data-0="top:100px" data-1000="top:600px"></div>
  
  <div data-img="shape4a" data-0="top:500px" data-900="top:230px"></div>
  <div data-img="shape4b" data-0="top:800px" data-1200="top:100px"></div>
  
  <div data-img="shape4d" data-0="top:-217px;left:-68px" data-900="top:-600px"></div>
  <div data-img="shape4c" data-0="top:-100px" data-900="top:-600px"></div>

    
  <div data-img="shape5a" data-300="top:1200px" data-900="top:450px;left:30px"></div>
  <div data-img="shape5b" data-300="top:900px" data-900="top:450px;left:30px"></div>
  

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