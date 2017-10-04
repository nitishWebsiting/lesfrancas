<?php get_header() ?>


<?php
//var_dump($category);
$catSub = getCategorieBySlug($category);
$error = false;
if($catSub)
{
    $category_slug = '';
    if($catSub->parent != 0)
    {
        $cat = get_category($catSub->parent);
        $category_slug = $cat->slug;
    }
    $cat_name = single_cat_title('', false);
    $articles = get_article_by_category($cat_name);
    if(!$articles){
        $error = 'Il n\'y a pas encore de contribution. <a href="' . home_url() . '/contribution">Contribuer le premier article de cette categorie</a>';
    }
    $categorieLink = '';
    $categorieId = '';
    $categorieDescription = '';
    $categories = get_the_category();
    foreach ($categories as $item) {
        if ($item->parent == 0) {
            $categorieDescription = $item->description;
            $categorieId = $item->term_id;
        }
    }
    /*$categorieLink = get_category_link( $categorieId );
    $slider_last_articles = get_last_articles(4);*/
    $col = 3;

}else{
    $error = 'Il n\'y a pas encore de contribution. <a href="' . home_url() . '/contribution">Contribuer le premier article de cette categorie</a>';
}
?>

<?php if(!$error): ?>
    <div id="cree_main_cat" class="container-fluid <?= $category ?> <?= $category_slug ?>" data-category="<?= $category ?> <?= $category_slug ?>">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding marginBottom-1">
                <div class="wrapper">

                    <?php $key = 0; ?>
                    <?php foreach ($articles as $key => $article) : ?>

                    <?php if ($key == 0): ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding">
                        <section class="sectionPageFront category first">
                            <?php
                            $title = $article->post_title;
                            $date = date("d m", strtotime($article->post_date));
                            ?>
                            <a href="<?= $article->guid ?>" class="sectionPageFront__link">
                                <div class="cat <?= $category ?> <?= $category_slug ?>"></div>
                                <div class="sectionPageFront__content">
                                    <img
                                        src="<?= get_the_post_thumbnail_url($article->ID, 'lesfrancas-post-thumbnail') ?>"
                                        alt="" class="sectionPageFront__img">
                                    <div class="sectionPageFront__columnleft <?= $category ?> <?= $category_slug ?>">
                                        <span class="sectionPageFront__date"><?= $date ?></span>
                                    </div>
                                    <p class="sectionPageFront__categorie"><?= $title ?></p>
                                    <a href="<?= home_url() . '/contribution' ?>" class="favoriteButton">
                                        <?php echo get_favorites_button($article->ID) ?>
                                    </a>
                                </div>
                            </a>
                            <div class="cat <?= $category ?> <?= $category_slug ?>"></div>
                        </section>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-padding">
                        <section class="sectionPageFront sectionPageFront__textContent">
                            <h2 class="category__title <?= $category ?> <?= $category_slug ?>"> <?php single_cat_title(); ?></h2>
                            <!--                        <i class="fa fa-plus" aria-hidden="true"></i>-->
                            <p class="category__text"><?= $categorieDescription ?></p>
                        </section>
                    </div>
                </div>
            </div>

            <?php else: ?>
                <?php $col = randomNum($key); ?>
                <?php //if($key % 3 == 0) : ?>
                <div
                    class="cree_cat_article col-lg-<?= $col; ?> col-md-<?= $col; ?> col-sm-<?= $col; ?> col-xs-12 no-padding marginBottom-1">
                    <section class="sectionPageFront category margin">
                        <?php
                        $title = $article->post_title;
                        $date = date("d m", strtotime($article->post_date));
                        if( $col == 3 )
                        {
                            $img = get_the_post_thumbnail_url($article->ID, 'lesfrancas-post-thumbnail');
                        }
                        else
                        {
                            $img = get_the_post_thumbnail_url($article->ID, 'lesfrancas-post-rectangle');
                        }
                        ?>
                        <a href="<?= $article->guid ?>" class="sectionPageFront__link">
                            <div class="sectionPageFront__content">
                                <img src="<?= $img ?>"
                                     alt="" class="sectionPageFront__img">
                                <div class="sectionPageFront__columnleft <?= $category ?> <?= $category_slug ?>">
                                    <span class="sectionPageFront__date"><?= $date ?></span>
                                </div>
                                <p class="sectionPageFront__categorie"><?= $title ?></p>
                                <a href="<?= home_url() . '/contribution' ?>" class="favoriteButton">
                                    <?php echo get_favorites_button($article->ID) ?>
                                </a>
                            </div>
                        </a>
                        <div class="cat <?= $category ?> <?= $category_slug ?>"></div>
                    </section>
                </div>
                <?php // endif; ?>
            <?php endif; ?>

            <?php endforeach; ?>
        </div>
    </div>

<?php else: ?>
    <div class="alert alert-warning"><?=  $error  ?></div>
<?php endif; ?>

<?php get_footer() ?>