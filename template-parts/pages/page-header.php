<?php
$bg_image_url = get_stylesheet_directory_uri() . '/assets/images/image-header.jpg';
?>

<section class="section-hero relative w-full">
    <div class="custom-container">
        <div class="bg-no-repeat bg-cover bg-top" style="background-image: linear-gradient(rgba(255,255,255,0), rgba(194,150,63,0.5)), url('<?php echo esc_url($bg_image_url); ?>');">
            <div class="mx-[35px] pt-[30px] pb-[50px] flex flex-row justify-between items-center">
                <div>
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
                <div>
                    <a href="<?php the_field( 'general_booking_engine_url', 'option' ); ?>" class="btn btn-primary" target="_blank"><?php esc_html_e( 'Jetzt buchen', 'hotelrochat' ); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
