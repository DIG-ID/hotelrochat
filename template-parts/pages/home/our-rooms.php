<?php
$rooms_image_id = get_field('rooms_banner_image');
$rooms_image_url = wp_get_attachment_image_src($rooms_image_id, 'full'); // 'full' or a custom image size
?>
<section class="section-our-rooms relative w-full">
    <div class="custom-container">
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-6 xl:col-span-12 text-center">
                <h2 class="main-title text-gold"><?php the_field( 'rooms_title' ); ?></h2>
                <p class="text-body mb-[10px]"><?php the_field( 'rooms_description' ); ?></p>
            </div>
            <div class="col-span-2 md:col-span-6 xl:col-span-12 text-center rooms-zoom-image group relative overflow-hidden">
                <a href="/unsere-zimmer/" class="flex flex-col w-full h-full justify-center items-center bg-black/30 relative z-10">
                    <span class="secondary-title text-white"><?php the_field( 'rooms_banner_title' ); ?></span>
                </a>
            </div>
        </div>
    </div>
</section>
<div class="section-separator">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/separator@2x.png" alt="separator" title="Separator" >
</div>
<style>
.rooms-zoom-image::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: url('<?php echo esc_url($rooms_image_url[0]); ?>');
    background-size: cover;
    background-position: center;
    transition: transform 1s ease;
    z-index: 0;
}
.rooms-zoom-image:hover::before {
    transform: scale(1.15);
}
</style>
