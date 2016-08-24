<?php if (Roots\Sage\A11y\is_high_contrast_mode()) : ?>
  <div class="a11y-toggle">
    <p><?php _e('High Contrast Mode is on.', 'sage'); ?></p>
    <p><a href="?ss=default" class="btn btn-primary"><?php _e('Turn off High Contrast Mode', 'sage'); ?></a></p>
  </div>
<?php endif; ?>

<div class="search">
  <gcse:searchbox-only enableAutoComplete="true" resultsUrl="<?= esc_url( home_url( '/' ) ); ?>" queryParameterName="s"></gcse:searchbox-only>
</div>

<div class="related-pages">
<?php
  // get and display child pages
  if ($post):
    $childPages = wp_list_pages( 'sort_column=menu_order&title_li=&depth=1&child_of=' . $post->ID . '&sort_column=title&echo=0' );

    if ($childPages) : ?>
      <h2><?= __('More About', 'sage'); ?> <span class="page-title"><?= $post->post_title; ?></span></h2>
      <ul class="menu"><?php echo $childPages; ?></ul><?php
    endif;

    $ancestors = get_post_ancestors($post->ID);
    $parent_title = get_the_title( $post->post_parent );

    if (count($ancestors) > 0) :
      $siblingPages = wp_list_pages( 'sort_column=menu_order&title_li=&depth=1&child_of=' . $post->post_parent . '&exclude='. $post->ID .'&sort_column=title&echo=0' );
      if ($siblingPages) : ?>
        <h2><?= __('More About','sage'); ?> <span class="page-title"><?= $parent_title ?></span></h2>
        <ul class="menu"><?php echo $siblingPages; ?></ul><?php
      endif;
    endif;
endif; ?>
</div>
