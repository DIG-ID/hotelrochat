<section class="section-basel relative w-full py-10">
    <div class="custom-container">
        <div class="theme-grid md:w-2/3">
            <div class="col-span-2 md:col-span-6 xl:col-span-12">
                <h1 class="main-title-bigger text-gold pt-5 pb-10"><?php the_field( 'basel_title', 'option' ); ?></h1>
            </div>
        </div>
        <?php
        $args = array(
            'post_type' => 'basel-erlebnis',
            'posts_per_page' => 3,
            'post_status' => 'publish'
        );
        $basel_erlebnis_query = new WP_Query($args);
        ?>

        <?php if ($basel_erlebnis_query->have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-[28px] md:w-2/3">
                <?php while ($basel_erlebnis_query->have_posts()) : $basel_erlebnis_query->the_post(); 
                    $background_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                ?>
                    <div class="col-span-1 md:col-span-1">
                        <a href="<?php the_permalink(); ?>" class="relative group overflow-hidden aspect-[16/9] flex items-center justify-center text-center text-white hover:text-white basel-zoom-image" style="--bg-url: url('<?php echo esc_url($background_image); ?>');">
                        </a>
                        <div class="p-2">
                            <h3 class="secondary-title text-gold py-7"><?php the_title(); ?></h3>
                            <p class="text-body"><?php the_field( 'overview_description' ); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-secondary mt-[15px]"><?php the_title(); ?></a>
                        </div>
                    </div>
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