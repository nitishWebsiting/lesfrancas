<?php
/**
 * Template Name: Landing Page
 */


/* Get extra page */
$pages = get_extra_pages();
/* Get the last articles */
$slider_last_articles = get_last_articles(4);

$q_and_rs = cree_last_q_and_rs(4);

global $current_user;
$isConnect = false;
if ($current_user->ID != 0) {
    $isConnect = true;
}
?>
<div class="container-fluid no-padding marginBottom-3 homeMain">
    <div class="row no-margin">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
            <div class="linkContainerArticlePageAbout">
                <h2 class="linkContainerArticlePageAbout_title"><?= $pages[1]->post_title; ?></h2>
                <?php $link = get_permalink($pages[1]->ID); ?>
                <a href="<?= $link ?>" class="linkContainerArticlePageAbout__link">En savoir plus</a>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
            <div class="row no-margin">
                <!-- sectionPageFront -->
                <?php
                $page = getPagesById(327);
                if ($page):
                    $title = $page->post_title;
                    $date = date("d m", strtotime($page->post_date));
                    $link = get_permalink($page->ID);
                    $img = get_field('image_home', $page->ID);
                    ?>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding marginBottom-1">
                        <section class="sectionPageFront">
                            <a href="<?= $link ?>">
                                <div class="sectionPageFront__content">
                                    <img src="<?= $img["sizes"]["large"] ?>" alt="<?= $img["alt"] ?>"
                                         class="sectionPageFront__img">
                                    <div class="sectionPageFront__columnleft">
                                        <span class="sectionPageFront__date"><?= $date ?></span>
                                    </div>
                                    <p class="sectionPageFront__categorie"><?= $title ?></p>
                                    <div class="sectionPageFront__content--filtre"></div>
                                </div>
                            </a>
                        </section>
                    </div>
                    <?php
                endif;
                ?>

                <!-- Slider article-->
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no-padding marginBottom-1">
                    <section class="sectionSliderArticle purple full marginLeft-1-sm ">
                        <?php foreach ($slider_last_articles as $article) :
                            $cree_category = get_parent_category($article->ID);
                            $categorie_link = get_category_link($cree_category->term_id);
                            $date_start = get_field( 'date_start', $article->ID ); 
                            $location = get_field( 'contribution_location', $article->ID ); 

                            if( !empty( $date_start ) ){
                                $date_start = strftime( "%A %d %B %Y %H:%M",  strtotime( $date_start  ) ); 
                            }
                            ?>
                            <div class="sectionSliderArticle__item <?= $cree_category->slug; ?>">
                                <div class="sectionSliderArticle__header">
                                    <h3 class="sectionSliderArticle__title">
                                        <a href="<?= $article->post_name; ?>"><?= $article->post_title; ?></a>
                                    </h3>
                                    <span class="sectionSliderArticle__infos">
                                        <?php
                                            if( !empty( $date_start ) ){
                                                echo $date_start;
                                            }
                                            if( !empty( $location ) ){
                                                echo ' - ' . $location;
                                            }
                                        ?>
                                    </span>
                                </div>
                                <div class="sectionSliderArticle__content">
                                    <?php
                                    $date = date("d m", strtotime($article->post_date));
                                    ?>
                                    <span class="sectionSliderArticle__date"><?= $date ?></span>
                                    <a href="<?= $categorie_link ?>"
                                       class="sectionSliderArticle__categorie"><?= $cree_category->name; ?></a>
                                </div>
                                <div class="sectionSliderArticle__thumbnail">
                                    <a href="<?= $article->post_name; ?>">
                                        <img src="<?= get_the_post_thumbnail_url($article->ID, 'lesfrancas-post') ?>" alt=""
                                         class="sectionPageFront__img">
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </section>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
            <div class="row no-margin">

                <!-- Contribution-->
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no-padding marginBottom-1">
                    <section class="sectionContribution">
                        <img src="<?= get_stylesheet_directory_uri() . '/dist/img/contribution.gif' ?>" alt=""
                             class="sectionContribution__img">
                        <div class="sectionContribution__content">
                            <h3 class="sectionContribution__title">Vous aussi contribuez au développement de la
                                plateforme</h3>
                            <button class="sectionContribution__button">
                                <?php
                                if ($isConnect):
                                    $contributionPage = getPagesById(209);
                                    $link = $contributionPage->guid;
                                else:
                                    $connectPage = getPagesById(182);
                                    $link = $connectPage->guid;
                                endif;
                                ?>
                                <a href="<?= $link ?>" class="yo">Contribuez</a>
                            </button>
                        </div>
                    </section>
                </div>
                <!-- Question Réponses-->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding marginBottom-1">
                    <section class="sectionQR marginLeft-1-sm ">
                        <div class="sectionQR__slider">
                            <?php
                            $reponse_pages = getPagesById(92);
				if(count($q_and_rs) == 0){ ?>
                                     <div class="sectionQR_QRSliderItem slider__item <?= $categorie ?>">
                                                <h3 class="sectionQR__title">Q/R</h3>
                                               <!-- <p class="sectionQR__text"><?= $q_and_r->post_title ?></p>-->
                                              <!--  <a href="<?= $reponse_pages->guid ?>"
                                                   class="sectionQR__reponseBtn">Réponses apportées</a>-->
                                            </div>
                               <?php }
                            foreach ($q_and_rs as $q_and_r) :
