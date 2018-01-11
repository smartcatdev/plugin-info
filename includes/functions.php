<?php

namespace pinfo;

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

function do_version() {
  
    ob_start();
    
    $url = "https://api.wordpress.org/plugins/info/1.0/" . get_option('plugin_name', 'ucare-support-system') . ".json";
    $response = wp_remote_get( $url ); 
        
    $body = wp_remote_retrieve_body( $response );

    $data = json_decode( $body );
    
    echo 'Current Version: ' . $data->version;
    
    return ob_get_clean();
    
}

add_shortcode( 'plugin-info-version', 'pinfo\do_version' );

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

function do_downloads() {
  
    ob_start();
    
    $url = "https://api.wordpress.org/plugins/info/1.0/" . get_option('plugin_name', 'ucare-support-system') . ".json";
    $response = wp_remote_get( $url ); 
        
    $body = wp_remote_retrieve_body( $response );

    $data = json_decode( $body );
    
    echo 'Total Downloads: ' . $data->downloaded;

    return ob_get_clean();
    
}

add_shortcode( 'plugin-info-downloads', 'pinfo\do_downloads' );

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
            <div class="download">
                <a href="<?php echo $data->download_link ?>">Download</a>
            </div>
            
        </div>
        
    <?php return ob_get_clean();
    
}

add_shortcode( 'plugin-info-card', 'pinfo\do_plugin_card');