<?php use Roots\Sage\Titles; ?>

<div class="page-header">
  <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
    <?php if(function_exists('bcn_display')) bcn_display(); ?>
  </div>
  <h1><?= Titles\title(); ?></h1>
</div>
