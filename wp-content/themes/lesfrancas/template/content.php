<?php
$categorie = get_parent_category($post->ID);
$postByCategory = get_article_by_category($categorie->slug);
$slider_last_articles = get_last_articles(4, $categorie->slug);
$avatar_url = getUserAvatarById($post->post_author);
$date_start = get_field('date_start', $post->ID);
$date_end = get_field('date_end', $post->ID);
$location = get_field('contribution_location', $post->ID);
$contact = get_field('contribution_contact', $post->ID);
$public = get_field('contribution_public', $post->ID);
$type_de_structure = get_field('type_de_structure', $post->ID);
$structure_porteuse_de_laction = get_field('structure_porteuse_de_laction', $post->ID);
$pdf = get_field('pdf_file', $post->ID);
//compare dates
if (isset($date_end)) {
    $_date_end = get_post_meta($post->ID, 'date_end');
    $_date_end = date("Y-m-d", strtotime($_date_end[0]));
    $_date_end = new DateTime($_date_end);

    $today = date("Y-m-d");
    $today = new DateTime($today);

    $interval = $today->diff($_date_end);

    if ($interval->days != 0 && $interval->invert == 0) {
        $ongoing = true;
    } else {
        $ongoing = false;
    }
} else {
    $ongoing = false;
}

// check
global $current_user;
$validatable = false;
$post_author_id = $post->post_author;

if (isset($current_user->data->ID)) {
    $current_user_id = $current_user->data->ID;

    $post_status = $post->post_status;
    if ($post_author_id == $current_user_id && $post_status == 'pending') {
        $validatable = true;
    }
}
?>
<pre>
<?php //var_dump($pdf);  ?>
    <?php //var_dump( get_defined_vars() );  ?>
</pre>
<div class="container-fluid no-padding">
    <div class="row no-margin">
        <div class="col-md-3 col-lg-3 hidden-xs hidden-sm no-padding">
            <aside class="aside aside-article">
<?php
foreach ($slider_last_articles as $article) :
    $cree_category = get_parent_category($post->ID);
    $categorie_link = get_category_link($cree_category->term_id);
    $date = date("d m", strtotime($article->post_date));
    ?>
                    <div class="aside__container">
                        <a href="<?= $article->guid ?>" class="aside__category">
                            <img
                                src="<?= get_the_post_thumbnail_url($article->ID, 'lesfrancas-post') ?>"
                                alt="" class="aside__img">
                            <div class="aside__filter <?= $cree_category->slug; ?>"></div>
                            <div class="aside__contentRight <?= $cree_category->slug; ?>">
                                <p class="aside__date"><?= $date ?></p>
                            </div>
                            <p class="aside__content"><?= $article->post_title; ?></p>
                        </a>
                    </div>
    <?php
endforeach;
?>
            </aside>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <article class="article">
                <h1 class="article__title <?= $categorie->slug; ?>"><?php the_title(); ?></h1>
                <figure class="figure">
                    <img src="<?= get_the_post_thumbnail_url($post, 'lesfrancas-post'); ?>"
                         class="article__imgThumbnail">

                    <a href="<?= home_url() . '/contribution' ?>" class="favoriteButton">
<?= get_favorites_button($article->ID) ?>
                    </a>
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
    $content = preg_replace('%(http?:\/\/|www\.)([a-zA-Z0-9-_\.\/\?=&]+)%','<a href="$1">$0</a>',get_the_content());
    echo '<p>' . $content . '</p>';
?>
                </div>
                <div class="article_about">
<?php

if (!empty($type_de_structure)) {
    echo "<strong>Type de structure :</strong> " . $type_de_structure . '<br><br>';
}
if (!empty($structure_porteuse_de_laction)) {
    echo "<strong>Structure porteuse de l'action :</strong> " . $structure_porteuse_de_laction . '<br><br>';
}
if (isset($date_end)) {
    if ($ongoing) {
        if (!empty($location)) {
            echo "<strong>Lieu :</strong> " . $location . '<br><br>';
        }
        if (!empty($date_start)) {
            //$date_start = strftime( "%A %d %B %Y %H:%s",  strtotime( $date_start  ) );
            $date_start = ucfirst($date_start);
            echo '<strong>Date de début :</strong> ' . $date_start . '<br><br>';
        }
        if (!empty($date_end)) {
            $date_end = ucfirst($date_end);
            echo '<strong>Date de fin :</strong> ' . $date_end . '<br><br>';
        }
        if (!empty($contact)) {
            echo "<strong>Contact :</strong> " . $contact . '<br><br>';
        }
        if (!empty($public)) {
            echo "<strong>Public visée :</strong> " . $public . '<br><br>';
        }
    } else {
        echo "<strong>l'évenement est terminé <br><br>";
    }
}
?>
                    <?php if (isset($pdf['url'])) { ?>
                        <a href="<?= $pdf['url']; ?>" target="blank"><img src="<?= $pdf['icon']; ?>"></a>
                    <?php } ?>
                </div>
                    <?php if ($validatable) : ?>
                    <!--#creemson-->
                    <!--<div id="validate_container">
                        <form id="validate_form" method="post" class="form">
                            <div class="">
                                <label for="validate" class="formLabel">Valider le post ? </label>
                                <span class="radio"><input type="radio" name="validate" value="yes" checked> <span class="text_radio">Oui</span></span>
                                 <span class="radio"><input type="radio" name="validate" value="no"> <span class="text_radio">No</span></span>
                            </div>
                            <textarea name="comment" placeholder="laisser un commentaire" class="inputTextarea"></textarea><br>
                            <input type="hidden" name="post" value="<?= $post->ID ?>">
                            <div class="buttons">
                                <input type="submit" name="submit" class="inputSubmit">
                            </div>
                        </form>
                    </div>-->
<?php endif; ?>
                <div class="author avatar_url">
                    <img src='<?= $avatar_url ?>' alt='avatar image' class='userWidget__items--acount'>
                    <span class="userWidget__email"><?php the_author(); ?></span>
                </div>
            </article>
        </div>
    </div>
</div>
