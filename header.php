<?php 

// the header of the child theme, it will be used instead of the parent theme header.php file, so we can add our custom menu here  
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
      <meta charset="<?php bloginfo('charset'); ?>">    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <meta name='formats' content='standard, aside, gallery, link, image, quote, status, video, audio, chat' />
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <?php wp_head(); ?>
</head>
                         
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <header class="site-header">
  <div class="container header-inner">
    <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
      <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/naillab.jpg'); ?>" alt="Logo">
    </a>

     <nav class="main-menu">
    <?php
    wp_nav_menu([
      'theme_location' => 'header_menu',
      'container' => false,
      'menu_id' => 'header-menu',
      'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'fallback_cb' => false,
    ]);
    ?>
  </nav>

    <div class="header-actions">
      <a class="header-link icon-link" href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>">
      <svg class="icon icon-user" width="20" height="20" aria-hidden="true">
      <use href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/symbol-defs.svg#icon-user'); ?>"></use>
      </svg>
      <span class="link-text">Účet</span>
      </a>

      <a class="header-link icon-link" href="<?php echo esc_url(wc_get_cart_url()); ?>">
      <svg class="icon" width="20" height="20" aria-hidden="true">
      <use href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/symbol-defs.svg#icon-shopping-bag'); ?>"></use>
      </svg>
      <span class="link-text">Košík</span>
      </a>


      <button class="burger" type="button" aria-expanded="false" aria-controls="mobile-menu">
       <svg class="burger-icon" width="24" height="24" aria-hidden="true">
       <use href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/symbol-defs.svg#icon-burger-btn-white'); ?>"></use>
       </svg>
      </button>
    </div>
  </div>


  <div id="mobile-menu" class="mobile-menu" aria-hidden="true">
  <div class="mobile-menu__content">
    <button class="mobile-menu__close" type="button" aria-label="Zavřít menu">
    <svg class="close-icon" width="24" height="24" aria-hidden="true">
    <use href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/symbol-defs.svg#icon-cross-small'); ?>"></use>
    </svg>
    </button>

    <?php
    wp_nav_menu([
      'theme_location' => 'header_menu',
      'container' => false,
      'menu_id' => 'mobile-menu-list',
      'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
      
    ]);
    ?>
  </div>
</div>
<!-- SEARCH -->
<div class="header-search">
  <div class="container">
    <?php get_product_search_form(); ?>
  </div>
</div>

<!-- FILTER -->
<nav class="catalog-menu">
  <div class="container">
    <?php
    wp_nav_menu([
      'theme_location' => 'catalog_menu',
      'container' => false,
      'menu_id' => 'catalog-menu',
      'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
      'fallback_cb' => false,
    ]);
    ?>
  </div>
</nav>


 
</header>
       
    