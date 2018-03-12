<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.plugdigital.net/manuel-padilla
 * @since      1.0.0
 *
 * @package    mp_portfolio
 * @subpackage mp_portfolio/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    mp_portfolio
 * @subpackage mp_portfolio/admin
 * @author     Manuel Padilla <manuel@plugdigital.net>
 */
class mp_portfolio_Admin {

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
		$this->version     = $version;

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
		 * defined in mp_portfolio_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The mp_portfolio_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mp_portfolio-admin.css', array(), $this->version, 'all' );

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
		 * defined in mp_portfolio_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The mp_portfolio_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mp_portfolio-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function mp_portfolio_custom_post_type() {
		$labels = array(
			'name'               => __( 'Portfolio', 'mp_portfolio' ),
			'singular_name'      => __( 'Portfolio item', 'mp_portfolio' ),
			'menu_name'          => __( 'Portfolio', 'mp_portfolio' ),
			'name_admin_bar'     => _x( 'Portfolio item', 'add new on admin bar', 'mp_portfolio' ),
			'add_new'            => _x( 'Add new', 'portfolio', 'mp_portfolio' ),
			'add_new_item'       => __( 'Add new portfolio item', 'mp_portfolio' ),
			'new_item'           => __( 'New portfolio item', 'mp_portfolio' ),
			'edit_item'          => __( 'Edit portfolio item', 'mp_portfolio' ),
			'view_item'          => __( 'View portfolio item', 'mp_portfolio' ),
			'all_items'          => __( 'All portfolio items', 'mp_portfolio' ),
			'search_items'       => __( 'Search portfolio items', 'mp_portfolio' ),
			'parent_item_colon'  => __( 'Parent portfolio items:', 'mp_portfolio' ),
			'not_found'          => __( 'No portfolio items found.', 'mp_portfolio' ),
			'not_found_in_trash' => __( 'No portfolio items found in Trash.', 'mp_portfolio' )
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'MP Portfolio plugin.', 'mp_portfolio' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'portfolio' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		);

		register_post_type( 'portfolio', $args );
	}

	public function mp_portfolio_register_taxonomies() {
		$portfolio_category_labels = array(
			'name'              => __( 'Categories', 'mp_portfolio' ),
			'singular_name'     => __( 'Portfolio category', 'mp_portfolio' ),
			'search_items'      => __( 'Search categories', 'mp_portfolio' ),
			'all_items'         => __( 'All portfolio categories', 'mp_portfolio' ),
			'parent_item'       => __( 'Parent category', 'mp_portfolio' ),
			'parent_item_colon' => __( 'Parent category:', 'mp_portfolio' ),
			'edit_item'         => __( 'Edit category', 'mp_portfolio' ),
			'update_item'       => __( 'Update category', 'mp_portfolio' ),
			'add_new_item'      => __( 'Add new category', 'mp_portfolio' ),
			'new_item_name'     => __( 'New category name', 'mp_portfolio' ),
			'menu_name'         => __( 'Categories', 'mp_portfolio' ),
		);

		$portfolio_category_args = array(
			'hierarchical'      => true,
			'labels'            => $portfolio_category_labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'category' ),
		);

		register_taxonomy( 'portfolio_category', array( 'portfolio' ), $portfolio_category_args );

		$portfolio_skill_labels = array(
			'name'              => __( 'Skills', 'mp_portfolio' ),
			'singular_name'     => __( 'Portfolio skill', 'mp_portfolio' ),
			'search_items'      => __( 'Search skills', 'mp_portfolio' ),
			'all_items'         => __( 'All portfolio skills', 'mp_portfolio' ),
			'parent_item'       => __( 'Parent skill', 'mp_portfolio' ),
			'parent_item_colon' => __( 'Parent skill:', 'mp_portfolio' ),
			'edit_item'         => __( 'Edit skill', 'mp_portfolio' ),
			'update_item'       => __( 'Update skill', 'mp_portfolio' ),
			'add_new_item'      => __( 'Add new skill', 'mp_portfolio' ),
			'new_item_name'     => __( 'New skill name', 'mp_portfolio' ),
			'menu_name'         => __( 'Skills', 'mp_portfolio' ),
		);

		$portfolio_skill_args = array(
			'hierarchical'      => true,
			'labels'            => $portfolio_skill_labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'skill' ),
		);

		register_taxonomy( 'portfolio_skill', array( 'portfolio' ), $portfolio_skill_args );
	}

	public function mp_portfolio_meta_box() {
		// remove_meta_box( 'postimagediv', 'portfolio', 'side' );

		add_meta_box( 'portfolio_gallery', __('Gallery', 'mp_portfolio'), array( $this, 'mp_portfolio_gallery_callback'), 'portfolio', 'advanced', 'default' );
		add_meta_box( 'portfolio_client', __('Client', 'mp_portfolio'), array( $this, 'mp_portfolio_client_callback'), 'portfolio', 'side', 'default' );
	}

	public function mp_portfolio_gallery_callback() {
		echo "hola";
	}

	public function mp_portfolio_client_callback( $post ) {
		// Add nonce for security and authentication.
		wp_nonce_field( 'mp_portfolio_client_nonce_action', 'mp_portfolio_client_nonce' );

		// Use get_post_meta to retrieve an existing value from the database.
        $portfolio_item_client = get_post_meta( $post->ID, 'portfolio_item_client', true );
		?>
		<input type="text" name="portfolio_item_client" id="portfolio_item_client" value="<?php echo $portfolio_item_client; ?>">
		<?php
	}

	public function mp_portfolio_save_post( $post_id ) {
		// Add nonce for security and authentication.
		$nonce_name   = isset( $_POST['mp_portfolio_client_nonce'] ) ? $_POST['mp_portfolio_client_nonce'] : '';
		$nonce_action = 'mp_portfolio_client_nonce_action';

		// Get values
		$portfolio_item_client = isset( $_POST['portfolio_item_client'] ) ? $_POST['portfolio_item_client'] : '';

		// Check if nonce is set.
        if ( ! isset( $nonce_name ) ) {
            echo "not set";
        }

		// Check if nonce is valid.
        if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) ) {
            return;
        }

		// Check if user has permissions to save data.
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        // Check if not an autosave.
        if ( wp_is_post_autosave( $post_id ) ) {
            return;
        }
 
        // Check if not a revision.
        if ( wp_is_post_revision( $post_id ) ) {
            return;
        }

        // Save data
        update_post_meta( $post_id, 'portfolio_item_client', $portfolio_item_client );
	}

}
