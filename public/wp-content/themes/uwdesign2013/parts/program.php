
<h2><?php echo $program->name; ?></h2>

<?php $users = get_objects_in_term($program->term_id, 'program' ); ?>

<div id="designers-list">

  <?php foreach( $users as $user_id ): ?>
    <?php $user = get_userdata($user_id); ?>
    <?php include( locate_template('parts/user.php') ); ?>
  <?php endforeach; ?>

</div>

