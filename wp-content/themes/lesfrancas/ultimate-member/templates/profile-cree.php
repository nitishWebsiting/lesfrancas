<?php /* Template: Cree Profile */ ?>

<div class="um <?php echo $this->get_class( $mode ); ?> um-<?php echo $form_id; ?> um-role-<?php echo um_user('role'); ?> ">

	<div class="um-form">
		<?php do_action('um_profile_before_header', $args ); ?>
		
		<?php if ( um_is_on_edit_profile() ) { ?><form method="post" action=""><?php } ?>
		
			<?php do_action('um_profile_header', $args ); ?>

		<?php if ( um_is_on_edit_profile() ) { ?></form><?php } ?>
	
	</div>
	
</div>