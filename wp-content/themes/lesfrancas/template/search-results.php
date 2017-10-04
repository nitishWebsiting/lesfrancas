<?php get_header(); ?>

<?php
/*
    Template Name: Résultat recherche
*/
?>
    <div class="container marginTop-3">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php
                $searchComponents = new searchComponents();
                echo $searchComponents->getCountResult($_GET['search']);
                $searchComponents->getResult($_GET['search']);
                ?>
            </div>
        </div>

    </div>

<?php get_footer(); ?>