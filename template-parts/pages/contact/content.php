<section class="section-contact relative w-full pt-10">
    <div class="custom-container">
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-6 xl:col-span-12">
                <h1 class="main-title-bigger text-gold pb-10 pt-5"><?php the_field( 'page_title' ); ?></h1>
            </div>
        </div>
        <div class="theme-grid">
            <div class="hidden md:block md:col-span-1 xl:col-span-1 px-[15px]">
                <figure>
                    <img class="w-full mx-auto" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/basel-symbol.png" alt="separator" title="Separator" >
                </figure>
            </div>
            <div class="col-span-2 md:col-span-5 xl:col-span-5 px-[15px">
                <h2 class="secondary-title text-gold py-5"><?php the_field( 'hotel_title' ); ?></h2>
                <p class="text-body mb-[10px]"><?php the_field( 'address' ); ?></p>
                <p class="text-body"><?php esc_html_e( 'Tel:', 'hotelrochat' ); ?><a href="tel:<?php the_field( 'contact_phone', 'option' ); ?>" class="text_link"><?php the_field( 'contact_phone', 'option' ); ?></a></p>
                <p class="text-body mb-[10px]"><?php esc_html_e( 'e-mail: ', 'hotelrochat' ); ?><a href="mailto:<?php the_field( 'contact_email', 'option' ); ?>" class="text_link"><?php the_field( 'contact_email', 'option' ); ?></a></p>
                <p class="text-body mb-[10px]"><?php the_field( 'extra_info' ); ?></p>
                <figure class="text-center w-full mb-3">
                    <?php 
                        $image = get_field('image');
                        $size = 'full';
                        if( $image ) {
                            $alt = get_post_meta($image, '_wp_attachment_image_alt', true);
                            $title = get_the_title($image);
                            echo wp_get_attachment_image( $image, $size, false, [
                                'alt' => esc_attr($alt),
                                'title' => esc_attr($title),
                            ]);
                        }
                    ?>
                </figure>
            </div>
        </div>
    </div>
</section>
<div class="section-separator">
    <img class="w-[35px] h-[12px] mx-auto" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/separator@2x.png" alt="separator" title="Separator" >
</div>