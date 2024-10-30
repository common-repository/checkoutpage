<?php

/**
 * Render buy button
 *
 * @param  string $block_content block content
 * @param  array  $block         block
 * @return string
 */
function render_checkout_button($block_content = '', $block = array())
{
  if (isset($block['blockName']) && 'core/button' === $block['blockName']) {
    $args = wp_parse_args($block['attrs']);

    if (empty($args['checkoutUrl'])) {
      return $block_content;
    }

    $purchase_link = $args['checkoutUrl'];
    $classes = 'wp-block-button__link';

    // If overlay is activated we have to include the script and add parameter to URL.
    if (!empty($args['behavior']) && 'popup' === $args['behavior'] && !empty($args['checkoutUrl'])) {
      load_cp_script();

      $classes .= ' cp-button';

      $block_content = str_replace(
        '<a class="wp-block-button__link">',
        '<a class="' . $classes . '" href="' . $purchase_link . '">',
        $block_content
      );
    } else {
      $block_content = str_replace(
        '<a class="wp-block-button__link">',
        '<a class="' . $classes . '" href="' . $purchase_link . '" target="_blank">',
        $block_content
      );
    }
  }

  if (isset($block['blockName']) && 'checkoutpage/cp-button' === $block['blockName']) {
    $args = wp_parse_args($block['attrs']);

    if (!empty($args['checkoutUrl']) && !empty($args['behavior']) && 'popup' === $args['behavior']) {
      load_cp_script();
    }
  }

  return $block_content;
}

add_filter('render_block', 'render_checkout_button', 10, 2);
