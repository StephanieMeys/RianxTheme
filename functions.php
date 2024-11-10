<?php
/**
 * Theme functions.
 * 
 * @package rianxtheme
 */

//! 
if ( !defined('RIANX_DIR_PATH') ) {
    define( 'RIANX_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'RIANX_DIR_URI' ) ){
    define( 'RIANX_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}
require_once RIANX_DIR_PATH . '/inc/helpers/autoloader.php';
require_once RIANX_DIR_PATH . '/inc/helpers/template-tags.php';

function rianx_get_theme_instance() {
    RIANX_THEME\Inc\RIANX_THEME::get_instance();
}
rianx_get_theme_instance();

//! Enqueue
function rianxtheme_enqueue_scripts() {
    
}
add_action( 'wp_enqueue_scripts', 'rianxtheme_enqueue_scripts');







 
//! DASHBOARD
function remove_dashboard_widgets() {
    global $wp_meta_boxes;
    $wp_meta_boxes['dashboard']['side']['core'] = array();
    $wp_meta_boxes['dashboard']['normal']['core'] = array();
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');


function add_full_width_custom_dashboard_widget() {
	$current_user = wp_get_current_user();
	if ( get_current_screen()->base !== 'dashboard' ) {
		return;
	}


	?>

	<div id="custom-id" class="welcome-panel">
		<div class="welcome-panel-content">
			<h2 style=" text-align:center; margin-top: 30px;">Hey <?php echo esc_html($current_user->display_name); ?>, welkom op jouw</h2>
			<h2 style=" text-align:center;">Dashboard</h2>
			<p style="text-align:center; margin-top: 30px;" class="about-description">
			We zijn hier om je te helpen jouw site te optimaliseren. <br>
			Klik op de links hieronder voor tips en handleidingen over het gebruik van dit dashboard.
			</p>

			<div class="theme-switch">
				<div class="switch"></div>
			</div>

			
			<div class="welcome-panel-column-container">
				<div class="welcome-panel-column">
					<a href="<?php echo esc_url(home_url('/')); ?>" target="blanc">
						<div class="card">
							<div class="card-body">
							<h3 style="margin-bottom: 20px;">Bekijk jouw website</h3>
							<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
								<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
								<g id="SVGRepo_iconCarrier"> 
									<path d="M13 11L21.2 2.80005" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> 
									<path d="M22 6.8V2H17.2" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> 
									<path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> 
								</g>
							</svg>
							</div>
						</div>
					</a>
					<?php
					admin_url( 'post-new.php' )
					?>
					<a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>">
						<div class="card">
							<div class="card-body">
							<h3 style="margin-bottom: 20px;">Snel een nieuw bericht aanmaken</h3>
							<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
								<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
								<g id="SVGRepo_iconCarrier"> 
									<path d="M13 11L21.2 2.80005" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> 
									<path d="M22 6.8V2H17.2" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> 
									<path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> 
								</g>
							</svg>
							</div>
						</div>
					</a>
				</div>
			
			</div>
		</div>
	</div>
	<script>
		jQuery(document).ready(function($) {
			$('#welcome-panel').after($('#custom-id').show());
		});
	</script>

	<script>
		
        jQuery(document).ready(function($) {
            $('.theme-switch').click(function() {
                $('body').toggleClass('dark-mode'); 
            });

            var mode = localStorage.getItem('dashboard-mode');
            if (mode === 'dark') {
                $('body').addClass('dark-mode');
            }
        });
    </script>

<?php 
} 
add_action( 'admin_footer', 'add_full_width_custom_dashboard_widget' );


function custom_admin_footer() {
    echo 'Gemaakt met liefde 💗';
}
add_filter('admin_footer_text', 'custom_admin_footer');

function custom_admin_css() {
    echo '<style>
		:root {
			--light_bg: #EFF9F0;
			--light_primary: #DDC8C4;
			--light_secondary: #6B4D57;
			--light_text: #13070C;
			--text: #333;
		}
        body {
			background-color: #f1f1f1;
		}
		a {
			text-decoration: none;
		}
		.dark-mode body {
			background-color: #133C55;
		}
        h1 {
			color: #6B4D57;
		}
		h2 {
			color: var(--light_text);
		}
		.dark-mode h2,
		.dark-mode p {
			color: white;
		}
		#dashboard-widgets-wrap {
			display:none;
		}
		.welcome-panel {
			overflow: hidden;
			max-height: calc(90vh - 58px);
			border-radius: 20px;
			background-image: url(/wp-content/uploads/2024/07/header_bg.png);
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center;
			padding: 0 20px 20px 20px;
		}
		.dark-mode .welcome-panel {
			background-image: url(/wp-content/uploads/2024/07/Ontwerp-zonder-titel.png);
		}
		body {
			overflow-x: hidden;
		}
		.dark-mode .wrap::before {
			content: "";
			background-image: url(/wp-content/uploads/2024/07/Ontwerp_zonder_titel__1_-removebg-preview.png);
			position: absolute;
			width: 60%;
			height: 360px;
			top: calc(100vh - 250px);
			right: -130px;
			background-position: center;
			/* aspect-ratio: 333 / 187; */
			background-repeat: no-repeat;
			background-size: contain;
			z-index: 10;
		}
		.welcome-panel-column-container {
			background: transparent !important;
			padding: 0 !important;
		}
		.card {
			border-radius: 20px;
		}
		.theme-switch {
			position:absolute; 
			top: 20px;
			right: 20px;
			color: var(--light_text);
			width: 70px;
			height: 30px;
			background: var(--light_bg);
			border-radius: 50px;
		}
		.theme-switch .switch {
			background: white;
			width: 24px;
			height: 24px;
			background: var(--light_secondary);
			border-radius: 100%;
			position: absolute;
			top: 3px;
			left: 4px;
			transition: 0.5s all ease;
		}
		.dark-mode .theme-switch {
			background: var(--text);
		}
		.dark-mode .theme-switch .switch {
			transform: translateX(37px);
		}
    </style>';
}
add_action('admin_head', 'custom_admin_css');



function custom_menu_design_customizer($wp_customize) {
    // Voeg een nieuwe sectie toe voor de menustijlen
    $wp_customize->add_section('menu_design_section', array(
        'title' => __('Menu Design', 'theme_textdomain'),
        'description' => __('Select the design for the menu', 'theme_textdomain'),
        'priority' => 30,
    ));

    // Voeg een instelling toe voor het ontwerp van het menu
    $wp_customize->add_setting('menu_design_setting', array(
        'default' => 'default',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Voeg de keuze-optie toe voor verschillende menuontwerpen
    $wp_customize->add_control('menu_design_control', array(
        'label' => __('Menu Design', 'theme_textdomain'),
        'section' => 'menu_design_section',
        'settings' => 'menu_design_setting',
        'type' => 'radio',
        'choices' => array(
            'default' => __('Default', 'theme_textdomain'),
            'underline' => __('Underline', 'theme_textdomain'),
            'line_under_navbar' => __('Line Under Navbar', 'theme_textdomain'),
        ),
    ));
}

add_action('customize_register', 'custom_menu_design_customizer');
