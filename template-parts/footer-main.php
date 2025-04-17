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
                <p class="text-body !text-[0.8em] mt-[70px]"><?php the_field( 'access_data_policy', 'option' ); ?></p>
            </div>
        </div>
    </div>
</footer>