//                                if ($q_and_r->post_content == ""):
                                    $categories = get_the_category($q_and_r->ID);
                                    if (count($categories) != 0):
                                        $categorie = $categories[0]->slug;
                                        if ($categorie != null):
                                            ?>
                                            <div class="sectionQR_QRSliderItem slider__item <?= $categorie ?>">
                                                <h3 class="sectionQR__title">Q/R</h3>
                                                <p class="sectionQR__text"><?= $q_and_r->post_title ?></p>
                                                <a href="<?= $reponse_pages->guid ?>"
                                                   class="sectionQR__reponseBtn">Réponses apportées</a>
                                            </div>
                                            <?php
                                        endif;
                                    endif;
//                                endif;
                            endforeach;
                            ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="row no-margin">
        <!--Partenaires-->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
            <section class="section no-height">
                <h3 class="partners__title"><?= $pages[0]->post_title; ?></h3>
                <ul class="partners">
                    <li class="col-md-2 col-xs-6 partner__item"><a href="" class="partner__link">
                            <img style="height:" src="<?= get_stylesheet_directory_uri() . '/dist/img/logo_DDICS.gif' ?>" alt=""></a>
                    </li>
                    <li class="col-md-2 col-xs-6 partner__item"><a href="" class="partner__link"><img
                                src="<?= get_stylesheet_directory_uri() . '/dist/img/francas-logo.png' ?>" alt=""></a>
                    </li>
                    <li class="col-md-2 col-xs-6 partner__item"><a href="" class="partner__link"><img
                                src="<?= get_stylesheet_directory_uri() . '/dist/img/CS94.jpg' ?>" alt=""></a></li>
                    <li class="col-md-2 col-xs-6 partner__item"><a href="" class="partner__link"><img
                                src="<?= get_stylesheet_directory_uri() . '/dist/img/logo.MJC.jpg' ?>" alt=""></a></li>
                    <li class="col-md-2 col-xs-6 partner__item"><a href="" class="partner__link"><img
                                src="<?= get_stylesheet_directory_uri() . '/dist/img/logo ligue val de marne.jpg' ?>"
                                alt=""></a></li>
                </ul>
                <a href="<?= get_permalink($pages[0]->ID) ?>" class="partners__link">En savoir plus</a>
                <p class="partners__paragraph">
                    Projet soutenu par le Préfet et Direction départementale interministérielle de la cohésion sociale
                    du Val-de-Marne. 
                </p>
            </section>
        </div>
    </div>
</div>
