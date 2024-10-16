<div class="open-nav-menu">
    <span></span>
</div>
<div class="menu-overlay">

</div>
<!-- navigation menu start -->
<nav class="nav-menu">
    <div class="close-nav-menu">
        <i class="fa-solid fa-xmark"></i>
    </div>

    <?php
    wp_nav_menu(array(
        'theme_location' => 'topmenu',
        'menu_id' => 'topmenu',
        'menu_class' => 'menu',
    ));
    ?>
    <?php
    if (is_active_sidebar('header-section')) {
        dynamic_sidebar('header-seection');
    } ?>

</nav>