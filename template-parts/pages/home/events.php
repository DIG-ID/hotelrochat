<section class="section-events relative w-full pt-[60px]">
    <div class="custom-container">
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-6 xl:col-span-12 text-center">
                <h2 class="main-title text-gold"><?php the_field('events_title'); ?></h2>
            </div>
        </div>
    

        <?php if (have_rows('events_list')) : ?>
            <div class="swiper events-swiper w-full mt-8 relative overflow-hidden">
                <div class="swiper-wrapper">
                    <?php while (have_rows('events_list')) : the_row();
                        $image_id = get_sub_field('image');
                        $title = get_sub_field('title');
                        $image_url = wp_get_attachment_image_src($image_id, 'full'); 
                    ?>
                        <div class="swiper-slide relative bg-cover bg-center aspect-[16/5] flex items-center justify-center text-center" style="background-image: url('<?php echo esc_url($image_url[0]); ?>');">
                            <div class="bg-black/40 w-full h-full absolute top-0 left-0 z-0"></div>
                            <h3 class="secondary-title text-white relative z-10"><?php echo esc_html($title); ?></h3>
                        </div>
                    <?php endwhile; ?>
                </div>

                <!-- Navigation buttons -->
                <div class="swiper-button-next text-white"></div>
                <div class="swiper-button-prev text-white"></div>
            </div>
        <?php endif; ?>
    </div>
</section>

<div class="section-separator">
    <img class="w-[35px] h-[12px] mx-auto" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/separator@2x.png" alt="separator" title="Separator">
</div>
