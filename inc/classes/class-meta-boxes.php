<?php 
/**
 * Register Meta Boxes
 * 
 * @package rianxtheme
 */

 namespace RIANX_THEME\Inc;
 use RIANX_THEME\Inc\Traits\Singleton;

 class Meta_Boxes {
    use Singleton;

    protected function __construct() {
        // load class.
        $this -> setup_hooks();
    }

    protected function setup_hooks() {
        
        /**
         * Actions.
         */
        add_action( 'add_meta_boxes', [ $this, 'add_custom_meta_box' ] );
    }

    public function add_custom_meta_box() {
        $screens = ['post'];
        foreach ($screens as $screen) {
            add_meta_box (
                'hide-page-title',     
                __( 'Hide page title', 'rianxtheme' ),
                [ $this, 'custom_meta_box_html' ],
                $screen,
                'side'
            );
        }
    }

    public function custom_meta_box_html( $post ) {
        $value = get_post_meta( $post->ID, '_hide_page_title', true );

		wp_nonce_field( plugin_basename(__FILE__), 'hide_title_meta_box_nonce_name' );

		?>
		<label for="rianx-field"><?php esc_html_e( 'Hide the page title', 'rianxtheme' ); ?></label>
		<select name="rianx_hide_title_field" id="rianx-field" class="postbox">
			<option value=""><?php esc_html_e( 'Select', 'rianxtheme' ); ?></option>
			<option value="yes" <?php selected( $value, 'yes' ); ?>>
				<?php esc_html_e( 'Yes', 'rianxtheme' ); ?>
			</option>
			<option value="no" <?php selected( $value, 'no' ); ?>>
				<?php esc_html_e( 'No', 'rianxtheme' ); ?>
			</option>
		</select>
		<?php
    }

 }