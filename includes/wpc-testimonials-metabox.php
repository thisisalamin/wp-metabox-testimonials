<?php

class WPC_Testimonials_Metabox {
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_wpc_testimonials_metabox' ) ); 
        add_action( 'save_post', array( $this, 'save_wpc_testimonials' ) );
    }

    public function add_wpc_testimonials_metabox() {
        add_meta_box(
            'wpc_testimonials_metabox',
            esc_html__( 'Testimonial Details', 'wpc_testimonials' ),
            array( $this, 'display_wpc_testimonials' ),
            'wpc_testimonials',
            'advanced',
            'high'
        );
    }

    public function display_wpc_testimonials($post){
        ?>
        <div class="wpc-testimonials-metabox">
            <div class="wpc-testimonials-metabox__field">
                <label for="wpc_testimonials_author"><?php esc_html_e( 'Author :', 'wpc_testimonials' ); ?></label>
                <input type="text" id="wpc_testimonials_author" name="wpc_testimonials_author" value="<?php echo esc_attr( get_post_meta( $post->ID, 'wpc_testimonials_author', true ) ); ?>">
            </div>
            <br/>
            <div class="wpc-testimonials-metabox__field">
                <label for="wpc_testimonials_position"><?php esc_html_e( 'Position :', 'wpc_testimonials' ); ?></label>
                <input type="text" id="wpc_testimonials_position" name="wpc_testimonials_position" value="<?php echo esc_attr( get_post_meta( $post->ID, 'wpc_testimonials_position', true ) ); ?>">
            </div>
            <br/>
            <div class="wpc-testimonials-metabox__field">
                <label for="wpc_testimonials_company"><?php esc_html_e( 'Company :', 'wpc_testimonials' ); ?></label>
                <input type="text" id="wpc_testimonials_company" name="wpc_testimonials_company" value="<?php echo esc_attr( get_post_meta( $post->ID, 'wpc_testimonials_company', true ) ); ?>">
            </div>
            <br/>
            <div class="wpc-testimonials-metabox__field">
                <label for="wpc_testimonials_rating"><?php esc_html_e( 'Rating :', 'wpc_testimonials' ); ?></label>
                <input type="number" id="wpc_testimonials_rating" name="wpc_testimonials_rating" value="<?php echo esc_attr( get_post_meta( $post->ID, 'wpc_testimonials_rating', true ) ); ?>">
            </div>
        </div>
        <?php
    }

    public function save_wpc_testimonials($post_id){
        $wpc_testimonials_author = sanitize_text_field( $_POST['wpc_testimonials_author'] );
        $wpc_testimonials_position = sanitize_text_field( $_POST['wpc_testimonials_position'] );
        $wpc_testimonials_company = sanitize_text_field( $_POST['wpc_testimonials_company'] );
        $wpc_testimonials_rating = sanitize_text_field( $_POST['wpc_testimonials_rating'] );
        if ( ! isset( $_POST['wpc_testimonials_author'] ) ) {
            return;
        }

        update_post_meta( $post_id, 'wpc_testimonials_author', $wpc_testimonials_author );
        update_post_meta( $post_id, 'wpc_testimonials_position', $wpc_testimonials_position );
        update_post_meta( $post_id, 'wpc_testimonials_company', $wpc_testimonials_company );
        update_post_meta( $post_id, 'wpc_testimonials_rating', $wpc_testimonials_rating );
    }

}