<?php 

function ins_list_photos($atts , $content = null){

	$atts = shortcode_atts(array(
		'title' => 'instagrame photos',
		'count' => 20
	),$atts);

	$accessToken = esc_attr( get_option('access_token'));
	$appsimages = esc_attr( get_option('linked_photo'));
	$url = 'https://api.instagram.com/v1/users/self/media/recent?access_token='.$accessToken.'&count='.$atts["count"].'';
	$options = array('http' => array('user_agent' => $_SERVER['HTTP_USER_AGENT']));
	$context = stream_context_create($options);
	$resonse = file_get_contents($url,false,$context);
	$data    = json_decode($resonse)->data;
	if($appsimages){
	$output .='<div class="wrap-flex">';
	foreach ($data as $photos) {
		$output .= '
						<div class="ins">
							<a target=_blank href="'. $photos->link .'">
								<img src="'. $photos->images->standard_resolution->url .'">
							</a>
						</div>
					';
	}
	$output .='</div>';
	}else{
		$output .='';
	}
	return $output;
}

add_shortcode('insphoto','ins_list_photos');