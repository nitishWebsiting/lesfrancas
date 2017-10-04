<?php

/**
 * Class searchComponents
 */
class searchComponents
{
    /**
     * @param $value
     * @return array|null|object
     */
    private function getPostby_Search($value)
    {
        global $wpdb;
        //$sql = "SELECT * FROM lfdvdm_posts WHERE post_title LIKE '%" . $value . "%'";
        $sql = "SELECT *
                FROM {$wpdb->prefix}posts
                WHERE
                    ( 
                        post_type = 'post' 
                        OR post_type = 'page'
                        OR post_type = 'q_and_r'
                    )
                    AND 
                    ( 
                        post_title LIKE '%" . $value . "%' 
                        OR post_content LIKE '%" . $value . "%'
                    )
                    AND 
                    ( 
                        post_status = 'publish' 
                        OR post_status = 'inherit' 
                    )
                    ORDER BY post_date DESC 
                ";
        $results = $wpdb->get_results($sql);
        if ($results) {
            return $results;
        }
    }

    /**
     * @param $value
     * @return string
     */
    public function getCountResult($value)
    {
        $count = 0;

        // Si des paramètres ont bien été rentrés dans le ?search de l'url
        if (isset($_GET['search'])) :

            // Récupère tout les post par titre
            $posts = $this->getPostby_Search($value);

            // Get the post type and the post status
            if($posts != NULL){
            foreach ($posts as $item) :
                $type = $item->post_type;
                $trash = $item->post_status;

                // If is page, post different of trash and inherit
                // Increase the count
                if ($type == 'page' || $type == 'post'):
                    if ($trash != 'trash' && $trash != 'inherit'):
                        $count++;
                    endif;
                endif;
            endforeach;
            }
        endif;

        // Display the number of search
        return '<p><strong>' . $count . '</strong> : Résultats trouvés</p>';
    }

    /**
     * @param $value
     */
    public function getResult($value)
    {
        // Retrieve all the post with the search
        $posts = $this->getPostby_Search($value);

        // if the posts is not null
        if ($posts !== null) :
            // Retrive the post_type, post_title, link and the post_status
            foreach ($posts as $item) :
                $type = $item->post_type;
                $title = $item->post_title;
                $link = $item->guid;
                $trash = $item->post_status;

                // If it's a page, post, not trash and not inherit
                if ($type == 'page' || $type == 'post'):
                    if ($trash != 'trash' && $trash != 'inherit'):
                        if($type == 'post'){
                            $type = 'article';
                        }
                        ?>
                        <div class="search-result">
                            <a href="<?= $link ?>">
                                <h1><?= $title ?></h1>
                            </a>
                            <p><?= ucfirst($type) ?></p>
                        </div>
                        <?php
                    endif;
                endif;
            endforeach;
        else:
            // If there is no post display 0 result find
            echo '<p class="erreur">0 Résultat trouvés</p>';
        endif;
    }

    /**
     * @param $searchPage
     */
    public function getForm($searchPage, $design = 0)
    {
        switch ($design) {
            case 1:
                ?>
                <div class="searchComponents design1">
                    <form role="search" action="<?php echo home_url() . $searchPage ?>" class="searchComponents__form"
                          method="get" data-previewsearch-url="/es.php?locale=fr_FR">
                        <input autocomplete="off" type="text" data-="" name="search"
                               value="<?php echo get_search_query() ?>"
                               placeholder="<?php echo esc_attr_x('Tapez votre recherche ici...', 'placeholder') ?>"
                               title="<?php echo esc_attr_x('Search for:', 'label') ?>"
                               class="searchComponents__input">

                        <input type="submit"
                               value="<?php echo esc_attr_x('Search', 'submit button') ?>"
                               class="searchComponents__submit"/>
                    </form>
                </div>
                <?php
                break;
            default:
                ?>
                <div class="searchComponents default">
                    <img src="<?= get_stylesheet_directory_uri() . '/dist/img/searchIcon.png' ?>"
                         alt="Search Icon"
                         class="searchComponents__icon">
                    <form role="search" action="<?php echo home_url() . $searchPage ?>" class="searchComponents__form"
                          method="get" data-previewsearch-url="/es.php?locale=fr_FR">
                        <input autocomplete="off" type="text" data-="" name="search"
                               value="<?php echo get_search_query() ?>"
                               placeholder="<?php echo esc_attr_x('Tapez votre recherche ici...', 'placeholder') ?>"
                               title="<?php echo esc_attr_x('Search for:', 'label') ?>"
                               class="searchComponents__input">

                        <input type="submit"
                               value="<?php echo esc_attr_x('Search', 'submit button') ?>"
                               class="searchComponents__submit"/>
                    </form>
                </div>
                <?php
        }
    }
}