<section class="section-rooms-list relative w-full pb-10">
    <div class="custom-container">
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-6 xl:col-span-12 text-center">
                <h2 class="main-title text-gold pb-10"><?php the_field( 'zimmer_rooms_title', 'option' ); ?></h2>
            </div>
        </div>
        <?php
        $zimmer_query = new WP_Query([
            'post_type' => 'unsere-zimmer',
            'post_status' => 'publish',
            'orderby'     => 'date',
            'order'       => 'ASC',
            'posts_per_page' => -1
        ]);

        if ($zimmer_query->have_posts()) : ?>
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-6 xl:col-span-12 relative text-center group overflow-hidden mb-7">
                <?php while ($zimmer_query->have_posts()) : $zimmer_query->the_post();
                    $post_link = get_permalink();
                    $post_title = get_the_title(); 
                ?>
                    <a href="<?php echo esc_url($post_link); ?>" class="text_link"><?php echo esc_html($post_title); ?></a><span class="text-gold">&nbsp;/&nbsp;</span>
                <?php
                    endwhile;
                    wp_reset_postdata(); 
                ?>
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-6 xl:grid-cols-12 gap-6">
        <?php
            while ($zimmer_query->have_posts()) : $zimmer_query->the_post();
            $featured_img = get_the_post_thumbnail_url(get_the_ID(), 'zimmer-image');
            $post_link = get_permalink();
            $post_title = get_the_title(); 
            ?>
                <div class="col-span-2 md:col-span-3 xl:col-span-4 relative group overflow-hidden">
                    <a href="<?php echo esc_url($post_link); ?>" class="block w-full h-full">
                        <div class="w-full h-full bg-cover bg-center" style="background-image: url('<?php echo esc_url($featured_img); ?>');">
                            <div class="absolute inset-0 bg-black bg-opacity-70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                <div class="text-center text-white px-4">
                                    <div class="text-xl text-white mb-1"> - - </div>
                                    <h3 class="rooms-overview-title text-white mb-1"><?php echo esc_html($post_title); ?></h3>
                                    <div class="text-body text-white">
                                        <?php echo esc_html(get_field('title')); ?>
                                    </div>
                                </div>
                            </div>

                            <img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr($post_title); ?>" title="<?php echo esc_attr($post_title); ?>" class="invisible w-full h-full object-cover" />
                        </div>
                    </a>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>