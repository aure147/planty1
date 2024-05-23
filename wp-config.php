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
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'planty' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

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
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'CfeA;x>8NrYh.L`F.+RWv;pv+1vP*{nL~.xB$x$VjE`r*(b;>W;JxdiPD(o3ho>g' );
define( 'SECURE_AUTH_KEY',  '3C.0tP< NzxtPC|dZ+l%l;6`;_,,PZUW7:^fCO&+cCd%nll~8kRJ<Yc4=H*s`^  ' );
define( 'LOGGED_IN_KEY',    '30D}Rd3LPkU?IF0W*?V<yS0(;jKYyj_$4-%Y.{0}uG-R$GKMiS!-=y3)=A^XW/S5' );
define( 'NONCE_KEY',        '%4,r^M=Yew=yJD{(m8n:tkyA~X+(|n#Tcqyhbg<~rCZ+>@,H6elXdc(otb4Ef@Y.' );
define( 'AUTH_SALT',        '+eEy,`@vqxv[g,h-Gkx7:GEK0o_(cF^j=J3.qiO:iQVwtS0_9e9>N[FY[]#AbnIT' );
define( 'SECURE_AUTH_SALT', '15<ANaCCTKL~Cd#>6$L%dxz28VH)We_35|r1Cb7N~ u@>jmyRh)`47X5u([medgr' );
define( 'LOGGED_IN_SALT',   '=alF6:eV(pWrPUH1<5(Y_K%[:z_|MhbEu2<ep#6bg,!Mng]Ot;AT<eo%#B&8hRK~' );
define( 'NONCE_SALT',       'nR>);(Eq!~vhW(88}?PO3N2iddBG4SK9cW78odx;I9cFlZ6FOJ{<-/%.cx70N_i9' );
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
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
