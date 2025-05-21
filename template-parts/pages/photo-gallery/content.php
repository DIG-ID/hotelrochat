<section class="section-contact relative w-full pt-10">
    <div class="custom-container">
    <div class="theme-grid">
        <div class="col-span-2 md:col-span-6 xl:col-span-12">
            <h1 class="main-title-bigger text-gold pb-10 pt-5"><?php the_title(); ?></h1>
        </div>
    </div>
    <?php
        $gallery = get_field('photo_gallery');
        if( $gallery ):
        ?>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-[10px]">
            <?php foreach( $gallery as $image_id ): ?>
                <?php
                    $url_full = wp_get_attachment_image_url( $image_id, 'full' );
                    $url_thumb = wp_get_attachment_image_url( $image_id, 'gallery-thumbs' );
                    $alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
                    $title = get_the_title( $image_id );
                ?>
                <a href="<?php echo esc_url($url_full); ?>" data-fancybox="gallery" data-caption="<?php echo esc_attr($alt); ?>" title="<?php echo esc_attr($title); ?>"  class="relative group block">
                    <img src="<?php echo esc_url($url_thumb); ?>" alt="<?php echo esc_attr($alt); ?>" class="w-full h-auto min-h-[200px] object-cover" />
                    <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[30px] h-[30px] text-white" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M11 2a9 9 0 106.32 15.32l4.09 4.09a1.5 1.5 0 002.12-2.12l-4.09-4.09A9 9 0 0011 2zm0 3a6 6 0 110 12 6 6 0 010-12z"/>
                        </svg>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

    </div>
</section>