<?php

namespace checkoutpage;

/**
 * Plugin Name: Checkout Page
 * Plugin URI: https://checkoutpage.co
 * Description: Custom checkouts that boost your sales. Sell digital downloads, subscriptions, products & services on your WordPress sites. Easily add custom checkouts & lead capture forms to your posts & pages. No code needed.
 * Requires at least: 5.8
 * Requires PHP: 7.0
 * Version: 1.1.0
 * Author: Checkout Page
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: checkoutpage
 */

if (!defined('ABSPATH')) {
  exit;
}

if (!defined('CHECKOUTPAGE_MAIN_FILE')) {
  define('CHECKOUTPAGE_MAIN_FILE', __FILE__);
}

class CheckoutPage
{
  protected $version = '1.1.0';
  protected $plugin_slug = 'checkoutpage';
  protected $plugin_screen_hook_suffix = null;
  protected static $instance = null;

  private function __construct()
  {
    // init constants
    add_action('init', array($this, 'setup_constants'));

    // Add admin menu
    add_action('admin_menu', array($this, 'add_plugin_admin_menu'));
    add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_styles'));

    // Add plugin listing "Settings" action link.
    add_filter('plugin_action_links_' . plugin_basename(plugin_dir_path(__FILE__) . $this->plugin_slug . '.php'), array($this, 'settings_link'));

    // Init includes
    add_action('init', array($this, 'includes'));

    // Register blocks
    add_action('init', array($this, 'register_block_types'));

    // Register block category
    add_filter('block_categories_all', array($this, 'add_block_categories'));
  }

  /**
   * Set up constants
   *
   * @since   1.0.0
   */
  public function setup_constants()
  {
    define('CHECKOUTPAGE_PATH', plugin_dir_path(__FILE__));
    define('CHECKOUTPAGE_URL', untrailingslashit(plugin_dir_url(__FILE__)));
    define('CHECKOUTPAGE_SLUG', $this->plugin_slug);
  }

  /**
   * Return class instance
   *
   * @since   1.0.0
   * @return  object   An instance of this class
   */
  public static function get_instance()
  {

    // If the single instance hasn't been set, set it now.
    if (null == self::$instance) {
      self::$instance = new self;
    }

    return self::$instance;
  }

  public function settings_link($links)
  {
    $setting_link = sprintf('<a href="%s">%s</a>', esc_url(add_query_arg('page', $this->plugin_slug, admin_url('options-general.php'))), esc_html('Settings', 'checkoutpage'));
    array_unshift($links, $setting_link);

    return $links;
  }

  /**
   * Register admin menu
   *
   * @since   1.0.0
   */
  public function add_plugin_admin_menu()
  {
    $this->plugin_screen_hook_suffix = add_options_page(
      'Checkout Page',
      'Checkout Page',
      'manage_options',
      $this->plugin_slug,
      array($this, 'display_plugin_admin_page'),
    );

    //wp_register_script('checkoutpage-admin-script', CHECKOUTPAGE_URL . '/src/views/admin.js', array('wp-api', 'wp-i18n', 'wp-components', 'wp-element'), '1.0', true);
  }

  public function enqueue_admin_styles()
  {
    if ($this->viewing_this_plugin()) {
      wp_enqueue_style('checkoutpage-admin-style', CHECKOUTPAGE_URL . '/src/views/admin.css');
    }
  }

  /**
   * Render settings page
   *
   * @since    1.0.0
   */
  public function display_plugin_admin_page()
  {
    include_once('src/views/admin.php');
  }

  /**
   * Includes
   *
   * @since   1.0.0
   */
  public function includes()
  {
    include_once('src/includes/load-cp-script.php');
    include_once('src/includes/render-checkout-button.php');
    include_once('src/includes/render-checkout-embed.php');
  }

  /**
   * Registers the block using the metadata loaded from the `block.json` file.
   * Behind the scenes, it registers also all assets so they can be enqueued
   * through the block editor in the corresponding context.
   *
   * @see https://developer.wordpress.org/reference/functions/register_block_type/
   */

  public function register_block_types()
  {
    register_block_type(__DIR__ . '/build/blocks/button');
    register_block_type(__DIR__ . '/build/blocks/cp-button');
    register_block_type(__DIR__ . '/build/blocks/embed');
  }

  /**
   * Register block category.
   *
   * @since 1.0.0
   * @param array  $categories List of block categories.
   * @return array
   */
  public function add_block_categories($categories)
  {
    return array_merge(
      $categories,
      array(
        array(
          'slug'  => $this->plugin_slug,
          'title' => __('Checkout Page', 'checkoutpage'),
        ),
      )
    );
  }

  /**
   * Return plugin title.
   *
   * @since     1.0.0
   * @return    string
   */
  public static function get_plugin_title()
  {
    return esc_html('Checkout Page', 'checkoutpage');
  }

  public static function is_admin()
  {
    global $current_screen;

    if (!$current_screen) {
      return false;
    }

    return 'toplevel_page_checkoutpage' === $current_screen->id;
  }

  /**
   * Check if viewing admin page
   *
   * @since   1.0.0
   * @return  bool
   */
  private function viewing_this_plugin()
  {
    if (!isset($this->plugin_screen_hook_suffix))
      return false;

    $screen = get_current_screen();

    if ($screen->id == $this->plugin_screen_hook_suffix)
      return true;
    else
      return false;
  }
}

CheckoutPage::get_instance();
