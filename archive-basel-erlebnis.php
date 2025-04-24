<?php
get_header();
do_action( 'before_main_content' );
    get_template_part( 'template-parts/pages/page-header' );
    get_template_part( 'template-parts/archives/basel-erlebnis/content' );
do_action( 'after_main_content' );
get_footer();
