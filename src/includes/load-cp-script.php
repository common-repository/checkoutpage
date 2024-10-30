<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Load the Checkout Page popup script
 */
function load_cp_script()
{
	wp_enqueue_script('checkoutpage-wp' . '-embed-script', 'https://checkoutpage.co/js/overlay.js', array(), null, true);
}
