<?php get_header() ?>
<?php
/**
 * Template Name: Qui sommes nous ?
 */
?>

<?php
$pages = get_extra_pages();
?>


<?php
$slider_last_articles = get_last_articles(10);
?>

<a href="<?= home_url() ?>" class="closeIcon">
    <span></span>
    <span></span>
</a>

<div class="container-fluid no-padding">
    <div class="row no-margin">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 no-padding">
            <aside class="aside">
                <?php
                for ($i = 0; $i <= 2; $i++):
                    $cree_category = get_parent_category($slider_last_articles[$i]->ID);
                    $categorie_link = get_category_link($cree_category->term_id);
                    $date = date("d m", strtotime($slider_last_articles[$i]->post_date));
                    ?>
                    <div class="aside__container">
                        <a href="<?= $categorie_link ?>" class="aside__category">
                            <img
                                src="<?= get_the_post_thumbnail_url($slider_last_articles[$i]->ID, 'lesfrancas-post') ?>"
                                alt="" class="aside__img">
                            <div class="aside__filter <?= $cree_category->slug; ?>"></div>
                            <div class="aside__contentRight <?= $cree_category->slug; ?>">
                                <p class="aside__date"><?= $date ?></p>
                            </div>
                            <p class="aside__content"><?= $cree_category->name; ?></p>
                        </a>
                    </div>
                    <?php
                endfor;
                ?>
            </aside>
        </div>
        <div class="col-xs-10 col-sm-8 col-md-8 col-lg-8 no-padding">
            <article class="articlePageAbout">
                <h2 class="articlePageAbout__title"><?= $pages[1]->post_title ?></h2>
                <div class="articlePageAbout__content">
                    <?php
                    if (have_posts()):
                        while (have_posts()):
                            the_post();
                            the_content();
                        endwhile;
                    endif;
                    ?>
                </div>
            </article>
        </div>
        <div class="col-md-2 col-sm-2 col-lg-2 hidden-xs no-padding">
            <aside class="aside">
                <?php
                for ($i = 3; $i <= 5; $i++):
                    $cree_category = get_parent_category($slider_last_articles[$i]->ID);
                    $categorie_link = get_category_link($cree_category->term_id);
                    $date = date("d m", strtotime($slider_last_articles[$i]->post_date));
                    ?>
                    <div class="aside__container">
                        <a href="<?= $categorie_link ?>" class="aside__category">

                            <img
                                src="<?= get_the_post_thumbnail_url($slider_last_articles[$i]->ID, 'lesfrancas-post') ?>"
                                alt="" class="aside__img">
                            <div class="aside__filter <?= $cree_category->slug; ?>"></div>
                            <div class="aside__contentRight <?= $cree_category->slug; ?>">
                                <p class="aside__date"><?= $date ?></p>
                            </div>
                            <p class="aside__content"><?= $cree_category->name; ?></p>
                        </a>
                    </div>
                    <?php
                endfor;
                ?>
            </aside>
        </div>
    </div>
</div>

<?php get_footer() ?>
