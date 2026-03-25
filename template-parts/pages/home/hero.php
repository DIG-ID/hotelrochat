<?php
$bg_image_id = get_field('hero_background');
?>

<section class="section-hero relative w-full">
    <div class="custom-container">
        <div class="xl:h-[630px] min-h-[550px] md:min-h-0 relative overflow-hidden">
            <?php if( $bg_image_id ):
                echo wp_get_attachment_image( $bg_image_id, 'full', false, [
                    'fetchpriority' => 'high',
                    'decoding'      => 'async',
                    'class'         => 'absolute inset-0 w-full h-full object-cover object-center',
                ] );
            endif; ?>
            <div class="relative block mx-[35px] py-[30px]">
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
            <div class="relative block text-center">
                <h3 class="main-title-uppercase text-gold mb-10"><?php the_field( 'hero_title' ); ?></h3>
                <a href="<?php the_field( 'general_booking_engine_url', 'option' ); ?>" class="btn btn-primary mt-[15px] mx-auto" target="_blank"><?php esc_html_e( 'Jetzt buchen', 'hotelrochat' ); ?></a>
            </div>
        </div>
    </div>
</section>

