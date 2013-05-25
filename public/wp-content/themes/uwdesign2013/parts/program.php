<div id="program-<?php echo $program->slug; ?>">
  
  <h2 class="program-name"><?php echo $program->name; ?></h2>

  <?php $users = get_objects_in_term( $program->term_id, 'program' ); ?>
  
  
  <?php $all_users = array_map( function($user_id){
    return get_userdata($user_id);
  }, $users);?>
  
  <?php usort($all_users, function($usera, $userb){
    return strnatcmp ( array_pop(explode(' ', $usera->display_name)), array_pop(explode(' ', $userb->display_name)) );
  }); ?>
  
  <div id="designers-list">

    <?php foreach( $all_users as $user ): ?>
      <?php include( locate_template('parts/user.php') ); ?>
    <?php endforeach; ?>

  </div>
</div>