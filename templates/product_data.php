<div class="row pkg_table table-gold mb-lg-4 mb-4">
    <div class="col-lg-12 text-center t_title">
        STANDARD PACKAGES
    </div>
    <?php 
	$the_query = new WP_Query( array(
	        'post_type' => 'product',
	        'meta_key' => 'sequence', 
	        'orderby' => 'meta_value_num', 
	        'order' => 'ASC') 
	    );
	if( $the_query->have_posts() ) : while( $the_query->have_posts() ) : $the_query->the_post(); 

		$ids = get_the_ID();
		$hookah = get_post_meta($ids, 'hookah_count', true);
		$hours = get_post_meta($ids, 'hours_count', true);
		$server = get_post_meta($ids, 'server_count', true);
		$price = get_post_meta($ids, 'product_price', true);


		?>

    <div class="col-lg-4 col-sm-12 p-0 pkg text-center">
        <div class="p_title"><?php echo get_the_title( $ids ); ?></div>
        <div class="p_info"><?php echo $hookah; ?> HOOKAHS</div>
        <div class="p_info"><?php echo $hours; ?> HOURS</div>
        <?php if(is_super_admin()){ ?><div class="p_info"><?php echo $server; ?> SERVER</div><?php } ?>
        <div class="p_price"><?php echo get_woocommerce_currency_symbol()." ".money_format('%(#10n', $price); ?></div>
    </div>

    <?php
	endwhile; endif; wp_reset_query();	
	 ?>
</div>