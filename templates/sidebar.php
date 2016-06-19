<?php

  $parent_title = get_the_title( $post->post_parent );

  $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&depth=1&child_of=' . $post->ID . '&sort_column=title&echo=0' );

  if ($childpages) : ?>

    <h2><?= __('More About', 'sage'); ?> <span class="current-title"><?= $post->post_title; ?></span></h2>
    <ul class="menu"><?php echo $childpages; ?></ul>
    <?php
  endif;

  $ancestors = get_post_ancestors($post->ID);

  if (count($ancestors) > 1) :

    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&depth=1&child_of=' . $post->post_parent . '&exclude='. $post->ID .'&sort_column=title&echo=0' );

    if ($childpages) : ?>

    <h2><?= __('More About','sage'); ?> <span class="parent-title"><?= $parent_title ?></span></h2>

    <ul class="menu">
    <?php echo $childpages; ?>
    </ul>
    <?php
    endif;
  endif; ?>

  <a href="<?= get_the_permalink($post->post_parent); ?>">Back to <?= $parent_title ?></a>
