<header class="banner">
    <div class="logo">
      <a  href="<?= esc_url(home_url('/')); ?>"><?php get_template_part( 'dist/images/logo.svg' ); ?></a>
    </div>
    <button type="button" class="btn-mobile-nav-toggle btn-link">Menu</button>
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'banner__nav', 'container' => '', 'walker' => new Norfolk_Nav_Walker()]);
      endif;
      ?>
</header>
