<?php
/**
 * Template Name: Contribution
 */

redirect_if_not_logged('/login');
get_header();
?>


<?php custom_breadcrumbs(); ?>

<?php
if (count($_POST) > 0):
    global $current_user;
    insert_post_contribution();
else:
    ?>
    <p class="acountName">Je contribue</p>
    <div class="userWidget">
        <ul class="userWidget__lists">
            <li class="userWidget__item">
                <a href="<?= home_url() . '/logout' ?>" class="userWidget__link">
                    <img src="<?= get_stylesheet_directory_uri() . '/dist/img/deconnexion.png' ?>" alt="logout"
                         class="logout userWidget__image">
                </a>
            </li>
            <li class="userWidget__item">
                <a href="<?= home_url() . '/contribution' ?>" class="userWidget__link">
                    <img src="<?= get_stylesheet_directory_uri() . '/dist/img/Laicite.png' ?>" alt="binder"
                         class="userWidget__image">
                </a>
            </li>
            <li class="userWidget__item">
                <a href="<?= home_url() . '/mon-classeur' ?>" class="userWidget__link">
                    <img src="<?= get_stylesheet_directory_uri() . '/dist/img/Classeur.png' ?>" alt="binder"
                         class="binder userWidget__image">
                </a>
            </li>
        </ul>
    </div>

    <a href="<?= home_url() ?>" class="closeIcon">
        <span></span>
        <span></span>
    </a>
    <form action="" method="post" class="form"
          enctype='multipart/form-data'>
        <div class="container">
            <div class="row">
                <?php
                if (!session_id()) {
                    session_start();
                }
                // Error Handler
                $cree_session = $_SESSION;
                unset($_SESSION['flash']);
                ?>
                <?php if (isset($cree_session['flash']['cree_post_status'])) : ?>
                    <div class="alert alert-<?= $cree_session['flash']['cree_post_status'] ?>">
                        <?= $cree_session['flash']['cree_post_status'] . ': ' . $cree_session['flash']['cree_message']; ?>
                    </div>
                <?php endif; ?>

                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 no-padding">
                    <div class="field">
                        <input type="text" name="contributionTitre" id="contributionTitre" placeholder="Titre"
                               class="inputText" value="<?= input_value($cree_session, 'contributionTitre'); ?>">
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 no-padding">
                    <div class="field">
                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                        <select name="thematiqueCategorie" id="thematiqueCategorie" class="inputSelect">
                            <?php
                            $parentCategories = getParentCategories();
                            foreach ($parentCategories as $item):
                                if ($item->slug != "non-classe"):
                                    ?>
                                    <option value="<?= $item->slug ?>"><?= $item->name ?></option>
                                    <?php
                                endif;
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 no-padding">
                    <div class="field">
                        <i class="fa fa-caret-down" aria-hidden="true"></i>

                        <select name="rubriqueCategorie" id="rubriqueCategorie" class="inputSelect">
                            <?php
                            $parentCategories = getParentCategories();
                            $childCategories = getChildCategories(4);
                            foreach ($childCategories as $item):
                                if ($item->slug != "non-classe"):
                                    ?>
                                    <option value="<?= $item->slug ?>"><?= $item->name ?></option>
                                    <?php
                                endif;
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 no-padding">
                    <div class="field">
                        <input type="text" name="structure" id="structure" class="inputText"
                               placeholder="Structure porteuse de l'action"
                               value="<?= input_value($cree_session, 'structure'); ?>">
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 no-padding">
                    <div class="field">
                        <input type="text" name="type_structure" id="type_structure" class="inputText"
                               placeholder="Type de structure..."
                               value="<?= input_value($cree_session, 'type_structure'); ?>">
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 no-padding">
                    <div class="field no-border-leftBefore">
                    <textarea name="descriptionContenu" id="" cols="30" rows="10"
                              placeholder="Description du contenu..."
                              class="inputTextarea"><?= input_value($cree_session, 'descriptionContenu'); ?></textarea>
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 no-padding">
                    <div class="field no-border-leftBefore">
                        <label for="mots-cles" class="formLabel">Mots clés</label>
                        <input type="text" name="mots-cles" id="mots-cles" class="inputTextMultiple"
                               placeholder="mettre une virgule entre chaque mots-clés"
                               value="<?= input_value($cree_session, 'mots-cles'); ?>">
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 no-padding">
                    <div class="field no-border-leftBefore">
                        <label for="image" class="formLabel">Importer une image</label>
                        <input type="file" name="image" id="image">
                    </div>
                    <div class="field no-border-leftBefore">
                        <label for="pdf" class="formLabel">Importer un PDF</label>
                        <input type="file" name="pdf" id="pdf">
                    </div>
                    <div class="field no-border-leftBefore">
                        <input type="text" name="legende" id="legende" class="inputTextMultiple"
                               placeholder="Ajouter une legende"
                               value="<?= input_value($cree_session, 'legende'); ?>">
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 no-padding">
                    <div class="field">
                        <input type="text" name="contribution_location" id="contribution_location" class="inputText"
                               placeholder="Lieu"
                               value="<?= input_value($cree_session, 'contribution_location'); ?>">
                    </div>
                </div>
                <div class='col-md-3 col-xs-offset-2 col-sm-offset-2 no-padding'>
                    <div class="form-group">
                        <div class='input-group date' id='date_start'>
                            <input type='text' name="date_start" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class='col-md-3 col-xs-offset-2 col-sm-offset-2 no-padding'>
                    <div class="form-group">
                        <div class='input-group date' id='date_end'>
                            <input type='text' name="date_end" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 no-padding">
                    <div class="field">
                        <input type="text" name="contribution_contact" id="contribution_contact" class="inputText"
                               placeholder="Contact"
                               value="<?= input_value($cree_session, 'contribution_contact'); ?>">
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 no-padding">
                    <div class="field">
                        <input type="text" name="contribution_public" id="contribution_public" class="inputText"
                               placeholder="Public visé"
                               value="<?= input_value($cree_session, 'contribution_public'); ?>">
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-xs-offset-2 col-sm-offset-2 no-padding">
                <div class="buttons">
                    <input type="submit" value="Contribuez" class="inputSubmit">
                    <input type="hidden" name="action" value="cree_contribution">
                </div>
            </div>
        </div>
    </form>

    <?php
endif;
?>
<?php get_footer(); ?>
