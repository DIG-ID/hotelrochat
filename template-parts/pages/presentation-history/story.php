<section class="section-story relative w-full pt-10">
    <div class="custom-container">
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-6 xl:col-span-6 text-right">
                <h2 class="main-title text-gold pb-10"><?php the_field( 'story_title' ); ?></h2>
                <p class="text-body mb-10"><?php the_field( 'story_text' ); ?></p>
            </div>
            <div class="col-span-2 md:col-span-6 xl:col-span-6 text-center">
                <figure class="text-center w-full mb-3">
                    <?php 
                        $st_image = get_field('story_image');
                        $size = 'full';
                        if( $st_image ) {
                            $alt = get_post_meta($st_image, '_wp_attachment_image_alt', true);
                            $title = get_the_title($st_image);
                            echo wp_get_attachment_image( $st_image, $size, false, [
                                'class' => 'mx-auto',
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