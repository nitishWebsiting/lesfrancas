<?php
/**
 * Template Name: Mon Classeur
 */
redirect_if_not_logged('/login');
get_header();
?>

<?php
// Retrieve the number of contribution
$contributions = get_articles_by_author_id($current_user->ID);
$numberOfContribution = count($contributions);

// Number of favorites posts
$nb_post_favorites = get_user_favorites_count($current_user->ID);
$article_ids = get_user_favorites($current_user->ID);

// Retrieve the number of pending contributions
$pending_contributions = get_articles_by_author_id($current_user->ID, ['pending', 'inherit']);
$numberOfPendingContribution = count($pending_contributions);
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
$classeurPage = getPagesById($post->ID);
$link_classeurPage = get_the_permalink($classeurPage->ID);

$contributionPage = getPagesById(447);
$contributionPage = get_the_permalink($contributionPage->ID);

if($nb_post_favorites == 1){
   $article = "article classé";
}else{
      $article = "articles classés";
}
?>
<div class="row">
    <div class="col-lg-offset-2 col-lg-12">
        <div class="linkContainer">
            <a href="<?= $contributionPage ?>" class="first linkClasseur"><?= $numberOfContribution ?> contributions</a>
            <a href="<?= $link_classeurPage ?>" class="linkClasseur arrow"><?= $nb_post_favorites." ".$article; ?></a>
            <a href="<?= home_url() . '/contributions-en-attente' ?>" class="linkClasseur"><?= $numberOfPendingContribution ?> contributions en attente</a>
        </div>
    </div>
</div>
<div class="container-fluid no-padding">
    <div class="row no-margin">

        <?php
        if ($nb_post_favorites > 0):
            foreach ($articles as $key => $article) :
                $categorie = get_parent_category($article->ID);
                $categorie_name = $categorie->name;
                $categorie_slug = $categorie->slug;
                ?>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding marginBottom-1">
                    <section class="sectionPageFront margin">
                        <?php
                        $title = $article->post_title;
                        $date = date("d m", strtotime($article->post_date));
                        ?>
                        <div class="sectionPageFront__content">
                            <a href="<?= home_url() . '/contribution' ?>" class="favoriteButton">
                                <?= get_favorites_button($article->ID) ?>
                            </a>
                            <a href="<?= $article->guid ?>" class="sectionPageFront__link">
                                <img src="<?=
                                get_the_post_thumbnail_url(
                                        $article->ID, 'lesfrancas-post-thumbnail'
                                )
                                ?>"
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
            <div class=" col-lg-offset-2 col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding marginBottom-1">
                <p>Vous avez 0 article classé</p>
                <p>Pour vous constituer un classeur personnel, cliquez sur l'icône <img src="http://lesfrancas.dev-websiting.fr/wp-content/themes/lesfrancas/dist/img/Classeur.png"> présente sur tous les articles qui vous intéressent.</p>
            </div>
        <?php
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>