<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'santella_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 *  <snip />
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
 // Include the TGM_Plugin_Activation class
 function santella_register_required_plugins() {
     $plugins = array(
         array(
           'name'                    => 'One Click Demo Import',
           'slug'                    => 'one-click-demo-import',
           'source'                  => 'https://wordpress.org/plugins/one-click-demo-import',
           'required'                => true,
           'force_activation'        => false,
           'force_deactivation'      => false,
           'external_url'            => ''
         ),
         array(
             'name'                    => 'Instagram Feed',
             'slug'                    => 'instagram-feed',
             'source'                  => 'https://wordpress.org/plugins/instagram-feed/',
             'required'                => true,
             'force_activation'        => false,
             'force_deactivation'      => false,
             'external_url'            => ''
         ),
         array(
             'name'                    => 'Genesis eNews Extended',
             'slug'                    => 'genesis-enews-extended',
             'source'                  => 'https://wordpress.org/plugins/genesis-enews-extended/',
             'required'                => true,
             'force_activation'        => false,
             'force_deactivation'      => false,
             'external_url'            => ''
         ),
         array(
             'name'                  => 'Smush',
             'slug'                    => 'wp-smushit',
             'source'                  => 'https://wordpress.org/plugins/wp-smushit',
             'required'                => false,
             'force_activation'        => false,
             'force_deactivation'      => false,
             'external_url'            => ''
         ),
         array(
             'name'                    => 'WordPress Popular Posts',
             'slug'                    => 'wordpress-popular-posts',
             'source'                  => 'https://wordpress.org/plugins/wordpress-popular-posts/',
             'required'                => true,
             'force_activation'        => false,
             'force_deactivation'      => false,
             'external_url'            => ''
         ),
         array(
             'name'                    => 'Regenerate Thumbnails',
             'slug'                    => 'regenerate-thumbnails',
             'source'                  => 'https://wordpress.org/plugins/regenerate-thumbnails/',
             'required'                => true,
             'force_activation'        => false,
             'force_deactivation'      => false,
             'external_url'            => ''
         ),
         array(
             'name'                    => 'Contact Form 7',
             'slug'                    => 'contact-form-7',
             'source'                  => 'https://wordpress.org/plugins/contact-form-7/',
             'required'                => true,
             'force_activation'        => false,
             'force_deactivation'      => false,
             'external_url'            => ''
         ),
         array(
             'name'                    => 'Easy Google Fonts',
             'slug'                    => 'easy-google-fonts',
             'source'                  => 'https://wordpress.org/plugins/easy-google-fonts/',
             'required'                => true,
             'force_activation'        => false,
             'force_deactivation'      => false,
             'external_url'            => ''
         ),
		 array(
             'name'                    => 'Ultimate FAQ',
             'slug'                    => 'ultimate-faqs',
             'source'                  => 'https://wordpress.org/plugins/ultimate-faqs/',
             'required'                => false,
             'force_activation'        => false,
             'force_deactivation'      => false,
             'external_url'            => ''
         ),
		 array(
             'name'                    => 'WooCommerce',
             'slug'                    => 'woocommerce',
             'source'                  => 'https://wordpress.org/plugins/woocommerce/',
             'required'                => false,
             'force_activation'        => false,
             'force_deactivation'      => false,
             'external_url'            => ''
         ),
     );

     $config = array(
         'id'           => 'tgmpa2-santella',        // Unique ID for hashing notices for multiple instances of TGMPA.
         'default_path' => '',                      // Default absolute path to bundled plugins.
         'menu'         => 'tgmpa-install-plugins', // Menu slug.
         'parent_slug'  => 'themes.php',            // Parent menu slug.
         'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
         'has_notices'  => true,                    // Show admin notices or not.
         'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
         'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
         'is_automatic' => true,                    // Automatically activate plugins after installation or not.
         'message'      => '',                      // Message to out
     );
     tgmpa_santella($plugins, $config);
 }
