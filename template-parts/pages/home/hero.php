<?php
$bg_image_id = get_field('hero_background');
$bg_image_url = wp_get_attachment_image_src($bg_image_id, 'full'); // 'full' or a custom image size
?>

<section class="section-hero relative w-full">
    <div class="custom-container">
        <div class="xl:h-[630px] bg-no-repeat bg-cover bg-center min-h-[550px] md:min-h-0" <?php if( $bg_image_url ): ?> style="background-image: url('<?php echo esc_url($bg_image_url[0]); ?>')" <?php endif; ?>>
            <div class="block mx-[35px] py-[30px]">
                <a href="<?php echo get_home_url(); ?>" id="grand-logo">
                    <?php 
                        $logo = get_field('general_logo', 'option');
                        $size = 'full';
                        if( $logo ) {
                            echo wp_get_attachment_image( $logo, $size );
                        } 
                    ?>
                </a>
            </div>
            <div class="block text-center">
                <h1 class="main-title-uppercase text-gold mb-10"><?php the_field( 'hero_title' ); ?></h1>
                <a href="<?php the_field( 'general_booking_engine_url', 'option' ); ?>" class="btn btn-primary mt-[15px] mx-auto" target="_blank"><?php esc_html_e( 'Jetzt buchen', 'hotelrochat' ); ?></a>
            </div>
        </div>
    </div>
</section>

