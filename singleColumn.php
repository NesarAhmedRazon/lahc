<?php
/*
Template Name: Single Column
*/
get_header(); ?>
<div class="main">
<div class="title_container"><?php the_title( '<h1>', '</h1>' ); ?></div>
		
<?php the_content();?>
<?php get_footer(); ?>