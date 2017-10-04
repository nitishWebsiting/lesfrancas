<?php get_header(); ?>
<?php
/**
 * Template Name: Nombres de contributions
 */
?>

<?php
redirect_if_not_logged('/login');
$post_author = get_articles_by_author_id($current_user->ID, ['publish']);
//var_dump($post_author);
// Retrieve the number of contributions
$contributions = get_articles_by_author_id( $current_user->ID, ['publish'] );
//var_dump($contributions);
$numberOfContribution = count($contributions);

// Retrieve the number of pending contributions
$pending_contributions = get_articles_by_author_id( $current_user->ID, ['pending', 'inherit'] );
$numberOfPendingContribution = count($pending_contributions);

// Number of favorites posts
$nb_post_favorites = get_user_favorites_count($current_user->ID);
$article_ids = get_user_favorites($current_user->ID);
// get the post match by the $article_ids
$args = [
    'numberposts' => '',
    'post__in' => $article_ids,
];
$articles = get_posts($args);

if ($_GET) :
    $success = htmlspecialchars($_GET['contributions']);
    //if($_GET['contributions']){
    $articles = $contributions;
    //}
endif;

// Get Classeur and the number of contributions pages
$classeurPage = getPagesById(47);
$link_classeurPage = get_the_permalink($classeurPage->ID);

$contributionPage = getPagesById($post->ID);
$linkContribution = get_the_permalink($contributionPage->ID);
?>


    <div class="linkContainer">
        <a href="<?= home_url().'/nombre-de-contributions' ?>" class="linkClasseur"><?= $numberOfContribution ?> contributions</a>
        <a href="<?= $link_classeurPage ?>" class="linkClasseur arrow"><?= $nb_post_favorites; ?> articles classés</a>
        <a href="<?= home_url().'/contributions-en-attente' ?>" class="linkClasseur"><?= $numberOfPendingContribution ?> contributions en attente</a>
    </div>
    <div class="container-fluid no-padding marginTop-3">
        <div class="row no-margin">
            <?php
            if ($numberOfContribution > 0):
                foreach ($post_author as $article) :
                    $categorie = get_parent_category($article->ID);
                    $categorie_name = $categorie->name;
                    $categorie_slug = $categorie->slug;
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 no-padding marginBottom-1">
                        <section class="sectionPageFront margin">
                            <?php
                            $title = $article->post_title;
                            $date = date("d m", strtotime($article->post_date));
                            ?>
                            <div class="sectionPageFront__content">
                                <a href="<?= home_url().'/contribution' ?>" class="favoriteButton">
                                    <?= get_favorites_button($article->ID) ?>
                                </a>
                                <a href="<?= $article->guid ?>" class="sectionPageFront__link">
                                    <img src="<?= get_the_post_thumbnail_url(
                                        $article->ID,
                                        'lesfrancas-post-thumbnail'
                                    ) ?>"
                                         alt="" class="sectionPageFront__img">
                                    <div class="sectionPageFront__columnleft <?= $categorie_slug ?>">
                                        <span class="sectionPageFront__date"></span>
                                    </div>

                                    <p class="sectionPageFront__categorie"><?= $title ?></p>
                                </a>
                            </div>
                            <div class="cat <?= $categorie_slug ?>"></div>
                        </section>
                    </div>
                    <?php
                endforeach;
            else:
                ?>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding marginBottom-1">
                    <p class="alert alert-warning">Vous n'avez pas encore de contribution <a href="<?= home_url().'/contribution' ?>">contribuez ?</a></p>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>

<?php get_footer(); ?>