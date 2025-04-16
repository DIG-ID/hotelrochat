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
                
            </div>
        </div>
    </div>
</header>
