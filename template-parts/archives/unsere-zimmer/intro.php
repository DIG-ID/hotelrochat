<section class="section-intro relative w-full pt-10">
    <div class="custom-container">
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-6 xl:col-span-12 text-center">
                <h2 class="main-title-bigger text-gold pb-10 pt-5"><?php the_field( 'zimmer_intro_title', 'option' ); ?></h2>
                <p class="text-body !leading-[32px] mb-[10px]"><?php the_field( 'zimmer_intro_text', 'option' ); ?></p>
            </div>
        </div>
    </div>
</section>
<div class="section-separator">
    <img class="w-[35px] h-[12px] mx-auto" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/separator@2x.png" alt="separator" title="Separator" >
</div>