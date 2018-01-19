<?php

namespace pinfo;

/**
 * Echos change-log from wordpress.org
 * @since 1.0.0
 * @return void
 */
function do_changelog() {
  
    ob_start();
    
    $url = "https://api.wordpress.org/plugins/info/1.0/" . get_option('plugin_name', 'ucare-support-system') . ".json";
    $response = wp_remote_get( $url ); 
        
    $body = wp_remote_retrieve_body( $response );

    $data = json_decode( $body );
    
    echo $data->sections->changelog;
    
    return ob_get_clean();
    
}

add_shortcode( 'plugin-info-changelog', 'pinfo\do_changelog' );
/**
 * Echos version number from wordpress.org
 * @since 1.0.0
 * @return void
 */
function do_version() {
  
    ob_start();
    
    $url = "https://api.wordpress.org/plugins/info/1.0/" . get_option('plugin_name', 'ucare-support-system') . ".json";
    $response = wp_remote_get( $url ); 
        
    $body = wp_remote_retrieve_body( $response );

    $data = json_decode( $body );
    
    echo $data->version;
    
    return ob_get_clean();
    
}

add_shortcode( 'plugin-info-version', 'pinfo\do_version' );
/**
 * Echos ratings in starts from wordpress.org
 * @since 1.0.0
 * @return void
 */
function do_ratings() {
  
    ob_start();
    
    $url = "https://api.wordpress.org/plugins/info/1.0/" . get_option('plugin_name', 'ucare-support-system') . ".json";
    $response = wp_remote_get( $url ); 
        
    $body = wp_remote_retrieve_body( $response );

    $data = json_decode( $body ); ?>

        <label class="ratings">Plugin Rating: </label>
        <span style="background: url(<?php echo asset( 'images/stars.png' ) ?>) 0 -16px repeat-x" class="stars">
            <span style="background: url(<?php echo asset( 'images/stars.png' ) ?>) 0 0px repeat-x; width: <?php echo $data->rating ?>%;"></span>
        </span>

    <?php return ob_get_clean();
    
}

add_shortcode( 'plugin-info-ratings', 'pinfo\do_ratings' );
/**
 * Echos total number of downloads from wordpress.org
 * @since 1.0.0
 * @return void
 */
function do_downloads() {
  
    ob_start();
    
    $url = "https://api.wordpress.org/plugins/info/1.0/" . get_option('plugin_name', 'ucare-support-system') . ".json";
    $response = wp_remote_get( $url ); 
        
    $body = wp_remote_retrieve_body( $response );

    $data = json_decode( $body );
    
    $downloads = number_format( $data->downloaded );
    
    echo $downloads;

    return ob_get_clean();
    
}

add_shortcode( 'plugin-info-downloads', 'pinfo\do_downloads' );
/**
 * Echos plugins faqs from wordpress.org
 * @since 1.0.0
 * @return void
 */
function do_faqs() {
  
    ob_start();
    
    $url = "https://api.wordpress.org/plugins/info/1.0/" . get_option('plugin_name', 'ucare-support-system') . ".json";
    $response = wp_remote_get( $url ); 
        
    $body = wp_remote_retrieve_body( $response );

    $data = json_decode( $body );
    
    echo $data->sections->faq;

    return ob_get_clean();
    
}

add_shortcode( 'plugin-info-faqs', 'pinfo\do_faqs' );
/**
 * Echos basic plugin info from wordpress.org
 * @since 1.0.0
 * @return void
 */
function do_plugin_card() {
    
    ob_start();
    
    $url = "https://api.wordpress.org/plugins/info/1.0/" . get_option('plugin_name', 'ucare-support-system') . ".json";
    $response = wp_remote_get( $url ); 
        
    $body = wp_remote_retrieve_body( $response );

    $data = json_decode( $body ); ?>
    
        <div class="pinfo-card">
            
            <div class="title"><?php echo $data->name ?></div>
            <div class="ratings">
                
                <label class="ratings">Plugin Rating: </label>
                <span style="background: url(<?php echo asset( 'images/stars.png' ) ?>) 0 -16px repeat-x" class="stars">
                    <span style="background: url(<?php echo asset( 'images/stars.png' ) ?>) 0 0px repeat-x; width: <?php echo $data->rating ?>%;"></span>
                </span>
                
            </div>
            <div class="version">
                <label class="version-number"><?php echo 'Current Version: ' . $data->version ?></label>
            </div>
            <div class="download">
                <a href="<?php echo $data->download_link ?>">Download</a>
            </div>
                        
        </div>
        
    <?php return ob_get_clean();
    
}

add_shortcode( 'plugin-info-card', 'pinfo\do_plugin_card');
/**
 * Echos plugin description from wordpress.org
 * @since 1.0.0
 * @return void
 */
function do_description() {
  
    ob_start();
    
    $url = "https://api.wordpress.org/plugins/info/1.0/" . get_option('plugin_name', 'ucare-support-system') . ".json";
    $response = wp_remote_get( $url ); 
        
    $body = wp_remote_retrieve_body( $response );

    $data = json_decode( $body );
    
    echo $data->sections->description;

    return ob_get_clean();
    
}

add_shortcode( 'plugin-info-description', 'pinfo\do_description' );
