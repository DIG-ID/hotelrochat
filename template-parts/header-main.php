<header id="header-main" class="header-main w-full z-50 overflow-hidden fixed bg-white top-0" itemscope itemtype="http://schema.org/WebSite">
    <div class="custom-container-fluid py-[15px]">
        <div class="grid grid-cols-3 md:grid-cols-6 xl:grid-cols-12 md:gap-6">
            <div class="col-span-1 md:col-span-2 lg:col-span-1 xl:col-span-4">
            <?php
            if (function_exists('icl_get_languages')) {
                $languages = icl_get_languages('skip_missing=0');
                if (!empty($languages)) {

                    // Define the custom language order you want (by WPML language code)
                    $custom_order = ['en', 'fr', 'de'];

                    // Reorder $languages to match $custom_order
                    $ordered_languages = [];
                    foreach ($custom_order as $code) {
                        if (isset($languages[$code])) {
                            $ordered_languages[$code] = $languages[$code];
                        }
                    }

                    echo '<form class="language-switcher inline-block relative w-5/6 md:w-full lg:w-[210px] outline-0 focus-visible:outline-0 focus-visible:ring-0 focus:outline-0 focus:ring-0 border-b border-gold focus:ring-gold">';
                    echo '<select onchange="if (this.value) window.location.href=this.value" class="appearance-none xl:w-full text-gold text-body font-medium px-0 py-1 bg-white">';
                    foreach ($ordered_languages as $lang) {
                        $selected = $lang['active'] ? 'selected' : '';
                        echo '<option value="' . esc_url($lang['url']) . '" ' . $selected . '>';
                        echo esc_html($lang['native_name']);
                        echo '</option>';
                    }
                    echo '</select>';

                    // Custom dropdown arrow
                    echo '<div class="pointer-events-none absolute top-1/2 right-0 transform -translate-y-1/2 text-gold">';
                    echo '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor"><path d="M7 10l5 5 5-5H7z"/></svg>';
                    echo '</div>';

                    echo '</form>';
                }
            }
            ?>


            </div>
            <div class="col-span-1 md:col-span-2 lg:col-span-4 xl:col-span-4 text-center flex flex-row justify-center items-center">
                <a href="mailto:<?php the_field( 'contact_email', 'option' ); ?>" class="text-body hidden md:block"><?php the_field( 'contact_email', 'option' ); ?></a>
                <span class="text-gold font-bold w-3 hidden md:block"> | </span>
                <a href="tel:<?php the_field( 'contact_phone', 'option' ); ?>" class="text-body"><?php the_field( 'contact_phone', 'option' ); ?></a>
            </div>
            <div class="col-span-1 md:col-span-2 lg:col-span-1 xl:col-span-4 flex flex-row justify-end items-end">
                <a href="<?php the_field( 'general_booking_engine_url', 'option' ); ?>" class="btn btn-header hidden lg:inline-block" target="_blank"><?php esc_html_e( 'Jetzt buchen', 'hotelrochat' ); ?></a>
                <a id="trigger-overlay" class="btn-menu ml-8 block relative w-[50px] h-[25px] cursor-pointer" role="button">
                    <span class="line line-1"></span>
                    <span class="line line-2"></span>
                    <span class="line line-3"></span>
                </a>
            </div>
        </div>
    </div>
</header>
<div id="menu-overlay" class="fixed inset-0 bg-[rgba(194,150,63,0.9)] z-[9999] hidden items-center justify-center flex-col">
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

