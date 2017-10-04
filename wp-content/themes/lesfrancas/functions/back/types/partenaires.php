<?php
add_action( 'init', 'create_partenaires_type' );

function create_partenaires_type() {
    // Post type
    register_post_type( 'partenaires',
        array(
            'labels' => array(
                'name' => __( 'Partenaires' ),
                'singular_name' => __( 'partenaires' )
            ),
            'public'            => true,
            'has_archive'       => true,
            'rewrite'           => array('slug' => 'partenaires'),
            'supports'          => ['title','thumbnail', 'page-attributes', 'editor'],
            'hierarchical'      => false
        )
    );
    // taxonomy type
    register_taxonomy(
        'categoriePartenaire',
        'partenaires',
        array(
            'label' => __( 'Categories' ),
            'rewrite' => array( 'slug' => 'partenaires_category' ),
            'hierarchical' => true,

        )
    );
}

