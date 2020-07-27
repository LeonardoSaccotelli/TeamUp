<?php if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Log core myCRED actions
 *
 * @param $array
 * @param $mycred
 *
 * @return mixed
 */
function um_notification_mycred_default_log( $array, $mycred ) {
	if ( um_user('ID') ) {
		$global_user = um_user('ID');
	}

	$user_id = $array['user_id'];

	$vars['photo'] = um_get_avatar_url( get_avatar( $user_id, 40 ) );

	if ( $array['amount'] > 0 ) {
		$vars['mycred_points'] = ( $array['amount'] == 1 ) ? sprintf( __( '%s point', 'um-notifications' ), $array['amount'] ) : sprintf( __( '%s points', 'um-notifications' ), $array['amount'] );
	} else {
		$vars['mycred_points'] = ( $array['amount'] == -1 ) ? sprintf( __( '%s point', 'um-notifications' ), absint( $array['amount'] ) ) : sprintf( __( '%s points', 'um-notifications' ), absint( $array['amount'] ) );
	}

	$vars['mycred_task'] = preg_replace( "/%[^%]*%/", "", $array['entry'] );

	if ( $array['amount'] > 0 ) {
		UM()->Notifications_API()->api()->store_notification( $user_id, 'mycred_award', $vars );
	} else {
		UM()->Notifications_API()->api()->store_notification( $user_id, 'mycred_deduct', $vars );
	}

	um_reset_user();

	if ( isset( $global_user ) ) {
		um_fetch_user( $global_user );
	}

	return $array;
}
add_filter( 'mycred_run_this', 'um_notification_mycred_default_log', 100, 2 );


/**
 * Log UM balance transfer
 *
 * @param $to
 * @param $amount
 * @param $from
 */
function um_notification_log_mycred_points_sent( $to, $amount, $from ) {
	remove_filter('mycred_run_this', 'um_notification_mycred_default_log', 100, 2);

	$vars = array();
	$vars['photo'] = um_get_avatar_url( get_avatar( $to, 40 ) );
	$vars['mycred_points'] = sprintf( __('%s points','um-notifications'), $amount );

	$sender = get_userdata( $from );
	$vars['mycred_sender'] = $sender->display_name;

	UM()->Notifications_API()->api()->store_notification( $to, 'mycred_points_sent', $vars );
}
add_action( 'um_mycred_credit_balance_transfer', 'um_notification_log_mycred_points_sent', 10, 3 );


/**
 * Log UM balance action
 *
 * @param $user_id
 * @param $amount
 * @param $action
 * @param $args
 * @param $type
 */
function um_notification_log_mycred_credit( $user_id, $amount, $action, $args, $type ) {
	remove_filter('mycred_run_this', 'um_notification_mycred_default_log', 100, 2);

	$vars = array();
	$vars['photo'] = um_get_avatar_url( get_avatar( $user_id, 40 ) );
	$vars['mycred_points'] = sprintf( __('%s points','um-notifications'), $amount );

	switch ( $action ) {
		case 'mycred_login': $action = __('logging into site','um-notifications'); break;
		case 'mycred_register': $action = __('completing your registration','um-notifications'); break;
		case 'mycred_editprofile': $action = __('updating your profile','um-notifications'); break;
		case 'mycred_photo': $action = __('adding a profile photo','um-notifications'); break;
		case 'mycred_cover': $action = __('adding a cover photo','um-notifications'); break;
	}

	$vars['mycred_task'] = $action;
	$vars['mycred_type'] = $type;

	UM()->Notifications_API()->api()->store_notification( $user_id, 'mycred_custom_notification', $vars );
}
add_action('um_mycred_credit_balance_user', 'um_notification_log_mycred_credit', 10, 5);



/**
 * @param $hook
 * @param $k
 * @param $prefs
 * @param $class myCRED_Hook
 */
function um_mycred_notification_template( $hook, $k, $prefs, $class ) { ?>
	<label class="subheader" for="<?php echo $class->field_id(  array( $hook, 'notification_tpl' ) ); ?>">
		<?php _e( 'Notification template', 'um-notifications' ); ?>
	</label>
	<ol>
		<li>
			<div class="h2">
				<input type="text" name="<?php echo esc_attr( $class->field_name( array( $hook, 'notification_tpl' ) ) ); ?>"
				       id="<?php echo esc_attr( $class->field_id(  array( $hook, 'notification_tpl' ) ) ); ?>"
				       value="<?php echo sanitize_text_field( stripslashes( $prefs[ $hook ]['notification_tpl'] ) ); ?>" class="long" />
			</div>
		</li>
	</ol>
<?php }
add_action( 'um_mycred_hooks_option_extended', 'um_mycred_notification_template', 10, 4 );