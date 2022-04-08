<?php 

//new Post Type: Product.
/*
add_action( 'init', 'lahc_product' );

function lahc_product() {
	$labels = array(
		'name'               => _x( 'Product', 'post type general name' ),
		'singular_name'      => _x( 'Product', 'post type singular name' ),
		'menu_name'          => _x( 'Product', 'admin menu' ),
		'name_admin_bar'     => _x( 'Product', 'add new on admin bar' ),
		'add_new'            => _x( 'Add Product', 'eandf' ),
		'add_new_item'       => __( 'Add New Product' ),
		'new_item'           => __( 'Add New' ),
		'edit_item'          => __( 'Edit Product' ),
		'view_item'          => __( 'View' ),
		'all_items'          => __( 'All Product' ),
		'search_items'       => __( 'Search in all product:' ),
		'parent_item_colon'  => __( 'Parent Product:' ),
		'not_found'          => __( 'No Product found' ),
		'not_found_in_trash' => __( 'No Product found in Trash.' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'menu_icon'          => 'dashicons-products',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'product' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 15,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'          => array( 'product-type' )
	);

	register_post_type( 'product', $args );
}
*/
add_theme_support('woocommerce');
function product_icon_css() {
  echo '<style>
    .dashicons-products:before, #menu-posts-product .wp-menu-name{
      color:#fed05b!important;
    } 
  </style>';
}
add_action('admin_head', 'product_icon_css');



function add_datas()
{    
        add_meta_box(
            'product_data',           // Unique ID
            'Product Data',  // Box title
            'product_metas',  // Content callback, must be of type callable
            'product',              // Post type
            'side'
        );    
}
add_action('add_meta_boxes', 'add_datas');




function product_metas($post){ 
	echo '<div class="row">';
	dropdown_html($post,'Number of Hookah',6,'HOOKAHS','hookah_count');
	dropdown_html($post,'Book for Hours',6,'Hours','hours_count');
	dropdown_html($post,'Available Server',2,'SERVER','server_count');
	dropdown_html($post,'FRUIT HEADS',array('no','yes'),'','fruit_heads');
	input_html($post,'Price of Product','Number only','product_price');
	input_html($post,'Booking fee','"10%" or "150"','booking_fee');
	dropdown_html($post,'FrontEnd Place',3,'','sequence');

	echo "</div>";
}

function update_data($post_id){
	meta_save($post_id, 'hookah_count');
	meta_save($post_id, 'hours_count');
	meta_save($post_id, 'server_count');
	meta_save($post_id, 'fruit_heads');
	meta_save($post_id, 'product_price');
	meta_save($post_id, 'booking_fee');
	meta_save($post_id, 'sequence');
}
add_action('save_post', 'update_data');



function input_html($post,$label="",$placeholder="",$caller_id="")
{
	$val = get_post_meta($post->ID, $caller_id, true);
	if(!empty($val)){$value= $val;}
    
    echo '<div class="col-2 misc-pub-section">
	    	<label for="'.$caller_id.'">'.$label.'</label> 
		    <input type="text" name="'.$caller_id.'" id="'.$caller_id.'" class="form-control" placeholder=\''.$placeholder.'\' value="'.$value.'">
		</div>';


}


function dropdown_html($post,$label="",$count="",$text="",$caller_id="")  // Dopdown Html
{
	
	$value = get_post_meta($post->ID, $caller_id, true);
	
     echo '<div class="col-2 misc-pub-section">
	    	<label for="'.$caller_id.'">'.$label.'</label> 
		    <select name="'.$caller_id.'" id="'.$caller_id.'" class="custom-select" >
		    	<option value="" selected disabled>Select</option>'; 
		    
		    	if(is_array($count)){
		    		foreach ($count as $val) {
					  echo '<option value="'.$val.'" '.selected($value,$val,false).'>'.$val.' '.$text.'</option>';
					  
					}
		    	}else{
		    		for ($i=1; $i <= $count; $i++) {
		    		echo '<option value="'.$i.'" '.selected($value,$i,false).'>'.$i.' '.$text.'</option>';
		    	}
		    		var_dump('not array');
		    	}

		    echo '</select>
		</div>';
}


function meta_save($post_id, $caller_id="")  //saving meta box
{

    if (array_key_exists($caller_id, $_POST)) {
        update_post_meta(
            $post_id,
            $caller_id,
            $_POST[$caller_id]
        );
    }
}

