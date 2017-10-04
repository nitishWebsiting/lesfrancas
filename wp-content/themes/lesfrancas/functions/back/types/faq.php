<?php
add_action( 'init', 'create_faq_type' );

function create_faq_type() {
    // Post type
    register_post_type( 'FAQ_post',
        array(
            'labels' => array(
                'name' => __( 'Foire aux questions' ),
                'singular_name' => __( 'Foire aux questions' )
            ),
            'public'            => true,
            'has_archive'       => true,
            'rewrite'           => array('slug' => 'faq_post'),
            'supports'          => ['title','thumbnail', 'page-attributes', 'editor'],
            'hierarchical'      => false
        )
    );
//    // taxonomy type
//    register_taxonomy(
//        'categoriePartenaire',
//        'partenaires',
//        array(
//            'label' => __( 'Categories' ),
//            'rewrite' => array( 'slug' => 'partenaires_category' ),
//            'hierarchical' => true,
//
//        )
//    );
}

