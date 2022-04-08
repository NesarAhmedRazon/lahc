<?php
/**
 * The main template file
 *
 */

get_header();
if ( is_home() ) {
    get_template_part( 'templates/home'); 
}else if(is_cart()){
	
}else{
    
}

get_footer();?>