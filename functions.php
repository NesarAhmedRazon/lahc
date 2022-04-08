<?php
$folder =   get_template_directory() . '/inc/';
$files = glob($folder."*.php"); // return array files
add_theme_support('woocommerce');
 foreach($files as $phpFile){   
     require_once("$phpFile"); 
}
include_once(__DIR__."/inc/settings.php"); // Add settings system

/**
 * Register our sidebars and widgetized areas.
 *
 */
 
 function fw_style() {
	wp_enqueue_style( 'min-style', get_stylesheet_directory_uri().'/style.min.css', false );
}
add_action( 'wp_enqueue_scripts', 'fw_style' );

function fw_widgets_init() {

	register_sidebar( array(
		'name'          => 'REQUEST A QUOTE',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="request_a_quote">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'fw_widgets_init' );

function price_widgets_init() {

	register_sidebar( array(
		'name'          => 'CHOOSE A PACKAGE:',
		'id'            => 'home_left_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="choose_a_package">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'price_widgets_init' );
function place_widgets_init() {

	register_sidebar( array(
		'name'          => 'PLACES WE LIKE',
		'id'            => 'place',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="place_we_like">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'place_widgets_init' );
function event_widgets_init() {

	register_sidebar( array(
		'name'          => 'EVENT REEL',
		'id'            => 'event_reel',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="event_reel">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'event_widgets_init' );
function popup_widgets_init() {

	register_sidebar( array(
		'name'          => 'Mailing List Popup',
		'id'            => 'popupwindow',
		'before_widget' => '<div class="popup_data">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="popup_title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'popup_widgets_init' );

// Add Shortcode - ROW
function row_sc( $atts , $content = null ) {

	// Attributes
	$atts = shortcode_atts( array(
        'padding' => '0',
        'color' => '',
        'bg' => '',        
        'font-size' => '',
   	 ), $atts );
   	 
	return '<div class="row" style="background-color:'.$atts['bg'].';padding:'.$atts['padding'].';color:'.$atts['color'].';font-size:'.$atts['font-size'].'">'.do_shortcode($content).'</div>';
}
add_shortcode( 'row', 'row_sc' );

// Add Shortcode - Column
function col_sc( $atts , $content = null ) {

	// Attributes
	$atts = shortcode_atts( array(
        'align' => 'left',
        'devider' => '1',
        'pad-left' => '0',
        'pad-right' => '0',
        'bg' => '',     
   	 ), $atts );
   	 
	return '<div class="col" style="width:'.(100/$atts['devider']).'%;text-align:'.$atts['align'].';padding-left:'.$atts['pad-left'].';padding-right:'.$atts['pad-right'].';background-color:'.$atts['bg'].';">'.do_shortcode($content).'</div>';
}
add_shortcode( 'col', 'col_sc' );
//require get_template_directory() . '/inc/slider.php'; 



add_action('wp_ajax_nopriv_mailler', 'mailler');
add_action('wp_ajax_mailler', 'mailler');

function mailler(){
	$to = "ehsaan@mesghali.studio";
    $reTo = sanitize_email(trim($_POST['email'])); 
    $name = sanitize_text_field(trim($_POST["name"]));
	$phone = sanitize_text_field(trim($_POST["phone"]));
	$addr = sanitize_text_field(trim($_POST["address"]));
	$time = sanitize_text_field(trim($_POST["time"]));
	$packid = sanitize_text_field(trim($_POST["pack"]));
	if($packid != 'cus'){
		$pack = esc_html( get_the_title($packid));
	}else{
		$pack = esc_html($packid);
	}
	

	$subject = "LAHC Booking Request: ".$name;

	$message = makeMail($name,$reTo,$phone,$addr,$time,$pack);

	$headers = array('From: LAHC Booking<lahc@losangeleshookahcatering.com>','Reply-To: '.$reTo,'Content-Type: text/html; charset=UTF-8');
    if( wp_mail($to, $subject, $message, $headers) ){
        echo 'success';
    } else {
        echo 'failed';
    }
	die(); // never forget to die() your AJAX reuqests

}

function makeMail($name,$email,$phone,$addr,$time,$pack){

	
	$mailtemp = '<table style="border-collapse:collapse;border-spacing:0;margin: 0 auto;border-color: transparent;"><thead style=" "><tr><th colspan="2" style=" font-size: 2em; text-transform: uppercase; color: #ffcf5b; background-color: #000; padding: 1em 2em; ">'.get_bloginfo( 'name' ).'</th></tr></thead><tbody style=" "><tr><td style=" text-align: right; font-weight: 700; padding-right: 1em; font-size: 1.3em; padding: 1em; border-bottom: 1px solid #eee; color: #000; border-left: 1px solid #eee; ">Name:</td><td style=" text-align: left; padding-right: 1em; font-size: 1.1em; padding: 1em; border-bottom: 1px solid #eee; color: #000; border-right: 1px solid #eee; ">'.$name.'</td></tr><tr><td style=" text-align: right; font-weight: 700; padding-right: 1em; font-size: 1.3em; padding: 1em; border-bottom: 1px solid #eee; color: #000; border-left: 1px solid #eee; ">Email:</td><td style=" text-align: left; padding-right: 1em; font-size: 1.1em; padding: 1em; border-bottom: 1px solid #eee; color: #000; border-right: 1px solid #eee; ">'.$email.'</td></tr><tr><td style=" text-align: right; font-weight: 700; padding-right: 1em; font-size: 1.3em; padding: 1em; border-bottom: 1px solid #eee; color: #000; border-left: 1px solid #eee; ">Phone Number: </td><td style=" text-align: left; padding-right: 1em; font-size: 1.1em; padding: 1em; border-bottom: 1px solid #eee; color: #000; border-right: 1px solid #eee; ">'.$phone.'</td></tr><tr><td style=" text-align: right; font-weight: 700; padding-right: 1em; font-size: 1.3em; padding: 1em; border-bottom: 1px solid #eee; color: #000; border-left: 1px solid #eee; ">Address:</td><td style=" text-align: left; padding-right: 1em; font-size: 1.1em; padding: 1em; border-bottom: 1px solid #eee; color: #000; border-right: 1px solid #eee; ">'.$addr.'</td></tr><tr><td style=" text-align: right; font-weight: 700; padding-right: 1em; font-size: 1.3em; padding: 1em; border-bottom: 1px solid #eee; color: #000; border-left: 1px solid #eee; ">Time of Booking:</td><td style=" text-align: left; padding-right: 1em; font-size: 1.1em; padding: 1em; border-bottom: 1px solid #eee; color: #000; border-right: 1px solid #eee; ">'.$time.'</td></tr><tr><td style=" text-align: right; font-weight: 700; padding-right: 1em; font-size: 1.3em; padding: 1em; border-bottom: 1px solid #eee; color: #000; border-left: 1px solid #eee; ">Package:</td><td style=" text-align: left; padding-right: 1em; font-size: 1.1em; padding: 1em; border-bottom: 1px solid #eee; color: #000; border-right: 1px solid #eee; ">'.$pack.'</td></tr></tbody></table>';
	return $mailtemp;
}