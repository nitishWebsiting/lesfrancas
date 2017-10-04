-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 03 Février 2017 à 16:28
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lesfrancas`
--

-- --------------------------------------------------------

--
-- Structure de la table `lfdvdm_commentmeta`
--

CREATE TABLE `lfdvdm_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lfdvdm_comments`
--

CREATE TABLE `lfdvdm_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Contenu de la table `lfdvdm_comments`
--

INSERT INTO `lfdvdm_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'Un commentateur WordPress', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2017-01-31 14:51:46', '2017-01-31 13:51:46', 'Bonjour, ceci est un commentaire.\nPour débuter avec la modération, la modification et la suppression de commentaires, veuillez visiter l’écran des Commentaires dans le Tableau de bord.\nLes avatars des personnes qui commentent arrivent depuis <a href="https://gravatar.com">Gravatar</a>.', 0, '1', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `lfdvdm_links`
--

CREATE TABLE `lfdvdm_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lfdvdm_options`
--

CREATE TABLE `lfdvdm_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'yes'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Contenu de la table `lfdvdm_options`
--

INSERT INTO `lfdvdm_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://lesfrancas.dev-websiting.fr', 'yes'),
(2, 'home', 'http://lesfrancas.dev-websiting.fr', 'yes'),
(3, 'blogname', 'Les Francas du Val de Marne', 'yes'),
(4, 'blogdescription', 'Un site utilisant WordPress', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'a.diop@websiting.fr', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '0', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'j F Y', 'yes'),
(24, 'time_format', 'G \\h i \\m\\i\\n', 'yes'),
(25, 'links_updated_date_format', 'j F Y G \\h i \\m\\i\\n', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%postname%/', 'yes'),
(29, 'rewrite_rules', 'a:88:{s:11:"^wp-json/?$";s:22:"index.php?rest_route=/";s:14:"^wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:21:"^index.php/wp-json/?$";s:22:"index.php?rest_route=/";s:24:"^index.php/wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:47:"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:42:"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:23:"category/(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:35:"category/(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:17:"category/(.+?)/?$";s:35:"index.php?category_name=$matches[1]";s:44:"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:39:"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:20:"tag/([^/]+)/embed/?$";s:36:"index.php?tag=$matches[1]&embed=true";s:32:"tag/([^/]+)/page/?([0-9]{1,})/?$";s:43:"index.php?tag=$matches[1]&paged=$matches[2]";s:14:"tag/([^/]+)/?$";s:25:"index.php?tag=$matches[1]";s:45:"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:40:"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:21:"type/([^/]+)/embed/?$";s:44:"index.php?post_format=$matches[1]&embed=true";s:33:"type/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?post_format=$matches[1]&paged=$matches[2]";s:15:"type/([^/]+)/?$";s:33:"index.php?post_format=$matches[1]";s:12:"robots\\.txt$";s:18:"index.php?robots=1";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:8:"embed/?$";s:21:"index.php?&embed=true";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:27:"comment-page-([0-9]{1,})/?$";s:38:"index.php?&page_id=2&cpage=$matches[1]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:17:"comments/embed/?$";s:21:"index.php?&embed=true";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:20:"search/(.+)/embed/?$";s:34:"index.php?s=$matches[1]&embed=true";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:23:"author/([^/]+)/embed/?$";s:44:"index.php?author_name=$matches[1]&embed=true";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:45:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$";s:74:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:32:"([0-9]{4})/([0-9]{1,2})/embed/?$";s:58:"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:19:"([0-9]{4})/embed/?$";s:37:"index.php?year=$matches[1]&embed=true";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:".?.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"(.?.+?)/embed/?$";s:41:"index.php?pagename=$matches[1]&embed=true";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:24:"(.?.+?)(?:/([0-9]+))?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";s:27:"[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:"[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:"[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:"[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"([^/]+)/embed/?$";s:37:"index.php?name=$matches[1]&embed=true";s:20:"([^/]+)/trackback/?$";s:31:"index.php?name=$matches[1]&tb=1";s:40:"([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?name=$matches[1]&feed=$matches[2]";s:35:"([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?name=$matches[1]&feed=$matches[2]";s:28:"([^/]+)/page/?([0-9]{1,})/?$";s:44:"index.php?name=$matches[1]&paged=$matches[2]";s:35:"([^/]+)/comment-page-([0-9]{1,})/?$";s:44:"index.php?name=$matches[1]&cpage=$matches[2]";s:24:"([^/]+)(?:/([0-9]+))?/?$";s:43:"index.php?name=$matches[1]&page=$matches[2]";s:16:"[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:26:"[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:46:"[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:41:"[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:41:"[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:22:"[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";}', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:0:{}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '0', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', '', 'no'),
(40, 'template', 'lesfrancas', 'yes'),
(41, 'stylesheet', 'lesfrancas', 'yes'),
(42, 'comment_whitelist', '1', 'yes'),
(43, 'blacklist_keys', '', 'no'),
(44, 'comment_registration', '0', 'yes'),
(45, 'html_type', 'text/html', 'yes'),
(46, 'use_trackback', '0', 'yes'),
(47, 'default_role', 'subscriber', 'yes'),
(48, 'db_version', '38590', 'yes'),
(49, 'uploads_use_yearmonth_folders', '1', 'yes'),
(50, 'upload_path', '', 'yes'),
(51, 'blog_public', '0', 'yes'),
(52, 'default_link_category', '2', 'yes'),
(53, 'show_on_front', 'page', 'yes'),
(54, 'tag_base', '', 'yes'),
(55, 'show_avatars', '1', 'yes'),
(56, 'avatar_rating', 'G', 'yes'),
(57, 'upload_url_path', '', 'yes'),
(58, 'thumbnail_size_w', '150', 'yes'),
(59, 'thumbnail_size_h', '150', 'yes'),
(60, 'thumbnail_crop', '1', 'yes'),
(61, 'medium_size_w', '300', 'yes'),
(62, 'medium_size_h', '300', 'yes'),
(63, 'avatar_default', 'mystery', 'yes'),
(64, 'large_size_w', '1024', 'yes'),
(65, 'large_size_h', '1024', 'yes'),
(66, 'image_default_link_type', 'none', 'yes'),
(67, 'image_default_size', '', 'yes'),
(68, 'image_default_align', '', 'yes'),
(69, 'close_comments_for_old_posts', '0', 'yes'),
(70, 'close_comments_days_old', '14', 'yes'),
(71, 'thread_comments', '1', 'yes'),
(72, 'thread_comments_depth', '5', 'yes'),
(73, 'page_comments', '0', 'yes'),
(74, 'comments_per_page', '50', 'yes'),
(75, 'default_comments_page', 'newest', 'yes'),
(76, 'comment_order', 'asc', 'yes'),
(77, 'sticky_posts', 'a:0:{}', 'yes'),
(78, 'widget_categories', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:12:"hierarchical";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(79, 'widget_text', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(80, 'widget_rss', 'a:3:{i:1;a:0:{}i:2;a:8:{s:5:"title";s:0:"";s:3:"url";s:0:"";s:4:"link";s:0:"";s:5:"items";i:10;s:5:"error";s:50:"WP HTTP Error: L’URL fournie n’est pas valide.";s:12:"show_summary";i:0;s:11:"show_author";i:0;s:9:"show_date";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(81, 'uninstall_plugins', 'a:0:{}', 'no'),
(82, 'timezone_string', 'Europe/Paris', 'yes'),
(83, 'page_for_posts', '0', 'yes'),
(84, 'page_on_front', '2', 'yes'),
(85, 'default_post_format', '0', 'yes'),
(86, 'link_manager_enabled', '0', 'yes'),
(87, 'finished_splitting_shared_terms', '1', 'yes'),
(88, 'site_icon', '0', 'yes'),
(89, 'medium_large_size_w', '768', 'yes'),
(90, 'medium_large_size_h', '0', 'yes'),
(91, 'initial_db_version', '38590', 'yes'),
(92, 'lfdvdm_user_roles', 'a:5:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:61:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:34:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:10:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:5:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}}', 'yes'),
(93, 'fresh_site', '0', 'yes'),
(94, 'WPLANG', 'fr_FR', 'yes'),
(95, 'widget_search', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(96, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(97, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(98, 'widget_archives', 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(99, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(100, 'sidebars_widgets', 'a:5:{s:18:"orphaned_widgets_1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:12:"home_right_1";a:1:{i:0;s:5:"rss-2";}s:19:"wp_inactive_widgets";a:0:{}s:12:"footer_right";a:1:{i:0;s:13:"social_link-2";}s:13:"array_version";i:3;}', 'yes'),
(150, '_site_transient_browser_f731f7616ab74b84eb6e37a4dee2a379', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:7:"Firefox";s:7:"version";s:4:"51.0";s:10:"update_url";s:23:"http://www.firefox.com/";s:7:"img_src";s:50:"http://s.wordpress.org/images/browsers/firefox.png";s:11:"img_src_ssl";s:49:"https://wordpress.org/images/browsers/firefox.png";s:15:"current_version";s:2:"16";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'no'),
(101, 'widget_pages', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(102, 'widget_calendar', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(103, 'widget_tag_cloud', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(104, 'widget_nav_menu', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(105, 'cron', 'a:4:{i:1486173106;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1486216445;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1486220887;a:1:{s:30:"wp_scheduled_auto_draft_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
(106, 'theme_mods_twentyseventeen', 'a:2:{s:18:"custom_css_post_id";i:-1;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1485873698;s:4:"data";a:4:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:9:"sidebar-2";a:0:{}s:9:"sidebar-3";a:0:{}}}}', 'yes'),
(169, '_transient_timeout_feed_66a70e9599b658d5cc038e8074597e7c', '1486161338', 'no'),
(110, '_site_transient_update_core', 'O:8:"stdClass":4:{s:7:"updates";a:1:{i:0;O:8:"stdClass":10:{s:8:"response";s:6:"latest";s:8:"download";s:65:"https://downloads.wordpress.org/release/fr_FR/wordpress-4.7.2.zip";s:6:"locale";s:5:"fr_FR";s:8:"packages";O:8:"stdClass":5:{s:4:"full";s:65:"https://downloads.wordpress.org/release/fr_FR/wordpress-4.7.2.zip";s:10:"no_content";b:0;s:11:"new_bundled";b:0;s:7:"partial";b:0;s:8:"rollback";b:0;}s:7:"current";s:5:"4.7.2";s:7:"version";s:5:"4.7.2";s:11:"php_version";s:5:"5.2.4";s:13:"mysql_version";s:3:"5.0";s:11:"new_bundled";s:3:"4.7";s:15:"partial_version";s:0:"";}}s:12:"last_checked";i:1486129910;s:15:"version_checked";s:5:"4.7.2";s:12:"translations";a:0:{}}', 'no'),
(183, '_transient_timeout_dash_bd94b8f41e74bae2f4dc72e9bd8379af', '1486161339', 'no'),
(184, '_transient_dash_bd94b8f41e74bae2f4dc72e9bd8379af', '<div class="rss-widget"><ul><li><a class=\'rsswidget\' href=\'http://feedproxy.google.com/~r/WordpressFrancophone/~3/3TCggFy-pd8/\'>L’élection du bureau WPFR</a> <span class="rss-date">26 janvier 2017</span><div class="rssSummary">Oyez, oyez ! Comme annoncé lors de l’assemblée générale du 8 décembre 2016, l’heure des élections a sonné. Le bureau actuellement en place voit son mandat terminé, de nouvelles élections doivent donc avoir lieu afin de le renouveler  Ces élections sont prévues pour le 24 février 2017 et nous invitons par cet article les adhérents souhaitant candidaterLire [&hellip;]</div></li></ul></div><div class="rss-widget"><ul><li><a class=\'rsswidget\' href=\'http://feedproxy.google.com/~r/wpfr/~3/EEEuxq1qOWc/\'>Faites le buzz !</a></li><li><a class=\'rsswidget\' href=\'http://feedproxy.google.com/~r/wpfr/~3/yyx2TQH8Nds/\'>Un site WordPress sans plugins… Est-ce possible ?</a></li><li><a class=\'rsswidget\' href=\'http://feedproxy.google.com/~r/wpfr/~3/sSR84fTlnho/\'>La typographie pour tous</a></li></ul></div><div class="rss-widget"><ul><li class="dashboard-news-plugin"><span>Extensions populaires :</span> Google Analytics Dashboard for WP&nbsp;<a href="plugin-install.php?tab=plugin-information&amp;plugin=google-analytics-dashboard-for-wp&amp;_wpnonce=f1c6d28109&amp;TB_iframe=true&amp;width=600&amp;height=800" class="thickbox open-plugin-details-modal" aria-label="Installer Google Analytics Dashboard for WP">(Installer)</a></li></ul></div>', 'no'),
(111, '_site_transient_update_plugins', 'O:8:"stdClass":4:{s:12:"last_checked";i:1486129914;s:8:"response";a:0:{}s:12:"translations";a:0:{}s:9:"no_update";a:0:{}}', 'no'),
(126, 'can_compress_scripts', '1', 'no'),
(171, '_transient_timeout_feed_mod_66a70e9599b658d5cc038e8074597e7c', '1486161338', 'no'),
(172, '_transient_feed_mod_66a70e9599b658d5cc038e8074597e7c', '1486118138', 'no'),
(188, '_site_transient_timeout_theme_roots', '1486131711', 'no'),
(189, '_site_transient_theme_roots', 'a:1:{s:10:"lesfrancas";s:7:"/themes";}', 'no'),
(115, '_site_transient_update_themes', 'O:8:"stdClass":4:{s:12:"last_checked";i:1486129915;s:7:"checked";a:1:{s:10:"lesfrancas";s:3:"1.0";}s:8:"response";a:0:{}s:12:"translations";a:0:{}}', 'no'),
(116, '_site_transient_timeout_browser_00cb6228a64f759a1bb585e143526e4f', '1486475511', 'no'),
(117, '_site_transient_browser_00cb6228a64f759a1bb585e143526e4f', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:6:"Chrome";s:7:"version";s:12:"55.0.2883.87";s:10:"update_url";s:28:"http://www.google.com/chrome";s:7:"img_src";s:49:"http://s.wordpress.org/images/browsers/chrome.png";s:11:"img_src_ssl";s:48:"https://wordpress.org/images/browsers/chrome.png";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'no');
INSERT INTO `lfdvdm_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(179, '_transient_timeout_feed_mod_b9388c83948825c1edaef0d856b7b109', '1486161339', 'no'),
(180, '_transient_feed_mod_b9388c83948825c1edaef0d856b7b109', '1486118139', 'no'),
(181, '_transient_timeout_plugin_slugs', '1486204539', 'no'),
(182, '_transient_plugin_slugs', 'a:0:{}', 'no'),
(173, '_transient_timeout_feed_76f8d9281c01f21e505004d0986f50c6', '1486161338', 'no');
INSERT INTO `lfdvdm_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(177, '_transient_timeout_feed_b9388c83948825c1edaef0d856b7b109', '1486161339', 'no');
INSERT INTO `lfdvdm_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(135, 'recently_activated', 'a:0:{}', 'yes'),
(139, 'current_theme', 'Les Francas', 'yes'),
(140, 'theme_mods_lesfrancas', 'a:3:{i:0;b:0;s:18:"custom_css_post_id";i:-1;s:18:"nav_menu_locations";a:2:{s:3:"top";i:2;s:6:"footer";i:3;}}', 'yes'),
(141, 'theme_switched', '', 'yes'),
(149, '_site_transient_timeout_browser_f731f7616ab74b84eb6e37a4dee2a379', '1486545235', 'no'),
(175, '_transient_timeout_feed_mod_76f8d9281c01f21e505004d0986f50c6', '1486161338', 'no'),
(176, '_transient_feed_mod_76f8d9281c01f21e505004d0986f50c6', '1486118138', 'no'),
(185, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:"auto_add";a:0:{}}', 'yes'),
(191, 'widget_foo_widget', 'a:2:{i:2;a:1:{s:5:"title";s:9:"New title";}s:12:"_multiwidget";i:1;}', 'yes'),
(192, 'widget_social_link', 'a:2:{i:2;a:2:{s:8:"facebook";s:35:"https://www.facebook.com/websiting/";s:7:"twitter";s:29:"https://twitter.com/websiting";}s:12:"_multiwidget";i:1;}', 'yes'),
(244, 'category_children', 'a:5:{i:4;a:9:{i:0;i:9;i:1;i:10;i:2;i:11;i:3;i:12;i:4;i:13;i:5;i:14;i:6;i:15;i:7;i:16;i:8;i:17;}i:5;a:9:{i:0;i:18;i:1;i:19;i:2;i:20;i:3;i:21;i:4;i:22;i:5;i:23;i:6;i:24;i:7;i:25;i:8;i:26;}i:6;a:9:{i:0;i:27;i:1;i:28;i:2;i:29;i:3;i:30;i:4;i:31;i:5;i:32;i:6;i:33;i:7;i:34;i:8;i:35;}i:7;a:9:{i:0;i:36;i:1;i:37;i:2;i:38;i:3;i:39;i:4;i:40;i:5;i:41;i:6;i:42;i:7;i:43;i:8;i:44;}i:8;a:9:{i:0;i:45;i:1;i:46;i:2;i:47;i:3;i:48;i:4;i:49;i:5;i:50;i:6;i:51;i:7;i:52;i:8;i:53;}}', 'yes');

