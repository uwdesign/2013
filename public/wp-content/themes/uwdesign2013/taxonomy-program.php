<?php
/**
 * Program index
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php $term_id = get_queried_object_id(); ?>
<?php $program = get_queried_object(); ?>
<div id="designers-list-wrapper">
  <?php include( locate_template('parts/program.php') ); ?>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>