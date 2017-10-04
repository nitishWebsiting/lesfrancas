<?php get_header(); ?>
<?php
/**
 * Template Name: FAQ
 */
?>
    <div class="ListGroup">
        <a href="<?= home_url() ?>" class="closeIcon">
            <span></span>
            <span></span>
        </a>
        <h2 class="ListGroup__title"><a href="/qr-question"><?php the_title() ?></a></h2>
        <ul class="ListGroup__questions">
            <?php
            // Récupération des équipes
            $args = array(
                'post_type' => 'faq_post'
            );
            $query = new WP_Query($args);
            if ($query->have_posts()):
                while ($query->have_posts()) :
                    $query->the_post();
                    $title = get_the_title();
                    $faq = get_field('faq');
                    ?>
                    <li class="ListGroup__item no-color">
                        <div class="ListGroup__questionContainer">
                            <a href="" class="ListGroup__link no-color"><?= $title ?></a>
                            <span class="glyphicon glyphicon-triangle-left ListGroup__arrow" aria-hidden="true"></span>
                        </div>
                        <div class="ListGroup__subQuestionContainer">
                            <?php
                            foreach ($faq as $item):
                                ?>
                                <p class="ListGroup__text no-color"><?= $item["questions"] ?></p>
                                <p class="ListGroup__text--sub no-color"><?= $item["reponses"] ?></p>
                                <?php
                            endforeach;
                            ?>
                        </div>
                    </li>
                    <?php
                endwhile;
            endif;
            ?>
        </ul>
    </div>


<?php get_footer(); ?>