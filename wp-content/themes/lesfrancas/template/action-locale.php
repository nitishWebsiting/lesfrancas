<?php get_header() ?>
<?php
/**
 * Template Name: Action locale
 */
?>

<div class="container-fluid no-padding">
    <div class="row no-margin">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <article class="article">
                <h1 class="article__title"><?php the_title(); ?></h1>
                <figure class="figure">
                    <img src="<?= get_the_post_thumbnail_url($post, 'lesfrancas-post'); ?>"
                         class="article__imgThumbnail">
                    <?php
                    $value = get_field("label_img");
                    if ($value) :
                        ?>
                        <figcaption class="article__figcaption"><?= $value ?></figcaption>
                        <?php
                    endif;
                    ?>
                </figure>
                <div class="textContent">
                    <?php
                    if (have_posts()):
                        while (have_posts()) :
                            the_post();
                            the_content();
                        endwhile;
                    endif;
                    ?>
                </div>
            </article>
        </div>
    </div>
</div>


<?php get_footer() ?>
