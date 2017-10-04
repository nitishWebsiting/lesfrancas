<?php
    /**
     * @return array|false
     * Get extra page
     */
    function get_extra_pages(){
        $args = array(
            'sort_order' => 'asc',
            'sort_column' => 'post_title',
            'hierarchical' => 1,
            'exclude' => '',
            'include' => [ 12 , 63 ],
            'meta_key' => '',
            'meta_value' => '',
            'authors' => '',
            'child_of' => 0,
            'parent' => -1,
            'exclude_tree' => '',
            'number' => '',
            'offset' => 0,
            'post_type' => 'page',
            'post_status' => 'publish'
        );
        return get_pages($args);
    }

    /**
     * @param $id
     * @return array|false
     * Get Pages by ID
     */
    function getPagesById($id){

        $args = array(
            'sort_order' => 'asc',
            'sort_column' => 'post_title',
            'hierarchical' => 1,
            'exclude' => '',
            'include' => $id,
            'meta_key' => '',
            'meta_value' => '',
            'authors' => '',
            'child_of' => 0,
            'parent' => -1,
            'exclude_tree' => '',
            'number' => '',
            'offset' => 0,
            'post_type' => 'page',
            'post_status' => 'publish'
        );
        $result = get_pages($args);
        if(count($result) >= 2){
            return $result;
        }
        return $result[0];
    }

    /**
     * @param $slug
     * @return mixed
     * Get the categorie by Slug
     */
    function getCategorieBySlug($slug){
       
        $args = [
            'slug' => $slug,
            'taxonomy' => 'category'
        ];
        //$categoriesResult = get_categories($args);
        $categoriesResult = get_terms($args);
        if(empty($categoriesResult)){
            return false;
        }
        if(count($categoriesResult) >= 2){
            foreach ($categoriesResult as $item){
                return $item;
            }
        }
        return $categoriesResult[0];
    }

    /**
     * @param $slug
     * @return array
     * Get the categories by the slug
     * where term_id equal term_id of categorie parent
     */
    function getCategorieBySlugCategorie($slug){
        $args = [
            'slug' => $slug
        ];
        $categoriesResult = get_categories($args);
        if( count( $categoriesResult ) >= 2 ){
            foreach ($categoriesResult as $item) {
                return $item;
            }
        }
        return $categoriesResult[0];
    }

    /**
     * @return array
     * Get the categorie they do not have parent
     */
    function getParentCategories(){
        $args = [
            'parent' => 0
        ];
        $categoriesResult = get_categories($args);
        return $categoriesResult;
    }

    /**
     * @param $article_id
     * @return string
     * Get parent category by article id
     */
    function get_parent_category($article_id){
        $categories = get_the_category($article_id );
        $cree_category = '';

        foreach ($categories as $category) {
            if( $category->parent == 0 && $category->slug != "non-classe"){
                $cree_category = $category;
            }
        }

        return $cree_category;
    }

    /**
     * @param $id
     * @return array
     * Get the child categorie of an parent categorie
     */
    function getChildCategories($id, $slug = ''){
        $args = [
            'child_of' => $id,
            'hide_empty' => false,
            'slug' => $slug
        ];
        $categoriesResult = get_categories($args);
        if(count($categoriesResult) > 1){
            return $categoriesResult;
        }
        return $categoriesResult[0];
    }

    /**
     * @param $numberposts
     * @return array
     * Get the last $numberposts articles
     */
    function get_last_articles($numberposts, $category = ''){
        $args = array(
            'numberposts' => $numberposts,
            'category' => $category
        );
        return get_posts( $args );
    }

    /**
     * @param string $post_type
     * @param string $name
     * @return boolean
     * Get article by name
     */
    function get_posts_by_name( $post_type = 'post', $name ){
        $args = [
            'posts_per_page'   => 7,
            'offset'           => 0,
            'orderby'          => 'date',
            'order'            => 'DESC',
            'include'          => '',
            'exclude'          => '',
            'meta_key'         => '',
            'meta_value'       => '',
            'post_type'        => $post_type,
            'post_title'        => $post_title,
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
     * @param $category
     * @return array
     * Get article by category
     */
    function get_article_by_category( $category, $post_type = 'post', $offset = 0 ){
        $args = [
            'posts_per_page'   => 10,
            'offset'           => $offset,
            'category'         => $category,
            'orderby'          => 'date',
            'order'            => 'DESC',
            'include'          => '',
            'exclude'          => '',
            'meta_key'         => '',
            'meta_value'       => '',
            'post_type'        => $post_type,
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
     * @param $category
     * @param string $post_type
     * @return array
     */
     function get_article_by_term($categoriePost, $terms, $post_type = 'post' ){
         $args = [
             'posts_per_page'   => 7,
             'offset'           => 0,
             'tax_query' =>     [
                 [
                     'taxonomy' => $categoriePost,
                     'field'    => 'slug',
                     'terms'    => $terms
                 ]
             ],
             'orderby'          => 'date',
             'order'            => 'DESC',
             'include'          => '',
             'exclude'          => '',
             'meta_key'         => '',
             'meta_value'       => '',
             'post_type'        => $post_type,
             'post_mime_type'   => '',
             'post_parent'      => '',
             'author'       => '',
             'author_name'      => '',
             'post_status'      => 'publish',
             'suppress_filters' => true
         ];
         $posts_array = get_posts( $args );
         if(count($posts_array) <= 1){
             return $posts_array[0];
         }
         return $posts_array;
     }


    /**
     * @param int $author_id
     * @return array
     * Get articles by author id
     */
    function get_articles_by_author_id( $author_id, $post_status = 'publish', $numberPost = -1 ){
        $args = [
            'posts_per_page'   => $numberPost,
            'offset'           => 0,
            'orderby'          => 'date',
            'order'            => 'DESC',
            'post_type'        => 'post',
            'author'	   => $author_id,
            'post_status'      => $post_status,
            'suppress_filters' => true
        ];
        $posts_array = get_posts( $args );
        return $posts_array;
    }


    function get_articles_by_id(){
        $args = [
            'posts_per_page'   => 10,
            'offset'           => 0,
            'category'         => $category,
            'orderby'          => 'date',
            'order'            => 'DESC',
            'include'          => '',
            'exclude'          => '',
            'meta_key'         => '',
            'meta_value'       => '',
            'post_type'        => $post_type,
            'post_mime_type'   => '',
            'post_parent'      => '',
            'auzthor'       => '',
            'author_name'      => '',
            'post_status'      => 'publish',
            'suppress_filters' => true
        ];
        $articles = get_posts( $args );
        return $articles;
    }


    /**
     * @param $value
     * @return array|null|object
     */
    function getPostbyTitleForSearch( $value ){
        global $wpdb;
        $sql = "SELECT * FROM lfdvdm_posts WHERE post_title LIKE '%" . $value . "%'";
        $results = $wpdb->get_results($sql);
        if ($results) {
            return $results;
        }
    }

    /**
     * @param $value
     * @return string
     * Returns current user avatar
     */
    function getUserAvatarById( $user_id ){
        global $ultimatemember;
        // Set user ID
        $ultimatemember->user->set( $user_id );

        $avatar_uri = um_get_avatar_uri( um_profile('profile_photo'), 32 );
        if( !$avatar_uri ){
            $avatar_uri = um_get_default_avatar_uri();
        }
        return $avatar_uri;
    }