<?php
/**
 * Create q_and_r type
 */
add_action( 'init', 'create_q_and_r_type' );

function create_q_and_r_type() {
	// Post type
	register_post_type( 'q_and_r',
	    array(
	      'labels' => array(
	        'name' => __( 'Q/R \'s' ),
	        'singular_name' => __( 'q_and_r' )
	      ),
	      'public' => true,
	      'has_archive' => true,
	      'rewrite' => array('slug' => 'q_and_rs'),
	      'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' )
	      //'supports' => array( 'title' )
	    )
	);

	// taxonomy type
	register_taxonomy(
		'category',
		['q_and_r', 'post'],
		array(
			'label' => __( 'Categories' ),
			'rewrite' => array( 'slug' => 'category' ),
			'hierarchical' => true,

		)
	);
}



/**
 * Get post by category
 */
function get_posts_by_category( $post_type, $category ){
    vd($category);

    $args = [
        'posts_per_page'   => 7,
        'offset'           => 0,
        //'category'         => $category,
        'category_name'    => $category,
        'orderby'          => 'date',
        'order'            => 'DESC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'post',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'author'       => '',
        'author_name'      => '',
        'post_status'      => 'publish',
        'suppress_filters' => true 
    ];
    $posts_array = get_posts( $args );
    return $posts_array;
}



/**
 * Get list of post
 */
function cree_last_q_and_rs($numberposts = false/*, $category = false*/){
    global $wpdb;
	/*$args = array(
		'numberposts' 		=> $numberposts,
        'post_type'       	=> 'q_and_r',

	);
	return get_posts( $args );*/
	
    // Result of the query search
    $sql = "SELECT *
            FROM {$wpdb->prefix}posts
            WHERE
                ( 
                    post_type = 'q_and_r'
                )
                AND 
                ( 
                    post_content != ''
                )
                AND 
                ( 
                    post_status = 'publish'
                )
            ORDER BY post_modified DESC
            ";
    if( $numberposts )
    {
   		$sql .= "LIMIT " . $numberposts;
    }
    return $wpdb->get_results($sql);

}

/**
 * Create a question
 */
//function cree_ask_question() {
//
//	global $current_user;
//
//    $error = '';
//	$message = esc_html( $_POST['message'] );
//	$categorie = esc_html( $_POST['categorie'] );
//
//	$unicity = get_page_by_title( $message, $output = OBJECT, $post_type = 'q_and_r' );
//	//var_dump($unicity);
//	//die();
//    // Check if the message is long enough
//    if( strlen( $message ) < 10 || strlen( $message ) > 255 ){
//    	$status = 'danger';
//        $error = 'Le nombre de caractère requis est de 10';
//    }
//    // Check if the title already exist
//    elseif( $unicity ){
//    	$status = 'warning';
//        $error = 'Cette question a déjà été posée. Nous vous invitons à regarder dans <a href="/qr-reponses"> les réponses</a>';
//    }
//
//    if( !$error ){
//		$my_post = array(
//		    'post_title'    => $message,
//		    'post_content'  => '',
//		    'post_status'   => 'publish',
//			//'post_author'   => $current_user->data->ID ? $current_user->data->ID : 1,
//		    'post_category' => [$categorie],
//		    'post_type' => 'q_and_r'
//		);
//
//		// Create new post
//        $newPost = wp_insert_post( $my_post );
//
//        if( $newPost ){
//        	$message = 'Votre question a été envoyé. Vous retrouvez votre réponse bientôt dans<a href="/qr-reponses"> les réponses</a>';
//        	cree_flash( 'success', $message, '/qr-questions' );
//        }
//	}
//	else{
//		cree_flash( $status, $error, '/qr-questions', $_POST );
//	}
//}

//add_action( 'post_action_ask_question', 'cree_ask_question' );
//add_action( 'admin_post_ask_question', 'cree_ask_question' );