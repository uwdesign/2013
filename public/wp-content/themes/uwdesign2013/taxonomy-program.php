<?php
/**
 * Program index
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php
$term_id = get_queried_object_id();
$term = get_queried_object();

$users = get_objects_in_term( $term_id, $term->taxonomy ); ?>

<h1><?php echo $term->description; ?></h1>

<?php if ( !empty( $users ) ) : ?>
  
  <?php foreach ( $users as $user_id ): ?>
    
    <div class="user">
      
      <?php echo get_avatar( get_the_author_meta( 'email', $user_id ), '96' ); ?>
      
      <h2 class="user-title">
        <a href="<?php echo esc_url( get_author_posts_url( $user_id ) ); ?>"><?php the_author_meta( 'display_name', $user_id ); ?></a>
      </h2>
      
      <?php $user_posts = get_posts( array( 'author' => $user_id ) ); ?>
      
      <?php foreach( $user_posts as $post ): ?>
        <div class="user-post">
          <h2><?php echo $post->post_title; ?></h2>
        </div>
      <?php endforeach; ?>
      
    </div>

  <?php endforeach; ?>
<?php endif; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>