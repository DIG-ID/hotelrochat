<section class="section-intro relative w-full pt-10">
    <div class="custom-container">
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-6 xl:col-span-12 text-center">
                <h1 class="main-title-bigger text-gold pb-10 pt-5"><?php the_field( 'intro_title' ); ?></h1>
                <p class="text-body !leading-[32px] mb-10"><?php the_field( 'intro_description' ); ?></p>
                <figure class="text-center w-full mb-3">
                    <?php 
                        $portrait = get_field('intro_portrait');
                        $size = 'full';
                        if( $portrait ) {
                            $alt = get_post_meta($portrait, '_wp_attachment_image_alt', true);
                            $title = get_the_title($portrait);
                            echo wp_get_attachment_image( $portrait, $size, false, [
                                'class' => 'mx-auto',
                                'alt' => esc_attr($alt),
                                'title' => esc_attr($title),
                            ]);
                        }
                    ?>
                </figure>
                <p class="text-body !leading-[32px] mb-[10px] italic"><?php the_field( 'intro_portrait_legend' ); ?></p>
            </div>
        </div>
    </div>
</section>
<div class="section-separator">
    <img class="w-[35px] h-[12px] mx-auto" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/separator@2x.png" alt="separator" title="Separator" >
</div>