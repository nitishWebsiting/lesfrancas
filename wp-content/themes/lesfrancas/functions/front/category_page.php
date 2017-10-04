<?php
/**
 * @return int
 * selected random int between 3 or 6
 */
/*function randomNqum($col = 3){
	if( $col == 6 ){
		$col = 3;
	}
	else{
		$numbers = [ 3, 6 ];
		$col = array_rand($numbers);
		$col = $numbers[$col];
	}
	return $col;
}
*/
/**
 * @return int
 * selected random int between 3 or 6
 */
function randomNum($key){

	$cols = [ 3, 6, 3, 6, 3, 3, 3, 3, 6 ];
	$key--;
	return $cols[ $key ];
}


/**
 * Ajax handler
 */
function ajax_handler(){
	$category = esc_html( $_POST['category'] );
	$offset = (int)esc_html( $_POST['numItems'] ) - 1;
	$articles = get_article_by_category($category, 'post', $offset );
    //vd($articles);

	$template = '';
	if( !empty( $articles ) )
	{
		foreach ($articles as $key => $article)
		{
		    $template .= '<div class="cree_cat_article col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding marginBottom-1">
		               		<section class="sectionPageFront category margin">';
		                        
		    $title = $article->post_title;
		    $date = date("d m", strtotime($article->post_date));
		                        
			$template .= '<a href="' . $article->guid . '" class="sectionPageFront__link">';
		    $template .= '<div class="sectionPageFront__content">';
		    $template .= '<img src=" '. get_the_post_thumbnail_url($article->ID, 'lesfrancas-post-thumbnail') .'" 
		    					alt="" class="sectionPageFront__img">';
		    $template .= '<div class="sectionPageFront__columnleft '. $category .'">';
		    $template .= '<span class="sectionPageFront__date">' . $date .'</span>';
		    $template .= '</div>';
		    $template .= '<p class="sectionPageFront__categorie">'. $title .'</p>';
		    $template .= '<a href="'. home_url() . '/contribution' .'" class="favoriteButton">';
		    $template .=  get_favorites_button($article->ID);
		    $template .= '</a></div></a><div class="cat '. $category .'"></div>';
		    $template .= '</section>';
		    $template .= '</div>';
		    $template .= '</div>';	
		}
	    wp_reset_postdata();
	    wp_send_json_success($template);	
	}
	else
	{
		$template .= '<div class="alert alert-warning">Ils n\'y as plus de contributions !</div>';
		wp_reset_postdata();
		wp_send_json_error($template);	
	}
}
add_action( 'wp_ajax_cree_get_category', 'ajax_handler' );
add_action( 'wp_ajax_nopriv_cree_get_category', 'ajax_handler' );