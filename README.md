# WP Metabox Testimonials

WP Metabox Testimonials is a WordPress plugin designed to facilitate the creation and management of testimonials on your WordPress website. With easy-to-use metabox functionality, this plugin streamlines the process of adding, editing, and displaying testimonials on your site.

## Features

- **Testimonial Management**: Easily add, edit, and delete testimonials from the WordPress admin dashboard.
- **Custom Fields**: Utilize custom fields to capture specific information about each testimonial, such as the author's name, company, and testimonial content.
- **Metabox Integration**: Seamlessly integrate testimonial management into the WordPress post and page editor with metabox functionality.
- **Shortcode Support**: Display testimonials anywhere on your site using simple shortcode integration.
- **Responsive Design**: Ensure your testimonials look great on all devices with built-in responsiveness.
- **Customization Options**: Customize the appearance of your testimonials to match your website's design and branding.
- **Developer Friendly**: Extend and customize functionality further with hooks and filters provided by the plugin.

## Installation

1. Download the `wp-metabox-testimonials.zip` file from the releases page.
2. Log in to your WordPress admin panel.
3. Navigate to Plugins → Add New.
4. Click the "Upload Plugin" button.
5. Select the `wp-metabox-testimonials.zip` file and click "Install Now."
6. Activate the plugin once installation is complete.
7. You can now start adding and managing testimonials via the Testimonials menu in the WordPress admin dashboard.

```php
// Example shortcode to display testimonials
function display_testimonials() {
    ob_start();
    ?>
    <div class="testimonials">
        <?php // Your testimonial loop here ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('testimonials', 'display_testimonials');
