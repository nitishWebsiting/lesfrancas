<?php get_header(); ?>
<?php
/**
 * Template Name: Nos Partenaires
 */
?>

<?php
    $articleByCategory1 = get_article_by_term('categoriePartenaire', 'le_financeur_du_projet', 'partenaires');
    $articleByCategory2 = get_article_by_term('categoriePartenaire', 'les_partenaires_du_projet', 'partenaires');
    $postThumbnail1 = get_the_post_thumbnail_url($articleByCategory1->ID);
    $slider_last_articles = get_last_articles(10);
?>
<div class="container-fluid sectionPartners">
    <div class="row">
        <div class="col-md-2 col-lg-2 hidden-xs hidden-sm no-padding">
            <aside class="aside">
                <?php
                for($i = 0; $i <= 2; $i++):
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
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 no-padding marginBottom-1">
            <a href="<?= home_url() ?>" class="closeIcon">
                <span></span>
                <span></span>
            </a>
            <h2 class="sectionPartners__titleCategories">Le financeur du projet</h2>
            <div class="sectionPartners__content">
                <img src="<?= $postThumbnail1 ?>" alt="" class="sectionPartners__image">
                <h3 class="sectionPartners__title"><?= $articleByCategory1->post_title ?></h3>
                <p><?= $articleByCategory1->post_content ?></p>
            </div>
            <h2 class="sectionPartners__titleCategories">Les partenaires du projet</h2>
            <div class="sectionPartners__sub">
                <?php
                foreach ($articleByCategory2 as $item):
                    $postThumbnail2 = get_the_post_thumbnail_url($item->ID);
                    ?>
                    <div class="sectionPartners__content">
                        <img src="<?= $postThumbnail2 ?>" alt="" class="sectionPartners__image">
                        <h3 class="sectionPartners__title"><?= $item->post_title ?></h3>
                        <p><?= $item->post_content ?></p>
                    </div>
                    <?php
                endforeach;
                ?>
            </div>
            <?php
            if (have_posts()):
                while (have_posts()):
                    the_post();
                    $textBottom = get_field('texte_pied_de_page');
                    ?>
                    <p class="sectionPartners__textBottom"><?= $textBottom ?></p>
                    <?php
                endwhile;
            endif;
            ?>
        </div>
        <div class="col-md-2 col-lg-2 hidden-xs hidden-sm no-padding">
            <aside class="aside">
                <?php
                for($i = 3; $i <= 5; $i++):
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
<?php get_footer(); ?>
