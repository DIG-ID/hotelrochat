<section class="section-enjoy relative w-full">
    <div class="custom-container">
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-6 xl:col-span-12 text-center">
                <h2 class="main-title text-gold"><?php the_field( 'enjoy_title' ); ?></h2>
            </div>
        </div>
        <?php
        $args = array(
            'post_type' => 'basel_erlebnis',
            'posts_per_page' => 3,
            'post_status' => 'publish'
        );
        $basel_erlebnis_query = new WP_Query($args);
        ?>

        <?php if ($basel_erlebnis_query->have_posts()) : ?>
            <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-[30px]">
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