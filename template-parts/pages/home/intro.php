<section class="section-hero relative w-full pt-10">
    <div class="custom-container">
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-6 xl:col-span-12 text-center py-[30px] md:px-[15%]">
                <h2 class="main-title text-gold"><?php the_field( 'intro_title' ); ?></h2>
                <p class="text-body mb-[10px]"><?php the_field( 'intro_intro' ); ?></p>
                <p class="text-body"><?php the_field( 'intro_text' ); ?></p>
            </div>
        </div>
    </div>
</section>
<div class="section-separator">
    <img class="w-[35px] h-[12px] mx-auto" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/separator@2x.png" alt="separator" title="Separator" >
</div>