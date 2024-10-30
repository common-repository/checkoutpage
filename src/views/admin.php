<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
  exit;
}
?>

<div id="cp-plugin">
  <div class="cp-header">
    <div class="cp-header__brand">
      <svg width="32" height="32" viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="200" cy="200" r="200" fill="black" />
        <path fill-rule="evenodd" clip-rule="evenodd" d="M287.567 154.425C287.057 146.705 284.398 139.972 278.457 134.733L287.567 154.425ZM136.811 219.05C138.562 228.302 142.957 236.03 149.58 242.541C145.325 234.709 141.068 226.879 136.811 219.05ZM105.185 197.849C100.341 164.78 110.48 126.175 133.17 106.715C155.86 87.2561 177.193 84.2678 201.024 84.0064C228.917 83.6994 252.568 94.4893 272.543 113.006C291.853 130.9 300.233 153.36 295.871 179.894C294.385 188.932 288.839 195.014 281.328 199.552C279.118 200.887 276.483 201.774 274.15 199.886C271.921 198.088 273.84 196.019 274.231 194.044C276.388 183.129 272.118 173.558 267.442 164.282C258.945 147.429 246.558 132.446 230.428 122.931C212.334 112.256 191.523 109.958 175.313 113.202C159.103 116.445 150.673 126.174 142.892 139.147C135.111 152.119 134.175 184.011 143.793 211.849C153.681 240.466 172.501 263.154 198.594 278.566C225.351 294.373 252.137 293.139 276.985 273.567C281.193 270.252 285.658 271.247 289.962 270.437C292.57 269.943 294.181 272.418 294.18 275.593C294.181 282.613 290.624 287.508 285.621 291.903C274.191 301.938 260.691 307.803 246.255 311.786C220.317 318.945 195.188 317.271 171.15 304.541C169.502 303.664 167.883 302.925 166.773 301.078C162.344 298.06 162.431 296.125 158.431 295.284C155.266 294.616 152.469 291.422 149.865 288.969C124.629 265.227 108.689 236.731 105.185 197.849Z" fill="white" />
      </svg>


      <h1 class="cp-header__title">Checkout Page</h1>
    </div>

    <div class="cp-header__action">
      <a href="https://checkoutpage.co" target="_blank" class="cp-button">Go to Checkout Page</a>
    </div>
  </div>

  <div class="cp-content">
    <h1>Custom checkouts that boost your sales</h1>
    <h2>Sell digital downloads, subscriptions, products & services from your posts & pages, no code needed.</h2>

    <div style="margin-bottom: 2rem;">
      New to Checkout Page? <a href="https://checkoutpage.co" target="_blank">Sign up here</a>
    </div>

    <div style="margin-bottom: 2rem;">
      <h3>Adding a checkout embed</h3>
      <div class="steps">
        <div class="step">
          <div class="step__number">1</div>
          <h2>Create a checkout in Checkout Page</h2>
        </div>
        <div class="step">
          <div class="step__number">2</div>
          <h2>Add the "Checkout embed" block to your post or page</h2>
        </div>
        <div class="step">
          <div class="step__number">3</div>
          <h2>Paste your checkout's payment link</h2>
        </div>
      </div>
    </div>

    <?php echo '<img src="' . esc_url(plugins_url('views/admin-screenshot-3.png', dirname(__FILE__))) . '" alt="Checkout Page Checkout Embed block screenshot" style="margin-bottom: 2rem; width: 100%;" > ' ?>
    <?php echo '<img src="' . esc_url(plugins_url('views/admin-screenshot-4.png', dirname(__FILE__))) . '" alt="Checkout Page Checkout Embed block screenshot" style="margin-bottom: 2rem; width: 100%;" > ' ?>

    <hr style="margin-bottom: 2rem;">

    <div style="margin-bottom: 2rem;">
      <h3>Adding a buy button</h3>
      <div class="steps">
        <div class="step">
          <div class="step__number">1</div>
          <h2>Create a checkout in Checkout Page</h2>
        </div>
        <div class="step">
          <div class="step__number">2</div>
          <h2>Add the "Buy Button" block to your post or page & paste your checkout's payment link</h2>
        </div>
        <div class="step">
          <div class="step__number">3</div>
          <h2>Select "Open checkout in pop up" or "Open checkout in new tab" for your Buy Button action</h2>
        </div>
      </div>
    </div>

    <?php echo '<img src="' . esc_url(plugins_url('views/admin-screenshot-1.png', dirname(__FILE__))) . '" alt="Checkout Page Buy Button block screenshot" style="margin-bottom: 2rem; width: 100%;" > ' ?>
    <?php echo '<img src="' . esc_url(plugins_url('views/admin-screenshot-2.png', dirname(__FILE__))) . '" alt="Checkout Page Buy Button block screenshot" style="margin-bottom: 2rem; width: 100%;" > ' ?>

    <hr style="margin-bottom: 2rem;">

    <div style="margin-bottom: 1rem">
      <p>We'd love for you to leave us a quick review.</p>

      <a href="https://wordpress.org/support/view/plugin-reviews/checkoutpage" class="button-primary" target="_blank">Submit a review</a>
    </div>

    <div>
      Need more help, <a href="https://checkoutpage.co/help" target="_blank">check out our help center</a> or email us at <a href="mailto:support@checkoutpage.co" target="_blank">support@checkoutpage.co</a>.
    </div>
  </div>
</div>