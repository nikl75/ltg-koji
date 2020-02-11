<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.
if (!get_field('holzh_beitragsbild_verbergen', $post->ID)) {
	echo '<div class="featured-image-container">';
		$tHeaders = get_uploaded_header_images();

		if (!is_random_header_image() && get_header_image()) {
			echo '
            <div class="featured-hero" style="background-image: url('. get_header_image() . '); background-size: cover; background-position:center;height:100%;"></div>';
		} elseif (is_random_header_image() && count($tHeaders) >= 1) {

			echo '	
						<div class="swiper-container swiper-featured-galerie featured-hero default"  role="banner">
				    		<div class="swiper-wrapper">';
			foreach ($tHeaders as $tHeader) {
				echo '		<div class="swiper-slide header-slide" style="background:url(' . $tHeader['url'] . ')"></div>';
			}
			echo '    	</div>';
			echo '		<div class="swiper-pagination"></div>';
			echo '  </div>';
		}
	echo '</div>';
}
