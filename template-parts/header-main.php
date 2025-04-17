<header id="header-main" class="header-main w-full z-50 overflow-hidden" itemscope itemtype="http://schema.org/WebSite">
    <div class="custom-container-fluid py-[15px]">
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-2 xl:col-span-3">

            </div>
            <div class="col-span-2 md:col-span-2 xl:col-span-6 text-center">
                <a href="mailto:<?php the_field( 'contact_email', 'option' ); ?>" class="text-body"><?php the_field( 'contact_email', 'option' ); ?></a>
                <span class="text-gold font-bold"> | </span>
                <a href="tel:<?php the_field( 'contact_phone', 'option' ); ?>" class="text-body"><?php the_field( 'contact_phone', 'option' ); ?></a>
            </div>
            <div class="col-span-2 md:col-span-2 xl:col-span-3">
            <a id="trigger-overlay" class="btn-menu ml-auto block relative w-[50px] h-[25px] cursor-pointer" role="button">
                <span class="line line-1"></span>
                <span class="line line-2"></span>
                <span class="line line-3"></span>
            </a>

            </div>
        </div>
    </div>
</header>
<div id="menu-overlay" class="fixed inset-0 bg-gold z-[9999] hidden items-center justify-center flex-col">
    <button id="close-overlay" class="absolute top-6 right-6 text-white text-4xl font-light leading-none focus:outline-none hover:scale-110 transition-transform duration-200">
        &times;
    </button>
    <nav class="text-center">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'main-menu',
            'menu_class' => 'menu-items text-white text-2xl space-y-6',
            'container' => false
        ));
        ?>
    </nav>
</div>

