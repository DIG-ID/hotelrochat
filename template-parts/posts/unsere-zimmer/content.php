<section class="section-hero relative w-full pt-10">
    <div class="custom-container">
        <div class="theme-grid">
            <div class="col-span-2 md:col-span-6 xl:col-span-12 ">
                <h1 class="main-title-bigger text-gold pb-10 pt-5"><?php the_title(); ?></h1>
            </div>
            <div class="col-span-2 md:col-span-6 xl:col-span-3 md:px-4">
                <p class="text-body mb-10"><?php the_field( 'description' ); ?></p>
                <h3 class="secondary-title text-gold mb-6"><?php esc_html_e( 'Services', 'hotelrochat' )  ?></h3>
                <p class="text-body mb-3"><?php the_field( 'services' );  ?></p>
                <a href="" class="btn-primary mt-5"><?php esc_html_e( 'Buchen sie jetzt', 'hotelrochat' ) ?></a>
            </div>
            <div class="col-span-2 md:col-span-6 xl:col-span-8 col-start-1 md:col-start-1 xl:col-start-5 md:px-4">
                // Slider
            </div>
        </div>
    </div>
</section>