<?php

/**
 * Provide a admin area view for the plugin
 *
 * @link       http://filipstefansson.github.io/wp-og
 * @since      0.1.0
 *
 * @package    WP_OG
 * @subpackage WP_OG/admin/partials
 */
?>

<?php
    /* Load all the post types and the post types the user has selected */
    $args = array(
        'public'   => true
    );
    $post_types = get_post_types($args);
    $selected_post_types = get_option('og-post_types');
?>

<div class="wrap">
    <h2>Open Graph Tags</h2>
    <p>Take control of what the Facebook crawler picks up from each page by using Open Graph meta tags. These tags provide structured info about the page such as the title, description, preview image, and more.</p>
    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
            <div id="post-body-content">
                <form method="post" action="options.php"> 
                    <h2>Edit default settings</h2>
                    <p>The settings below will be used as defaults and on the frontpage. </p>
                    <?php settings_fields( 'wp-og' ); ?>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">
                                <label for="og-site_name">Site name – <small>og:site_name</small></label>
                            </th>
                            <td>
                                <input type="text" name="og-site_name" id="og-site_name" value="<?php echo esc_attr( get_option('og-site_name') ); ?>" class="regular-text"/>
                                <p class="description">
                                    Provide a site name, e.g. "My Favorite News"
                                </p>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">
                                <label for="og-title">Title – <small>og:title</small></label>
                            </th>
                            <td>
                                <input type="text" name="og-title" id="og-title" value="<?php echo esc_attr( get_option('og-title') ); ?>" class="regular-text"/>
                                <p class="description">
                                    A clear title without branding or mentioning the domain itself.
                                </p>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">
                                <label for="og-description">Description – <small>og:description</small></label>
                            </th>
                            <td>
                                <textarea name="og-description" id="og-description" class="large-text"><?php echo esc_attr( get_option('og-description') ); ?></textarea>
                                <p class="description">
                                    A clear description, at least two sentences long.
                                </p>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">
                                <label for="og-app_id">App ID – <small>og:app_id</small></label>
                            </th>
                            <td>
                                <input type="text" name="og-app_id" id="og-app_id" value="<?php echo esc_attr( get_option('og-app_id') ); ?>" class="regular-text"/>
                                <p class="description">
                                    A Facebook App ID that identifies your website to Facebook.
                                </p>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">
                                <label for="og-image">Image – <small>og:image</small></label>
                            </th>
                            <td>
                                <input type="text" name="og-image" id="og-image" value="<?php echo esc_attr( get_option('og-image') ); ?>" class="regular-text"/>
                                <button id="select_og_image" class="button">Select image</button>
                                <p class="description">
                                    The default image to show on Facebook.
                                </p>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">
                                <label>Activate for post types:</label>
                            </th>
                            <td>
                                <?php  foreach ( $post_types as $post_type ): ?>
                                    <?php $selected = in_array($post_type, $selected_post_types) ? "checked" : ""; ?>
                                    <p>
                                        <label for="og-post_types_<?php echo $post_type ?>">
                                            <input name="og-post_types[]" id="og-post_types_<?php echo $post_type ?>" type="checkbox" value="<?php echo $post_type ?>" <?php echo $selected ?>/>
                                            <span><?php echo $post_type ?></span>
                                        </label>
                                    </p>
                                <?php endforeach; ?> 
                                <p class="description">
                                    Select where you want the OG tags to appear.
                                </p>
                            </td>
                        </tr>
                    </table>
                    <?php submit_button(); ?>
                </form>
            </div>
       
            <div id="postbox-container-1" class="postbox-container">
                <div class="postbox">
                    <h3 class="hndle">Open Graph Debugger</h3>
                    <div class="inside">
                        <p>If you update these settings you might need to tell Facebook to scrape the new information. </p>
                        <p>    
                            <a href="https://developers.facebook.com/tools/debug/og/object?q=<?php echo home_url() ?>" class="button" target="_blank">Open Graph Debugger</a>
                        </p>
                    </div>
                </div>
                <div class="postbox">
                    <h3 class="hndle">Open Graph Best Practices</h3>
                    <div class="inside">
                        <p>Learn more about how to use the OG tags in the best possible way. </p>
                        <p>    
                            <a href="https://developers.facebook.com/docs/sharing/best-practices#tags" class="button" target="_blank">Learn More</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
