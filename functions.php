<?php
//register settings
function theme_settings_init(){
    register_setting( 'theme_settings', 'theme_settings' );
}

//add settings page to menu
function add_settings_page() {
add_menu_page( __( 'Opciones de LC' ), __( 'Opciones de LC' ), 'manage_options', 'settings', 'theme_settings_page');
}

//add actions
add_action( 'admin_init', 'theme_settings_init' );
add_action( 'admin_menu', 'add_settings_page' );

//define your variables
$color_scheme = array('default','blue','green',);

//start settings page
function theme_settings_page() {

if ( ! isset( $_REQUEST['updated'] ) )
$_REQUEST['updated'] = false;

//get variables outside scope
global $color_scheme;
?>

<div>

	<div id="icon-options-general"></div>
	<h2><?php _e( 'Opciones de La Cantora' ) //your admin panel title ?></h2>

	<?php
	//show saved options message
	if ( false !== $_REQUEST['updated'] ) : ?>
	<div><p><strong><?php _e( 'Opciones guardadas' ); ?></strong></p></div>
	<?php endif; ?>

	<form method="post" action="options.php">

	<?php settings_fields( 'theme_settings' ); ?>
	<?php $options = get_option( 'theme_settings' ); ?>

	<table>

	<!-- Option 1: Audios -->
	<tr valign="top">
	<th scope="row"><?php _e( 'URL de los audios' ); ?></th>
	<td><input id="theme_settings[audios_url]" type="text" size="36" name="theme_settings[audios_url]" value="<?php esc_attr_e( $options['audios_url'] ); ?>" />
	<label for="theme_settings[audios_url]"><?php _e( 'Ingresa la URL donde están alojados los audios' ); ?></label></td>
	</tr>


<!--	<tr valign="top">
	<th scope="row"><?php _e( 'Color Scheme' ); ?></th>
	<td><select name="theme_settings[color_scheme]">
	<?php foreach ($color_scheme as $option) { ?>
	<option <?php if ($options['color_scheme'] == $option ){ echo 'selected="selected"'; } ?>><?php echo htmlentities($option); ?></option>
	<?php } ?>
	</select>                    
	<label for="theme_settings[color_scheme]"><?php _e( 'Choose Your Color Scheme' ); ?></label></td>
	</tr>


	<tr valign="top">
	<th scope="row"><?php _e( 'Disable Widgetized Footer' ); ?></th>
	<td><input id="theme_settings[extended_footer]" name="theme_settings[extended_footer]" type="checkbox" value="1" <?php checked( '1', $options['extended_footer'] ); ?> />
	<label for="theme_settings[disable_related_posts]"><?php _e( 'Check this box if you would like to disable the widgetized footer section' ); ?></label></td>
	</tr>


	<tr valign="top">
	<th scope="row"><?php _e( 'Tracking Code' ); ?></th>
	<td><label for="theme_settings[tracking]"><?php _e( 'Enter your analytics tracking code' ); ?></label>
	<br />
	<textarea id="theme_settings[tracking]" name="theme_settings[tracking]" rows="5" cols="36"><?php esc_attr_e( $options['tracking'] ); ?></textarea></td>
	</tr>-->

	</table>

	<p><input name="submit" id="submit" value="Guardar" type="submit"></p>
	</form>

</div><!-- END wrap -->

<?php
}
//sanitize and validate
function options_validate( $input ) {
    global $select_options, $radio_options;
    if ( ! isset( $input['option1'] ) )
        $input['option1'] = null;
    $input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );
    $input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );
    if ( ! isset( $input['radioinput'] ) )
        $input['radioinput'] = null;
    if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
        $input['radioinput'] = null;
    $input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );
    return $input;
}
?>



<?php
if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu( 'menu-superior', 'Menu superior' );
}

/** Admin Slug Function */
function the_slug() {
    $post_data = get_post($post->ID, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug; 
}


add_theme_support('post-thumbnails');
add_image_size( 'portada-mini', 130, 150, true );
add_image_size( 'portada-banner', 470, 250, true );
add_image_size( 'nota-banner', 630, 165, true );

?>


