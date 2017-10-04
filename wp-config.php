<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

switch ($_SERVER['SERVER_ADDR']) {
    case '145.239.67.34':
        define('DB_HOST', '127.0.0.1');
        define('DB_NAME', 'lesfrancas_pre_prod');
        define('DB_USER', 'root');
        define('DB_PASSWORD', 'GrandTheftAuto93@');
        break;
    case '127.0.0.1':
        define('DB_HOST', 'localhost');
        define('DB_NAME', 'lesfrancas');
        define('DB_USER', 'root');
        define('DB_PASSWORD', '');
        break;
}

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
//define('DB_NAME', 'lesfrancas');

/** Utilisateur de la base de données MySQL. */
//define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
//define('DB_PASSWORD', 'root');

/** Adresse de l’hébergement MySQL. */
//define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '`Dx9?|`b!Ls-;msLj&IN_udo<N=AGX*p~^hc7 P0C.LA^wHy#=0eu0KWDkx!ElzS');
define('SECURE_AUTH_KEY',  '?%p-iB*]^p`Lxrd^#3tH.4{nCToFAJ%Qfbfb~n)UIM.$<BJnRBh8mu;ACK}Tn{?U');
define('LOGGED_IN_KEY',    'v@5bf_L&*DKF_iVcZ`5bpzao)g*)8)${Esi]12sci!#B%}Y#%PR(5wejLGuv;ur8');
define('NONCE_KEY',        'h41>.U+jT.DPTTi56=hwSPgD >lBoS#CYrcG%lSR5<&AlcO!tjd7*Qk;[6-.jOxn');
define('AUTH_SALT',        '<dN@nBO.Cy~Gsb~Mq:.m(^05?MB#=r-i/lz4Zro]g^posODE}+4%>sR:O3dMPP_2');
define('SECURE_AUTH_SALT', '#rI?@MBYMI=[,}oD.-3kP,k:nW-1^6O,on!C$G{Cg@v504_G]E[]l435aT{^N>Ek');
define('LOGGED_IN_SALT',   'Q<F!G]|1Inc %Nv0hOShh@G_W~H/~v^Hsq_ {H+u8qNw#xL)c4=?Zv#uzK1Ua@5`');
define('NONCE_SALT',       '0x~#VbhidC!S=StjqUrCp&$Lb$7&=}4<#INhIbVC-j11iOuB`zFL!sp6axf5{ 8Q');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'lfdvdm_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
