<footer class="footer-main">
    <div class="custom-container pattern-bg">
        <div class="theme-grid py-10">
            <div class="col-span-2 md:col-span-6 xl:col-span-8">
            <?php
			$location = get_field( 'map', 'option' );
			if ( $location ) :
				?>
				<div class="acf-map" data-zoom="14">
					<div class="marker" data-lat="<?php echo esc_attr( $location['lat'] ); ?>" data-lng="<?php echo esc_attr( $location['lng'] ); ?>"></div>
				</div>
				<?php
			endif;
			?>
            </div>
            <div class="col-span-2 md:col-span-6 xl:col-span-4">
                <h3 class="text-gold my-5"><?php the_field( 'contact_title', 'option' ); ?></h3>
                <p class="text-body mb-[10px]"><?php the_field( 'contact_address', 'option' ); ?></p>
                <p class="text-body"><?php esc_html_e( 'Tel:', 'hotelrochat' ); ?><?php the_field( 'contact_phone', 'option' ); ?></p>
                <p class="text-body mb-[10px]"><?php esc_html_e( 'e-mail: ', 'hotelrochat' ); ?><?php the_field( 'contact_email', 'option' ); ?></p>
                <p class="text-body mb-[10px]"><?php the_field( 'contact_info', 'option' ); ?></p>
                <h3 class="text-gold my-5"><?php the_field( 'access_title', 'option' ); ?></h3>
                <p class="text-body mb-[10px]"><?php the_field( 'access_description', 'option' ); ?></p>
                <?php
                wp_nav_menu( array(
                    'theme_location'  => 'copyright-menu',
                    'container'       => 'nav',
                    'container_class' => 'mt-[70px]',
                    'menu_class'      => 'flex flex-wrap gap-4 text_link text-[0.8em]',
                    'depth'           => 1,
                    'fallback_cb'     => false
                ) );
                ?>
            </div>
        </div>
    </div>
    <?php if( have_rows('amenities_list', 'option') ): ?>
        <div class="amenities-wrapper relative px-[6%] py-10 flex items-center"> <!-- make wrapper a flex row -->
            
            <!-- Navigation Arrows -->
            <div class="swiper-button-prev text-gold absolute left-0 top-[80%] translate-y-[-70%] z-10"></div>

            <!-- Swiper Container -->
            <div class="swiper amenities-swiper w-full">
                <div class="swiper-wrapper items-center"> <!-- ensures slides themselves are vertically centered -->
                    <?php while( have_rows('amenities_list', 'option') ): the_row();
                        $icon = get_sub_field('icon');
                        $label = get_sub_field('label');
                        $icon_url = wp_get_attachment_image_url($icon, 'thumbnail');
                        $icon_alt = get_post_meta($icon, '_wp_attachment_image_alt', true);
                    ?>
                        <div class="swiper-slide text-gold flex items-center space-x-3 px-2">
                            <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($icon_alt); ?>" class="w-[40px] h-[40px] object-contain flex-shrink-0">
                            <span class="text-sm leading-tight text-left"><?php echo $label; ?></span>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>

            <div class="swiper-button-next text-gold absolute right-0 top-[80%] translate-y-[-70%] z-10"></div>

        </div>
    <?php endif; ?>

</footer>