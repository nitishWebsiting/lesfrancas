<?php get_header() ?>
<?php
/**
 * Template Name: Condition Générales D'utilisation
 */
?>

<?php
$slider_last_articles = get_last_articles(10);
?>
    <div class="container-fluid no-padding">
        <div class="row no-margin">
            <div class="col-md-2 col-lg-2 hidden-xs hidden-sm no-padding">
                <aside class="aside">
                    <?php
                    for($i = 0; $i <= 3; $i++):
                        $cree_category = get_parent_category($slider_last_articles[$i]->ID);
                        $categorie_link = get_category_link($cree_category->term_id);
                        $date = date("d m", strtotime($slider_last_articles[$i]->post_date));
                    ?>
                        <div class="aside__container">
                            <img src="<?= get_the_post_thumbnail_url($slider_last_articles[$i]->ID, 'lesfrancas-post') ?>" alt="" class="aside__img">
                            <div class="aside__filter <?= $cree_category->slug; ?>"></div>
                            <div class="aside__contentRight <?= $cree_category->slug; ?>">
                                <p class="aside__date"><?= $date ?></p>
                            </div>
                            <div class="aside__content">
                                <a href="<?= $categorie_link ?>" class="aside__category"><?= $cree_category->name; ?></a>
                            </div>
                        </div>
                    <?php
                    endfor;
                    ?>
                </aside>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 no-padding">
                <article class="articlePageCGU">
                    <a href="<?= home_url() ?>" class="closeIcon">
                        <span></span>
                        <span></span>
                    </a>

                    <h1 class="articlePageCGU__title"><?php the_title() ?></h1>

                    <?php
                    if (have_posts()):
                        while (have_posts()):
                            the_post();
                            the_content();
                        endwhile;
                    endif;
                    ?>
                </article>
            </div>
            <div class="col-md-2 col-lg-2 hidden-xs hidden-sm no-padding">
                <aside class="aside">
                    <?php
                    for($i = 4; $i <= 7; $i++):
                        $cree_category = get_parent_category($slider_last_articles[$i]->ID);
                        $categorie_link = get_category_link($cree_category->term_id);
                        $date = date("d m", strtotime($slider_last_articles[$i]->post_date));
                        ?>
                        <div class="aside__container">
                            <img src="<?= get_the_post_thumbnail_url($slider_last_articles[$i]->ID, 'lesfrancas-post') ?>" alt="" class="aside__img">
                            <div class="aside__filter <?= $cree_category->slug; ?>"></div>
                            <div class="aside__contentRight <?= $cree_category->slug; ?>">
                                <p class="aside__date"><?= $date ?></p>
                            </div>
                            <div class="aside__content">
                                <a href="<?= $categorie_link ?>" class="aside__category"><?= $cree_category->name; ?></a>
                            </div>
                        </div>
                        <?php
                    endfor;
                    ?>
                </aside>
            </div>
        </div>
    </div>
<?php get_footer() ?>