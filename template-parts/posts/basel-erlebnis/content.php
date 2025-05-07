<section class="section-intro relative w-full pt-10">
    <div class="custom-container">
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-6 xl:col-span-12 md:px-4">
                <?php if ( function_exists('yoast_breadcrumb') ) : ?>
                    <div class="yoast-breadcrumb pb-5 text-sm text-gray-500">
                        <?php yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-6 xl:col-span-9 xl:mr-[8.33333333%] md:px-4">
                
                <section>
                    <h1 class="main-title-bigger text-gold pb-10 pt-5"><?php the_title(); ?></h1>
                    <figure class="text-center w-full mb-3">
                        <?php 
                            $st_image = get_field('intro_image');
                            $size = 'full';
                            if( $st_image ) {
                                $alt = get_post_meta($st_image, '_wp_attachment_image_alt', true);
                                $title = get_the_title($st_image);
                                echo wp_get_attachment_image( $st_image, $size, false, [
                                    'class' => 'w-full',
                                    'alt' => esc_attr($alt),
                                    'title' => esc_attr($title),
                                ]);
                            }
                        ?>
                    </figure>
                    <blockquote class="text-body !text-[17.5px]"><?php the_field('intro_description'); ?></blockquote>
                </section>
                <section>
                <?php
                if( have_rows('content') ):
                    while( have_rows('content') ) : the_row();?>
                        <?php if( get_sub_field('main_title') ) : ?>
                        <h2 class="main-title text-gold">
                            <?php the_sub_field('main_title'); ?>                            
                        </h2>
                        <?php endif; ?>
                        <?php if( get_sub_field('title') ) : ?>
                        <div class="secondary-title text-gold mb-5">
                            <?php the_sub_field('title'); ?>                            
                        </div>
                        <?php endif; ?>
                        <?php if( get_sub_field('text') ) : ?>
                        <div class="text-body mb-5">
                            <?php the_sub_field('text'); ?>
                        </div>
                        <?php endif; ?>
                        <?php
                        $st_image = get_sub_field('image_1');
                        $size = 'full';
                        if( $st_image ) {
                            $alt = get_post_meta($st_image, '_wp_attachment_image_alt', true);
                            $title = get_the_title($st_image);
                            echo wp_get_attachment_image( $st_image, $size, false, [
                                'class' => 'w-full mb-5',
                                'alt' => esc_attr($alt),
                                'title' => esc_attr($title),
                            ]);
                        }
                        $st_image_2 = get_sub_field('image_2');
                        if( $st_image_2 ) {
                            $alt = get_post_meta($st_image_2, '_wp_attachment_image_alt', true);
                            $title = get_the_title($st_image_2);
                            echo wp_get_attachment_image( $st_image_2, $size, false, [
                                'class' => 'w-full mb-5',
                                'alt' => esc_attr($alt),
                                'title' => esc_attr($title),
                            ]);
                        }
                        ?>
                    <?php
                    endwhile;
                endif;
                ?>
                </section>
                <div class="section-separator">
                    <img class="w-[35px] h-[12px] mx-auto" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/separator@2x.png" alt="separator" title="Separator" >
                </div>

                <?php
                global $sitepress; // Ensure WPML global is accessible

                $current_language = apply_filters( 'wpml_current_language', null );
                
                $all_posts = get_posts([
                    'post_type' => 'basel-erlebnis',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'post_status' => 'publish',
                    'suppress_filters' => false, // <-- Important for WPML to work
                    'lang' => $current_language, // <-- Only get posts in the current language
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

                $archive_link = get_post_type_archive_link('basel-erlebnis');
                ?>

                <div class="grid grid-cols-3 items-center text-sm text-gold py-4 mb-5">
                    <div class="text-left">
                        <h5 class="nav-post-title"><?php esc_html_e( 'Vorherige Post', 'hotelrochat' ) ?></h5>
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
                    <div class="text-right">
                        <h5 class="nav-post-title"><?php esc_html_e( 'Letzter Post', 'hotelrochat' ) ?></h5>
                        <a href="<?php echo get_permalink( $next_post->ID ); ?>" class="text_link text-[15px]">
                            <?php echo esc_html( get_the_title( $next_post->ID ) ); ?>
                        </a>
                    </div>
                </div>

            </div>
            <div class="sidebar col-span-2 md:col-span-6 xl:col-span-3 col-start-1 md:col-start-1 xl:col-start-10 md:px-4">
                <p class="font-prata text-[30px] font-normal leading-[33px] text-gold mb-5"><?php esc_html_e( 'Zugehörige Beiträge', 'hotelrochat' ) ?></p>
                <?php
                $args = array(
                    'post_type' => 'basel-erlebnis',
                    'posts_per_page' => 3,
                    'post_status' => 'publish'
                );
                $basel_erlebnis_query = new WP_Query($args);
                ?>

                <?php if ($basel_erlebnis_query->have_posts()) : ?>
                        <?php while ($basel_erlebnis_query->have_posts()) : $basel_erlebnis_query->the_post(); 
                            $background_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        ?>  
                            <div class="mb-10">
                                <a href="<?php the_permalink(); ?>" class="relative group overflow-hidden min-h-[260px] flex items-center justify-center text-center text-white hover:text-white basel-zoom-image" style="--bg-url: url('<?php echo esc_url($background_image); ?>');">
                                    <div class="absolute inset-0 bg-black/40 z-10"></div>
                                    <h3 class="secondary-title px-5 z-20 relative"><?php the_title(); ?></h3>
                                </a>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
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
                <p class="font-prata text-[30px] font-normal leading-[33px] text-gold mb-5"><?php esc_html_e( 'Share this page', 'hotelrochat' ) ?></p>
                <?php
                $post_url = urlencode(get_permalink());
                $post_title = urlencode(get_the_title());
                ?>

                <div class="flex items-center space-x-4 text-[#C2963F] mt-2">

                    <!-- Facebook -->
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                    target="_blank" 
                    rel="noopener" 
                    aria-label="Share on Facebook" 
                    class="text-[#C2963F] hover:text-black transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 320 512">
                            <path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/>
                        </svg>
                    </a>
                    <!-- X / Twitter -->
                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                    target="_blank" 
                    rel="noopener" 
                    aria-label="Share on X" 
                    class="text-[#C2963F] hover:text-black transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 512 512">
                            <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/>
                        </svg>
                    </a>
                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" 
                    target="_blank" 
                    rel="noopener" 
                    aria-label="Share on LinkedIn" 
                    class="text-[#C2963F] hover:text-black transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 448 512">
                            <path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/>
                        </svg>
                    </a>
                    <!-- Email -->
                    <a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=<?php echo urlencode(get_permalink()); ?>" 
                    target="_blank" 
                    rel="noopener" 
                    aria-label="Share via Email" 
                    class="text-[#C2963F] hover:text-black transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 512 512">
                            <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>