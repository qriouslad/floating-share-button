<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://bowo.io
 * @since      1.0.0
 *
 * @package    Floating_Share_Button
 * @subpackage Floating_Share_Button/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Floating_Share_Button
 * @subpackage Floating_Share_Button/admin
 * @author     Bowo <hello@bowo.io>
 */
class Floating_Share_Button_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Floating_Share_Button_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Floating_Share_Button_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/floating-share-button-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Floating_Share_Button_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Floating_Share_Button_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/floating-share-button-admin.js', array( 'jquery' ), $this->version, false );

	}


	/**
	 * Add settings page
	 *
	 * @since 1.0.0
	 */
	public function add_settings_page() {

		if ( class_exists( 'CSF' ) ) {

			// Set a unique slug-like ID

			$prefix = 'floating_share_button';

			// Create options
			
			CSF::createOptions( $prefix, array(
				'menu_title' 		=> 'Floating Share Button',
				'menu_slug' 		=> 'floating-share-button',
				'menu_type'			=> 'submenu',
				'menu_parent'		=> 'options-general.php',
				'menu_position'		=> 100,
				// 'menu_icon'			=> 'dashicons-arrow-up-alt2',
				'framework_title' 	=> 'Floating Share Button <small>by <a href="https://bowo.io" target="_blank">bowo.io</a></small>',
				'framework_class' 	=> 'fsb-options',
				'show_bar_menu' 	=> false,
				'show_search' 		=> false,
				'show_reset_all' 	=> true,
				'show_reset_section' => false,
				'show_form_warning' => false,
				'save_defaults'		=> true,
				'show_footer' 		=> false,
				'footer_credit'		=> 'Floating Share Button is built with the <a href="https://github.com/devinvinson/WordPress-Plugin-Boilerplate/" target="_blank">WordPress Plugin Boilerplate</a>, <a href="https://wppb.me" target="_blank">wppb.me</a> generator, <a href="https://github.com/Codestar/codestar-framework" target="_blank">CodeStar</a> framework and <a href="https://freeicons.io/" target="_blank">freeicons.io</a> icons.',
			) );

			// Create Button Options section
			
			CSF::createSection( $prefix, array(
				'title'		=> 'Options',
				'fields'	=> array(

					// Share Button options
					
					array(
						'id'		=> 'fsb_button',
						'type'		=> 'tabbed',
						'title' 	=> 'Share Button',
						'subtitle' 	=> 'By simply enabling it, the floating share button uses sensible defaults that are good for most websites. You can customize the button\'s appearance and behaviour as needed.',
						'tabs'		=> array(
							array(
								'title' => 'Main',
								'fields' => array(
									array(
										'id' 		=> 'enable',
										'type' 		=> 'switcher',
										'title' 	=> 'Enable?',
										'text_on' 	=> 'Yes',
										'text_off' 	=> 'No',
										'default'	=> false,
										'class'		=> 'fst-enable',
									),
									array(
										'id' 		=> 'position',
										'type' 		=> 'button_set',
										'title' 	=> 'Position',
										'options'	=> array(
											'left'		=> 'Left side',
											'right'		=> 'Right side',
										),
										'default'	=> 'right',
									),
									array(
										'id'		=> 'style',
										'type'      => 'image_select',
										'title'     => 'Style',
										'class'		=> 'icon-style',
										'options'   => array(
											'rounded'	=> plugin_dir_url( __FILE__ ) . 'img/button_style_rounded.png',
											'square'	=> plugin_dir_url( __FILE__ ) . 'img/button_style_square.png',
											'circle'	=> plugin_dir_url( __FILE__ ) . 'img/button_style_circle.png',
										),
										'default'   => 'rounded'
									),
								),
							),
							array(
								'title' => 'Appearance',
								'fields' => array(
									array(
										'id'		=> 'icon',
										'type'      => 'image_select',
										'title'     => 'Icon',
										'class'		=> 'icon-options',
										'options'   => array(
											'share2'	=> plugin_dir_url( __FILE__ ) . 'img/share2.png',
											'share1'	=> plugin_dir_url( __FILE__ ) . 'img/share1.png',
											'share3'	=> plugin_dir_url( __FILE__ ) . 'img/share3.png',
											'share4'	=> plugin_dir_url( __FILE__ ) . 'img/share4.png',
											'share5'	=> plugin_dir_url( __FILE__ ) . 'img/share5.png',
											'share6'	=> plugin_dir_url( __FILE__ ) . 'img/share6.png',
											'share7'	=> plugin_dir_url( __FILE__ ) . 'img/share7.png',
											'share8'	=> plugin_dir_url( __FILE__ ) . 'img/share8.png',
											'share9'	=> plugin_dir_url( __FILE__ ) . 'img/share9.png',
											'share10'	=> plugin_dir_url( __FILE__ ) . 'img/share10.png',
										),
										'default'   => 'share2',
									),
									array(
										'id' 		=> 'size',
										'type' 		=> 'button_set',
										'title' 	=> 'Size',
										'options'	=> array(
											'small'		=> 'Small',
											'medium'	=> 'Medium',
											'large'		=> 'Large',
										),
										'default'	=> 'medium',
									),
									array(
										'id' 		=> 'corner_spacing',
										'type' 		=> 'button_set',
										'title' 	=> 'Corner Spacing',
										'subtitle'	=> 'Distance from bottom and side edges.',
										'options'	=> array(
											'small'		=> 'Small',
											'medium'	=> 'Medium',
											'large'		=> 'Large',
										),
										'default'	=> 'medium',
									),
									array(
										'id' 		=> 'border',
										'type' 		=> 'switcher',
										'title' 	=> 'Border',
										'text_on' 	=> 'Yes',
										'text_off' 	=> 'No',
										'default'	=> false,
									),
									array(
										'id' 		=> 'color_scheme',
										'type' 		=> 'button_set',
										'title' 	=> 'Color Scheme',
										'options'	=> array(
											'dark'		=> 'Dark',
											'light'		=> 'Light',
											'custom'	=> 'Custom',
										),
										'default'	=> 'dark',
									),
									array(
										'id'    		=> 'background_color',
										'type'  		=> 'color',
										'title' 		=> 'Background Color',
										'dependency'	=> array( 'color_scheme', '==', 'custom' ),
										'default'		=> '#000000',
									),
									array(
										'id'    		=> 'icon_color',
										'type'  		=> 'color',
										'title' 		=> 'Icon Color',
										'dependency'	=> array( 'color_scheme', '==', 'custom' ),
										'default'		=> '#ffffff',
									),
									array(
										'id'    		=> 'border_color',
										'type'  		=> 'color',
										'title' 		=> 'Border Color',
										'dependency'	=> array(
											array( 'border', '==', true ),
											array( 'color_scheme', '==', 'custom' ),
										),
										'default'		=> '#ffffff',
									),
								),
							),
							array(
								'title' => 'Behaviour',
								'fields' => array(
									array(
										'id'      	=> 'offset_show',
										'type'    	=> 'text',
										'title'   	=> 'Scroll to Show',
										'subtitle'	=> 'How far down a page it takes to scroll before the button appears.',
										'after'		=> 'In pixels.',
										'default' 	=> '800',
										'validate' => 'csf_validate_numeric',
									),
									array(
										'id'      	=> 'offset_fade',
										'type'    	=> 'text',
										'title'   	=> 'Scroll to Fade',
										'subtitle'	=> 'How far down a page it takes to scroll before the button becomes semi-transparent as defined in the Idle Transparency settings below.',
										'after'		=> 'In pixels. Use 999999 to disable fading.',
										'default' 	=> '1600',
										'validate' => 'csf_validate_numeric',
									),
									array(
										'id'      	=> 'idle_transparency',
										'type'    	=> 'text',
										'title'   	=> 'Idle Transparency',
										'subtitle'	=> 'For when the button is left unclicked when scrolling down a page.',
										'after'		=> 'In %. 100 is fully transparent and 0 prevents fading.',
										'default' 	=> '70',
										'validate' => 'csf_validate_numeric',
									),								
									array(
										'id' 		=> 'show_on_mobile',
										'type' 		=> 'switcher',
										'title' 	=> 'Show on Mobile',
										'subtitle'	=> 'For screen widths below 800 pixels or equivalent.',
										'text_on' 	=> 'Yes',
										'text_off' 	=> 'No',
										'default'	=> true,
									),
									array(
										'id' 		=> 'show_on_desktop',
										'type' 		=> 'switcher',
										'title' 	=> 'Show on Desktop',
										'subtitle'	=> 'For screen widths 800 pixels and above.',
										'text_on' 	=> 'Yes',
										'text_off' 	=> 'No',
										'default'	=> true,
									),
								),
							),
						),
					),

					// Share Destination options

					array(
						'id'		=> 'fsb_destinations',
						'type'		=> 'tabbed',
						'title' 	=> 'Share Destinations',
						'subtitle'	=> 'Customize the sharesheet on desktop devices. When supported by the mobile browser, the native sharesheet from the OS (iOS/Android) will be used.',
						'tabs'		=> array(
							array(
								'title' => 'Desktop Devices',
								'subtitle' 	=> 'Drag and drop destinations to be shown when the share button is clicked.',
								'fields' => array(
									array(
										'id'            => 'categories',
										'title'			=> 'Select Destinations',
										'subtitle'		=> 'The sharesheet will display destinations as they are enabled and ordered here.',
										'type'          => 'accordion',
										'accordions'    => array(
											array(
												'title'     => 'Social Networks',
												// 'icon'      => 'fa fa-heart',
												'fields'    => array(
													array(
														'id'      	=> 'social_networks',
														'type'    	=> 'sorter',
														'default'	=> array(
															'enabled'	=> array(
																'facebook'		=> 'Facebook',
																'twitter'		=> 'Twitter',
																'linkedin'		=> 'LinkedIn',
																'pinterest'		=> 'Pinterest',
															),
															'disabled'	=> array(
																'snapchat'		=> 'Snapchat',
																'vk'			=> 'VK',
																'qzone'			=> 'Qzone',
																'weibo'			=> 'Weibo',
															),
														'enabled_title'		=> 'Enabled',
														'disabled_title'	=> 'Disabled',
														),
													),
												),
											),
											array(
												'title'     => 'Chat Apps',
												// 'icon'      => 'fa fa-heart',
												'fields'    => array(

													array(
														'id'      	=> 'chat_apps',
														'type'    	=> 'sorter',
														'default'	=> array(
															'enabled'	=> array(
																'whatsapp'		=> 'WhatsApp',
																'telegram'		=> 'Telegram',
																'fbmessenger'	=> 'Messenger',
																'slack'			=> 'Slack',
															),
															'disabled'	=> array(
																'skype'			=> 'Skype',
																'line'			=> 'Line',
																'viber'			=> 'Viber',
																'wechat'		=> 'WeChat',
																'qq'			=> 'QQ',
															),
														'enabled_title'		=> 'Enabled',
														'disabled_title'	=> 'Disabled',
														),

													),
												),
											),
											array(
												'title'     => 'Email Providers',
												// 'icon'      => 'fa fa-heart',
												'fields'    => array(

													array(
														'id'      	=> 'email_providers',
														'type'    	=> 'sorter',
														'default'	=> array(
															'enabled'	=> array(
																'gmail'			=> 'Gmail',
																'yahoomail'		=> 'Yahoo Mail',
																'outlook'		=> 'Outlook',
															),
															'disabled'	=> array(
																'mailru'		=> 'Mail.ru',
																'email'			=> 'Email',
															),
														'enabled_title'		=> 'Enabled',
														'disabled_title'	=> 'Disabled',
														),

													),
												),
											),
											array(
												'title'     => 'More',
												// 'icon'      => 'fa fa-heart',
												'fields'    => array(

													array(
														'id'      	=> 'more',
														'type'    	=> 'sorter',
														'default'	=> array(
															'enabled'	=> array(
																'tumblr'		=> 'Tumblr',
																'reddit'		=> 'Reddit',
																'flipboard'		=> 'Flipboard',
															),
															'disabled'	=> array(
																'mix'			=> 'Mix',
																'instapaper' 	=> 'InstaPaper',
																'pocket' 		=> 'Pocket',
																'digg'			=> 'Digg',
																'hackernews' 	=> 'Hacker News',
																'buffer'		=> 'Buffer',
																'hootsuite'		=> 'Hootsuite',
																'printfriendly'	=> 'PrintFriendly',
																'evernote'		=> 'Evernote',
																'trello'		=> 'Trello',
															),
														'enabled_title'		=> 'Enabled',
														'disabled_title'	=> 'Disabled',
														),
													),

												),
											),
										),
									),
									array(
										'id' 		=> 'color_scheme',
										'type' 		=> 'button_set',
										'title' 	=> 'Sharesheet Color Scheme',
										'options'	=> array(
											'dark'		=> 'Dark',
											'light'		=> 'Light',
										),
										'subtitle' 	=> 'Overall appearance of the share destinations modal window.',
										'default'	=> 'dark',
									),

								),
							),
							array(
								'title' => 'Mobile Devices',
								'fields' => array(
									array(
										'type' 		=> 'content',
										'content'	=> '<p>On browsers like Safari for iOS, Chrome for Android, Edge for Android, Opera for Android, Samsung Internet for Android, and Brave for Android, clicking on the share button will open up the native sharesheet from the operating system (iOS / Android), as these browsers support the <a href="https://web.dev/web-share/" target="_blank">Web Share API</a>.</p>
											<p>On mobile browsers that do not support the Web Share API, the sharesheet defined for desktop devices will be shown instead.</p>
											<div class="fsb-sharesheet">
											<img src="'.plugin_dir_url( __FILE__ ) . 'img/sharesheet_ios_720px.jpg" />
											<img src="'.plugin_dir_url( __FILE__ ) . 'img/sharesheet_android_720px.jpg" />
											</div>',
									),
								),
							),
						),
					),

				),
			) );

		}

	}

	/**
	 * Add 'settings' action link in plugins page
	 *
	 * @since 1.0.0
	 */
	public function add_settings_link( $links ) {

		$settings_link = '<a href="options-general.php?page='.$this->plugin_name.'">Settings</a>';

		array_unshift($links, $settings_link); 

		return $links; 

	}

}
