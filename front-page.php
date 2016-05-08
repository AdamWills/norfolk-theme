<?php use Roots\Sage\Extras; ?>
<div class="main">
	<div class="container-fluid container-search">
    <div class="site-search">
      <div class="home-search">
            <gcse:searchbox-only enableAutoComplete="true" resultsUrl="http://www.norfolkcounty.ca/" queryParameterName="s"></gcse:searchbox-only>
	  	</div>
  	</div>
  </div>

  <div class="container-quick-links">
    <div class="content">
      <h2>Popular Information</h2>
      <?php
      if (has_nav_menu('popular_info')) :
        wp_nav_menu(['theme_location' => 'popular_info', 'menu_class' => 'quick-links', 'container' => '']);
      endif;
      ?>
      </div>
  </div>

  <div class="news-ticker">
    <div class="news-ticker__feed"><div class="news-ticker__title">Latest News:</div><div class="ticker"><ul><?php Extras\show_notices(); ?></ul></div></div>
    <div class="news-ticker__controls">
      <button class="news-ticker__prev" aria-live="assertive" aria-label="Previous News Item">
        <svg width="18" height="18" viewBox="0 0 8 8" ><use xlink:href="#backward-icon" /></svg>
      </button>
      <button class="news-ticker__pause" aria-live="assertive" aria-label="Pause">
        <svg width="18" height="18" viewBox="0 0 8 8" ><use id="play-icon-selector" xlink:href="#pause-icon" /></svg>
      </button>
      <button class="news-ticker__next" aria-live="assertive" aria-label="Next News Item">
        <svg width="18" height="18" viewBox="0 0 8 8" ><use xlink:href="#forward-icon" /></svg>
      </button>
    </div>
  </div>
</div>

<svg>
  <defs>
      <path id="pause-icon" fill="#fff" d="M0 0v6h2v-6h-2zm4 0v6h2v-6h-2z" transform="translate(1 1)" />
      <path id="play-icon" fill="#fff" d="M0 0v6l6-3-6-3z" transform="translate(1 1)" />
      <path id="backward-icon" fill="#fff" d="M4 0l-4 3 4 3v-6zm0 3l4 3v-6l-4 3z" transform="translate(0 1)" />
      <path id="forward-icon" fill="#fff" d="M0 0v6l4-3-4-3zm4 3v3l4-3-4-3v3z" transform="translate(0 1)" />
  </defs>
</svg>
