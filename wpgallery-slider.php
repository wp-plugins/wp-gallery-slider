<?php
/*
Plugin Name: WP Gallery Slider
Plugin URI: http://tubentertain.com/wpgallery-slider/
Description: The plugin automatically add the Highslide onclick="return hs.expand(this);" to linked images  in a post, focusing on the wp-gallery shorcode. The required HighslideJS  files are Already Added, no need to  worry about the highslideJS files. Just Activate the plugin. 
Create your WP-Gallery as usual,  Go to the front end and click on wp-gallery Thumbnails to see it working.
Author: ShapCyber
Author URI: http://tubentertain.com/wpgalleryslider/
Version: 1.0
*/
//future usage
function wpgalleryslider_activation() {}


// i use jquery to grab the caption
if ( !function_exists("wpgallery_jquery_enqueue") ){
function wpgallery_jquery_enqueue() {
 wp_enqueue_script("jquery");
}
}
add_action("wp_enqueue_scripts", "wpgallery_jquery_enqueue");
//=============
add_action("wp_enqueue_scripts", "wpgallery_slider_scripts");
function wpgallery_slider_scripts() {

wp_register_script("wpgallery_slider_js_config",plugins_url("js/wpgalleryslider.min.js", __FILE__) ,array("jquery"),  false,  false);
//wp_register_script("easingEquationsJS",plugins_url("js/easing_equations.js", __FILE__) ,  false,  false);
wp_register_style("wpslideCss",plugins_url(  'css/wpslider.css', __FILE__) );
//if you already using font-awesome otherwise uncomment
wp_register_style("wpfontCss",plugins_url(  'css/font-awesome.css', __FILE__) );
//================================================

wp_enqueue_script( "wpgallery_slider_js_config" );
//wp_enqueue_script( "easingEquationsJS" );
wp_enqueue_style( "wpslideCss" );
wp_enqueue_style( "wpfontCss" );
  }
  
if (!function_exists('highslideAdd')) {	
		function highslideAddFunc($content) {
    		global $post;
			$pattern = "/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
			$replacement = '<a$1href=$2$3.$4$5 class="highslide-image" onclick="return hs.expand(this);"$6>$7</a>';
			$content = preg_replace($pattern, $replacement, $content);
			return $content;
		}
		}

add_filter('the_content', 'highslideAddFunc');
?>