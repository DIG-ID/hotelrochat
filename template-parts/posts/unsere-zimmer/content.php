<section class="section-hero relative w-full py-10">
    <div class="custom-container">
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-6 xl:col-span-12 ">
                <h1 class="main-title-bigger text-gold pb-10 pt-5"><?php the_title(); ?></h1>
            </div>
            <div class="col-span-2 md:col-span-6 xl:col-span-3 md:px-4">
                <p class="text-body mb-10"><?php the_field( 'description' ); ?></p>
                <h3 class="secondary-title text-gold mb-6"><?php esc_html_e( 'Services', 'hotelrochat' )  ?></h3>
                <p class="text-body mb-3"><?php the_field( 'services' );  ?></p>
                <a href="<?php the_field( 'booking_link' ); ?>" class="btn-primary mt-5"><?php esc_html_e( 'Buchen sie jetzt', 'hotelrochat' ) ?></a>
            </div>
            <div class="col-span-2 md:col-span-6 xl:col-span-8 col-start-1 md:col-start-1 xl:col-start-5 md:px-4">
                <?php
                $image_ids = get_field('gallery');
                if( $image_ids ):
                ?>
                <div class="swiper gallery-swiper relative">
                    <div class="swiper-wrapper">
                        <?php foreach( $image_ids as $image_id ): ?>
                            <div class="swiper-slide">
                                <?php
                                $img_url = wp_get_attachment_image_url($image_id, 'full');
                                $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                                ?>
                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($alt); ?>" class="w-full h-auto" />
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Arrows -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <?php endif; ?>
            </div>

        </div>
        <?php
        // Get all post IDs of this CPT, ordered by date (ASC or DESC as you prefer)
        $all_posts = get_posts([
            'post_type' => 'unsere-zimmer',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'ASC',
            'post_status' => 'publish',
            'fields' => 'ids',
        ]);

        $current_post_id = get_the_ID();
        $current_index = array_search($current_post_id, $all_posts);
        $total_posts = count($all_posts);

        // Ensure loop logic wraps around
        $prev_index = ($current_index - 1 + $total_posts) % $total_posts;
        $next_index = ($current_index + 1) % $total_posts;

        $prev_post = get_post($all_posts[$prev_index]);
        $next_post = get_post($all_posts[$next_index]);

        $archive_link = get_post_type_archive_link('unsere-zimmer');
        ?>

        <div class="grid grid-cols-3 items-center text-sm text-gold pt-[60px] mb-5">
            <div class="text-left px-[15px]">
                <h5 class="nav-post-title"><?php esc_html_e( 'Zurück', 'hotelrochat' ) ?></h5>
                <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="text_link text-[15px]">
                    <?php echo esc_html( get_the_title( $prev_post->ID ) ); ?>
                </a>
            </div>
            <div class="text-center">
                <h5 class="nav-post-title h-[22px]"></h5>
                <a href="<?php echo esc_url( $archive_link ); ?>" class="inline-block font-semibold hover:opacity-80 transition-opacity">
                    <svg class="w-5 h-5 fill-[#C2963F]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" aria-hidden="true" focusable="false">
                        <path d="M96 96c0 17.7-14.3 32-32 32S32 113.7 32 96s14.3-32 32-32s32 14.3 32 32zm0 160c0 17.7-14.3 32-32 32s-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32zm-32 192c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32zM160 96c0-17.7 14.3-32 32-32h288c17.7 0 32 14.3 32 32s-14.3 32-32 32H192c-17.7 0-32-14.3-32-32zm32 128h288c17.7 0 32 14.3 32 32s-14.3 32-32 32H192c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 160h288c17.7 0 32 14.3 32 32s-14.3 32-32 32H192c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/>
                    </svg>
                </a>
            </div>
            <div class="text-right px-[15px]">
                <h5 class="nav-post-title"><?php esc_html_e( 'Nächste', 'hotelrochat' ) ?></h5>
                <a href="<?php echo get_permalink( $next_post->ID ); ?>" class="text_link text-[15px]">
                    <?php echo esc_html( get_the_title( $next_post->ID ) ); ?>
                </a>
            </div>
        </div>

        <div class="section-separator">
            <img class="w-[35px] h-[12px] mx-auto" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/separator@2x.png" alt="separator" title="Separator" >
        </div>

        <h1 class="main-title text-gold pb-10 pt-5"><?php esc_html_e( 'Andere Zimmer', 'hotelrochat' ) ?></h1>
        <?php
        $args = array(
            'post_type' => 'unsere-zimmer',
            'posts_per_page' => 3,
            'post_status' => 'publish'
        );
        $basel_erlebnis_query = new WP_Query($args);
        ?>

        <?php if ($basel_erlebnis_query->have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-[30px]">
                <?php while ($basel_erlebnis_query->have_posts()) : $basel_erlebnis_query->the_post(); 
                    $background_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                ?>
                    <a href="<?php the_permalink(); ?>" class="relative group overflow-hidden aspect-[16/9] flex items-center justify-center text-center text-white hover:text-white basel-zoom-image" style="--bg-url: url('<?php echo esc_url($background_image); ?>');">
                        <div class="absolute inset-0 bg-black/40 z-10"></div>
                        <h3 class="secondary-title z-20 relative"><?php the_title(); ?></h3>
                    </a>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
        <style>
        .basel-zoom-image::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: var(--bg-url);
            background-size: cover;
            background-position: center;
            transition: transform 1s ease;
            z-index: 0;
        }
        .basel-zoom-image:hover::before {
            transform: scale(1.15);
        }
        </style>
    </div>
</section>