<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'planty' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '|(:M#x>^aTQDs)@m@slP4#.3@*:0kJsm3(3Z oGj>ml-S]17gwmnx*~0<$4@3sg1' );
define( 'SECURE_AUTH_KEY',  'h%afy=S<`=[uW<j tW6Sv!0??Fh2RpP:W^8vDQ&BZ}<M,]_/Z;|5_A;Q*y&j1x[?' );
define( 'LOGGED_IN_KEY',    '+v7iUKPfY?*1PP@Xh^hd{i.vdkg/l.PEotu[ ) e eqiA4@X8egv%>0#Z&t8Hh73' );
define( 'NONCE_KEY',        '3_b7?nMP$ct8@_aq44N`-bO#&<Y$l>JS6Pk/y,CRsqiTBrKmTGM7Xb{tua[`=LuC' );
define( 'AUTH_SALT',        'Br#@rkW?F3%5VfF;7sEktI4d6Rfo|t1k(*/_kC&(UK_)4F0rAvLC`rJYzj-7g5yi' );
define( 'SECURE_AUTH_SALT', 'MTn*L7P{Q<A8B2;+k4<}Xeu*rcD6}7nCe=}u}RoYJhjPz5T82Y)6uc61eY V`C._' );
define( 'LOGGED_IN_SALT',   '=|IHN_Y*+I5> ;I*}MoScn>xj,VLv>+aNiEIyoKxZr7yNB@b5]e!}S7,d12Byf}K' );
define( 'NONCE_SALT',       '1),-6),<X$| t<@~]$x{I3Nma&KVfz;]>/a~7asQ>kEO[nVGC:`&ATlgaCq7|CLe' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG',true);
define('WP_DEBUG_LOG', true);
/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
