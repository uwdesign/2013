<?php
  /**
   * Starkers functions and definitions
   *
   * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
   *
    * @package   WordPress
    * @subpackage   Starkers
    * @since     Starkers 4.0
   */

  /* ========================================================================================================================
  
  Required external files
  
  ======================================================================================================================== */

  require_once( 'external/starkers-utilities.php' );

  /* ========================================================================================================================
  
  Theme specific settings

  Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme
  
  ======================================================================================================================== */

  add_theme_support('post-thumbnails');
  
  function get_user_program($user_id) {
    $programs = wp_get_object_terms( $user_id, 'program' );
    if( count($programs) ) {
      return $programs[0];
    }
    return null;
  }
  
  function get_author_permalink($user_id) {
    return get_author_posts_url( $user_id,  get_the_author_meta( 'user_login', $user_id ) );
  }
  
  function the_headshot($user_id) {
    include(locate_template('parts/headshot.php'));
  }
  
  function the_program_link($user_id, $field) {
    $program = get_user_program($user_id);

    if( $program ){ 
      $url = get_term_link( $program->slug, 'program' );
      $name = $program->$field;
      echo "<a class='program-link' href='$url'>$name</a>";
    }
  }
  
  function get_post_attachments($post_id) {
    return get_posts( 
      array(
        'post_parent' => $post_id, 
        'post_type' => 'attachment', 
        'orderby' => 'menu_order', 
        'order' => 'ASC',
        'post_status' => 'inherit',
        'numberposts' => -1
      ) 
    );
  }
  
  function get_attachment_number($post_id, $number) {
    $attachments = get_post_attachments($post_id);
    
    if( count($attachments) > $number ) {
      $image = $attachments[$number];
      $size = $number == 0 ? 'thumbnail' : 'medium';
      if( $image ) {
        return wp_get_attachment_image_src( $image->ID, $size );
      }
    }    
  }
  
  function display_image($attachment) {
    if( count($attachment) > 2 ) {
      $src = $attachment[0];
      $width = $attachment[1];
      $height = $attachment[2];
      echo "<img src='$src' width='$width' height='$height' />";
    }
  }
  
  function the_small_post_thumb($post_id) {
    return display_image( get_attachment_number($post_id, 0) );
  }
  
  function the_medium_post_thumb($post_id) {
    return display_image( get_attachment_number($post_id, 1) );
  }
  
  function get_the_remaining_post_images($post_id) {
    
    $attachments = get_post_attachments($post_id);
    $return_list = array();
    if( count($attachments) > 2 ) {
      
      $remaining = array_slice($attachments, 2);
      foreach( $remaining as $attachment ) {  
        $image_src = wp_get_attachment_image_src($attachment->ID, 'large');
        array_push( $return_list, $image_src );
      }
      
    }
    
    return $return_list;
    
  }
  
  function without_current($author) {
    echo "$author : " . get_the_author() . '<br/>';
    return $author != get_the_author();
  }
  
  function get_the_other_coauthors($author_id) {
    
    $all_coauthors = get_coauthors();

    $other_coauthors = array();
    
    foreach( $all_coauthors as $coauthor ) {
      
      if ( $coauthor->ID != $author_id ) {
        array_push( $other_coauthors, $coauthor);
      }
    }
    
    return $other_coauthors;
    
  }
  
  function get_coauthor_posts($user_login, $coauthors_plus, $wp_query) {
    
    $coauthor = $coauthors_plus->get_coauthor_by( 'user_login', $user_login );
    $coauthor_term = $coauthors_plus->get_author_term( $coauthor );
    
    
    if( $coauthor_term ){

      return new WP_Query( array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'orbery' => 'date',
        'order' => 'DESC',
        'tax_query' => array(
          array(
            'taxonomy' => 'author',
            'field' => 'slug',
            'terms' => $coauthor_term->slug
          )
        )

      ) );

    }
    
    return $wp_query;
  }
  
  function get_post_url() {
    global $post;
    if ( count(get_coauthors()) > 1 ){
      return get_permalink();
    }
    return get_author_permalink($post->post_author) . '#post-' . get_the_ID(); 
  }
  
  
  /* ========================================================================================================================
  
  Actions and Filters
  
  ======================================================================================================================== */

  add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

  add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

  /* ========================================================================================================================
  
  Custom Post Types - include custom post types and taxonimies here e.g.

  e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
  
  ======================================================================================================================== */
  
  
  function register_things() {
    register_nav_menu('header', __( 'Header' ));
    
    register_taxonomy(
      'program',
      'user',
      array(
        'label' => __( 'Program' ),
        'rewrite' => array( 'slug' => 'program' ),
        'hierarchical' => true
      )
    );
  }
  
  add_action( 'init', 'register_things' );
  
    
    
    function wpr_maintenance_mode() {
      if ( !is_user_logged_in() ) {
        wp_die('<img src="/lightsplash.jpg" style="width:640px" />', 'Coming soon');
      }
    }
    
    add_action('wp_head', 'wpr_maintenance_mode');
    
     



  /* ========================================================================================================================
  
  Scripts
  
  ======================================================================================================================== */

  /**
   * Add scripts via wp_head()
   *
   * @return void
   * @author Keir Whitaker
   */

  function starkers_script_enqueuer() {
    wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
    wp_enqueue_script( 'site' );

    wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
  }  

  /* ========================================================================================================================
  
  Comments
  
  ======================================================================================================================== */

  /**
   * Custom callback for outputting comments 
   *
   * @return void
   * @author Keir Whitaker
   */
  function starkers_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment; 
    ?>
    <?php if ( $comment->comment_approved == '1' ): ?>  
    <li>
      <article id="comment-<?php comment_ID() ?>">
        <?php echo get_avatar( $comment ); ?>
        <h4><?php comment_author_link() ?></h4>
        <time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
        <?php comment_text() ?>
      </article>
    <?php endif;
  }
  
  
  