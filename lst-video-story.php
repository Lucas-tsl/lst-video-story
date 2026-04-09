<?php
/**
 * Plugin Name: LST Video Story Bubble
 * Plugin URI:  https://github.com/Lucas-tsl/lst-video-story
 * Description: Add interactive Instagram-style video stories to WooCommerce.
 * Version:     1.0.1
 * Author:      Lucas Trotesiel
 * Author URI:  https://github.com/Lucas-tsl
 * License:     GPLv2 or later
 * Text Domain: lst-video-story-bubble
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Sécurité : empêche l'accès direct au fichier
}

/**
 * 1. Chargement PROPRE des assets depuis le dossier /assets/
 */
function lst_enqueue_assets() {
    // CSS
    wp_enqueue_style( 
        'lst-story-style', 
        plugin_dir_url( __FILE__ ) . 'assets/css/style.css', 
        array(), 
        '1.0.1' 
    );

    // JS
    wp_enqueue_script( 
        'lst-story-script', 
        plugin_dir_url( __FILE__ ) . 'assets/js/script.js', 
        array(), 
        '1.0.1', 
        true 
    );
}
add_action( 'wp_enqueue_scripts', 'lst_enqueue_assets' );

/**
 * 2. Shortcode [bulle_video_finale]
 */
function lst_video_story_shortcode() {
    // Vérification de la dépendance à ACF
    if ( ! function_exists( 'get_field' ) ) {
        return '<!-- LST Video Story: Advanced Custom Fields is required -->';
    }

    global $product;
    if ( ! $product ) return '';

    $product_id = $product->get_id();
    $stories    = array();

    for ( $i = 1; $i <= 4; $i++ ) {
        $yt_input        = get_field( 'id_video_youtube_' . $i );
        $preview_mp4_url = get_field( 'apercu_video_bulle_' . $i );
        $label_raw       = get_field( 'label_bulle_' . $i );
        $label           = $label_raw ? $label_raw : __( 'Story', 'lst-video-story-bubble' );

        if ( $yt_input && $preview_mp4_url ) {
            // Extraction ID Youtube sécurisée
            if ( preg_match( '%(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?|shorts)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $yt_input, $match ) ) {
                $video_id = $match[1];
            } else {
                $video_id = $yt_input;
            }

            if ( ! empty( $video_id ) ) {
                $stories[] = array(
                    'video_id' => $video_id,
                    'preview'  => $preview_mp4_url,
                    'label'    => $label,
                );
            }
        }
    }

    if ( empty( $stories ) ) {
        return '';
    }

    ob_start(); ?>
    <div class="lst-wrapper-ultra">
        <div class="lst-row-ultra" id="lst-row">
            <?php foreach ( $stories as $story ) : ?>
                <div class="lst-container-ultra is-loading" 
                     data-video-id="<?php echo esc_attr( $story['video_id'] ); ?>" 
                     onclick="lstLaunchStory('<?php echo esc_js( $story['video_id'] ); ?>', '<?php echo esc_js( $story['label'] ); ?>', '<?php echo esc_js( $product_id ); ?>')">
                    
                    <div class="lst-circle-ultra" id="circle-<?php echo esc_attr( $story['video_id'] ); ?>">
                        <video class="lst-preview-video-ultra"
                               muted
                               loop
                               autoplay
                               playsinline
                               preload="metadata"
                               aria-label="<?php echo esc_attr( sprintf( __( 'Aperçu vidéo %s', 'lst-video-story-bubble' ), $story['label'] ) ); ?>"
                               onloadeddata="this.parentElement.parentElement.classList.remove('is-loading')">
                            <source src="<?php echo esc_url( $story['preview'] ); ?>" type="video/mp4">
                        </video>
                        <div class="lst-play-ultra">
                            <span class="lst-play-icon" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="lst-label-ultra"><?php echo esc_html( $story['label'] ); ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php 
    $output = ob_get_clean();
    // Nettoyage des balises <p> parasites de WordPress
    return preg_replace( array( '/<p[^>]*>/', '/<\/p>/', '/<br[^>]*>/' ), '', $output );
}
add_shortcode( 'bulle_video_finale', 'lst_video_story_shortcode' );

/**
 * 3. Modal Footer avec boucliers anti-fuite
 */
function lst_video_story_footer() {
    ?>
    <div id="storyModal" class="lst-modal-overlay" style="display:none;" onclick="lstCloseStoryModal()">
        <div class="lst-modal-content" onclick="event.stopPropagation()">
            <button class="lst-modal-close" onclick="lstCloseStoryModal()">&times;</button>
            <div class="lst-video-container">
                <iframe id="storyPlayer" src="" frameborder="0" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>
                <div class="lst-guard-top"></div>
                <div class="lst-guard-bottom"></div>
            </div>
        </div>
    </div>
    <?php
}
add_action( 'wp_footer', 'lst_video_story_footer' );
