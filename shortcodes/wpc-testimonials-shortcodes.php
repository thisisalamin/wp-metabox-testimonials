<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WPC_Testimonials_Shortcodes{
    public function __construct() {
        add_shortcode( 'wpc_testimonials', array( $this, 'wpc_testimonials_shortcode' ) );
    }

    public function wpc_testimonials_shortcode( $atts ) {
        ob_start();
        $query = new WP_Query( array(
            'post_type' => 'wpc_testimonials',
            'posts_per_page' => -1,
        ) );
        ?>
        <div class="wpc-testimonials">
            <?php
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    ?>
                        <div class="wpc-testimonial">
                            <section class="testimonials-container">
                                <div class="testimonials">
                                    <div class="testimonial">
                                        <h3> <?php echo the_title() ?> </h3>
                                        <p> Company Name : <?php echo get_post_meta(get_the_ID(), 'wpc_testimonials_company', true )?> </p>
                                        <p> Rating: <?php echo get_post_meta(get_the_ID(), 'wpc_testimonials_rating', true )?> </p>
                                        <p> <?php echo the_content() ?> 
                                        <span class="testimonal-author">
                                            <?php echo get_post_meta( get_the_ID(), 'wpc_testimonials_author', true ); ?>
                                    </span></p>
                                    </div>
                                </div>
                            </section>
                        </div>
                    <?php
                }
            }
            wp_reset_postdata();
            ?>
        </div>
        <?php
        return ob_get_clean();
    }

}
