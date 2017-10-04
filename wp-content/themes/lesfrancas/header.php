<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Websiting
 * @subpackage Les Francas
 * @since Les Francas 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="header">
    <div class="header__head">
        <img src="<?= get_stylesheet_directory_uri() . '/dist/img/Burger.png' ?>" alt="logo" class="menu">

        <div class="search__container">
            <?php
            $searchComponents = new searchComponents();
            $searchComponents->getForm('/recherche-resultat');
            ?>
        </div>


        <h1 class="logo">
            <a href="/" class="logo__link">
                <span>Vivre ensemble</span>
                <?php
                //$logo = get_field('logo', 'options');
                $logo = logo_url();
                ?>
                <img src="<?= $logo ?>" alt="lesfrancas-logo" class="logo__img">
                <span>en République</span>
            </a>
        </h1>
        <?php
        $connect = getPagesById(182);
        $linkConnect = $connect->guid;
        ?>

        <div class="header__userWidget <?php if (is_user_logged_in()): ?>login<?php endif; ?> ">
            <?php
            // if the user is log display the code below
            if (is_user_logged_in()):
                ?>
                <a href="<?= home_url() . '/logout' ?>" class="userWidget__items">
                    <img src="<?= get_stylesheet_directory_uri() . '/dist/img/deconnexion.png' ?>" alt="logout"
                         class="logout">
                </a>
                <a href="<?= home_url() . '/contribution' ?>" class="userWidget__items">
                    <img src="<?= get_stylesheet_directory_uri() . '/dist/img/Laicite.png' ?>" alt="binder"
                         class="binder">
                </a>
                <a href="<?= home_url() . '/mon-classeur' ?>" class="userWidget__items">
                    <img src="<?= get_stylesheet_directory_uri() . '/dist/img/Classeur.png' ?>" alt="binder"
                         class="binder">
                </a>
                <a href="<?= $linkConnect ?>" class="userWidget__items--acount">
                    <?= um_user('profile_photo', 80); ?>
                    <span class="userWidget__email"><?= um_user('user_login', 80); ?></span>
                </a>
            <?php else: ?>
                <a href="<?= $linkConnect ?>" class="userWidget__items--acount">
                    <img src="<?= get_stylesheet_directory_uri() . '/dist/img/acount.png' ?>" alt="acount"
                         class="acount">
                </a>
            <?php endif; ?>
        </div>
    </div>
    <div class="header__content">
        <?php
        $text = get_field("header_text", "options");
        if ($text != null):
            ?>
            <p class="text"><?= $text ?></p>
            <?php
        else:
            ?>
            <p class="text">La plateforme d’échanges collaborative du Val-de-Marne</p>
            <?php
        endif;
        ?>
    </div>

    <!--Search Bar-->
    <div class="header__searchContainer">
        <div class="header__searchBar">
            <p class="search--interact">Rechercher</p>
            <?php
            $searchComponents = new searchComponents();
            $searchComponents->getForm('/recherche-resultat', 1);
            ?>
<!--            --><?php //get_search_form(); ?>
            <!--				<input type="search" class="inputSearch">-->
        </div>
        <div class="searchFilters">
            <div class="filter">
                <p class="sub thematique">Thématique</p>
            </div>
            <div class="filter">
                <p class="sub rubrique">Rubriques</p>
                <?php
                // Top Menu
                $args = [
                    'menu' => 'Second Menu',
                    'container_class' => 'rubriquesMenu'
                ];
                wp_nav_menu($args);
                ?>
            </div>

        </div>

    </div>

    <!--		Navigation-->
    <nav class="navigationPrincipal">
        <?php
        // Top Menu
        $args = [
            'menu' => 'Top Menu',
            'container_class' => 'thematiqueMenu',
            'menu_class' => 'thematiqueMenu__lists',
        ];
        wp_nav_menu($args);
        ?>
    </nav>
</header>