-- --------------------------------------------------------

--
-- Structure de la table `lfdvdm_postmeta`
--

CREATE TABLE `lfdvdm_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Contenu de la table `lfdvdm_postmeta`
--

INSERT INTO `lfdvdm_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 2, '_edit_lock', '1486135718:1'),
(3, 4, '_wp_trash_meta_status', 'publish'),
(4, 4, '_wp_trash_meta_time', '1485874624'),
(5, 5, '_wp_trash_meta_status', 'publish'),
(6, 5, '_wp_trash_meta_time', '1485874647'),
(7, 2, '_edit_last', '1'),
(8, 7, '_wp_trash_meta_status', 'publish'),
(9, 7, '_wp_trash_meta_time', '1485874675'),
(10, 1, '_edit_lock', '1486137176:1'),
(11, 8, '_edit_last', '1'),
(12, 8, '_edit_lock', '1486134873:1'),
(13, 12, '_edit_last', '1'),
(14, 12, '_edit_lock', '1486119071:1'),
(15, 14, '_edit_last', '1'),
(16, 14, '_edit_lock', '1486119086:1'),
(17, 17, '_menu_item_type', 'post_type'),
(18, 17, '_menu_item_menu_item_parent', '0'),
(19, 17, '_menu_item_object_id', '2'),
(20, 17, '_menu_item_object', 'page'),
(21, 17, '_menu_item_target', ''),
(22, 17, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(23, 17, '_menu_item_xfn', ''),
(24, 17, '_menu_item_url', ''),
(25, 17, '_menu_item_orphaned', '1486119552'),
(26, 18, '_menu_item_type', 'post_type'),
(27, 18, '_menu_item_menu_item_parent', '0'),
(28, 18, '_menu_item_object_id', '14'),
(29, 18, '_menu_item_object', 'page'),
(30, 18, '_menu_item_target', ''),
(31, 18, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(32, 18, '_menu_item_xfn', ''),
(33, 18, '_menu_item_url', ''),
(34, 18, '_menu_item_orphaned', '1486119552'),
(35, 19, '_menu_item_type', 'post_type'),
(36, 19, '_menu_item_menu_item_parent', '0'),
(37, 19, '_menu_item_object_id', '8'),
(38, 19, '_menu_item_object', 'page'),
(39, 19, '_menu_item_target', ''),
(40, 19, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(41, 19, '_menu_item_xfn', ''),
(42, 19, '_menu_item_url', ''),
(43, 19, '_menu_item_orphaned', '1486119552'),
(44, 20, '_menu_item_type', 'post_type'),
(45, 20, '_menu_item_menu_item_parent', '0'),
(46, 20, '_menu_item_object_id', '2'),
(47, 20, '_menu_item_object', 'page'),
(48, 20, '_menu_item_target', ''),
(49, 20, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(50, 20, '_menu_item_xfn', ''),
(51, 20, '_menu_item_url', ''),
(52, 20, '_menu_item_orphaned', '1486119552'),
(53, 21, '_menu_item_type', 'post_type'),
(54, 21, '_menu_item_menu_item_parent', '0'),
(55, 21, '_menu_item_object_id', '12'),
(56, 21, '_menu_item_object', 'page'),
(57, 21, '_menu_item_target', ''),
(58, 21, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(59, 21, '_menu_item_xfn', ''),
(60, 21, '_menu_item_url', ''),
(61, 21, '_menu_item_orphaned', '1486119552'),
(62, 22, '_menu_item_type', 'post_type'),
(63, 22, '_menu_item_menu_item_parent', '0'),
(64, 22, '_menu_item_object_id', '2'),
(65, 22, '_menu_item_object', 'page'),
(66, 22, '_menu_item_target', ''),
(67, 22, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(68, 22, '_menu_item_xfn', ''),
(69, 22, '_menu_item_url', ''),
(70, 22, '_menu_item_orphaned', '1486125046'),
(71, 23, '_menu_item_type', 'post_type'),
(72, 23, '_menu_item_menu_item_parent', '0'),
(73, 23, '_menu_item_object_id', '14'),
(74, 23, '_menu_item_object', 'page'),
(75, 23, '_menu_item_target', ''),
(76, 23, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(77, 23, '_menu_item_xfn', ''),
(78, 23, '_menu_item_url', ''),
(79, 23, '_menu_item_orphaned', '1486125046'),
(80, 24, '_menu_item_type', 'post_type'),
(81, 24, '_menu_item_menu_item_parent', '0'),
(82, 24, '_menu_item_object_id', '8'),
(83, 24, '_menu_item_object', 'page'),
(84, 24, '_menu_item_target', ''),
(85, 24, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(86, 24, '_menu_item_xfn', ''),
(87, 24, '_menu_item_url', ''),
(88, 24, '_menu_item_orphaned', '1486125046'),
(89, 25, '_menu_item_type', 'post_type'),
(90, 25, '_menu_item_menu_item_parent', '0'),
(91, 25, '_menu_item_object_id', '2'),
(92, 25, '_menu_item_object', 'page'),
(93, 25, '_menu_item_target', ''),
(94, 25, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(95, 25, '_menu_item_xfn', ''),
(96, 25, '_menu_item_url', ''),
(97, 25, '_menu_item_orphaned', '1486125046'),
(98, 26, '_menu_item_type', 'post_type'),
(99, 26, '_menu_item_menu_item_parent', '0'),
(100, 26, '_menu_item_object_id', '12'),
(101, 26, '_menu_item_object', 'page'),
(102, 26, '_menu_item_target', ''),
(103, 26, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(104, 26, '_menu_item_xfn', ''),
(105, 26, '_menu_item_url', ''),
(106, 26, '_menu_item_orphaned', '1486125046'),
(107, 27, '_edit_last', '1'),
(108, 27, '_edit_lock', '1486125229:1'),
(109, 30, '_edit_last', '1'),
(110, 30, '_edit_lock', '1486125240:1'),
(111, 32, '_edit_last', '1'),
(112, 32, '_edit_lock', '1486125527:1'),
(113, 34, '_edit_last', '1'),
(114, 34, '_edit_lock', '1486125453:1'),
(115, 37, '_edit_last', '1'),
(116, 37, '_edit_lock', '1486125481:1'),
(117, 39, '_edit_last', '1'),
(118, 39, '_edit_lock', '1486125520:1'),
(119, 41, '_edit_last', '1'),
(120, 41, '_edit_lock', '1486127713:1'),
(121, 43, '_menu_item_type', 'post_type'),
(122, 43, '_menu_item_menu_item_parent', '0'),
(123, 43, '_menu_item_object_id', '41'),
(124, 43, '_menu_item_object', 'page'),
(125, 43, '_menu_item_target', ''),
(126, 43, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(127, 43, '_menu_item_xfn', ''),
(128, 43, '_menu_item_url', ''),
(149, 47, '_edit_lock', '1486135163:1'),
(130, 44, '_menu_item_type', 'post_type'),
(131, 44, '_menu_item_menu_item_parent', '0'),
(132, 44, '_menu_item_object_id', '27'),
(133, 44, '_menu_item_object', 'page'),
(134, 44, '_menu_item_target', ''),
(135, 44, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(136, 44, '_menu_item_xfn', ''),
(137, 44, '_menu_item_url', ''),
(150, 1, '_edit_last', '1'),
(139, 45, '_menu_item_type', 'post_type'),
(140, 45, '_menu_item_menu_item_parent', '0'),
(141, 45, '_menu_item_object_id', '8'),
(142, 45, '_menu_item_object', 'page'),
(143, 45, '_menu_item_target', ''),
(144, 45, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(145, 45, '_menu_item_xfn', ''),
(146, 45, '_menu_item_url', ''),
(148, 47, '_edit_last', '1'),
(152, 51, '_menu_item_type', 'taxonomy'),
(153, 51, '_menu_item_menu_item_parent', '0'),
(154, 51, '_menu_item_object_id', '1'),
(155, 51, '_menu_item_object', 'category'),
(156, 51, '_menu_item_target', ''),
(157, 51, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(158, 51, '_menu_item_xfn', ''),
(159, 51, '_menu_item_url', ''),
(160, 51, '_menu_item_orphaned', '1486137352'),
(161, 52, '_menu_item_type', 'taxonomy'),
(162, 52, '_menu_item_menu_item_parent', '0'),
(163, 52, '_menu_item_object_id', '4'),
(164, 52, '_menu_item_object', 'category'),
(165, 52, '_menu_item_target', ''),
(166, 52, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(167, 52, '_menu_item_xfn', ''),
(168, 52, '_menu_item_url', ''),
(246, 61, '_menu_item_target', ''),
(170, 53, '_menu_item_type', 'taxonomy'),
(171, 53, '_menu_item_menu_item_parent', '0'),
(172, 53, '_menu_item_object_id', '9'),
(173, 53, '_menu_item_object', 'category'),
(174, 53, '_menu_item_target', ''),
(175, 53, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(176, 53, '_menu_item_xfn', ''),
(177, 53, '_menu_item_url', ''),
(178, 53, '_menu_item_orphaned', '1486137352'),
(179, 54, '_menu_item_type', 'taxonomy'),
(180, 54, '_menu_item_menu_item_parent', '0'),
(181, 54, '_menu_item_object_id', '10'),
(182, 54, '_menu_item_object', 'category'),
(183, 54, '_menu_item_target', ''),
(184, 54, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(185, 54, '_menu_item_xfn', ''),
(186, 54, '_menu_item_url', ''),
(187, 54, '_menu_item_orphaned', '1486137352'),
(188, 55, '_menu_item_type', 'taxonomy'),
(189, 55, '_menu_item_menu_item_parent', '0'),
(190, 55, '_menu_item_object_id', '11'),
(191, 55, '_menu_item_object', 'category'),
(192, 55, '_menu_item_target', ''),
(193, 55, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(194, 55, '_menu_item_xfn', ''),
(195, 55, '_menu_item_url', ''),
(196, 55, '_menu_item_orphaned', '1486137352'),
(197, 56, '_menu_item_type', 'taxonomy'),
(198, 56, '_menu_item_menu_item_parent', '0'),
(199, 56, '_menu_item_object_id', '12'),
(200, 56, '_menu_item_object', 'category'),
(201, 56, '_menu_item_target', ''),
(202, 56, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(203, 56, '_menu_item_xfn', ''),
(204, 56, '_menu_item_url', ''),
(205, 56, '_menu_item_orphaned', '1486137352'),
(206, 57, '_menu_item_type', 'taxonomy'),
(207, 57, '_menu_item_menu_item_parent', '0'),
(208, 57, '_menu_item_object_id', '5'),
(209, 57, '_menu_item_object', 'category'),
(210, 57, '_menu_item_target', ''),
(211, 57, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(212, 57, '_menu_item_xfn', ''),
(213, 57, '_menu_item_url', ''),
(245, 61, '_menu_item_object', 'custom'),
(215, 58, '_menu_item_type', 'taxonomy'),
(216, 58, '_menu_item_menu_item_parent', '0'),
(217, 58, '_menu_item_object_id', '6'),
(218, 58, '_menu_item_object', 'category'),
(219, 58, '_menu_item_target', ''),
(220, 58, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(221, 58, '_menu_item_xfn', ''),
(222, 58, '_menu_item_url', ''),
(244, 61, '_menu_item_object_id', '61'),
(224, 59, '_menu_item_type', 'taxonomy'),
(225, 59, '_menu_item_menu_item_parent', '0'),
(226, 59, '_menu_item_object_id', '7'),
(227, 59, '_menu_item_object', 'category'),
(228, 59, '_menu_item_target', ''),
(229, 59, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(230, 59, '_menu_item_xfn', ''),
(231, 59, '_menu_item_url', ''),
(243, 61, '_menu_item_menu_item_parent', '0'),
(233, 60, '_menu_item_type', 'taxonomy'),
(234, 60, '_menu_item_menu_item_parent', '0'),
(235, 60, '_menu_item_object_id', '8'),
(236, 60, '_menu_item_object', 'category'),
(237, 60, '_menu_item_target', ''),
(238, 60, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(239, 60, '_menu_item_xfn', ''),
(240, 60, '_menu_item_url', ''),
(242, 61, '_menu_item_type', 'custom'),
(247, 61, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(248, 61, '_menu_item_xfn', ''),
(249, 61, '_menu_item_url', '#contact');

-- --------------------------------------------------------

--
-- Structure de la table `lfdvdm_posts`
--

CREATE TABLE `lfdvdm_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Contenu de la table `lfdvdm_posts`
--

INSERT INTO `lfdvdm_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2017-01-31 14:51:46', '2017-01-31 13:51:46', 'Bienvenue dans WordPress. Ceci est votre premier article. Modifiez-le ou supprimez-le, puis lancez-vous !', 'Bonjour tout le monde&nbsp;!', '', 'publish', 'open', 'open', '', 'bonjour-tout-le-monde', '', '', '2017-02-03 16:55:16', '2017-02-03 15:55:16', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=1', 0, 'post', '', 1),
(2, 1, '2017-01-31 14:51:46', '2017-01-31 13:51:46', 'Voici un exemple de page. Elle est différente d’un article de blog, en cela qu’elle restera à la même place, et s’affichera dans le menu de navigation de votre site (en fonction de votre thème). La plupart des gens commencent par écrire une page « À Propos » qui les présente aux visiteurs potentiels du site. Vous pourriez y écrire quelque chose de ce tenant :\r\n<blockquote>Bonjour ! Je suis un mécanicien qui aspire à devenir un acteur, et voici mon blog. J’habite à Bordeaux, j’ai un super chien baptisé Russell, et j’aime la vodka-ananas (ainsi que regarder la pluie tomber).</blockquote>\r\n...ou bien quelque chose comme ça :\r\n<blockquote>La société 123 Machin Truc a été créée en 1971, et n’a cessé de proposer au public des machins-trucs de qualité depuis lors. Située à Saint-Remy-en-Bouzemont-Saint-Genest-et-Isson, 123 Machin Truc emploie 2 000 personnes, et fabrique toutes sortes de bidules super pour la communauté bouzemontoise.</blockquote>\r\nÉtant donné que vous êtes un nouvel utilisateur de WordPress, vous devriez vous rendre sur votre <a href="http://lesfrancas.dev-websiting.fr/wp-admin/">Tableau de bord</a> pour effacer la présente page, et créer de nouvelles pages avec votre propre contenu. Amusez-vous bien !', 'Landing Page', '', 'publish', 'closed', 'open', '', 'landingpage', '', '', '2017-01-31 15:57:47', '2017-01-31 14:57:47', '', 0, 'http://lesfrancas.dev-websiting.fr/?page_id=2', 0, 'page', '', 0),
(3, 1, '2017-01-31 14:51:51', '0000-00-00 00:00:00', '', 'Brouillon auto', '', 'auto-draft', 'open', 'open', '', '', '', '', '2017-01-31 14:51:51', '0000-00-00 00:00:00', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=3', 0, 'post', '', 0),
(4, 1, '2017-01-31 15:57:04', '2017-01-31 14:57:04', '{\n    "show_on_front": {\n        "value": "page",\n        "type": "option",\n        "user_id": 1\n    },\n    "page_on_front": {\n        "value": "2",\n        "type": "option",\n        "user_id": 1\n    },\n    "page_for_posts": {\n        "value": "0",\n        "type": "option",\n        "user_id": 1\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '4754d3dd-660a-420a-ba66-5dd6ed6670da', '', '', '2017-01-31 15:57:04', '2017-01-31 14:57:04', '', 0, 'http://lesfrancas.dev-websiting.fr/2017/01/31/4754d3dd-660a-420a-ba66-5dd6ed6670da/', 0, 'customize_changeset', '', 0),
(5, 1, '2017-01-31 15:57:27', '2017-01-31 14:57:27', '{\n    "page_on_front": {\n        "value": "0",\n        "type": "option",\n        "user_id": 1\n    }\n}', '', '', 'trash', 'closed', 'closed', '', 'db502c70-49c4-4899-bb17-19e83ccff78e', '', '', '2017-01-31 15:57:27', '2017-01-31 14:57:27', '', 0, 'http://lesfrancas.dev-websiting.fr/2017/01/31/db502c70-49c4-4899-bb17-19e83ccff78e/', 0, 'customize_changeset', '', 0),
(6, 1, '2017-01-31 15:57:47', '2017-01-31 14:57:47', 'Voici un exemple de page. Elle est différente d’un article de blog, en cela qu’elle restera à la même place, et s’affichera dans le menu de navigation de votre site (en fonction de votre thème). La plupart des gens commencent par écrire une page « À Propos » qui les présente aux visiteurs potentiels du site. Vous pourriez y écrire quelque chose de ce tenant :\r\n<blockquote>Bonjour ! Je suis un mécanicien qui aspire à devenir un acteur, et voici mon blog. J’habite à Bordeaux, j’ai un super chien baptisé Russell, et j’aime la vodka-ananas (ainsi que regarder la pluie tomber).</blockquote>\r\n...ou bien quelque chose comme ça :\r\n<blockquote>La société 123 Machin Truc a été créée en 1971, et n’a cessé de proposer au public des machins-trucs de qualité depuis lors. Située à Saint-Remy-en-Bouzemont-Saint-Genest-et-Isson, 123 Machin Truc emploie 2 000 personnes, et fabrique toutes sortes de bidules super pour la communauté bouzemontoise.</blockquote>\r\nÉtant donné que vous êtes un nouvel utilisateur de WordPress, vous devriez vous rendre sur votre <a href="http://lesfrancas.dev-websiting.fr/wp-admin/">Tableau de bord</a> pour effacer la présente page, et créer de nouvelles pages avec votre propre contenu. Amusez-vous bien !', 'Landing Page', '', 'inherit', 'closed', 'closed', '', '2-revision-v1', '', '', '2017-01-31 15:57:47', '2017-01-31 14:57:47', '', 2, 'http://lesfrancas.dev-websiting.fr/2017/01/31/2-revision-v1/', 0, 'revision', '', 0),
(7, 1, '2017-01-31 15:57:55', '2017-01-31 14:57:55', '{\n    "page_on_front": {\n        "value": "2",\n        "type": "option",\n        "user_id": 1\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '4dd79dfa-aa74-49ba-8ea3-d9584c561670', '', '', '2017-01-31 15:57:55', '2017-01-31 14:57:55', '', 0, 'http://lesfrancas.dev-websiting.fr/2017/01/31/4dd79dfa-aa74-49ba-8ea3-d9584c561670/', 0, 'customize_changeset', '', 0),
(8, 1, '2017-01-31 16:23:44', '2017-01-31 15:23:44', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Conditions générales d\'utilisations', '', 'publish', 'closed', 'closed', '', 'conditions-generales-dutilisations', '', '', '2017-02-03 15:45:46', '2017-02-03 14:45:46', '', 0, 'http://lesfrancas.dev-websiting.fr/?page_id=8', 0, 'page', '', 0),
(9, 1, '2017-01-31 16:23:44', '2017-01-31 15:23:44', '', 'Conditions générales d\'utilisations', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2017-01-31 16:23:44', '2017-01-31 15:23:44', '', 8, 'http://lesfrancas.dev-websiting.fr/8-revision-v1/', 0, 'revision', '', 0),
(10, 1, '2017-01-31 16:23:48', '0000-00-00 00:00:00', '', 'Brouillon auto', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2017-01-31 16:23:48', '0000-00-00 00:00:00', '', 0, 'http://lesfrancas.dev-websiting.fr/?page_id=10', 0, 'page', '', 0),
(11, 1, '2017-02-03 11:40:39', '0000-00-00 00:00:00', '', 'Brouillon auto', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2017-02-03 11:40:39', '0000-00-00 00:00:00', '', 0, 'http://lesfrancas.dev-websiting.fr/?page_id=11', 0, 'page', '', 0),
(12, 1, '2017-02-03 11:53:08', '2017-02-03 10:53:08', '', 'Qui sommes nous ?', '', 'publish', 'closed', 'closed', '', 'qui-sommes-nous', '', '', '2017-02-03 11:53:08', '2017-02-03 10:53:08', '', 0, 'http://lesfrancas.dev-websiting.fr/?page_id=12', 0, 'page', '', 0),
(13, 1, '2017-02-03 11:53:08', '2017-02-03 10:53:08', '', 'Qui sommes nous ?', '', 'inherit', 'closed', 'closed', '', '12-revision-v1', '', '', '2017-02-03 11:53:08', '2017-02-03 10:53:08', '', 12, 'http://lesfrancas.dev-websiting.fr/12-revision-v1/', 0, 'revision', '', 0),
(14, 1, '2017-02-03 11:53:48', '2017-02-03 10:53:48', '', 'Article', '', 'publish', 'closed', 'closed', '', 'article', '', '', '2017-02-03 11:53:48', '2017-02-03 10:53:48', '', 0, 'http://lesfrancas.dev-websiting.fr/?page_id=14', 0, 'page', '', 0),
(15, 1, '2017-02-03 11:53:48', '2017-02-03 10:53:48', '', 'Article', '', 'inherit', 'closed', 'closed', '', '14-revision-v1', '', '', '2017-02-03 11:53:48', '2017-02-03 10:53:48', '', 14, 'http://lesfrancas.dev-websiting.fr/14-revision-v1/', 0, 'revision', '', 0),
(16, 1, '2017-02-03 11:53:51', '0000-00-00 00:00:00', '', 'Brouillon auto', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2017-02-03 11:53:51', '0000-00-00 00:00:00', '', 0, 'http://lesfrancas.dev-websiting.fr/?page_id=16', 0, 'page', '', 0),
(17, 1, '2017-02-03 11:59:12', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2017-02-03 11:59:12', '0000-00-00 00:00:00', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=17', 1, 'nav_menu_item', '', 0),
(18, 1, '2017-02-03 11:59:12', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2017-02-03 11:59:12', '0000-00-00 00:00:00', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=18', 1, 'nav_menu_item', '', 0),
(19, 1, '2017-02-03 11:59:12', '0000-00-00 00:00:00', '', 'Conditions générales d\'utilisations', '', 'draft', 'closed', 'closed', '', '', '', '', '2017-02-03 11:59:12', '0000-00-00 00:00:00', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=19', 1, 'nav_menu_item', '', 0),
(20, 1, '2017-02-03 11:59:12', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2017-02-03 11:59:12', '0000-00-00 00:00:00', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=20', 1, 'nav_menu_item', '', 0),
(21, 1, '2017-02-03 11:59:12', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2017-02-03 11:59:12', '0000-00-00 00:00:00', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=21', 1, 'nav_menu_item', '', 0),
(22, 1, '2017-02-03 13:30:46', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2017-02-03 13:30:46', '0000-00-00 00:00:00', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=22', 1, 'nav_menu_item', '', 0),
(23, 1, '2017-02-03 13:30:46', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2017-02-03 13:30:46', '0000-00-00 00:00:00', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=23', 1, 'nav_menu_item', '', 0),
(24, 1, '2017-02-03 13:30:46', '0000-00-00 00:00:00', '', 'Conditions générales d\'utilisations', '', 'draft', 'closed', 'closed', '', '', '', '', '2017-02-03 13:30:46', '0000-00-00 00:00:00', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=24', 1, 'nav_menu_item', '', 0),
(25, 1, '2017-02-03 13:30:46', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2017-02-03 13:30:46', '0000-00-00 00:00:00', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=25', 1, 'nav_menu_item', '', 0),
(26, 1, '2017-02-03 13:30:46', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2017-02-03 13:30:46', '0000-00-00 00:00:00', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=26', 1, 'nav_menu_item', '', 0),
(27, 1, '2017-02-03 13:34:53', '2017-02-03 12:34:53', '', 'FAQ', '', 'publish', 'closed', 'closed', '', 'faq', '', '', '2017-02-03 13:35:37', '2017-02-03 12:35:37', '', 0, 'http://lesfrancas.dev-websiting.fr/?page_id=27', 0, 'page', '', 0),
(29, 1, '2017-02-03 13:35:37', '2017-02-03 12:35:37', '', 'FAQ', '', 'inherit', 'closed', 'closed', '', '27-revision-v1', '', '', '2017-02-03 13:35:37', '2017-02-03 12:35:37', '', 27, 'http://lesfrancas.dev-websiting.fr/27-revision-v1/', 0, 'revision', '', 0),
(28, 1, '2017-02-03 13:34:53', '2017-02-03 12:34:53', '', 'Citoyenneté', '', 'inherit', 'closed', 'closed', '', '27-revision-v1', '', '', '2017-02-03 13:34:53', '2017-02-03 12:34:53', '', 27, 'http://lesfrancas.dev-websiting.fr/27-revision-v1/', 0, 'revision', '', 0),
(30, 1, '2017-02-03 13:36:23', '2017-02-03 12:36:23', '', 'Mon compte', '', 'publish', 'closed', 'closed', '', 'mon-compte', '', '', '2017-02-03 13:36:23', '2017-02-03 12:36:23', '', 0, 'http://lesfrancas.dev-websiting.fr/?page_id=30', 0, 'page', '', 0),
(31, 1, '2017-02-03 13:36:23', '2017-02-03 12:36:23', '', 'Mon compte', '', 'inherit', 'closed', 'closed', '', '30-revision-v1', '', '', '2017-02-03 13:36:23', '2017-02-03 12:36:23', '', 30, 'http://lesfrancas.dev-websiting.fr/30-revision-v1/', 0, 'revision', '', 0),
(32, 1, '2017-02-03 13:38:36', '2017-02-03 12:38:36', '', 'Editer Profil', '', 'publish', 'closed', 'closed', '', 'editer-profil', '', '', '2017-02-03 13:38:47', '2017-02-03 12:38:47', '', 30, 'http://lesfrancas.dev-websiting.fr/?page_id=32', 0, 'page', '', 0),
(33, 1, '2017-02-03 13:38:36', '2017-02-03 12:38:36', '', 'Editer Profil', '', 'inherit', 'closed', 'closed', '', '32-revision-v1', '', '', '2017-02-03 13:38:36', '2017-02-03 12:38:36', '', 32, 'http://lesfrancas.dev-websiting.fr/32-revision-v1/', 0, 'revision', '', 0),
(34, 1, '2017-02-03 13:39:34', '2017-02-03 12:39:34', '', 'Inscription connexion', '', 'publish', 'closed', 'closed', '', 'connexion-inscription', '', '', '2017-02-03 13:39:53', '2017-02-03 12:39:53', '', 30, 'http://lesfrancas.dev-websiting.fr/?page_id=34', 0, 'page', '', 0),
(35, 1, '2017-02-03 13:39:34', '2017-02-03 12:39:34', '', 'connexion-inscription', '', 'inherit', 'closed', 'closed', '', '34-revision-v1', '', '', '2017-02-03 13:39:34', '2017-02-03 12:39:34', '', 34, 'http://lesfrancas.dev-websiting.fr/34-revision-v1/', 0, 'revision', '', 0),
(36, 1, '2017-02-03 13:39:53', '2017-02-03 12:39:53', '', 'Inscription connexion', '', 'inherit', 'closed', 'closed', '', '34-revision-v1', '', '', '2017-02-03 13:39:53', '2017-02-03 12:39:53', '', 34, 'http://lesfrancas.dev-websiting.fr/34-revision-v1/', 0, 'revision', '', 0),
(37, 1, '2017-02-03 13:40:21', '2017-02-03 12:40:21', '', 'Résultat recherche', '', 'publish', 'closed', 'closed', '', 'resultat-recherche', '', '', '2017-02-03 13:40:21', '2017-02-03 12:40:21', '', 0, 'http://lesfrancas.dev-websiting.fr/?page_id=37', 0, 'page', '', 0),
(38, 1, '2017-02-03 13:40:21', '2017-02-03 12:40:21', '', 'Résultat recherche', '', 'inherit', 'closed', 'closed', '', '37-revision-v1', '', '', '2017-02-03 13:40:21', '2017-02-03 12:40:21', '', 37, 'http://lesfrancas.dev-websiting.fr/37-revision-v1/', 0, 'revision', '', 0),
(39, 1, '2017-02-03 13:41:01', '2017-02-03 12:41:01', '', 'Q/R', '', 'publish', 'closed', 'closed', '', 'qr', '', '', '2017-02-03 13:41:01', '2017-02-03 12:41:01', '', 0, 'http://lesfrancas.dev-websiting.fr/?page_id=39', 0, 'page', '', 0),
(40, 1, '2017-02-03 13:41:01', '2017-02-03 12:41:01', '', 'Q/R', '', 'inherit', 'closed', 'closed', '', '39-revision-v1', '', '', '2017-02-03 13:41:01', '2017-02-03 12:41:01', '', 39, 'http://lesfrancas.dev-websiting.fr/39-revision-v1/', 0, 'revision', '', 0),
(41, 1, '2017-02-03 14:09:15', '2017-02-03 13:09:15', '', 'Contact', '', 'publish', 'closed', 'closed', '', 'contact', '', '', '2017-02-03 14:09:15', '2017-02-03 13:09:15', '', 0, 'http://lesfrancas.dev-websiting.fr/?page_id=41', 0, 'page', '', 0),
(42, 1, '2017-02-03 14:09:15', '2017-02-03 13:09:15', '', 'Contact', '', 'inherit', 'closed', 'closed', '', '41-revision-v1', '', '', '2017-02-03 14:09:15', '2017-02-03 13:09:15', '', 41, 'http://lesfrancas.dev-websiting.fr/41-revision-v1/', 0, 'revision', '', 0),
(43, 1, '2017-02-03 14:10:20', '2017-02-03 13:10:20', ' ', '', '', 'publish', 'closed', 'closed', '', '43', '', '', '2017-02-03 14:24:46', '2017-02-03 13:24:46', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=43', 2, 'nav_menu_item', '', 0),
(44, 1, '2017-02-03 14:10:20', '2017-02-03 13:10:20', ' ', '', '', 'publish', 'closed', 'closed', '', '44', '', '', '2017-02-03 14:24:46', '2017-02-03 13:24:46', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=44', 1, 'nav_menu_item', '', 0),
(45, 1, '2017-02-03 14:10:20', '2017-02-03 13:10:20', '', 'Conditions générales d\'utilisations', '', 'publish', 'closed', 'closed', '', 'conditions-generales-dutilisations', '', '', '2017-02-03 14:24:46', '2017-02-03 13:24:46', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=45', 3, 'nav_menu_item', '', 0),
(46, 1, '2017-02-03 15:45:46', '2017-02-03 14:45:46', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Conditions générales d\'utilisations', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2017-02-03 15:45:46', '2017-02-03 14:45:46', '', 8, 'http://lesfrancas.dev-websiting.fr/8-revision-v1/', 0, 'revision', '', 0),
(47, 1, '2017-02-03 16:20:43', '2017-02-03 15:20:43', 'contenu du texte', 'Mon Classeur', '', 'publish', 'closed', 'closed', '', 'mon-classeur', '', '', '2017-02-03 16:21:37', '2017-02-03 15:21:37', '', 0, 'http://lesfrancas.dev-websiting.fr/?page_id=47', 0, 'page', '', 0),
(48, 1, '2017-02-03 16:20:43', '2017-02-03 15:20:43', '', 'Mon Classeur', '', 'inherit', 'closed', 'closed', '', '47-revision-v1', '', '', '2017-02-03 16:20:43', '2017-02-03 15:20:43', '', 47, 'http://lesfrancas.dev-websiting.fr/47-revision-v1/', 0, 'revision', '', 0),
(49, 1, '2017-02-03 16:21:37', '2017-02-03 15:21:37', 'contenu du texte', 'Mon Classeur', '', 'inherit', 'closed', 'closed', '', '47-revision-v1', '', '', '2017-02-03 16:21:37', '2017-02-03 15:21:37', '', 47, 'http://lesfrancas.dev-websiting.fr/47-revision-v1/', 0, 'revision', '', 0),
(50, 1, '2017-02-03 16:55:16', '2017-02-03 15:55:16', 'Bienvenue dans WordPress. Ceci est votre premier article. Modifiez-le ou supprimez-le, puis lancez-vous !', 'Bonjour tout le monde&nbsp;!', '', 'inherit', 'closed', 'closed', '', '1-revision-v1', '', '', '2017-02-03 16:55:16', '2017-02-03 15:55:16', '', 1, 'http://lesfrancas.dev-websiting.fr/1-revision-v1/', 0, 'revision', '', 0),
(51, 1, '2017-02-03 16:55:52', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2017-02-03 16:55:52', '0000-00-00 00:00:00', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=51', 1, 'nav_menu_item', '', 0),
(52, 1, '2017-02-03 16:56:50', '2017-02-03 15:56:50', ' ', '', '', 'publish', 'closed', 'closed', '', '52', '', '', '2017-02-03 16:57:28', '2017-02-03 15:57:28', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=52', 1, 'nav_menu_item', '', 0),
(53, 1, '2017-02-03 16:55:52', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2017-02-03 16:55:52', '0000-00-00 00:00:00', '', 4, 'http://lesfrancas.dev-websiting.fr/?p=53', 1, 'nav_menu_item', '', 0),
(54, 1, '2017-02-03 16:55:52', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2017-02-03 16:55:52', '0000-00-00 00:00:00', '', 4, 'http://lesfrancas.dev-websiting.fr/?p=54', 1, 'nav_menu_item', '', 0),
(55, 1, '2017-02-03 16:55:52', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2017-02-03 16:55:52', '0000-00-00 00:00:00', '', 4, 'http://lesfrancas.dev-websiting.fr/?p=55', 1, 'nav_menu_item', '', 0),
(56, 1, '2017-02-03 16:55:52', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2017-02-03 16:55:52', '0000-00-00 00:00:00', '', 4, 'http://lesfrancas.dev-websiting.fr/?p=56', 1, 'nav_menu_item', '', 0),
(57, 1, '2017-02-03 16:56:50', '2017-02-03 15:56:50', ' ', '', '', 'publish', 'closed', 'closed', '', '57', '', '', '2017-02-03 16:57:28', '2017-02-03 15:57:28', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=57', 2, 'nav_menu_item', '', 0),
(58, 1, '2017-02-03 16:56:50', '2017-02-03 15:56:50', ' ', '', '', 'publish', 'closed', 'closed', '', '58', '', '', '2017-02-03 16:57:28', '2017-02-03 15:57:28', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=58', 3, 'nav_menu_item', '', 0),
(59, 1, '2017-02-03 16:56:50', '2017-02-03 15:56:50', ' ', '', '', 'publish', 'closed', 'closed', '', '59', '', '', '2017-02-03 16:57:28', '2017-02-03 15:57:28', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=59', 4, 'nav_menu_item', '', 0),
(60, 1, '2017-02-03 16:56:50', '2017-02-03 15:56:50', ' ', '', '', 'publish', 'closed', 'closed', '', '60', '', '', '2017-02-03 16:57:28', '2017-02-03 15:57:28', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=60', 5, 'nav_menu_item', '', 0),
(61, 1, '2017-02-03 16:57:28', '2017-02-03 15:57:28', '', 'email', '', 'publish', 'closed', 'closed', '', 'email', '', '', '2017-02-03 16:57:28', '2017-02-03 15:57:28', '', 0, 'http://lesfrancas.dev-websiting.fr/?p=61', 6, 'nav_menu_item', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `lfdvdm_termmeta`
--

CREATE TABLE `lfdvdm_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lfdvdm_terms`
--

CREATE TABLE `lfdvdm_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Contenu de la table `lfdvdm_terms`
--

INSERT INTO `lfdvdm_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Non classé', 'non-classe', 0),
(2, 'Top Menu', 'top-menu', 0),
(3, 'Footer Menu', 'footer-menu', 0),
(4, 'Citoyenneté', 'citoyennete', 0),
(5, 'Laïcité', 'laicite', 0),
(6, 'Liberté', 'liberte', 0),
(7, 'Égalité', 'egalite', 0),
(8, 'Fraternité', 'fraternite', 0),
(9, 'Formations', 'formations', 0),
(10, 'Expériences locales', 'experiences-locales', 0),
(11, 'Interventions spécialées', 'interventions-specialees', 0),
(12, 'Appels à projet', 'appels-a-projet', 0),
(13, 'Outils', 'outils', 0),
(14, 'Ressources documentaires', 'ressources-documentaires', 0),
(15, 'Débats-rencontres', 'debats-rencontres', 0),
(16, 'Expositions', 'expositions', 0),
(17, 'Actualités', 'actualites', 0),
(18, 'Formations', 'formations-laicite', 0),
(19, 'Expériences locales', 'experiences-locales-laicite', 0),
(20, 'Interventions spécialisées', 'interventions-specialisees', 0),
(21, 'Appels à projet', 'appels-a-projet-laicite', 0),
(22, 'Outils', 'outils-laicite', 0),
(23, 'Ressources documentaires', 'ressources-documentaires-laicite', 0),
(24, 'Débats-rencontres', 'debats-rencontres-laicite', 0),
(25, 'Expositions', 'expositions-laicite', 0),
(26, 'Actualités', 'actualites-laicite', 0),
(27, 'Formations', 'formations-liberte', 0),
(28, 'Expériences locales', 'experiences-locales-liberte', 0),
(29, 'Interventions spécialisées', 'interventions-specialisees-liberte', 0),
(30, 'Appels à projet', 'appels-a-projet-liberte', 0),
(31, 'Outils', 'outils-liberte', 0),
(32, 'Ressources documentaires', 'ressources-documentaires-liberte', 0),
(33, 'Débats-rencontre', 'debats-rencontre', 0),
(34, 'Expositions', 'expositions-liberte', 0),
(35, 'Actualités', 'actualites-liberte', 0),
(36, 'Formations', 'formations-egalite', 0),
(37, 'Expériences locales', 'experiences-locales-egalite', 0),
(38, 'Interventions spécialisées', 'interventions-specialisees-egalite', 0),
(39, 'Appels à projet', 'appels-a-projet-egalite', 0),
(40, 'Outils', 'outils-egalite', 0),
(41, 'Ressources documentaires', 'ressources-documentaires-egalite', 0),
(42, 'Débats-rencontres', 'debats-rencontres-egalite', 0),
(43, 'Expositions', 'expositions-egalite', 0),
(44, 'Actualités', 'actualites-egalite', 0),
(45, 'Formations', 'formations-fraternite', 0),
(46, 'Expériences locales', 'experiences-locales-fraternite', 0),
(47, 'Interventions spécialisées', 'interventions-specialisees-fraternite', 0),
(48, 'Appels à projet', 'appels-a-projet-fraternite', 0),
(49, 'Outils', 'outils-fraternite', 0),
(50, 'Ressources documentaires', 'ressources-documentaires-fraternite', 0),
(51, 'Débats-rencontres', 'debats-rencontres-fraternite', 0),
(52, 'Expositions', 'expositions-fraternite', 0),
(53, 'Actualités', 'actualites-fraternite', 0);

-- --------------------------------------------------------

--
-- Structure de la table `lfdvdm_term_relationships`
--

CREATE TABLE `lfdvdm_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Contenu de la table `lfdvdm_term_relationships`
--

INSERT INTO `lfdvdm_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0),
(44, 3, 0),
(43, 3, 0),
(45, 3, 0),
(1, 4, 0),
(1, 17, 0),
(1, 12, 0),
(1, 15, 0),
(1, 10, 0),
(1, 16, 0),
(1, 9, 0),
(1, 11, 0),
(1, 13, 0),
(1, 14, 0),
(1, 7, 0),
(1, 44, 0),
(1, 39, 0),
(1, 42, 0),
(1, 37, 0),
(1, 43, 0),
(1, 36, 0),
(1, 38, 0),
(1, 40, 0),
(1, 41, 0),
(1, 8, 0),
(1, 53, 0),
(1, 48, 0),
(1, 51, 0),
(1, 46, 0),
(1, 52, 0),
(1, 45, 0),
(1, 47, 0),
(1, 49, 0),
(1, 50, 0),
(1, 5, 0),
(1, 26, 0),
(1, 21, 0),
(1, 24, 0),
(1, 19, 0),
(1, 25, 0),
(1, 18, 0),
(1, 20, 0),
(1, 22, 0),
(1, 23, 0),
(1, 6, 0),
(1, 35, 0),
(1, 30, 0),
(1, 33, 0),
(1, 28, 0),
(1, 34, 0),
(1, 27, 0),
(1, 29, 0),
(1, 31, 0),
(1, 32, 0),
(52, 2, 0),
(57, 2, 0),
(58, 2, 0),
(59, 2, 0),
(60, 2, 0),
(61, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `lfdvdm_term_taxonomy`
--

CREATE TABLE `lfdvdm_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Contenu de la table `lfdvdm_term_taxonomy`
--

INSERT INTO `lfdvdm_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1),
(2, 2, 'nav_menu', '', 0, 6),
(3, 3, 'nav_menu', '', 0, 3),
(4, 4, 'category', '', 0, 1),
(5, 5, 'category', '', 0, 1),
(6, 6, 'category', '', 0, 1),
(7, 7, 'category', '', 0, 1),
(8, 8, 'category', '', 0, 1),
(9, 9, 'category', '', 4, 1),
(10, 10, 'category', '', 4, 1),
(11, 11, 'category', '', 4, 1),
(12, 12, 'category', '', 4, 1),
(13, 13, 'category', '', 4, 1),
(14, 14, 'category', '', 4, 1),
(15, 15, 'category', '', 4, 1),
(16, 16, 'category', '', 4, 1),
(17, 17, 'category', '', 4, 1),
(18, 18, 'category', '', 5, 1),
(19, 19, 'category', '', 5, 1),
(20, 20, 'category', '', 5, 1),
(21, 21, 'category', '', 5, 1),
(22, 22, 'category', '', 5, 1),
(23, 23, 'category', '', 5, 1),
(24, 24, 'category', '', 5, 1),
(25, 25, 'category', '', 5, 1),
(26, 26, 'category', '', 5, 1),
(27, 27, 'category', '', 6, 1),
(28, 28, 'category', '', 6, 1),
(29, 29, 'category', '', 6, 1),
(30, 30, 'category', '', 6, 1),
(31, 31, 'category', '', 6, 1),
(32, 32, 'category', '', 6, 1),
(33, 33, 'category', '', 6, 1),
(34, 34, 'category', '', 6, 1),
(35, 35, 'category', '', 6, 1),
(36, 36, 'category', '', 7, 1),
(37, 37, 'category', '', 7, 1),
(38, 38, 'category', '', 7, 1),
(39, 39, 'category', '', 7, 1),
(40, 40, 'category', '', 7, 1),
(41, 41, 'category', '', 7, 1),
(42, 42, 'category', '', 7, 1),
(43, 43, 'category', '', 7, 1),
(44, 44, 'category', '', 7, 1),
(45, 45, 'category', '', 8, 1),
(46, 46, 'category', '', 8, 1),
(47, 47, 'category', '', 8, 1),
(48, 48, 'category', '', 8, 1),
(49, 49, 'category', '', 8, 1),
(50, 50, 'category', '', 8, 1),
(51, 51, 'category', '', 8, 1),
(52, 52, 'category', '', 8, 1),
(53, 53, 'category', '', 8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lfdvdm_usermeta`
--

CREATE TABLE `lfdvdm_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Contenu de la table `lfdvdm_usermeta`
--

INSERT INTO `lfdvdm_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'a.diop@websiting.fr'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'comment_shortcuts', 'false'),
(7, 1, 'admin_color', 'fresh'),
(8, 1, 'use_ssl', '0'),
(9, 1, 'show_admin_bar_front', 'true'),
(10, 1, 'locale', ''),
(11, 1, 'lfdvdm_capabilities', 'a:1:{s:13:"administrator";b:1;}'),
(12, 1, 'lfdvdm_user_level', '10'),
(13, 1, 'dismissed_wp_pointers', ''),
(14, 1, 'show_welcome_panel', '1'),
(15, 1, 'session_tokens', 'a:2:{s:64:"2affd55aca507b6dffa79a605ccabc7af7e4ec91bf2f38a1022608b9decc7fc9";a:4:{s:10:"expiration";i:1487080307;s:2:"ip";s:9:"127.0.0.1";s:2:"ua";s:113:"Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36";s:5:"login";i:1485870707;}s:64:"3e884abad4ae7d55a2c6d2f00e9ded7e45174cf6979631143773255cabb29fbb";a:4:{s:10:"expiration";i:1486290936;s:2:"ip";s:9:"127.0.0.1";s:2:"ua";s:113:"Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36";s:5:"login";i:1486118136;}}'),
(16, 1, 'lfdvdm_dashboard_quick_press_last_post_id', '3'),
(17, 1, 'managenav-menuscolumnshidden', 'a:5:{i:0;s:11:"link-target";i:1;s:11:"css-classes";i:2;s:3:"xfn";i:3;s:11:"description";i:4;s:15:"title-attribute";}'),
(18, 1, 'metaboxhidden_nav-menus', 'a:1:{i:0;s:12:"add-post_tag";}'),
(19, 1, 'nav_menu_recently_edited', '2');

-- --------------------------------------------------------

--
-- Structure de la table `lfdvdm_users`
--

CREATE TABLE `lfdvdm_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Contenu de la table `lfdvdm_users`
--

INSERT INTO `lfdvdm_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'a.diop@websiting.fr', '$P$B1fWw2j.jAm.WK.pH2LqoZzWU0bTi40', 'a-diopwebsiting-fr', 'a.diop@websiting.fr', '', '2017-01-31 13:51:46', '', 0, 'a.diop@websiting.fr');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `lfdvdm_commentmeta`
--
ALTER TABLE `lfdvdm_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Index pour la table `lfdvdm_comments`
--
ALTER TABLE `lfdvdm_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Index pour la table `lfdvdm_links`
--
ALTER TABLE `lfdvdm_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Index pour la table `lfdvdm_options`
--
ALTER TABLE `lfdvdm_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Index pour la table `lfdvdm_postmeta`
--
ALTER TABLE `lfdvdm_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Index pour la table `lfdvdm_posts`
--
ALTER TABLE `lfdvdm_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Index pour la table `lfdvdm_termmeta`
--
ALTER TABLE `lfdvdm_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Index pour la table `lfdvdm_terms`
--
ALTER TABLE `lfdvdm_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Index pour la table `lfdvdm_term_relationships`
--
ALTER TABLE `lfdvdm_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Index pour la table `lfdvdm_term_taxonomy`
--
ALTER TABLE `lfdvdm_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Index pour la table `lfdvdm_usermeta`
--
ALTER TABLE `lfdvdm_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Index pour la table `lfdvdm_users`
--
ALTER TABLE `lfdvdm_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `lfdvdm_commentmeta`
--
ALTER TABLE `lfdvdm_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `lfdvdm_comments`
--
ALTER TABLE `lfdvdm_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `lfdvdm_links`
--
ALTER TABLE `lfdvdm_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `lfdvdm_options`
--
ALTER TABLE `lfdvdm_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT pour la table `lfdvdm_postmeta`
--
ALTER TABLE `lfdvdm_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;
--
-- AUTO_INCREMENT pour la table `lfdvdm_posts`
--
ALTER TABLE `lfdvdm_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT pour la table `lfdvdm_termmeta`
--
ALTER TABLE `lfdvdm_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `lfdvdm_terms`
--
ALTER TABLE `lfdvdm_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT pour la table `lfdvdm_term_taxonomy`
--
ALTER TABLE `lfdvdm_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT pour la table `lfdvdm_usermeta`
--
ALTER TABLE `lfdvdm_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `lfdvdm_users`
--
ALTER TABLE `lfdvdm_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
