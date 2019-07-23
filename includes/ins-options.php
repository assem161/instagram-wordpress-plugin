<?php 
// add menu to admin menu
// create custom plugin settings menu
add_action('admin_menu', 'instagrame_apss');

function instagrame_apss() {

	//create new top-level menu
	add_menu_page('message options add', 'instagrame gallary', 'administrator', __FILE__, 'inst_app_options' , 'dashicons-instagram' );

	//call register settings function
	add_action( 'admin_init', 'ins_app_settings' );
}


function ins_app_settings() {
	//register our settings
    register_setting( 'ins-group-options', 'client-id' );
    register_setting( 'ins-group-options', 'redirect_url' );
    register_setting( 'ins-group-options', 'access_token' );
    register_setting( 'ins-group-options', 'linked_photo' );
}


function inst_app_options() {
?>
<div class="wrap">
<h2><?php _e('instagrame api insofrmation','ins-domin'); ?></h2>
<h3><?php _e('short code : [insphoto]','ins-domin'); ?></h3>

<?php $redirect_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
?>

<form method="post" action="options.php">
    <table class="form-table">
        <?php settings_fields( 'ins-group-options' ); ?>
        <?php do_settings_sections( 'ins-group-options' ); ?>
        <tr valign="top">
        <th scope="row"><?php _e('redirect url','ins-domin'); ?></th>
        <td><input type="text" name="redirect_url" value="<?php echo $redirect_url;?>" disabled /></td>
        </tr>                               
        <tr valign="top">
        <th scope="row"><?php _e('cleint id','ins-domin'); ?></th>
        <td><input type="text" name="client-id" value="<?php echo esc_attr( get_option('client-id') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row"><?php _e('Authanication','ins-domin'); ?></th>
        <td>
        <a class="button button-block" target="_blank" href="https://api.instagram.com/oauth/authorize/?client_id=<?php echo esc_attr( get_option('client-id') ); ?>&redirect_uri=<?php echo esc_attr( $redirect_url ); ?>&response_type=code">Authanicate</a>
        </td>
        </tr>
        <tr valign="top">
        <th scope="row"><?php _e('access token','ins-domin'); ?></th>
        <td><input type="text" name="access_token" value="<?php echo esc_attr( get_option('access_token') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row"><?php _e('apeare instagrame photos','ins-domin'); ?></th>
        <td><input type="checkbox" name="linked_photo" value="1" <?php checked(1,esc_attr(get_option('linked_photo'))); ?>/></td>
        </tr>                                         
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>

