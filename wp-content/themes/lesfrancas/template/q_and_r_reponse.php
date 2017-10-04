<?php
/**
 * Template Name: Q/R Réponse
 */

get_header();
?>

    <div class="ListGroup">
        <a href="<?= home_url() ?>" class="closeIcon">
            <span></span>
            <span></span>
        </a>
        <h2 class="ListGroup__title">Q/R</h2>
        <h2 class="ListGroup__title"><a href="/qr-question">Poser une question</a></h2>
        <ul class="ListGroup__questions">
            <?php
            // Récupération des questions avec une réponse
            $q_and_rs = cree_last_q_and_rs();

            foreach ($q_and_rs as $q_and_r) :
                $title = $q_and_r->post_title;
                $reponse = $q_and_r->post_content;
                $categories = get_the_category($q_and_r->ID);
                $categorie = $categories[0]->slug;
                    ?>
                    <li class="ListGroup__item <?= $categorie ?>">
                        <div class="ListGroup__questionContainer">
                            <a href="" class="ListGroup__link"><?= $title ?></a>
                            <span class="glyphicon glyphicon-triangle-left ListGroup__arrow"
                                  aria-hidden="true"></span>
                        </div>
                        <div class="ListGroup__subQuestionContainer">
                            <p class="ListGroup__text"><?= $reponse ?></p>
                        </div>
                    </li>
                    <?php
            endforeach;
            ?>
        </ul>
    </div>

<?php get_footer(); ?>